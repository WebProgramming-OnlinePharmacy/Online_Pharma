<?php
session_start();
require __DIR__ . './vendor/autoload.php';

use App\Controller\Account;
use App\Controller\Admin;
use App\Controller\Pharmacy;

$acc = new Account;
$admin = new Admin();
$pharma = new Pharmacy();
if (!isset($_SESSION['role']) || $_SESSION['role'] != "admin") {
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
        include './includes/admintop.php';
        include './includes/adminleft.php';
        if (isset($_GET['approvePharmacy'])) {
            include './view/approvepharmacy.php';
        }
        if (isset($_GET['viewPharmacydetail'])) {
            include './view/pharmacydetail.php';
        } else {
            include './includes/adminbody.php';
        }
        ?>
    </div>
    <?php
    include './includes/script.php';
    ?>
</body>