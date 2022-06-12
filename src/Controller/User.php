<?php

namespace App\Controller;

class User extends Database
{
    function drugInformation()
    {
        $sql = "SELECT * FROM `drug_info`";
        $result = mysqli_query($this->connect(), $sql);
        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
            $pharmaid = $row['pharmacy_id'];
            $sql1 = "SELECT * FROM `drug_img` WHERE `drug_id`='$id' LIMIT 1";
            $sql2 = "SELECT * FROM `pharmacy_info` WHERE `id`='$pharmaid'";
            $result1 = mysqli_query($this->connect(), $sql1);
            $result2 = mysqli_query($this->connect(), $sql2);
            $row1 = mysqli_fetch_array($result1);
            $row2 = mysqli_fetch_array($result2);
            $name = $row['name'];
            $price = $row['price'];
            $pharmaName = $row2['Pharmacy_Name'];
            $location = $row2['Loocation'];
            $url = $row1['image_url'];
            $hid = base64_encode($id);
            echo "
            <div class='col-lg-3 col-md-6 col-sm-12'>
                <div class='card'>
                    <img src='$url' class='card-img-top' alt='...' style='height:250px;'>
                    <div class='card-body'>
                        <h5 class='card-text'>$name</h5>
                        <p class='card-text'>$price</p>
                        <p class='card-text'>$pharmaName</p>
                        <p class='card-text'>$location</p>
                        <a href='./user.php?drugDetail='.$hid class='btn btn-primary'>Detail</a>
                    </div>
                </div>
            </div>
            ";
        }
    }
}
