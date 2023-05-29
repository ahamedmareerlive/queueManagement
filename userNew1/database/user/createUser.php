<?php
include "./database/connection.php";
include "./database/core.php";

function creteUser($eid, $eName, $eLocation, $eContact, $eventDate){
    $q = "";

    if(isNew($eid)){  
        $q = "INSERT INTO events (eName, eLocation, eContact, eventDate) VALUES ('$eName', '$eLocation', $eContact, $eventDate);"; 
    }
    else{
        $q = " UPDATE events SET 
        eName = '$eName', eLocation= '$eLocation' , eContact = $eContact, eventDate= $eventDate
        WHERE eid  = $eid;
        ";
    }

    if($q != ""){
       return runQuery($q);
    }
}


?>