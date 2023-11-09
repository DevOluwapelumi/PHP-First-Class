<?php
session_start();
require 'connection.php';

if(isset($_POST['submit'])){
    // print_r($_FILES['profile_pic']['tmp_name']);
    if(isset($_SESSION['userid'])){
    $name=$_FILES['profile_pic']['name'];
    // echo $name;
    $temp=$_FILES['profile_pic']['tmp_name'];
    // echo $temp;
    $anothername=time().$name;
    // echo $anothername;
    //moving to another location to see the picture//
    $movedfile = move_uploaded_file($temp, 'images/'.$anothername);
    

    if($movedfile){
        $updateprofile = "UPDATE `students` SET `profile_pic` = '$anothername' WHERE user_id = $userid";
        $setprofile= $dbconnection->query($updateprofile);
        echo $setprofile;
        if($setprofile){
            header('location:dashboard.php');
        }else{
            $_SESSION['error']='Upload Failed!!!';
            // header('location:dashboard.php');
        }
    }else {
        $_SESSION['error']='There was an error uploading your file.';
        // header('location:dashboard.php');
    }
    }
    }
?>