<?php

include_once ('C:\xampp/htdocs/BlogPHP/login/is_loggedin.php'); ?> 
    
    <?php if ($userRow['user_role'] == 'admin'): ?>
    <a href="post_admin.php" class="rebellion btn-default btn-blog pull-left">Edit/Delete Post</a>
    <?php endif; ?>

