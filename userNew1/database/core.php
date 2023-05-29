<?php
include_once "./database/connection.php";
function isNew($value){
    return $value == -1;
}

function getLastRecord($table, $by){
    $q= "SELECT * FROM $table ORDER BY $by DESC";
    return runQuery($q);
}

function showOnlyForAdmin($ui){
    if($_SESSION["isAdmin"]){
        return $ui;
    }
    return "";
}
?>