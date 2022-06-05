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
        $sql1 = "SELECT * FROM pharmacy_info WHERE phone= '$phone' AND is_deleted=0";
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
        $sql = "SELECT account.id,account.username,account.email, pharmacy_info.id,pharmacy_info.acc_id, pharmacy_info.Pharmacy_Name,pharmacy_info.Loocation,pharmacy_info.phone FROM account INNER JOIN pharmacy_info ON account.id=pharmacy_info.acc_id WHERE acc_id= '$id' AND account.is_deleted=0 AND pharmacy_info.is_deleted=0;";
        $row = mysqli_fetch_array(mysqli_query($this->connect(), $sql));
        return $row;
    }
    function addImage($id, $image_url)
    {
        $id = $this->myencode($id);
        $imageurl = $this->myencode($image_url);
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');
        $sql3 = "INSERT INTO `drug_img`(`drug_id`, `image_url`, `Created_at`, `Updated_at`) 
                VALUES ('$id','$image_url','$created_at','$updated_at')";
        if (mysqli_query($this->connect(), $sql3)) {
            return true;
        } else {
            return false;
        }
    }
    function imageupload($files, $id)
    {
        foreach ($files['name'] as $key => $file) {
            $file_name = $files['name'][$key];
            $file_tmp = $files['tmp_name'][$key];
            $file_size = $files['size'][$key];
            $file_error = $files['error'][$key];
            $file_type = $files['type'][$key];
            $file_ext = explode('.', $file_name);
            $file_ext = strtolower(end($file_ext));
            $allowed = array('jpg', 'jpeg', 'png');
            if (in_array($file_ext, $allowed)) {
                if ($file_error === 0) {
                    if ($file_size <= 2097152) {
                        $file_name_new = time() . '_' . uniqid('', true) . '.' . $file_ext;
                        $file_destination = 'images/' . $file_name_new;
                        move_uploaded_file($file_tmp, $file_destination);
                        if ($this->addImage($id, $file_destination)) {
                            $error = 0;
                        } else {
                            $error = 1;
                        }
                    } else {
                        $error = 2;
                    }
                } else {
                    $error = 3;
                }
            } else {
                $error = 4;
            }
            if ($error != 0) {
                return $error;
            }
        }
        return $error;
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
                if ($this->imageupload($images, $id) == 0) {
                    echo "<script>alert('Added successfully')</script>";
                    echo "<script>window.open('../src/pharmacy.php')</script>";
                } elseif ($this->imageupload($images, $id) == 1) {
                    echo "<script>alert('error in uploading')</script>";
                    echo "<script>window.open('../src/pharmacy.php')</script>";
                } elseif ($this->imageupload($images, $id) == 2) {
                    echo "<script>alert('file size is too big')</script>";
                    echo "<script>window.open('../src/pharmacy.php')</script>";
                } elseif ($this->imageupload($images, $id) == 3) {
                    echo "<script>alert('error in uploading')</script>";
                    echo "<script>window.open('../src/pharmacy.php')</script>";
                } elseif ($this->imageupload($images, $id) == 4) {
                    echo "<script>alert('file type is not allowed')</script>";
                    echo "<script>window.open('../src/pharmacy.php')</script>";
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
            echo "<tr>
                    <td>$id </td>
                    <td>$name</td>
                    <td>$manufacture_date</td>
                    <td>$expied_date </td> 
                    <td>$form </td>
                    <td>$strength</td>
                    <td>$price</td>
                    <td>$quantity</td>
                    <td>$is_avilable</td>
                    <td> <a href='../src/pharmacy.php?viewDrugdetail=$has_id' class='btn btn-primary btn-sm'>view detail</a></td>    
                </tr>";
        }
    }
    function viewDrugdetail()
    {
        $hid = $_GET['viewDrugdetail'];
        $id = base64_decode($hid);
        $sql = "SELECT drug_info.name,drug_info.expire_date,drug_info.manufacture_date,drug_info.form,drug_info.strength,drug_info.price,drug_info.quantity,drug_info.is_avilable,drug_info.description,drug_img.id,drug_img.drug_id,drug_img.image_url from drug_info
         INNER JOIN drug_img on drug_info.id=drug_img.drug_id WHERE drug_info.id=$id;";
        $row = mysqli_fetch_array(mysqli_query($this->connect(), $sql));
        return $row;
    }
    function viewDrugImages()
    {
        $hid = $_GET['viewDrugdetail'];
        $id = base64_decode($hid);
        $sql = "SELECT * FROM `drug_img` WHERE drug_id= $id;";
        $result = mysqli_query($this->connect(), $sql);
        $row = mysqli_fetch_assoc($result);
        $image = $row['image_url'];
        while ($row = mysqli_fetch_assoc($result)) {
            $image = $row['image_url'];
            echo "
            <div class='col-md-4 col-lg-3 col-sm-6 col'>
                <div class='product-image-thumb'><img src='$image'alt='Product Image' class='img-fluid img-thumbnail'></div>
            </div>";
        }
    }
}
