<?php
// echo 'Submitted';
// print_r ($_POST);
require 'connection.php';
session_start();
echo '<br>';
if (isset($_POST['submit'])){
    print_r ($_POST);
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

    //verify Email//
    $query="SELECT * FROM students WHERE email = '$email'";
    $emailverify=$dbconnection->query($dbquery);
    print_r($emailverify);

    if($emailverify->num_rows>0){
        $_SESSION['msg']="Email has been taken";
        header('location:signup.php');
    }else{
        $hashedpassword= password_hash($password, PASSWORD_DEFAULT);
        echo $hashedpassword;
        $dbquery="INSERT INTO students(first_name,last_name,phone_number,email,age,gender,address,complexion,department,password) VALUES( '$first_name', '$last_name', '$phone_number', '$email', '$age', '$gender', '$address', '$complexion', '$department', '$hashedpassword')";
        $dbq = $dbconnection->query($dbquery);
        if($dbq){
            header('location:login.php');
        }else {
            $_SESSION['msg']="Unsuccessful Registration";
            header('location:signup.php');
        }


    // //hashing of password//
    // // $hashedpassword= password_hash($password, PASSWORD_DEFAULT);
    // // echo $hashedpassword;

    // // //Saving inside Database//
    // // $dbquery="INSERT INTO students(first_name,last_name,phone_number,email,age,gender,address,complexion,department,password) VALUES( '$first_name', '$last_name', '$phone_number', '$email', '$age', '$gender', '$address', '$complexion', '$department', '$hashedpassword')";

    // // $savedquery = $dbconnection->query($dbquery);
    // // if($savedquery){
    // //     echo $savedquery;
    // // }
    // // if(savedquery){
    // //     echo "Successfully Saved";
    // // }else{
    // //     echo "Not Successfully Saved";
    // // }
    }
    }
   
?>