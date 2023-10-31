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
    <div>
        <div>
            <?php
            session_start();
            if(isset($_SESSION['msg'])){
                echo "<div class='text-center alert alert-danger'>".$_SESSION['msg']."</div>";
                session_unset(i);
            }
            ?>
        </div>
    </div>
        <div>
            <form action="submit.php" method="post">
                <input type="text" placeholder="First Name" name="first_name">
                <input type="text" placeholder="Last Name" name="last_name">
                <input type="text" placeholder="Phone Number" name="phone_number">
                <input type="text" placeholder="Email" name="email">
                <input type="text" placeholder="Age" name="age">
                <input type="text" placeholder="Gender" name="gender">
                <input type="text" placeholder="Address" name="address">
                <input type="text" placeholder="Complexion" name="complexion">
                <input type="text" placeholder="Department" name="department">
                <input type="text" placeholder="Password" name="password">
                <button type="submit" value="submit" name="submit">Submit</button>
            </form>
        </div>
    </div>
    
</body>
</html>