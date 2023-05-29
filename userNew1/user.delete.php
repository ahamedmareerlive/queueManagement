
<?php
include_once "./database/user/deleteUser.php";

if(isset($_GET['uid'])){
    $result = deleteUser($_GET['uid']);
    if($result){
        header("Location: user.php");
        exit;
    }
}

?>