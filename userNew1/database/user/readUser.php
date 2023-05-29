<?php
include_once "./database/connection.php";

function readUser($uid){
    $q =  "SELECT * FROM users WHERE uid = $uid";
    return mysqli_fetch_array(runQuery($q));
}

function readAllUser(){
    $q = " SELECT * FROM users";
    $result = runQuery($q);
    $data = [];
    while($row = mysqli_fetch_array($result)){
        $data[] = $row;
    }
    return $data;
}


?>