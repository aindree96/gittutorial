<?php
include('function.php');
if(isset($_REQUEST['submit']))
{
    $result=userRegistration($_POST['name'],$_POST['email'],$_POST['phone'],$_POST['pass']);
    if($result){
        $message="Data Inserted";
        $color="green";
    }
    else
    {
        $message="Not Inserted";
        $color="red";
    }

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student</title>
</head>
<body>
<p align="center"><a href="index.php"><button>Home</button></a></p>
<h2 align="center">Student Registration Form</h2>
<div class="col-md-6">
    <table align="center" border="1">

        <p align="center" style="color: <?php print $color;?>"><?php isset($message)? print $message:null;?></p>

        <form action="#" method="post">
            <tr>
                <td>Name:</td>
                <td><input type="name" name="name" required></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" name="email" required></td>
            </tr>
            <tr>
                <td>Phone Number:</td>
                <td><input type="number" name="phone" required></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="Password" name="pass" required></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="submit"></td>
            </tr>
        </form>
    </table>
</div>
</body>
</html>