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
        if (
            isset($_GET['registeredPharmacylist']) || isset($_GET['viewPharmacydetail'])
            || isset($_GET['addadmin']) || isset($_GET['viewpharmacy']) || isset($_GET['deletepharmacy'])
            || isset($_GET['deletedpharmacylist'])
        ) {
            if (isset($_GET['registeredPharmacylist'])) {
                include './view/registeredPharmacylist.php';
            }
            if (isset($_GET['viewPharmacydetail'])) {
                include './view/pharmacydetail.php';
            }
            if (isset($_GET['addadmin'])) {
                include './view/addadmin.php';
            }
            if (isset($_GET['viewpharmacy'])) {
                include './view/pharmacylist.php';
            }
            if (isset($_GET['deletedpharmacylist'])) {
                include './view/deletedpharmacylist.php';
            }
            if (isset($_GET['deletepharmacy'])) {
                if ($admin->deletepharmacy()) {
                    echo "<script>alert('Deleted successfully')</script>";
                    echo "<script>window.location.replace('./admin.php?viewpharmacy')</script>";
                } else {
                    echo "<script>alert('some thing went wrong')</script>";
                }
            }
        } else {
            include './includes/adminbody.php';
        }
        ?>
    </div>
    <?php
    include './includes/script.php';
    ?>
</body>

<?php
if (isset($_POST['approvenewpharmacy'])) {
    if ($admin->approvePharmacy($row['acc_id'])) {
        echo "<script>alert('Approved successfully')</script>";
        echo "<script>window.location.replace('./admin.php?registeredPharmacylist')</script>";
    } else {
        echo "<script>alert('some thing went wrong')</script>";
    }
} ?>