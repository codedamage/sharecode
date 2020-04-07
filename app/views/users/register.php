<?php
require APPROOT . '/views/inc/header.php';
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 mx-auto card card-body bg-light">
            <form action="<?php echo URLROOT; ?>users/register" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input name="name" type="text" class="form-control <?php echo (!empty($data['name_error'])) ? 'is-invalid' : ''; ?>" id="name" aria-describedby="nameHelp">
                    <small id="nameHelp" class="form-text text-muted">Your login name</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input name="password" type="password" class="form-control" id="exampleInputPassword1" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword2">Password confirmation</label>
                    <input name="password" type="password" class="form-control" id="exampleInputPassword2" required>
                </div>
                <button type="submit" class="btn btn-secondary">Register account</button>
            </form>
        </div>
    </div>
</div>
<?php
require APPROOT . '/views/inc/footer.php';