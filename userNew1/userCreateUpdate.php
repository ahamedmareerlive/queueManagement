<?php
include_once "./database/event/creteUpdateEvent.php";
include_once "./database/event/readEvent.php";
include_once "./database/user/auth.php";
include_once "./database/user/createUpdateUser.php";
include_once "./database/user/readUser.php";
$formData = [
    "uid"=> "-1",
    "uName"=>"",
    "uEmail"=>"",
    "uContact"=>"",
    "uPasssword"=> "",
    "isAdmin"=>0
];

if(isset($_GET['uid'])){
    $user = readUser($_GET['uid']);
    $formData = [
        "uid"=> $user['uid'],
        "uName"=>$user['name'],
        "uEmail"=>$user['email'],
        "uContact"=>$user['contact'],
        "uPasssword"=> $user['password'],
        "isAdmin"=> $user['isAdmin']
    ];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Create Update Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"/>
</head>
<body>
    <div class="container">
        <div class="row p-5">
            <form action="userCreateUpdate.php" method="post">
                <input type="hidden" name="uid" value=<?php echo"{$formData['uid']}" ?> >
                <input type="hidden" name="isAdmin" value=<?php echo"{$formData['isAdmin']}" ?> >
                <div class="mb-3">
                    <label class="form-label">User Name</label>
                    <input type="text" class="form-control" name="uName" required  value=<?php echo"{$formData['uName']}" ?> >
                </div>

                <div class="mb-3">
                    <label class="form-label">User Email</label>
                    <input type="email" class="form-control" name="uEmail" required value=<?php echo"{$formData['uEmail']}" ?>  >
                </div>

                <div class="mb-3">
                    <label class="form-label">User Contact</label>
                    <input type="text" class="form-control" name="uContact" required value=<?php echo"{$formData['uContact']}"?>  >
                </div>

                <div class="mb-3">
                    <label class="form-label">Passsword</label>
                    <input type="password" class="form-control" name="uPasssword" required value=<?php echo"{$formData['uPasssword']}"?>  >
                </div>            
                <input type="submit" class="btn btn-primary" name="save" value="Save Changes" />
            </form>
        </div>
    </div>


    <?php
        if(isset($_POST['save'])){
            $result = creteUpdateUser($_POST['uid'], $_POST['uName'], $_POST['uEmail'], $_POST['uContact'], $_POST['uPasssword'], $_POST['isAdmin']);
            if($result){
                header("Location: user.php");
                exit;
            }
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>