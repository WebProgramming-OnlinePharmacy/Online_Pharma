<?php
session_start();
require __DIR__ . './vendor/autoload.php';

use App\Controller\Account;
use App\Controller\Pharmacy;

$acc = new Account;
$pharma = new Pharmacy;
if (!isset($_SESSION['role']) || $_SESSION['role'] != "pharmacy") {
    header("Location: ../index.php");
}

if (isset($_GET['logout'])) {
    $acc->logout();
}
if (isset($_POST['addpharmacyinfo'])) {
    $pharmacyname = $_POST['name'];
    $phone = $_POST['Phonenumber'];
    $location = $_POST['location'];
    $pharma->register($pharmacyname, $location, $phone);
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include './includes/header.php'; ?>

<body class="hold-transition  layout-fixed ">
    <div class="wrapper">
        <?php
        if ($_SESSION['is_approved']) {
            include './includes/pharmacyleft.php';
            include './includes/pharmacytop.php';
        } else {
            include './includes/pharmacytopregistration.php';
            include './includes/pharmacyleftRegister.php';
        }
        if (isset($_GET['addpharmacyinfo'])) {
            include './view/addpharmacyInfo.php';
        } else {
            include './includes/pharmacybody.php';
        }
        ?>
    </div>
    <?php
    include './includes/script.php';
    ?>
</body>
<?php
