<?php

$dbname = "universitydbsystem";
$conn = mysqli_connect("localhost", "root", "", $dbname);

if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: " . $conn->connect_error;
    exit();
}

$ssn = $_POST['ssn'];
$password = $_POST['password'];
$role = $_POST['role'];

$sql = "INSERT INTO userr (ssn,role,password) VALUES('" . $ssn . "' , '" . $role . "' , '" . $password . "')";

if ($conn->query($sql) === TRUE) {
    echo "Successfully";
    header('Location:index.php');
} else {
    echo "Error: " . $conn->error;
}
$conn->close(); // last opened database is closed.
?> 