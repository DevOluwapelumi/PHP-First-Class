<?php
require ('connection.php');
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers:Content-Type");
header("Content-Type: application/json");
echo json_encode('yes');


$input = json_decode(file_get_contents ("php://input"), true);
echo json_encode($input['first_name']);
$first_name= $input['first_name'];
$last_name=$input['last_name'];
$phone_number= $input['phone_number'];
$email=$input['email'];
$age= $input['age'];
$gender= $input['gender'];
$address=$input['address'];
$complexion= $input['complexion'];
$department= $input['department'];
$password=$input['password'];

// $result=['first_name'=>$first_name, 'success' => 'true', 'allname' => $input];

$query = "SELECT * FROM students WHERE email = ?";
$prepare = $dbconnection->prepare($query);
$prepare->bind_param('s', $email);
$execute = $prepare->execute();
if($execute){
    $confirm=$prepare->get_result();
    if($confirm->num_rows>0){
        $result=["message"=> "A user with the email address already exist", "status"=>"Email Found"];
        echo json_encode($result);
    }else{
        $hashedpassword= password_hash($password, PASSWORD_DEFAULT);
        echo $hashedpassword;
        $queries="INSERT INTO students(first_name,last_name,phone_number,email,age,gender,address,complexion,department,password) VALUES(?,?,?,?,?,?,?,?,?,?)";
        $prep = $dbconnection->prepare($queries);
         $prep-> bind_param('ssssisssss', $first_name,$last_name,$phone_number,$email,$age,$gender,$address,$complexion,$department,$hashedpassword);
         $execute = $prep->execute();
         if($execute){
            $result=['email' => $email, 'status' => true, 'message'=> "Registration Successful"];
            echo json_encode($result);
         }
         else{
            $result=['status'=>false, 'message'=> "Registration Failed", 'error' => $dbconnection->error];
            echo json_encode($result);
    }
}
}
    else {
        echo json_encode('not executed');
    }
?>