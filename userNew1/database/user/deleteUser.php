<?php
include_once "./database/connection.php";

function deleteUser($uid){
    $q =  "DELETE FROM users WHERE uid = $uid";
    return runQuery($q);
}

?>