<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "bloodDonate";

$connection = mysqli_connect($server,$user,$password,$database);

function runQuery($query = ""){
    return mysqli_query($GLOBALS['connection'], $query);
}

?>