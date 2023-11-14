<?php
require 'connection.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM students WHERE email = ?";
    $prepare = $dbconnection->prepare($query);
    $prepare->bind_param('s', $email);
    $prepare->execute();
    $result = $prepare->get_result();
    print_r($result);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];

        if (password_verify($password, $hashedPassword)) {
            $_SESSION['userid'] = $userid;
            header('location: newdashboard.php');
        } else {
            echo "<div class='alert alert-danger text-center'>Incorrect Password</div>";
        }
    } else {
        echo "<div class='alert alert-danger text-center'>Invalid Email Address</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Login Page</title>
</head>
<body>
    <div class="container">
        <div class="shadow col-8 mx-auto mb-3">
            <h1 class="text-center my-2">Login Page</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                <input type="text" class="form-control my-2" placeholder="Email" name="email">
                <input type="password" class="form-control my-2" placeholder="Password" name="password">
                <button type="submit" class=" w-100 btn btn-primary my-2" value="login" name="login">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
