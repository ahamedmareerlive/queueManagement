<?php
include_once "./database/event/creteUpdateEvent.php";
include_once "./database/event/readEvent.php";
include_once "./database/user/auth.php";
session_start();
auth();

$formData = [
    "eid"=> "-1",
    "eName"=>"",
    "eLocation"=>"",
    "eContact"=>"",
    "eventDate"=> Date('Y-m-d\TH:i',time()),
];

if(isset($_GET['eid'])){
    $formData = getEvent($_GET['eid']);
    $formData["eventDate"] = date('Y-m-d\TH:i', strtotime($formData["eventDate"]));
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Create Update Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"/>
</head>
<body>
    <div class="container">
        <div class="row p-5">
            <form action="createUpdateEvent.php" method="post">
                <input type="hidden" name="eid" value=<?php echo"{$formData['eid']}" ?> >
                <div class="mb-3">
                    <label class="form-label">Event Name</label>
                    <input type="text" class="form-control" name="eName" required  value=<?php echo"{$formData['eName']}" ?> >
                </div>

                <div class="mb-3">
                    <label class="form-label">Event Location</label>
                    <input type="text" class="form-control" name="eLocation" required value=<?php echo"{$formData['eLocation']}" ?>  >
                </div>

                <div class="mb-3">
                    <label class="form-label">Event Contact</label>
                    <input type="text" class="form-control" name="eContact" required value=<?php echo"{$formData['eContact']}"?>  >
                </div>

                <div class="mb-3">
                    <label class="form-label">Event Date</label>
                    <input type="datetime-local" class="form-control" name="eventDate" required value=<?php echo"{$formData['eventDate']}"?>  >
                </div>

                <input type="submit" class="btn btn-primary" name="save" value="Save Changes" />
            </form>
        </div>
    </div>


    <?php
        if(isset($_POST['save'])){
            $result = creteUpdateEvent($_POST['eid'], $_POST['eName'], $_POST['eLocation'], $_POST['eContact'], $_POST['eventDate']);
            if($result){
                header("Location: camps.php");
                exit;
            }

        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>