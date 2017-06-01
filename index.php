<?php

session_start();

include_once ('login/class_user.php');

if(isset($_SESSION['user_session'])){
require_once ('login/is_loggedin.php');
}
?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    
<title>On the Road to Jedi</title>
  
<?php include('layout/head.php'); ?>

</head>

     
<!-- Top NavBar -->
<?php include('layout/topnavs/topnav_index.php');?>
<!-- End Top NavBar -->
    
<div class="container-fluid text-center">    
<div class="row content">


<!-- Centre Container -->
<div style="background:transparent url('imgs/background/Reybackground.jpg') no-repeat center center /cover" class="col-sm-10 img-text-left main_container"> 
   
<?php if (isset($_SESSION['user_session'])): ?>
        
<?php include('layout/index_div_li.php');?>
    
<?php endif; ?>

    <div>
        <h1 class="text-center rebellion">On the Road to Jedi</h1>
            <p class= "col-sm-9 pull-right">Lorem ipsum dolor ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      <br>
      <br>
      <?php include('posts/post_list.php'); ?>
            <br>
    </div>
      
    <div>
  <?php// include('layout/pager.php'); ?>
    </div>
    
</div>
<!-- End Centre Container -->      

<!-- Right Sidebar -->
<?php include('layout/sidenav_right.php'); ?>
<!-- End Right Sidebar -->

</div>
</div>
</div>

<!-- Footer -->
<?php include('layout/footer.php');?>
<!-- End Footer -->

</body>
</html>
