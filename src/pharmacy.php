<?php
session_start();
var_dump(__DIR__);
require __DIR__ . '/vendor/autoload.php';

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
            include './view/wait-until-approve.php';
            //include './includes/pharmacyleftRegister.php';
        }
        if (isset($_GET['addpharmacyinfo']) || isset($_GET['addDrug']) || isset($_GET['viewDrug']) || isset($_GET['expiredDrug'])) {
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
