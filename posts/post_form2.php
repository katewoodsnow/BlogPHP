<?php include_once ('C:\xampp/htdocs/BlogPHP/login/is_loggedin.php');?>


<!DOCTYPE html>
<div class="col-sm-7 pull-right">
    
    <div class="panel panel-default transparent">
    <div class="panel-body text-left">
        
 <h3 class = "rebellion"> <?php echo $row['title']; ?></h3>
    
    <p><?php echo $row['description']; ?></p>
    <p><em> Posted: <?php echo date('jS M Y', strtotime($row['date'])); ?></em></p>
    
    <br>
    <article><p>
            <?php echo $row['content'];?>  
    </p></article>
       
    <a class=" rebellion btn-default btn-blog pull-right" href=" ">Comment</a>
    
    <?php if (isset($_SESSION['user_session'])): ?>
        
    <?php include('is_admin.php');?>
    
    <?php endif; ?>
    
    </div>
    </div> 
    
</div> 