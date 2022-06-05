<?php
session_start();
<<<<<<< HEAD
=======
var_dump(__DIR__);
>>>>>>> 6bf475cd67485313515e623e8b74737c559ea2e8
require __DIR__ . '/vendor/autoload.php';

use App\Controller\Account;

$account = new Account;
if (isset($_POST['login'])) {
    if ($account->login($_POST['username'], $_POST['password'])) {
        if ($_SESSION['role'] == "user") {
            header('Location: ./user.php');
        } elseif ($_SESSION['role'] == "pharmacy") {
            header('Location: ./pharmacy.php');
        } elseif ($_SESSION['role'] == "admin") {
            header('Location: ./admin.php');
        }
    } else {
        $err = "incorrect username or password";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<?php include './public/header.php'; ?>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="register-logo">
            <a href="./index.php"><b>OnlinePharmacy</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">

            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form method="post">

                    <div class="input-group mb-3">
                        <input type="text" class="form-control <?php if (isset($err)) echo 'is-invalid'; ?>" name="username" placeholder="Username" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control <?php if (isset($err)) echo 'is-invalid'; ?>" name="password" placeholder="Enter your password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">

                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block" name="login">Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <p class="mb-1">
                    <a href="./forget-password.php">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="./register.php" class="text-center">Register a new membership</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <?php include './public/script.php'; ?>
</body>

</html>