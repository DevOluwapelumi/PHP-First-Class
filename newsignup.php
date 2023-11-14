<?php
echo 'Submitted';
require 'connection.php';
echo '<br>';
if (isset($_POST['submit'])){
    //storing input values inside variable//
    $first_name= $_POST['first_name'];
    $last_name= $_POST['last_name'];
    $phone_number= $_POST['phone_number'];
    $email= $_POST['email'];
    $age= $_POST['age'];
    $gender= $_POST['gender'];
    $address= $_POST['address'];
    $complexion= $_POST['complexion'];
    $department= $_POST['department'];
    $password= $_POST['password'];
    $hashedpassword= password_hash($password, PASSWORD_DEFAULT);
    echo $hashedpassword;
    $query="INSERT INTO students(first_name,last_name,phone_number,email,age,gender,address,complexion,department,password) VALUES(?,?,?,?,?,?,?,?,?,?)";
    $prepare = $dbconnection->prepare($query);
    // print_r($prepare);
    $bind= $prepare-> bind_param('ssssisssss', $first_name,$last_name,$phone_number,$email,$age,$gender,$address,$complexion,$department,$hashedpassword);
    // print_r($bind);

    $check=$prepare->execute();
    if($check){
        print_r($check);
        header('location:newlogin.php');
    } else {
        echo '<br>';
        echo 'Registration failed';
    }
}
?>`


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>SignUp Page</title>
</head>
<body>

        <div class="container">
        <div class="shadow col-6 mx-auto mb-3">
            <h1 class="text-center my-2">Signup Page</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                <input type="text" class="form-control my-2" placeholder="First Name" name="first_name">
                <input type="text" class="form-control my-2" placeholder="Last Name" name="last_name">
                <input type="text" class="form-control my-2" placeholder="Phone Number" name="phone_number">
                <input type="text" class="form-control my-2" placeholder="Email" name="email">
                <input type="text" class="form-control my-2" placeholder="Age" name="age">
                <input type="text" class="form-control my-2" placeholder="Gender" name="gender">
                <input type="text" class="form-control my-2" placeholder="Address" name="address">
                <input type="text" class="form-control my-2" placeholder="Complexion" name="complexion">
                <input type="text" class="form-control my-2" placeholder="Department" name="department">
                <input type="text" class="form-control my-2" placeholder="Password" name="password">
                <button type="submit" class=" w-100 btn btn-primary my-2" value="submit" name="submit">Submit</button>
            </form>
        </div>
        </div>
    
</body>
</html>