
<?php
require_once('C:\xampp/htdocs/BlogPHP/database/posts_dbconfig.php');
require_once('functions.php');

/* Delete category from database. If delete post request has been sent through the url in
 * the deletecat function , blog matching the id sent is deleted from database, 
 * the confirmation message of deletion is sent as a query string to the web server (index.php)
 */

if (isset($_GET['deletecat'])) {
    $stmt = $DB_con->prepare('DELETE FROM blog_cats WHERE catID = :catID');
    $stmt->execute(array(':catID' => $_GET['deletecat']));
    
    echo "<script type='text/javascript'>alert('Category deleted successfully!');
            window.location.href='index.php?action=updated';
            </script>";
}

?>
<!doctype html>
<html lang="en">

    <head>

        <title>Category Admin Corner</title>
        
        <?php include('layout/head.php');


        /* Confirms with user delete option, if ok pressed, passes id of category being deleted to url/server 
         * admin_category
         */
        ?>

        <script language="JavaScript" type="text/javascript">
            function deletecat(id, title)
            {
                if (confirm("Are you sure you want to delete " + title))
                {
                    window.location.href = 'category_admin.php?deletecat=' + id;
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
        
        <h3 class = "rebellion" >Edit / Delete Categories</h3>
        <br> <br>

        <!---<a href='index.php'>Home page</a>-->

        <table cellspacing="20">
            <tr>
                <th>Title</th>
                <th>Action</th>
            </tr>
            <?php
            try {
                $stmt = $DB_con->query('SELECT catID, catTitle FROM blog_cats ORDER BY catTitle DESC');
                while ($row = $stmt->fetch()) {

                    echo '<tr>';
                    echo '<td>' . $row['catTitle'] . '</td>';
                    ?>

                    <td>
                        <!---directs to edit_category.php passing the catID selected--->
                        <a href="edit_category.php?id=<?php echo $row['catID']; ?>">Edit</a> | 
                        <!---directs to jaavascript function passing the catID and catTitle selected-->
                        <a href="javascript:deletecat('<?php echo $row['catID']; ?>' , '<?php echo $row['catTitle']; ?>')">Delete</a>
                    </td>

                    <?php
                    echo '</tr>';
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            ?>
        </table>

        <p><a href='post_category.php'>Add Category</a></p>

    </div>

</body>
</html>
