<?php
require APPROOT . '/views/inc/header.php';
?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto card card-body bg-light">
                <?php echo sessionAlert('register_success'); ?>
                <form action="<?php echo URLROOT; ?>/users/login" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        <span class="invalid-feedback"><?php echo $data['email_error']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1" required>
                        <span class="invalid-feedback"><?php echo $data['password_error']; ?></span>
                    </div>
                    <button type="submit" class="btn btn-secondary">Login</button>
                </form>
            </div>
        </div>
    </div>
<?php
require APPROOT . '/views/inc/footer.php';