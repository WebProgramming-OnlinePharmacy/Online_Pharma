<?php

require __DIR__ . '/vendor/autoload.php';

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
            $registerAccount = $account->register($username, $email, $password, $role);
            if ($registerAccount == 0) {
                echo '<script>alert("Account Register successfully")</script>';
                echo '<script>window.location.href = "./login.php";</script>';
            } elseif ($registerAccount == 1) {
                echo '<div class="alert alert-danger">
                <strong>Error!</strong> Email is not valid.
                </div>';
                $erroremail = "email";
            } elseif ($registerAccount == 2) {
                echo '<div class="alert alert-danger">
                <strong>Error!</strong> Email already exists.
                </div>';
                $erroremail = "email";
            } elseif ($registerAccount == 3) {
                echo '<div class="alert alert-danger">
                <strong>Error!</strong> Username already exists.
                </div>';
                $errorusername = "username";
            }
        } else {
            $erroremail = "email";
        }
    } else {
        $errorpass = "password";
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
                        <input type="text" class="form-control <?php if (isset($errorusername)) echo 'is-invalid'; ?>" name="username" placeholder="Username" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control <?php if (isset($erroremail)) echo 'is-invalid'; ?>" name="email" placeholder="Email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control <?php if (isset($errorpass)) echo 'is-invalid'; ?>" name="password" placeholder="Enter your password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control <?php if (isset($errorpass)) echo 'is-invalid'; ?>" name="confirmpassword" placeholder="Retype your password" required>
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
                    <a href="./login.php" class="text-center float-left mr-4">I already have a membership</a>
                    <button type="submit" class=" btn btn-primary btn-md float-left" name="registerAccount">Register</button>
                </form>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div><?php include './public/script.php'; ?>
</body>

</html>