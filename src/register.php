<?php

require __DIR__ . './vendor/autoload.php';

use App\Controller\Account;

$account = new Account;

if (isset($_POST['registerAccount'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $role = $_POST['role'];
    if ($password === $confirmpassword) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $account->register($username, $email, $password, $role);
            header("Location: ./index.php");
        } else {
            echo "email validation Err";
        }
    } else {
        echo "password confirmation Err";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include './public/header.php'; ?>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="./index.php"><b>OnlinePharmacy</b></a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Register a new membership</p>

                <form method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="username" placeholder="Username" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
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
                    <div class="input-group mb-3">
                        <select name="role" class="form-control">
                            <option value="user">User</option>
                            <option value="pharmacy">Pharmacy</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-8">

                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block" name="registerAccount">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>



                <a href="./login.php" class="text-center">I already have a membership</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div><?php include './public/script.php'; ?>
</body>

</html>