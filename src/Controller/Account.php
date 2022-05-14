<?php

namespace App\Controller;

use mysqli;

class Account extends Database
{


    // register account
    function register($uname, $mail, $pass, $rol)
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
        } elseif ($role == "pharmacy") {
            $is_user = 0;
            $is_pharmacy = 1;
            $is_admin = 0;
            $is_deleted = 0;
        }
        $sql = "INSERT INTO `account` (`id`, `username`, `email`, `pasword`, `is_user`, `is_pharmacy`, `is_admin`, `is_deleted`) VALUES (NULL, '$username', '$email', '$password', '$is_user', '$is_pharmacy', '$is_admin', '$is_deleted')";
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
}
