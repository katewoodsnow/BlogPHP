
<?php 
include_once ('login/class_user.php');
require_once('database/posts_dbconfig.php');?>


<!DOCTYPE html>
<html lang="en">
    
<head>
    
<title>Create New Post</title>

  
<?php include('layout/head.php');?>

<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
  <script>
          tinymce.init({
              selector: "textarea",
              plugins: [
                  "advlist autolink lists link image charmap print preview anchor",
                  "searchreplace visualblocks code fullscreen",
                  "insertdatetime media table contextmenu paste"
              ],
              toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
          });
  </script>
 
</head>

<body>
     
<!-- Top NavBar -->
<?php include('layout/topnavs/topnav_posts.php');?>
<!-- End Top NavBar -->

<?php require_once('posts/post_to_db.php');?>
    
<div class="container-fluid text-center">    
<div class="row content">
      
<!-- Main Container -->
    <div style="background:transparent url('imgs/background/about_rey.jpg') no-repeat center center /cover" class="col-sm-10 text-left main_container"> 
<br><br>
         
    <h1 class="text-center rebellion">Create New Post</h1>
         
    <div class="pcontainer">
    <div class="pform-container transparent">
         
       <form action="" method="post">
           
       <div class="form-group">
            <p><label for="title"><b><font size="4"><b> Title </label>
            <input type='text' name='title' value='<?php /*keeps title if error occurs prevent user from re-typing*/ if(isset($_POST['title'])){echo $_POST['title'];}?>'></p>
        </div>
       
        <div class="form-group">
            <p><label for="description"> Description </label>
            <textarea name='description' rows='1' cols='55'><?php if(isset($_POST['description'])){echo $_POST['description'];}?></textarea></p>
        </div>
           
         <div class="form-group">
            <p><label for='content'> Content </label>
            <textarea name='content' rows='10' cols='55'><?php if(isset($_POST['content'])){echo $_POST['content'];}?></textarea></p> 
        </div> 
           
            <div class="form-group">
           <fieldset>
                                    <legend>Categories</legend>


                                    <?php
                                    $stmt2 = $DB_con->query('SELECT catID, catTitle FROM blog_cats ORDER BY catTitle');
                                    $checked = null;

                                    while ($row2 = $stmt2->fetch()) {
                                        if (isset($_POST['catID'])) {
                                            if (in_array($row2['catID'], $_POST['catID'])) {
                                                $checked = "checked='checked'";
                                            } else {
                                                $checked = "";
                                            }
                                        }
                                        echo "<input type='checkbox' name='catID[]' value='" . $row2['catID'] . "' $checked> " . $row2['catTitle'] . "<br />";
                                    }
                                    ?>
                                </fieldset>
                </div> 
        
                
                <div class="clearfix"></div><hr/>
        
        <div class="form-group rebellion">
            <input type='submit' class="btn btn-block btn-primary" name='submit' value="Add Post">
        </div>   
</form>  
    </div></div></div>
<!-- End Main Container -->      


<!-- Right Sidebar -->
<?php include('layout/sidenav_right.php'); ?>
<!-- End Right Sidebar -->

</div>
</div>

<!-- Footer --> 
<?php include('layout/footer.php'); ?>
<!-- End Footer -->

</body>
</html>
