
<!DOCTYPE html>
<html lang="en">
    
<head>
    
<title>Blog Name - Contact Me</title>
  
<?php include('layout/head.php'); ?>

</head>

<body>
     
<!-- Top NavBar -->
<?php include('layout/topnavs/topnav_contact.php');?>
<!-- End Top NavBar -->
    
<div class="container-fluid text-center">     
  <div class="row content">

<!-- Centre Container -->
<div style="background:transparent url('imgs/MillenniumFalcon1.jpg') no-repeat center center /cover" class="col-sm-10 text-left main_container">
    <div>
    <h1 class="text-center dark_orange rebellion">Contact Me</h1>
    <p class="required small text-center light_orange rebellion">* = Required fields</p>
    <br>
    </div>
    <?php include ('contact/contact_form.php') ?>
</div>
<!-- End Centre Container -->      
      
<!-- Right Sidebar -->
<?php include('layout/sidenav_right.php'); ?>
<!-- End Right Sidebar -->

</div>
</div>
</div>

<!-- Footer -->
<?php include('layout/footer.php'); ?>
<!-- End Footer -->

</body>
</html>
