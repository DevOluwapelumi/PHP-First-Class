<?php
session_start();
require 'connection.php';

if(isset($_POST['submit'])){
    $email= $_POST['email'];
    $password= $_POST['password'];
    $query="SELECT * FROM students WHERE email = '$email'";
    $result=$dbconnection->query($query);

    if ($result->num_rows>0){
        $user = $result->fetch_assoc();
        print_r($user);
        $hashedpassword=$user['password'];
        $userid=$user['user_id'];
        echo $hashedpassword, $userid;
        echo '<br>';
            
        //verify password//
    //     $passwordverify = password_verify($password,$hashedpassword);
    //     if($passwordverify){
    //         $_SESSION['userid'] = $userid;
    //         header('location:dashboard.php');
    //     }  else {
    //         echo "<div class='alert alert-danger text-center'>Incorrect Password</div>";
    //     }      
    // }else {
    //     echo "<div class='alert alert-danger text-center'>Invalid Email Address</div>";
    //     header('location:login.php');
    // }
           // Verify password
           if(password_verify($password, $hashedpassword)){
            $_SESSION['userid'] = $userid;
            header('location:dashboard.php');
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
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="shadow col-8 mx-auto mb-3">
            <h1 class="text-center my-2">Login Page</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <input type="text" class="form-control my-2" name="email" placeholder="Email">
            <input type="text" class="form-control my-2" name="password" placeholder="Password">
            <input type="submit" class=" w-100 btn btn-primary my-2" name="submit" placeholder="Submit">
            </form>
        </div>
    </div>

    <p>Welcome to Login</p>
    
</body>
</html>