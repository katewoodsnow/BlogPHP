<?php

function redirect($url){
    header("Location: $url");
}


if(isset($_POST['submit'])){                        //if form submitted process submitted data
    

    $title          = trim($_POST["title"]);        //trim whitespace
    $description    = trim($_POST["description"]);
    $content        = trim($_POST["content"]);
        
    //extract($_POST);

    
    if(empty($title)){                              //error checks
        $errors[] = "Please enter a title";
    }
        else if (strlen($title)> 255) {
            $errors[]= "Title can not be longer than 255 characters";
        }
    
    if(empty($description)) {
        $errors[]= "Please enter a description";
    }
    
    if(empty($content)) {
        $errors[]= "Please enter content";
    }

    
    if(!isset($errors)){                            //if no errors, insert data in database

        try { 
        
            $stmt = $DB_con->prepare('INSERT INTO posts (title,description,content,date) VALUES (:title, :description, :content, :date)') ;
            
            $stmt->execute(array(
                
                ':title' => $title,
                ':description' => $description,
                ':content' => $content,
                ':date' => date('Y-m-d H:i:s')
            ));

        redirect ('index.php');
    
        } catch(PDOException $e) {
            echo $e->getMessage();
            }
    }
}

if(isset($errors)&& !empty($errors)) {               //display errors within errors array
    echo "<ul><li>", implode("</li><li>", $errors), "</li></ul>";
}     

?>