<?php
$localhost= 'localhost';
$username= 'root';
$password= '';
$database= 'school_db';
$dbconnection = new mysqli($localhost, $username, $password, $database);

if ($dbconnection->connect_error) {
    echo 'Database Not connected'.$dbconnection->connect_error;
}
else {echo 'Database Connected';}

?>