<?php
session_start();
require 'connection.php';

if(isset($_POST['submit'])){
    if(isset($_SESSION['userid'])){
        $userid = $_SESSION['userid'];

        $name = $_FILES['profile_pic']['name'];
        $temp = $_FILES['profile_pic']['tmp_name'];
        $anothername = time().$name;
        $movedfile = move_uploaded_file($temp, 'images/'.$anothername);
        

        if($movedfile){
            $updateprofile = "UPDATE `students` SET `profile_pic` = '$anothername' WHERE user_id = $userid";
            $setprofile = $dbconnection->query($updateprofile);

            if($setprofile){
                header('location:dashboard.php');
            } else {
                $_SESSION['error'] = 'Upload Failed!!!';
            }
        } else {
            $_SESSION['error'] = 'There was an error uploading your file.';
        }
    }
}
?>
