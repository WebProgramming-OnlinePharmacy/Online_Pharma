<?php

namespace App\Controller;


class Admin extends Database
{

    function registeredPharmacylist()
    {
        $sql = "SELECT * FROM account WHERE is_pharmacy = 1 AND is_approved = 0 AND is_deleted = 0";
        $result = mysqli_query($this->connect(), $sql);
        $i = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            $accid = $row['id'];
            $username = $row['username'];
            $email = $row['email'];
            $hashacc_id = base64_encode($accid);
            echo " 
            <tr>
             <td>" . $i++ . "</td>
              <td>" . $accid . "</td>
              <td>" . $username . "</td>
              <td>" . $email . "</td> 
              <td> <a href='admin.php?viewPharmacydetail=" . $hashacc_id . "' class='btn btn-primary btn-sm'>view detail</a></td>    
            </tr>";
        }
    }

    function viewpharmacy()
    {
        $sql = "SELECT account.username,account.email, pharmacy_info.id,pharmacy_info.acc_id, pharmacy_info.Pharmacy_Name,pharmacy_info.Loocation,pharmacy_info.phone FROM account INNER JOIN pharmacy_info ON account.id=pharmacy_info.acc_id WHERE account.is_deleted=0 AND pharmacy_info.is_deleted=0 AND account.is_approved=1";
        $result = mysqli_query($this->connect(), $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $pharmacy_name = $row['Pharmacy_Name'];
            $location = $row['Loocation'];
            $username = $row['username'];
            $phone = $row['phone'];
            $email = $row['email'];
            $accid = $row['acc_id'];
            $hashacc_id = base64_encode($accid);
            echo " 
            <tr>
             <td> $id </td>
             <td> $accid </td>
              <td> $pharmacy_name </td>
              <td> $location </td>
              <td>$username</td>
              <td>$phone</td>
              <td>$email</td> 
              <td> <a href='admin.php?deletepharmacy=$hashacc_id' class='btn btn-danger btn-sm'>Delete</a></td>    
            </tr>";
        }
    }

    function deletedpharmacylist()
    {
        $sql = "SELECT account.username,account.email, pharmacy_info.id,pharmacy_info.acc_id, pharmacy_info.Pharmacy_Name,pharmacy_info.Loocation,pharmacy_info.phone FROM account INNER JOIN pharmacy_info ON account.id=pharmacy_info.acc_id WHERE account.is_deleted=1 AND pharmacy_info.is_deleted=1";
        $result = mysqli_query($this->connect(), $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $pharmacy_name = $row['Pharmacy_Name'];
            $location = $row['Loocation'];
            $username = $row['username'];
            $phone = $row['phone'];
            $email = $row['email'];
            $accid = $row['acc_id'];
            $hashacc_id = base64_encode($accid);
            echo " 
            <tr>
             <td>" . $id . "</td>
             <td>" . $accid . "</td>
              <td>" . $pharmacy_name . "</td>
              <td>" . $location . "</td>
              <td>" . $username . "</td>
              <td>" . $phone . "</td>
              <td>" . $email . "</td> 
              <td> <a href='admin.php?deletepharmacy=" . $hashacc_id . "' class='btn btn-danger btn-sm'>Delete</a></td>    
            </tr>";
        }
    }
    function approvePharmacy($id)
    {
        $updated_at = date('Y-m-d H:i:s');
        $sql = "UPDATE `account` SET `is_approved`='1',`updated_at`='$updated_at' WHERE `id`= '$id' AND `is_deleted`=0;";
        if (mysqli_query($this->connect(), $sql)) {
            return true;
        }
        return false;
    }

    function deletepharmacy()
    {
        $hid = $_GET['deletepharmacy'];
        $id = base64_decode($hid);
        $sql_acc = "UPDATE account SET `is_deleted`='1' WHERE `id` = '$id'";
        $sql_info = "UPDATE `pharmacy_info` SET `is_deleted`='1' WHERE `acc_id` = '$id'";
        if (mysqli_query($this->connect(), $sql_info)) {
            if (mysqli_query($this->connect(), $sql_acc)) {
                return true;
            }
        }
        return false;
    }
    // count active pharmacy
    function countActivePharmacy(){
        $sql = "SELECT * FROM account WHERE is_pharmacy = 1 AND is_approved = 1 AND is_deleted = 0";
        $result = mysqli_query($this->connect(), $sql);
        $count = mysqli_num_rows($result);
        return $count;
    }
    // count pending pharmacy
    function countPendingPharmacy(){
        $sql = "SELECT * FROM account WHERE is_pharmacy = 1 AND is_approved = 0 AND is_deleted = 0";
        $result = mysqli_query($this->connect(), $sql);
        $count = mysqli_num_rows($result);
        return $count;
    }
    // count deleted pharmacy
    function countDeletedPharmacy(){
        $sql = "SELECT * FROM account WHERE is_pharmacy = 1 AND is_approved = 1 AND is_deleted = 1";
        $result = mysqli_query($this->connect(), $sql);
        $count = mysqli_num_rows($result);
        return $count;
    }
    // count all users
    function countAllUsers(){
        $sql = "SELECT * FROM account WHERE is_pharmacy = 0 AND is_deleted = 0";
        $result = mysqli_query($this->connect(), $sql);
        $count = mysqli_num_rows($result);
        return $count;
    }
    function addAdmin($username, $email, $password, $fName, $mName, $lName, $age, $sex, $phone)
    {
        $username = $this->myencode($username);
        $email = $this->myencode($email);
        $fName = $this->myencode($fName);
        $lName = $this->myencode($lName);
        $mName = $this->myencode($mName);
        $age = $this->myencode($age);
        $sex = $this->myencode($sex);
        $phone = $this->myencode($phone);
        $password = md5($this->myencode($password));
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');
        $is_user = 0;
        $is_admin = 1;
        $is_approved = 1;
        $is_pharmacy = 0;
        $is_deleted = 0;
        $sql = "INSERT INTO `account`(`username`, `email`, `pasword`, `is_user`, `is_pharmacy`, `is_admin`, `is_approved`, `is_deleted`, `created_at`, `updated_at`) 
        VALUES ('$username', '$email', '$password', '$is_user', '$is_pharmacy', '$is_admin', '$is_approved','$is_deleted','$created_at','$updated_at') ";
        $sql1 = "SELECT * FROM account WHERE email= '$email'";
        $sql2 = "SELECT * FROM account WHERE username= '$username'";
        if (mysqli_num_rows(mysqli_query($this->connect(), $sql1)) == 0) {
            if (mysqli_num_rows(mysqli_query($this->connect(), $sql2)) == 0) {
                if (mysqli_query($this->connect(), $sql)) {
                    $sql3 = "SELECT * FROM `account` ORDER BY `id` DESC LIMIT 1;";
                    $query = mysqli_query($this->connect(), $sql3);
                    if ($row = mysqli_fetch_assoc($query)) {
                        $accid = $row['id'];
                        $created_at = date('Y-m-d H:i:s');
                        $updated_at = date('Y-m-d H:i:s');
                        $sql4 = "INSERT INTO `admin`(`acc_id`, `F_name`, `M_name`, `L_name`, `age`, `sex`, `Phone`, `Created_at`, `Updated_at`) 
                        VALUES ('$accid','$fName','$mName','$lName','$age','$sex','$phone','$created_at','$updated_at')";
                        if (mysqli_query($this->connect(), $sql4)) {
                            return 1;
                        }
                        return 2;
                    }
                    return 3;
                }
                return 4;
            }
            return 5;
        }
        return 6;
    }
}
