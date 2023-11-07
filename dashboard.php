<?php
require 'connection.php';
session_start();
if(isset($_SESSION['userid'])){
    $id = $_SESSION['userid'];
    echo $id;
    
    $query = "SELECT * FROM students WHERE user_id=$id";
    $querycon=$dbconnection->query($query);
    print_r($querycon);
    $user = $querycon->fetch_assoc();
    print_r($user);

//     $query = "SELECT first_name FROM students WHERE first_name = '$firstName'";
//     $result = $dbconnection->query($query);
//     if ($result->num_rows > 0) {
//     $row = $result->fetch_assoc();
//     $firstName = $row['first_name'];
// } else {
//     echo "No results found.";
// }
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <h1>Welcome to Dashboard <?php echo $firstName ?></h1>
</body>
</html>