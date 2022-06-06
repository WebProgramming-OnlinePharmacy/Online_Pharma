<?php

namespace App\Controller;

class Database
{
   private $servername;
   private $username;
   private  $password;
   private $Dbname;
   protected function connect()
   {
      $this->servername = "localhost";
      $this->username = "root";
      $this->password = "";
      $this->Dbname = "onlinepharmacy";

      $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->Dbname);
      if ($conn) {
         return $conn;
      } else {
         echo "Database Connection Error" . mysqli_connect_error($conn);
      }
   }

   protected function myencode($typ)
   {
      $ret = mysqli_real_escape_string($this->connect(), $typ);
      return $ret;
   }
}
