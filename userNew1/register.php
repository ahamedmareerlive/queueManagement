<?php
include_once "./database/user/createUpdateUser.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <link rel="stylesheet" href="css/signup.css">
</head>  
<body>
  <nav>
    <div class="navigation_links" id="navigationLinks">

     
                <ul>
                  <li> <a href="index.html">Home</a></li>
                  <li> <a href="camps.html">Blood Donation Camps</a></li> 
                  <li><a href="donor.html">Become a Donor</a></li>
                  <li><a href="blood.html">Available Blood</a></li>
                  <li><a href="about.html">About Us</a></li>
                    
                </ul>
                
          
            
       </div>


    </nav>


        
        
          <div id="main">
        
   

        
        <div class="login-box">
           <!--- <h2>Blood Donation Requirements</h2>--->
           <img src="images/donor_img2.jpg" width="500" height="400">

          </div>
        
          <!-- Register -->
          
          <div class="login-box2">
            <h2>Be a Blood Donor</h2>
            <form action="register.php" method="post">
                <input type="hidden" name="uid" value="-1">
                <input type="hidden" name="isAdmin" value="0" />

              <div class="user-box">
                <label for="nameinput"></label>
                <input type="text"  placeholder="User Name" required name="uName">
              </div>
              <div class="user-box">
                <label for="bloodinput"></label>
                        <input type="text"  placeholder="Email" required name="uEmail">
                
                <div class="user-box">
                    <input type="text"  placeholder="Contact" required  name="uContact">
                  </div>

                  <div class="user-box">
                    <input type="text"  placeholder="Password" required name="uPasssword">
                  </div>
                 
              </div>
              <input type="submit" value="save" name="save">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Register
              </a>
            </form>
          </div>

          

          
    
</section>


</body>
</html>

<?php
        if(isset($_POST['save'])){
            $result = creteUpdateUser($_POST['uid'], $_POST['uName'], $_POST['uEmail'], $_POST['uContact'], $_POST['uPasssword'], $_POST['isAdmin']);
            if($result){
                header("Location: login.php");
                exit;
            }
        }
?>