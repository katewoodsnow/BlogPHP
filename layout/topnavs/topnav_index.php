<!DOCTYPE html>

<!-- NavBar -->

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php"><img style= "width: 64px;" src="imgs/logo/tmp_logo.jpg" alt="Blog Logo"></a>
    </div>
    <div id="myNavbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="aboutme.php">About Me</a></li>
            <li><a href="contact.php"><span class="glyphicon glyphicon-envelope"></span> Contact</a></li>
            <?php if (!isset($_SESSION['user_session'])) :?>
                <li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Login</a></li>
                    <?php endif; ?>
            <?php if (isset($_SESSION['user_session'])) :?>
                <li><a href="login/logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    <?php endif; ?>
        </ul>
    </div>
  </div>
</nav>

<!-- End NavBar -->