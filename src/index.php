<!DOCTYPE html>
<html lang="en">

<?php
require __DIR__ . './vendor/autoload.php';
include './public/header.php';

use App\Controller\Account;
?>

<body class="hold-transition  layout-fixed">
  <div class="wrapper">
    <?php
    include './public/top.php';
    include './public/left.php';
    include './public/body.php';
    ?>
  </div>
  <?php include './public/script.php'; ?>
</body>

</html>

<?php
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
    } else {
      echo "email validation Err";
    }
  } else {
    echo "password confirmation Err";
  }
}
?>