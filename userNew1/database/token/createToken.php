<?php
include_once "./database/connection.php";
include_once "./database/core.php";

function createToken($eid, $uid){
    $tokenNumber = 1;
    $lastTokenNumber = mysqli_fetch_array(runQuery("SELECT tokenNumber FROM tokens WHERE eid = $eid ORDER BY tokenNumber DESC;"));
    
    if(!is_null($lastTokenNumber) && count($lastTokenNumber) > 0){
        $tokenNumber = $lastTokenNumber['tokenNumber'] + 1;
    }
    $q = "INSERT INTO tokens (tokenNumber, eid, uid) VALUES ($tokenNumber, $eid, $uid);";     
    runQuery($q);

    $lastRecord = mysqli_fetch_array(getLastRecord('tokens', 'tokenId'));
    return $lastRecord;
}

?>