<?php
if (isset($_POST['updateAccount'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    if ($password === $confirmpassword) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $acc->updateAccount($username, $email, $password);
        } else {
            echo "email validation Err";
        }
    } else {
        echo "password confirmation Err";
    }
    
    
}
?>
<div class="content-wrapper pt-5  vh-100">
    <!-- Main content -->
    <?php
    $row = $acc->accountInfo($_SESSION['accid'])
    ?>
    <section class="content mt-5">

        <div class="container-fluid">
            <div class="register-box" style="margin-left: 30%; padding-top: 5%;">
                <div class="card">
                    <div class="card-body register-card-body">
                        <form method="POST">
                            <p class="login-box-msg input-group">Update Your Account</p>
                            <div class="input-group mb-3">
                                <label class="input-group">Username</label>
                                <input type="text" name="username" class="form-control" placeholder="<?php echo $row['username']; ?>" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="<?php echo $row['email']; ?>" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" name="confirmpassword" placeholder="Retype your password" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- /.col -->
                                <div class="col-4">
                                    <button name="updateAccount" type="submit" class="btn btn-primary btn-block">Update</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>


                    </div>
                    <!-- /.form-box -->
                </div><!-- /.card -->
            </div>
        </div>
    </section>
</div>