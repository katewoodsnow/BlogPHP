<?php

include_once ('C:\xampp/htdocs/BlogPHP/login/is_loggedin.php'); ?> 
    
    <?php if ($userRow['user_role'] == 'admin'): ?>
    <a href="category_admin.php" class="rebellion btn-default btn-blog pull-left">Edit/Delete Category</a>
    <?php endif; ?>
