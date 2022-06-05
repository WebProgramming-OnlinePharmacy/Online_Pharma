<?php
session_start();
require __DIR__ . '/vendor/autoload.php';

use App\Controller\Account;
use App\Controller\Pharmacy;
use App\Controller\Admin;

$acc = new Account;
$pharma = new Pharmacy;
$admin = new Admin;
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
if (isset($_POST['addDrug'])) {
    $drug_name = $_POST['drug_name'];
    $manfacture_date = $_POST['manfacture_date'];
    $expire_date = $_POST['expire_date'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $strength = $_POST['strength'];
    $form = $_POST['form'];
    $description = $_POST['description'];
    $files = $_FILES['image'];
    $pharma->addDrug($drug_name, $manfacture_date, $expire_date, $strength, $form, $price, $quantity, $description, $files);
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
        if (
            isset($_GET['addpharmacyinfo']) || isset($_GET['addDrug']) || isset($_GET['viewDrug'])
            || isset($_GET['expiredDrug']) || isset($_GET['viewDrugdetail'])
        ) {
            if (isset($_GET['addpharmacyinfo'])) {
                include './view/addpharmacyInfo.php';
            }
            if (isset($_GET['addDrug'])) {
                include './view/addDrug.php';
            }
            if (isset($_GET['viewDrug'])) {
                include './view/viewDrug.php';
            }
            if (isset($_GET['expiredDrug'])) {
                include './view/expiredDrug.php';
            }
            if (isset($_GET['viewDrugdetail'])) {
                include './view/viewDrugdetail.php';
            }
        } else {
            include './includes/pharmacybody.php';
        }
        ?>
    </div>
    <?php
    include './includes/script.php'
    ?>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
</body>
<?php
