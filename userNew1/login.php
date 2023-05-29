<?php 
include_once "./database/user/loginUser.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" type="text/css" href="css\styles.css">
</head>
<body>
   
    <div class="container">
        <div class="img">
            <img src="css\pngegg (1).png" alt="">
        </div>
        <div class="login-content">
             <form action="login.php" method="post">
                
                <h2 class="title">Welcome</h2>
                   <div class="input-div one">
                      <div class="i">
                              <i class="fas fa-user"></i>
                      </div>
                      <div class="div">
                              <h5>Username</h5>
                              
                         <input type="text" name="name" class="input" required>
                      </div>
                   </div>
                   <div class="input-div pass">
                      <div class="i"> 
                           <i class="fas fa-lock"></i>
                      </div>
                      <div class="div">
                           <h5>Password</h5>
                           
                        <input type="password" class="input" name="password" required>
                   </div>
                </div>
                <a href="register.php">Make a New Account</a>
                <input type="submit" class="btn" value="Login" name="save" >
            </form>
            
        </div>
        <?php
            if(isset($_POST['save'])){
                $uname = $_POST['name'];
                $pass = $_POST['password'];
                $result = userLogin($uname, $pass);
                if($result){
                    $_SESSION["user"] = $result;
                    $_SESSION["isAdmin"] = $result['isAdmin'];
                    $_SESSION["isLogin"] = true;
                    header("Location: index.php");
                    exit;
                }
                else{
                    echo "user name or password wrong";
                }
            }   
        ?>
    </div>
    
    <script src="css\login.js"></script>




	
</body>
</html>