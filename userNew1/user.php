<?php
include_once "./database/token/readToken.php"; 
include_once "./database/user/auth.php";
include_once "./database/user/readUser.php";

session_start();
auth();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"/>
</head>
<body>
    <div class="container">
        <div class="row p-5">  
            <button class="mb-3">
                <a href='userCreateUpdate.php'>ADD NEW USER</a>
            </button>
            <table class='table'>
                <thead>
                    <tr>
                        <th scope='col'>User Name</th>
                        <th scope='col'>Email</th>
                        <th scope='col'>Contact</th>
                        <th scope='col'>Action</th>                                    
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach (readAllUser() as $value) {
                            $deleteView = $value['isAdmin'] ? '' : "<a href='user.delete.php?uid={$value['uid']}'>DELETE</a>";
                            echo "
                                <tr>
                                    <th>{$value['name']}</th>
                                    <td>{$value['email']}</td>
                                    <td>{$value['contact']}</td>
                                    <td>
                                        <a href='userCreateUpdate.php?uid={$value['uid']}'>UPDATE</a>
                                        $deleteView  
                                    </td>
                                </tr>
                            ";
                        }
                    ?> 
                </tbody>
            </table>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>