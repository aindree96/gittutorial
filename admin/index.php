<?php
session_start();
include('../function.php');
if(isset($_REQUEST['submit']))
{
    $table="ei_admin";
    $res=adminLogin($table,$_POST['username'],$_POST['pass']);
    $num=numrows($res);
    if($num>0)
    {
        $fetch=fetch($res);
        $_SESSION['sid']=$fetch['id'];
        header('location:dashboard.php');
    }else
    {
        $message="Invalid Username Or password!!";
        $color="red";

    }



}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Teacher</title>
</head>
<body>
<h1  align="center">Adminstrative Login</h1>
<p align="center" style="color: <?php print $color;?>"><?php isset($message)? print $message:null;?></p>
<form name="form1" method="post" action="#">
<table align="center">
  <tr>
    <td >Username </td>
    <td ><input  name="username" type="text" id="username"></td>
  </tr>
  <tr>
    <td >Password</td>
    <td><input  name="pass" type="password" id="pass"></td>
  </tr>
  <tr>
    
    <td colspan="2" align="center"><input  name="submit" type="submit" id="submit" value="Login"></td>
  </tr>
</table></td>
  </tr>
</table>

</form>
</body>
</html>