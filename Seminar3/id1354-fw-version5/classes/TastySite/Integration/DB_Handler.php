<?php

namespace TastySite\Integration;

 class DB_Handler{
     private $conn;
     
     public function __construct(){
         $DB_USERNAME = 'root';
         $DB_PASSWORD = 'root';
         $DB_HOST = 'localhost';
         $DB_DATABASE = 'login_tasty';
         
         $this->conn = new mysqli($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE);
         
           if (mysqli_connect_error()) {
           die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
            }
     }
     
     public function loginUser($username, $password){
         $query= "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
         $result = mysqli_query($this->conn, $query);
         return $result;
     }
 }