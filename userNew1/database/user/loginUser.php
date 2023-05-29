<?php
include_once "./database/connection.php";

function userLogin($uname, $pass){
    $q =  "SELECT * FROM users WHERE email='$uname' AND password='$pass' ";
    return mysqli_fetch_array(runQuery($q));
}

?>