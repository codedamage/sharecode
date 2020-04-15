<?php
require APPROOT . '/views/inc/header.php';
?>
    <div class="container mt-5">
        <div class="alert alert-dark" role="alert">
           <b>Posted by</b> <?php echo $data['author']; ?><br>
           <b>Description:</b> <?php echo $data['description']; ?><br>
            <?php if($data['post']->user_id == $_SESSION['user_id']){ echo '<a href="'.URLROOT.'posts/edit/'.$data["post"]->id.'" class="btn btn-success">Edit snippet</a><form method="post" style="margin-top:10px;" action="'.URLROOT.'posts/delete/'.$data['post']->id.'"><button type="submit" value="delete" class="btn btn-danger">Delete snippet</button></form>'; } ?>
        </div>
        <div class="row">
            <pre class="language-php"><?php echo $data['body']; ?></pre>

        </div>
    </div>
<?php
require APPROOT . '/views/inc/footer.php';