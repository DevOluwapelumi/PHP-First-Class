<?php
session_start();
require 'connection.php';

if(isset($_SESSION['userid'])){
    $userid = $_SESSION['userid'];
    echo $userid;
    $query = "SELECT * FROM students WHERE user_id=$userid";
    $result=$dbconnection->query($query);

    if($result->num_rows > 0){
        $user = $result->fetch_assoc();
        $firstname = $user['first_name'];
        $email = $user['email'];
        $department = $user['department'];
        $age = $user['age'];
        $gender = $user['gender'];

         // Check if profile_pic is set and not empty
         if(isset($user['profile_pic']) && !empty($user['profile_pic'])){
            $picture = $user['profile_pic'];

            // Display user information, you can use $firstname and $picture as needed.
            echo "Welcome, $firstname! <br>";
            // echo "<img src='images/$picture' alt='Profile Picture'>";
        } else {
            echo "Welcome, $firstname! <br>";
            echo "Profile picture not available.";
        }
        }

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
<style>
    body{
        background-color: #E0E0E0
    }
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap');

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

.container {
  /* height: 100vh; */
  width: 100%;
  align-items: center;
  display: flex;
  justify-content: center;
  background-color: #fcfcfc;
}

.card {
  border-radius: 10px;
  box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.3);
  width: 600px;
  height: 300px;
  background-color: #ffffff;
  padding: 10px 30px 40px;
}

.card h3 {
  font-size: 22px;
  font-weight: 600;
  text-align: center;
}

.drop_box {
  margin: 10px 0;
  padding: 30px;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  border: 3px dotted #a3a3a3;
  border-radius: 5px;
}

.drop_box h4 {
  font-size: 16px;
  font-weight: 400;
  color: #2e2e2e;
}

.drop_box p {
  margin-top: 10px;
  margin-bottom: 20px;
  font-size: 12px;
  color: #a3a3a3;
}

.btn:hover{
  text-decoration: none;
  background-color: #ffffff;
  color: #005af0;
  padding: 10px 20px;
  border: none;
  outline: 1px solid #010101;
}
.form input {
  margin: 10px 0;
  width: 100%;
  background-color: #e2e2e2;
  border: none;
  outline: none;
  padding: 12px 20px;
  border-radius: 4px;
}
    .container2 {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .rounded-image-container {
        overflow: hidden;
        border-radius: 10%;
        width: 300px; /* Adjust the width and height as needed */
        height: 300px;
    }

    .rounded-image {
        width: 300px;
        height: auto;
        display: block;
        border-radius: 10%;
    }

    
</style>
<body>   
    <div class="container">
  <div class="card">
    <h3>Upload Files</h3>
    <div class="drop_box">
      <header>
        <h4>Select File here</h4>
      </header>
      <p>Files Supported: PDF, TEXT, DOC , DOCX</p>
    <form action="fileupload.php" method="post" enctype="multipart/form-data">
        <label for="file">Choose an image:</label>
        <input type="file" class="btn" name="profile_pic">
        <input type="submit" class="btn btn-success" value="Upload profile Pic" name="submit" >
    </form>
    </div>
    </div>
  </div>
    <h1>Welcoming, user_id:  "<?php echo $userid ?>", in person of: "<?php echo $firstname ?>😊😊😊" with the E-mail: "<?php echo $email ?>" from the Department of: "<?php echo $department ?>🤔🤔🤔" and actually he/she is a "<?php echo $gender ?>" of "<?php echo $age ?>" years old... 🚀🚀🚀 You dey think say i don dey carry you go where you no know🚘🚘🚘  </h1>
    <div class="container2">
    <?php
    if (isset($picture) && !empty($picture)) {
        echo "<div class='rounded-image-container'>";
        echo "<img src='images/$picture' alt='Profile Picture' class='rounded-image'>";
        echo "</div>";
    } else {
        echo "Profile picture not available.";
    }
    ?>
</div>
<?php echo $name ?>
<?php echo $temp ?>


</body>
</html>