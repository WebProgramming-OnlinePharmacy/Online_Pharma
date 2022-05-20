<?php

namespace App\Controller;


class Admin extends Database
{

    function approvePharmacy()
    {
        $sql = "SELECT * FROM account WHERE is_pharmacy = 1 AND is_approved = 0";
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
}
