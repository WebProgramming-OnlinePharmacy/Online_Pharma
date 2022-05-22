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
        $sql = "SELECT account.username,account.email, pharmacy_info.id,pharmacy_info.acc_id, pharmacy_info.Pharmacy_Name,pharmacy_info.Loocation,pharmacy_info.phone FROM account INNER JOIN pharmacy_info ON account.id=pharmacy_info.acc_id WHERE account.is_deleted=0 AND pharmacy_info.is_deleted=0";
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
}
