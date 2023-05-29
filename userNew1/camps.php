<?php
include_once "./database/event/readEvent.php";
include_once "./database/user/auth.php";
include_once "./database/core.php";
session_start();
auth();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <link rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" type="text/css" href="css/styles1.css">
</head>  
<body>
  <nav>
    <div class="navigation_links" id="navigationLinks">

     
                <ul>
                  <li> <a href="index.php">Home</a></li>
                  <li> <a href="camps.php">Blood Donation Camps</a></li> 
                  <li><a href="donor.html">Become a Donor</a></li>
                  <li><a href="blood.html">Available Blood</a></li>
                  <li><a href="about.html">About Us</a></li>
                  <li><a href="logout.php">Logout</a></li>
                  <?php  echo showOnlyForAdmin("
                      <li><a href='user.php'>Users</a></li>
                    "); 
                  ?>
                </ul>
                
          
            
       </div>


    </nav>
    
    
        
          <div id="main">
        

    <section class="about">
        <section class="types-of-camps">
            <h1 id="types-of-camps">Available Camps
              <?php  echo showOnlyForAdmin("
                  <button>  <a href='token.php' target='_blank'>VIEW TOKEN</a></button>
                  <button> <a href='createUpdateEvent.php' >ADD EVENT</a></button>
                "); 
              ?>
               
            </h1>
            <table class="campsTable">
                <thead>
                <tr class="table-headings">
                  <th>Camp Name</th>
                  <th>Location</th>
                  <th>Contact Details</th>
                  <th>Date/Time</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>  
                <?php 
                  foreach (readAllEvent() as $value) {
                    $editBtn = showOnlyForAdmin("<button> <a href='createUpdateEvent.php?eid={$value['eid']}' >EDIT EVENT</a> </button>");
                    echo 
                    "<tr>
                      <td>{$value['eName']}</td>
                      <td>{$value['eLocation']}</td> 
                      <td>{$value['eContact']}</td>
                      <td>{$value['eventDate']}</td>
                      <td>
                        <button>
                          <a href='addToken.php?uid={$_SESSION['user']['uid']}&eid={$value['eid']}' target='_blank' id='Register-button'>Generate Token</a>
                        </button>
                        {$editBtn}
                      </td>
                    </tr>";
                  }
                ?>                
            </tbody>
            </table>
          </div>
        </section>
        

    </section>
    
  

 

  
</body>
</html>