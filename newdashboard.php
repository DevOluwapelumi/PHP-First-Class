<?php
require 'connection.php';
session_start();
if (!isset($_SESSION['userid'])) {
    header('location: newlogin.php');
    exit();
}

$userid = $_SESSION['userid'];
echo $userid;
$query = "SELECT * FROM students WHERE userid = ?";
$prepare = $dbconnection->prepare($query);
$prepare->bind_param('i', $userid);
$prepare->execute();
print_r($prepare);
$result = $prepare->get_result();
$userDetails = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>User Dashboard</title>
</head>
<body>
    <div class="container">
        <div class="shadow col-8 mx-auto mb-3">
            <h1 class="text-center my-2">User Dashboard</h1>

            <ul>
                <li><strong>Name:</strong> <?php echo $userDetails['first_name'] . ' ' . $userDetails['last_name']; ?></li>
                <li><strong>Email:</strong> <?php echo $userDetails['email']; ?></li>
                <li><strong>Phone:</strong> <?php echo $userDetails['phone_number']; ?></li>
                <li><strong>Age:</strong> <?php echo $userDetails['age']; ?></li>
            </ul>


            <form action="logout.php" method="post">
                <button type="submit" class="w-100 btn btn-primary my-2">Logout</button>
            </form>
        </div>
    </div>
</body>
</html>
