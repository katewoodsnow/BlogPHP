<?php

include_once ('C:\xampp/htdocs/BlogPHP/login/is_loggedin.php');?>


<!DOCTYPE html>
<div class="col-sm-7 pull-right">
    
    <div class="panel panel-default transparent">
    <div class="panel-body text-left">
        
        <h3 class = "rebellion"><p>Posts in <?php echo $row['catTitle']; ?></P></h3>
        
         <?php
        try {

            $stmt = $DB_con->prepare('
                SELECT 
                   posts.id, posts.title, posts.description, posts.date 
                FROM 
                   posts,
                    blog_post_cats
                WHERE
                  posts.id = blog_post_cats.postID
                     AND blog_post_cats.catID = :catID
                ORDER BY 
                    postID DESC
                ');
            $stmt->execute(array(':catID' => $row['catID']));
            while ($row = $stmt->fetch()) {
echo '<div>';
                echo  $row['title'];
                echo '<p>Posted on ' . date('jS M Y H:i:s', strtotime($row['date'])) . ' in ';
     $stmt2 = $DB_con->prepare('SELECT catTitle, blog_cats.catID FROM blog_cats, blog_post_cats WHERE blog_cats.catID = blog_post_cats.catID AND blog_post_cats.postID = :postID');
                $stmt2->execute(array(':postID' => $row['id']));

                $catRow = $stmt2->fetchAll(PDO::FETCH_ASSOC);

                $links = array();
                foreach ($catRow as $cat) {
                    $links[] = "<a href='view_categoryposts.php?id=" . $cat['catID'] . "'>" . $cat['catTitle'] . "</a>";
                }
                echo implode(", ", $links);

                echo '</p>';
                echo '<p>' . $row['description'] . '</p>';
                readMore($row['id']);
                echo '</div>';
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        ?>
<a class=" rebellion btn-default btn-blog pull-right" href=" ">Comment</a>
    
    <?php if (isset($_SESSION['user_session'])): ?>
        
    <?php include('category\is_admincategory.php');?>
    
    <?php endif; ?>
    
    </div>
    </div> 
    
</div> 