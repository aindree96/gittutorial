<?php
include('function.php');

    session_start();
    if(!isset($_SESSION['mid']))
    {
    header('location:index.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student</title>
</head>
<body>


<h2><a href="student-result.php">Student Result</a></h2>
<h2><a href="stu-sub.php">Online Exam</a></h2>
<h2><a href="logout.php">Logout</a></h2>


</body>
</html>