<?php
include_once "./database/connection.php";

function readAllEvent(){
    $q = " SELECT * FROM events";
    $result = runQuery($q);
    $data = [];
    while($row = mysqli_fetch_array($result)){
        $data[] = $row;
    }
    return $data;
}

function getEvent($eid){
    $q =  "SELECT * FROM events WHERE eid = $eid";
    return mysqli_fetch_array(runQuery($q));
}

?>