<?php include_once('C:\xampp/htdocs/BlogPHP/database/posts_dbconfig.php'); ?>

<!DOCTYPE html>
<div class="col-sm-8 pull-right">
    
    <div class="panel panel-default transparent">
    <div class="panel-body">
        
        <h3 class = "rebellion" >My Blog Posts</h3>
    
    <p class = "rebellion">Below is a list of posts. This is a holding statement Agathe is likely to change if we keep the list display</p>
    
    <br>

<?php

//list posts from database
try {

    //select post from db and order by id in descending order
    $stmt = $DB_con->query('SELECT id, title, description, date FROM posts ORDER BY id DESC');
        
    /*loop through posts and display id and title passed to view_posts.php and used as a variable */
        
    while($row = $stmt->fetch()){
          
        echo '<div>';
        echo '<br/>';
        echo '<h1 class = "rebellion"><a href="view_post.php?id='.$row['id'].'">'.$row['title'].'</a></h1>';
        echo '<p style="font-size:160%;">'.$row['description'].'</p>';                
        echo '<p>Posted on '.date('jS M Y H:i:s', strtotime($row['date'])).'</p>';
        echo '<p><a href="view_post.php?id='.$row['id'].'">Read More</a></p>';   
        echo '</div>';
    }

    } catch(PDOException $e) {
        echo $e->getMessage();
    }
?>
    
    </div>
    </div> 
    
</div> 

