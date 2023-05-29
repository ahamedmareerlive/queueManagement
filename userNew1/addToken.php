<?php
include_once "./database/token/createToken.php";
include_once "./database/event/readEvent.php";

$eid = $_GET['eid'];
$uid = $_GET['uid'];
$newToken = createToken($eid, $uid);

if(!is_null($newToken)){
    $eve = getEvent($newToken['eid']);
    header("Location: successpage.php?tokenNo={$newToken['tokenNumber']}&eventName={$eve['eName']}");
    exit; 
};

?>