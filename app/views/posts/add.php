<?php
require APPROOT . '/views/inc/header.php';
?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 mx-auto card card-body bg-light">

                <?php echo sessionAlert('snippet_not_added'); ?>
                <form action="<?php echo URLROOT; ?>posts/add" method="POST">
                    <div class="form-group">
                        <label for="title">Snippet name</label>
                        <input name="title" type="text" class="form-control" id="title"  required>
                        <span class="invalid-feedback"><?php echo $data['title_error']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="description">Snippet description</label>
                        <input name="description" type="text" class="form-control" id="description" required>
                    </div>
                    <div class="form-group">
                        <label for="body">Snippet body</label>
                        <textarea name="body" class="form-control" rows="10"></textarea>
                        <span class="invalid-feedback"><?php echo $data['body_error']; ?></span>
                    </div>
                    <button type="submit" class="btn btn-secondary">Add snippet</button>
                </form>
            </div>
        </div>
    </div>
<?php
require APPROOT . '/views/inc/footer.php';