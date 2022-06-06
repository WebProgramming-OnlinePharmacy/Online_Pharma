<?php

namespace App\Controller;

use mysqli;

class Account extends Database
{


    // register account
    public function register($uname, $mail, $pass, $rol)
    {
        $username = $this->myencode($uname);
        $email = $this->myencode($mail);
        $password = md5($this->myencode($pass));
        $role = $this->myencode($rol);
        if ($role == "user") {
            $is_user = 1;
            $is_pharmacy = 0;
            $is_admin = 0;
            $is_deleted = 0;
            $is_approved = 1;
        } elseif ($role == "pharmacy") {
            $is_user = 0;
            $is_pharmacy = 1;
            $is_admin = 0;
            $is_deleted = 0;
            $is_approved = 0;
        }
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');
        $sql = "INSERT INTO `account` (`id`, `username`, `email`, `pasword`, `is_user`, `is_pharmacy`, `is_admin`,`is_approved`, `is_deleted`,`created_at`, `updated_at`) VALUES (NULL, '$username', '$email', '$password', '$is_user', '$is_pharmacy', '$is_admin','$is_approved', '$is_deleted','$created_at','$updated_at')";
        $sql1 = "SELECT * FROM account WHERE email= '$email'";
        $sql2 = "SELECT * FROM account WHERE username= '$username'";

        if (mysqli_num_rows(mysqli_query($this->connect(), $sql2)) == 0) {
            if (mysqli_num_rows(mysqli_query($this->connect(), $sql1)) == 0) {
                if (mysqli_query($this->connect(), $sql)) {
                    echo "<script>alert('Added successfully')</script>";
                    echo "<script>window.open('../src/index.php')</script>";
                    return true;
                } else {
                    echo "<script>alert('InsertionErr')</script>";
                }
            } else {
                echo "<script>alert('emailErr')</script>";
            }
        } else {
            echo "<script>alert('usernameErr')</script>";
        }
    }

    public function login($username, $password)
    {
        $username = $this->myencode($username);
        $password = md5($this->myencode($password));
        $sql = "SELECT * FROM account WHERE username='$username' AND pasword='$password' And is_deleted=0";
        $query = mysqli_query($this->connect(), $sql);
        if (mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_assoc($query);
            $accid = $row['id'];
            $accname = $row['username'];
            $is_approved = $row['is_approved'];
            if ($row['is_user'] == 1) {
                $role = "user";
            } elseif ($row['is_pharmacy'] == 1) {
                $role = "pharmacy";
            } else {
                $role = "admin";
            }
            $_SESSION['accid'] = $accid;
            $_SESSION['username'] = $accname;
            $_SESSION['role'] = $role;
            $_SESSION['is_approved'] = $is_approved;
            // 
            if ($_SESSION['role'] == "pharmacy") {
                if ($is_approved) {
                    $sql2 = "SELECT * FROM pharmacy_info WHERE acc_id= $accid";
                    $row = mysqli_fetch_array(mysqli_query($this->connect(), $sql2));
                    $pharmacy_id = $row['id'];
                    $pharmacy_name = $row['Pharmacy_Name'];
                    $_SESSION['pharmacy_id'] = $pharmacy_id;
                    $_session['pharacy_name'] = $pharmacy_name;
                }
            }
            return true;
        }
        return false;
    }
    //Account info
    function accountInfo($id)
    {
        $sql = "SELECT * FROM account WHERE id=$id";
        $result = mysqli_query($this->connect(), $sql);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            return $row;
        }
    }
  

// update account
    function updateAccount($username, $email, $password)
    {
        $username = $this->myencode($username);
        $email = $this->myencode($email);
        $password = md5($this->myencode($password));
        $date = date('Y-m-d H:i:s');
        $sql = "UPDATE `account` SET `username`='$username',`email`='$email',`pasword`='$password', `updated_at`= '$date' WHERE id=" . $_SESSION['accid'];
        $sql1 = "SELECT * FROM `account` WHERE `username`='$username'";
       $sql2= "SELECT * FROM `account` WHERE `email`='$email'";
       if (mysqli_num_rows(mysqli_query($this->connect(), $sql2)) == 0) {
        if (mysqli_num_rows(mysqli_query($this->connect(), $sql1)) == 0) {
            if (mysqli_query($this->connect(), $sql)) {
                echo "<script>alert('Updated successfully')</script>";
                return true;
            } else {
                echo "<script>alert('InsertionErr')</script>";
            }
        } else {
            echo "<script>alert('Email in Use')</script>";
        }
    } else {
        echo "<script>alert('Username In Use')</script>";
    }
        
    }

    public function logout()
    {
        session_destroy();
        header('Location: ./index.php');
    }
}
