<?php
include_once "./database/connection.php";
include_once "./database/core.php";

function creteUpdateUser($uid, $uName, $uEmail, $uContact, $uPasssword, $isAdmin){
    $q = "";
    if(isNew($uid)){  
        $q = "INSERT INTO users (name, email, password, isAdmin, contact) VALUES ('$uName', '$uEmail', $uPasssword, $isAdmin, $uContact);"; 
    }
    else{
        $q = " UPDATE users SET 
        name = '$uName', email= '$uEmail' , password = $uPasssword, isAdmin= '$isAdmin', contact= '$uContact'
        WHERE uid  = $uid;
        ";
    }

    if($q != ""){
       return runQuery($q);
    }
}



?>