
<?php
include_once ('login/class_user.php');
require_once('database/posts_dbconfig.php');
?>

<!doctype html>
<html lang="en">
    <head>
        
        <title>Create New Category</title>
   
        <?php include('layout/head.php');?>
</head>

<body>
    
    <!-- Top NavBar -->
<?php include('layout/topnavs/topnav_posts.php');?>
<!-- End Top NavBar -->

<?php require_once('category/category_to_db.php');?>

<div class="container-fluid text-center">    
<div class="row content">

    <!-- Main Container -->
    <div style="background:transparent url('imgs/background/about_rey.jpg') no-repeat center center /cover" class="col-sm-10 text-left main_container"> 
<br><br>

 <h1 class="text-center rebellion">Create New Category</h1>

   <div class="pcontainer">
    <div class="pform-container transparent">

    <form action='' method='post'>
        
        <div class="form-group">
        <p><label>Category name</label><br />
            <input type='text' name='catTitle' value='<?php
            if (isset($error)) {
                echo $_POST['catTitle'];
            }
            ?>'></p>
        </div>
        
        <div class="clearfix"></div><hr/>
        
        <div class="form-group rebellion">
        <p><input type='submit' name='submit' value='Submit'></p>

    </form>