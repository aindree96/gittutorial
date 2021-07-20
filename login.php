
<?php
session_start();

include('function.php');

if(isset($_REQUEST['submit']))
{
    $table="ei_student";
    $result=studentLogin($table,$_POST['stuid'],$_POST['password']);
    $num=numrows($result);
    if($num>0)
    {
        $fetch=fetch($result);
        $_SESSION['mid']=$fetch['id'];
        header('location:student-dashboard.php');
    }else
    {
        $message="Invalid Student ID  Or Password!!";
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
<p align="center"><a href="index.php"><button >Home</button></a></p>
<h1 align="center" style="color: red">Student Login</h1>
<p align="center" style="color: <?php print $color;?>"><?php isset($message)? print $message:null;?></p>

<form name="form1" method="post" action="#">
    <table align="center">
        <tr>
            <td >Student ID </td>
            <td ><input  name="stuid" type="text" id="stuid"></td>
        </tr>
        <tr>
            <td >Password</td>
            <td><input  name="password" type="password" id="password"></td>
        </tr>

        <tr>
            <td >&nbsp;</td>
            <td><input  name="submit" type="submit" id="submit" value="Login"></td>
        </tr>
    </table></td>
    </tr>
    </table>

</form>
</body>
</html>