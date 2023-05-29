
<?php
function auth($isAllowUser = true){
    if($_SESSION['isLogin'] != 1){
        header("Location: login.php");
        exit;
    }
    else{
        if(!$isAllowUser){
            header("Location: index.php");
            exit;
        }
    }
    
}

?>


