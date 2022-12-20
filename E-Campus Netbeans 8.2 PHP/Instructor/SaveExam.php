<?php

$dbname = "universitydbsystem";
$conn = mysqli_connect("localhost", "root", "", $dbname);

if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: " . $conn->connect_error;
    exit();
}

$ename = $_POST['eName'];
$edate = $_POST['edate'];
$issn = $_POST['issn'];
$courseCode = $_POST['courseCode'];
$yearr = $_POST['yearr'];
$semester = $_POST['semester'];
$sectionId = $_POST['sectionId'];

$sql = "INSERT INTO exam (eName,edate,issn,courseCode,yearr,semester,sectionId) "
        . "VALUES('" . $ename . "' , '" . $edate . "' , '" . $issn . "','" . $courseCode . "' , '" . $yearr . "' , '" . $semester . "' , '" . $sectionId . "')";

if ($conn->query($sql) === TRUE) {
    echo "Successfully";
    header('Location:AddExam.php');
} else {
    echo "Error: " . $conn->error;
}
$conn->close(); // last opened database is closed.
?> 