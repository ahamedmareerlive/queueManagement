<?php
include_once "./database/connection.php";
include_once "./database/event/readEvent.php";
include_once "./database/user/readUser.php";

function readAllToken(){
    $event = readAllEvent();

    for ($i=0; $i < count($event); $i++) { 
        $event[$i]['tokens'] = [];

        $qToken = "SELECT * FROM tokens WHERE eid = {$event[$i]['eid']}";
        $tokens = runQuery($qToken);
        
        while($rowToken = mysqli_fetch_array($tokens)){
            $rowToken['user'] = readUser($rowToken['uid']);
            $event[$i]['tokens'][] = $rowToken;
        }
    }

    return $event;
}

?>
