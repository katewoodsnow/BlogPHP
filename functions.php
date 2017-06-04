<?php

require_once('database/posts_dbconfig.php');

function redirect($url) {
    header("Location: $url");
    exit();
}

function readMore($postID) {
    echo '<p><a href="view_post.php?id=' . $postID . '">Read More</a></p>';
}

function print_errors($errorArray) {  //display errors within errors array              
    echo "<ul><li>" . implode("</li><li>", $errorArray) . "</li></ul>";
}

?>
