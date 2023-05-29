<?php
include_once "./database/token/readToken.php"; 
include_once "./database/user/auth.php";
session_start();
auth();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Token</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"/>
</head>
<body>
    <div class="container">
        <div class="row p-5">

            <div class="accordion">    
                <?php 

                function renderTokenTable($data){
                    $table = "";
                    foreach($data as $value){
                        $table .= "
                            <tr>
                                <th>{$value['tokenNumber']}</th>
                                <td>{$value['user']['name']}</td>
                                <td>{$value['user']['contact']}</td>
                                <td>{$value['create_at']}</td>
                            </tr>
                        ";
                    }
                    return $table;
                }
                

                foreach (readAllToken() as $value) {
                    $tokenTable = renderTokenTable($value['tokens']);
                    echo "
                    <div class='accordion-item'>

                        <h2 class='accordion-header'>
                        <button class='accordion-button' type='button' data-bs-toggle='collapse' data-bs-target='#{$value['eid']}'>
                            {$value['eName']}
                        </button>
                        </h2>
                        <div id='{$value['eid']}' class='accordion-collapse collapse'>
                            <div class='accordion-body'>
                                <table class='table'>
                                    <thead>
                                        <tr>
                                            <th scope='col'>Token Number</th>
                                            <th scope='col'>User Name</th>
                                            <th scope='col'>Contact No</th>
                                            <th scope='col'>Date</th>                                    
                                        </tr>
                                    </thead>
                                    <tbody>
                                        $tokenTable
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    ";
                }
                ?>

            </div>

        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>