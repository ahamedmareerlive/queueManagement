
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <link rel="stylesheet" href="css/popup.css">
</head>  
<body>
<button class="open-button" onclick="openForm()">Add Event</button>

<div class="form-popup" id="myForm">
  <form action="event.php" method="post" class="form-container" >
    

    <label for="event"><b>Event Name</b></label>
    <input type="text"  name="event" required>

    <label for="location"><b>Event Location</b></label>
    <input type="text"  name="location" required>

    <label for="num"><b>Contact Num</b></label>
    <input type="text"  name="num" required>

    <button type="submit" name="submit" class="btn">Save</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>
<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
<?php

include_once("config.php");

if(isset($_POST['submit'])){
  $name = mysqli_real_escape_string($connection,$_POST['event']);
  $lname = mysqli_real_escape_string($connection,$_POST['location']);
  $cnum = mysqli_real_escape_string($connection,$_POST['num']);

   
  $res=mysqli_query($connection,"INSERT INTO Events(ename,lname,cnum)
  VALUES('$name','$lname','$cnum')");
        
  echo "Data Added Sucess fully";

    

}

?>

</body>
</html>
