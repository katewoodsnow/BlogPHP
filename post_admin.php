<?php

require_once('C:\xampp/htdocs/BlogPHP/database/posts_dbconfig.php');


/*If delete post request has been sent, blog deleted from database, the confirmation of 
deletion is passed to the url on the index page 
 * 
 */
 if(isset($_GET['delpost'])){ 
 
    $stmt = $DB_con->prepare('DELETE FROM posts WHERE id = :id');
    $stmt->execute(array(':id' => $_GET['delpost']));

    header('Location: index.php?action=deleted');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    
 <title>Blog Admin Corner</title>
  
<?php include('layout/head.php');?>

 <!--Confirms with user delete option and passes id of blog deleted to url in admin_index--->
<script language="JavaScript" type="text/javascript">
    function delpost(id, title){
        if (confirm("Are you sure you want to delete " + title)) {
            window.location.href = 'post_admin.php?delpost=' + id;
        }
    }
</script>
 
</head>

<body>
     
<!-- Top NavBar -->
<?php include('layout/topnavs/topnav_posts.php');?>
<!-- End Top NavBar -->
    
<div class="container-fluid text-center">    
<div class="row content">


<!-- Centre Container -->
<div style="background:transparent url('imgs/3po_admin.png') no-repeat center center /cover" class="col-sm-10 img-text-left main_container"> 
    <br><br><br>
<div class="col-sm-8 pull-right">
    
    <div class="panel panel-default transparent">
    <div class="panel-body">
        
        <h3 class = "rebellion" >Edit / Delete Posts</h3>
        <br> <br>
    
    <table cellspacing="20">
        <tr>
            <th>Title </th>
            <th>Date </th>
            <th>Action </th>
        </tr>

<?php
    try {
    $stmt = $DB_con->query('SELECT id, title, date FROM posts ORDER BY id DESC');
    while($row = $stmt->fetch()){    
        echo '<tr>';
        echo '<td>'.$row['title'].'</td>';
        echo '<td>'.date('jS M Y', strtotime($row['date'])).'</td>';
?>
        
    <!--edit and delete link passing id-->
    <td>
    <a href="edit_post.php?id=<?php echo $row['id'];?>">Edit</a>                              
    <!---calls javascript function--->
    <a href="javascript:delpost('<?php echo $row['id'];?>','<?php echo $row['title'];?>')">Delete</a>
    </td>
            
<?php 
    echo '</tr>';
    }

    } catch(PDOException $e) {
        echo $e->getMessage();
    }
?>

    </table>     
<p><a href='post_blog.php'>Add Post</a></p>
   
    </div>
    </div> 
    
</div> </div>
    
  

<!-- End Centre Container -->      

<!-- Right Sidebar -->
<?php include('layout/sidenav_right.php'); ?>
<!-- End Right Sidebar -->
</div> </div>
<!-- Footer -->
<?php include('layout/footer.php');?>
<!-- End Footer -->

</body>
</html>

   


