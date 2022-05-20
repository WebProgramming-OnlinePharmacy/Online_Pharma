<?php

namespace App\Controller;

class Pharmacy extends Database
{
    function register($pharmacy_name, $Location, $phone)
    {
        $pharmacy_name = $this->myencode($pharmacy_name);
        $location = $this->myencode($Location);
        $phone = $this->myencode($phone);
        $acc_id = $_SESSION['accid'];
        $is_deleted = 0;
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');
        $sql = "INSERT INTO `pharmacy_info`(`id`, `acc_id`, `Pharmacy_Name`, `Loocation`, `phone`, `is_deleted`, `Created_at`, `Updated_at`) VALUES ('','$acc_id','$pharmacy_name','$location','$phone','$is_deleted','$created_at','$updated_at')";
        $sql1 = "SELECT * FROM pharmacy_info WHERE phone= '$phone'";
        if (mysqli_num_rows(mysqli_query($this->connect(), $sql1)) == 0) {
            if (mysqli_query($this->connect(), $sql)) {
                echo "<script>alert('Added successfully')</script>";
                echo "<script>window.open('../src/index.php')</script>";
                return true;
            } else {
                echo "<script>alert('registration failed')</script>";
            }
        } else {
            echo "<script>alert('phone nummber already exists')</script>";
        }
    }
    function viewdetails()
    {
        $hid = $_GET['viewPharmacydetail'];
        $id = base64_decode($hid);
        $sql = "SELECT * FROM pharmacy_info WHERE acc_id= '$id'";
        $row = mysqli_fetch_array(mysqli_query($this->connect(), $sql));
        return $row;
    }
}
