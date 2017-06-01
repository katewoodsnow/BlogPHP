
<!DOCTYPE html>
<div class="col-sm-8 pull-right">
    
    <div class="panel panel-default transparent">
    <div class="panel-body">
        
        <h3 class = "rebellion" >Title</h3>
    
    <p><em>Description</em></p>
    
    <br>
    <article>
        <p>Content Here. For now....Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer 
        took a galley of type and scrambled it to make a type specimen book. It has survived not only five 
        centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was 
        popularised in the 1960s with the releaseof Letraset sheets containing Lorem Ipsum passages, and more 
        recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
        </p> </article>
       
    <a class=" rebellion btn-default btn-blog pull-right" href=" ">Comment</a>
    
    <?php if (isset($_SESSION['user_session'])): ?>
        
    <a href="posts/edit_post.php" class="rebellion btn-default btn-blog pull-left">Edit/Delete Post</a>
  
    <?php endif; ?>
    
    </div>
    </div> 
    
</div> 


 
