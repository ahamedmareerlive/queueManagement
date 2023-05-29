<?php
include_once "./database/connection.php";
include_once "./database/core.php";

function creteUpdateEvent($eid, $eName, $eLocation, $eContact, $eventDate){
    $q = "";

    if(isNew($eid)){  
        $q = "INSERT INTO events (eName, eLocation, eContact, eventDate) VALUES ('$eName', '$eLocation', $eContact, '$eventDate');"; 
    }
    else{
        $q = " UPDATE events SET 
        eName = '$eName', eLocation= '$eLocation' , eContact = $eContact, eventDate= '$eventDate'
        WHERE eid  = $eid;
        ";
    }

    if($q != ""){
       return runQuery($q);
    }
}


?>