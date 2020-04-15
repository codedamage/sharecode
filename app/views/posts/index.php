<?php
require APPROOT . '/views/inc/header.php';
?>
<div class="container content main-content">
    <a href="<?php echo URLROOT; ?>posts/add" class="btn btn-success add_snippet">Add Snippet</a>
    <?php echo sessionAlert('snippet_added'); ?>
<div class="row">
<?php
foreach ($data['posts'] as $post)
{
    ?>
    <div class=" mb-3 col-6">
    <div class="card post" >
        <div class="row no-gutters">
            <div class="col-md-4 ">
                <img src="https://picsum.photos/seed/<?php echo rand(100,999); ?>/130/225" class="card-img" >
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><a href="<?php echo URLROOT; ?>single/<?php echo $post->postId; ?>"><?php echo $post->title; ?></a> </h5>
                    <p class="card-text"><?php echo substr($post->description, 0, 150); ?></p>
                    <p class="card-text"><small class="text-muted">Posted by <?php echo $_SESSION['user_name']; ?></small></p>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php
}
?>
</div>
</div>
<?php
require APPROOT . '/views/inc/footer.php';