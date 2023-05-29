<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css\styles.css">
    <style>
        body{
            color: aliceblue;
            text-align: center;
        }
        div{
            display: flex;
            flex-direction: column;
            align-items: center;
            align-content: center;
        }
        img{
            width: 35%;
        }
        a{
            font-size: larger;
        }
    </style>
</head>
<body>
    <div>
        <h1>Your Token Number :-  <?php echo $_GET['tokenNo']; ?> </h1>
        <h2>Event Name :-  <?php echo $_GET['eventName']; ?> </h2>
        <h4>Thank you for your generosity and kindness in desiding to donating blood. You have made a difference in someone's life and we are forever grateful!</h4>
        <img src="pngegg.png" alt="">
       <h2><a href="/index">Back To Home Page</a></h2>
    </div>
    
    
</body>
</html>