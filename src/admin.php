<?php
session_start();
require __DIR__ . '/vendor/autoload.php';

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
if (isset($_POST['addnewadmin'])) {
    $username = $_POST['username'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $middle_name = $_POST['middle_name'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password === $confirm_password) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $result = $admin->addAdmin($username, $email, $password, $first_name, $middle_name, $last_name, $age, $sex, $phone);
            if ($result == 1) {
                echo "<script>alert('Admin Added successfully')</script>";
                echo "<script>window.location.replace('./admin.php?addadmin')</script>";
            } elseif ($result == 2) {
                echo "<script>alert('username already exist 2')</script>";
                echo "<script>window.location.replace('./admin.php?addadmin')</script>";
            } elseif ($result == 3) {
                echo "<script>alert('not Updated')</script>";
                echo "<script>window.location.replace('./admin.php?addadmin')</script>";
            } else {
                echo "<script>alert('some thing went wrong')</script>";
                echo "<script>window.location.replace('./admin.php?addadmin')</script>";
            }
        } else {
            $email_err = "invalid email address";
        }
    } else {
        $password_err = "password confirmation";
    }
}
if(isset($_POST['updateAdmin'])){
    $username = $_POST['username'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $middle_name = $_POST['middle_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    if ($password === $confirm_password) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $result = $admin->updateAdminAccount($username, $email, $phone, $password, $first_name, $middle_name, $last_name);
            if ($result == 1) {
                echo "<script>alert('updated successfully')</script>";
                echo "<script>window.location.replace('./admin.php')</script>";
            } elseif ($result == 2) {
                echo "<script>alert('some thing went wrong 2')</script>";
               echo "<script>window.location.replace('./admin.php?updateAdmin')</script>";
            } elseif ($result == 3) {
                echo "<script>alert('some thing went wrong 3')</script>";
                echo "<script>window.location.replace('./admin.php?updateAdmin')</script>";
            } elseif ($result == 4) {
                echo "<script>alert('some thing went wrong 4')</script>";
                echo "<script>window.location.replace('./admin.php?updateAdmin')</script>";
            } elseif ($result == 5) {
                $email_err = "invalid email address";
            } elseif ($result == 6) {
                $username_err = "invalid username";
            } else {
                echo "<script>alert('some thing went wrong')</script>";
                echo "<script>window.location.replace('./admin.php?updateAdmin')</script>";
            }
        } else {
            $email_err = "invalid email address";
        }
    } else {
        $password_err = "password confirmation";
    }
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
            || isset($_GET['addadmin']) || isset($_GET['viewpharmacy']) || isset($_GET['updateAdmin']) || isset($_GET['deletepharmacy'])
            || isset($_GET['deletedpharmacylist'])
        ) {
            if (isset($_GET['registeredPharmacylist'])) {
                include './view/registeredPharmacylist.php';
            }
            if (isset($_GET['viewPharmacydetail'])) {
                include './view/pharmacydetail.php';
            }
            if (isset($_GET['updateAdmin'])) {
                include './view/update-admin-account.php';
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
}

?>