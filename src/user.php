<?php
session_start();
require __DIR__ . '/vendor/autoload.php';

use App\Controller\Account;
use App\Controller\User;

$acc = new Account;
$user = new User;
if (!isset($_SESSION['role']) || $_SESSION['role'] != "user") {
  header("Location: ./index.php");
}
if (isset($_GET['logout'])) {
  $acc->logout();
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include './includes/header.php'; ?>

<body class="hold-transition  layout-fixed ">
  <div class="wrapper">
    <?php
    include './includes/usertop.php';
    include './includes/userleft.php';
    include './includes/userbody.php';
    ?>
  </div>
  <?php
  include './includes/script.php';
  ?>
</body>