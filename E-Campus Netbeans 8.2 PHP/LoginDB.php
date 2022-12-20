<?php

$dbname = "universitydbsystem";
$conn = mysqli_connect("localhost", "root", "", $dbname);
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $myssn = mysqli_real_escape_string($conn, $_POST['ssn']);
    $mypassword = mysqli_real_escape_string($conn, $_POST['password']);

    $sqls = "SELECT student.ssn, studentname FROM student WHERE student.ssn = '$myssn'";
    $results = mysqli_query($conn, $sqls);
    $rows = mysqli_fetch_array($results, MYSQLI_ASSOC);


    $sqli = "SELECT iname, ssn FROM instructor WHERE instructor.ssn = '$myssn'";
    $resulti = mysqli_query($conn, $sqli);
    $rowi = mysqli_fetch_array($resulti, MYSQLI_ASSOC);


    $sql = "SELECT ssn, role FROM userr WHERE ssn = '$myssn' and password = '$mypassword'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if ($count == 1) {

        $_SESSION['role'] = $_POST['role'];
        session_start();

        if ($row['role'] === 'instructor') {

            $_SESSION['iname'] = $rowi['iname'];
            $_SESSION['issn'] = $rowi['ssn'];

            if (isset($_SESSION['iname']) && isset($_SESSION['issn']))
                header('Location: Instructor/InstructorPage.php');
        } else if ($row['role'] === 'student') {

            $_SESSION['sname'] = $rows['studentname'];
            $_SESSION['sssn'] = $rows['ssn'];

            if (isset($_SESSION['sname']) && isset($_SESSION['sssn']))
                header('Location: Student/StudentPage.php');
        }
    } else {
        echo "Error: Your Login Name or Password is invalid. Please go back to login page." . $conn->error;
    }
}
?> 