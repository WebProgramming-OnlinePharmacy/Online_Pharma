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
        $sql = "INSERT INTO `pharmacy_info`(`acc_id`, `Pharmacy_Name`, `Loocation`, `phone`, `is_deleted`, `Created_at`, `Updated_at`) 
        VALUES ('$acc_id','$pharmacy_name','$location','$phone','$is_deleted','$created_at','$updated_at')";
        $sql1 = "SELECT * FROM pharmacy_info WHERE phone= '$phone' AND is_deleted=0";
        if (mysqli_num_rows(mysqli_query($this->connect(), $sql1)) == 0) {
            if (mysqli_query($this->connect(), $sql)) {
                echo "<script>alert('Added successfully')</script>";
                echo "<script>window.open('../src/index.php')</script>";
                return true;
            } else {
                echo mysqli_error($this->connect(),$sql);
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
        $sql = "SELECT account.id,account.username,account.email, pharmacy_info.id,pharmacy_info.acc_id, pharmacy_info.Pharmacy_Name,pharmacy_info.Loocation,pharmacy_info.phone FROM account INNER JOIN pharmacy_info ON account.id=pharmacy_info.acc_id WHERE acc_id= '$id' AND account.is_deleted=0 AND pharmacy_info.is_deleted=0;";
        $row = mysqli_fetch_array(mysqli_query($this->connect(), $sql));
        return $row;
    }
    function addDrug($name, $manufacture_date, $expied_date, $strength, $form, $price, $quantity, $description, $images)
    {
        $name = $this->myencode($name);
        $manufacture_date = $this->myencode($manufacture_date);
        $expied_date = $this->myencode($expied_date);
        $strength = $this->myencode($strength);
        $form = $this->myencode($form);
        $price = $this->myencode($price);
        $quantity = $this->myencode($quantity);
        $description = $this->myencode($description);
        $pharmacy_id = $_SESSION['pharmacy_id'];
        $images = $this->images;
        if ($quantity > 0) {
            $is_avilable = 1;
        } else {
            $is_avilable = 0;
        }
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');
        $sql = "INSERT INTO `drug_info`( `pharmacy_id`, `name`, `description`, `expire_date`, `manufacture_date`, `form`, `strength`, `price`, `quantity`, `is_avilable`, `Created_at`, `Updated_at`) 
        VALUES ('$pharmacy_id', '$name', '$description', '$expied_date', '$manufacture_date', '$form', '$strength', '$price', '$quantity', '$is_avilable','$created_at', '$updated_at')";
        if (mysqli_query($this->connect(), $sql)) {
            $sql2 = "SELECT * FROM `drug_info`  ORDER BY `id` DESC LIMIT 1;";
            $query = mysqli_query($this->connect(), $sql2);
            if ($row = mysqli_fetch_assoc($query)) {
                $id = $row['id'];
                $created_at = date('Y-m-d H:i:s');
                $updated_at = date('Y-m-d H:i:s');
                foreach ($images as $image) {
                }
            }
        }
    }
    function viewDrug()
    {
        $pharmacy_id = $_SESSION['pharmacy_id'];
        $sql = "SELECT * FROM `drug_info` WHERE pharmacy_id= $pharmacy_id";
        $result = mysqli_query($this->connect(), $sql);
        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
            $name = $row['name'];
            $manufacture_date = $row['manufacture_date'];
            $expied_date = $row['expire_date'];
            $form = $row['form'];
            $strength = $row['strength'];
            $price = $row['price'];
            $quantity = $row['quantity'];
            $is_avilable = $row['is_avilable'];
            $has_id = base64_encode($id);
            echo "
            <tr>
                <td>" . $id . "</td>
                <td>" . $name . "</td>
                <td>" . $manufacture_date . "</td>
                <td>" . $expied_date . "</td> 
                <td>" . $form . "</td>
                <td>" . $strength . "</td>
                <td>" . $price . "</td>>
                <td>" . $quantity . "</td>
                <td>" . $is_avilable . "</td>
                <td> <a href='admin.php?viewDrugdetail=" . $has_id . "' class='btn btn-primary btn-sm'>view detail</a></td>    
           </tr>";
        }
    }
}
