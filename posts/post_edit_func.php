    
<?php
  
  //error checks

if(isset($_POST['submit'])){
    
    extract($_POST);
    
    $title          = trim($_POST["title"]);        //trim whitespace
    $description    = trim($_POST["description"]);
    $content        = trim($_POST["content"]);    
    
    if($id ==''){
        $error[] = 'Please submit a valid id';
    }

    if($title ==''){
        $error[] = 'Please enter a title';
    }
    else if (strlen($title)> 255) {
        $error[]= "Title can not be longer than 255 characters";
    }

    if($description ==''){
        $error[] = 'Please enter the description.';
    }

    if($content == ''){
        $error[] = 'Please enter text.';
    }

    if(!isset($error)){
        try {
            //insert into database
            $stmt = $DB_con->prepare('UPDATE posts SET title = :title, description = :description, content = :content WHERE id = :id') ;
            $stmt->execute(array(
                ':title' => $title,
                ':description' => $description,
                ':content' => $content,
                ':id' => $id,
            ));

            echo "<script type='text/javascript'>alert('Post edited successfully!');
            window.location.href='index.php?action=updated';
            </script>";
            
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
 }
  
    //check for any errors
if(isset($error)){
    foreach($error as $error){
        echo $error.'<br />';
    }
}
  
try {
    $stmt = $DB_con->prepare("SELECT id, title, description, content FROM posts WHERE id = :id");
    $stmt->execute(array(':id' => $_GET['id']));
    $row = $stmt->fetch(); 

} catch(PDOException $e) {
    echo $e->getMessage();
}

/*
<!---determine which post to edit --->
<form action='' method='post'>
    <input type='hidden' name='id' value='<?php echo $row['id'];?>'>

    <p><label>Title</label><br />
    <input type='text' name='title' value='<?php echo $row['title'];?>'></p>

    <p><label>Description</label><br />
    <textarea name='description' cols='60' rows='10'><?php echo $row['description'];?></textarea></p>

    <p><label>Content</label><br />
    <textarea name='content' cols='60' rows='10'><?php echo $row['content'];?></textarea></p>

    <p><input type='submit' name='submit' value='Update'></p>

</form>
*/
?>