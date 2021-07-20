<?php
include('../function.php');
session_start();
if(!isset($_SESSION['sid']))
{
    redirect('index.php');
}


    if (isset($_REQUEST['submit'])) {

        $result = subjectInsertion($_POST['subject']);
        if ($result) {
            $message = "Subject Inserted Successfully!!";
            $color = "green";
        } else {
            $message = "Subject Not Inserted";
            $color = "red";
        }
    }

?>
<!DOCTYPE html>
<html>
<head>
    <title>Teacher</title>
</head>
<body>

    <p align="center"><a href="dashboard.php"><button >Dashboard</button></a></p>
    <h2 align="center">Subjects</h2>
    <p align="center" style="color: <?php print $color;?>"><?php isset($message)? print $message:null;?></p>
    <form action="#" method="post">
        <table align="center" border="1">


            <tr>
                <td height="26"><div align="left"><strong>Enter Subject </strong></div></td>

                <td><input name="subject" type="text" id="subject" size="85" maxlength="85"></td>
            </tr>


            <tr>
                <td height="26"></td>

                <td><input class="btn btn-primary" type="submit" name="submit" value="Add" ></td>
            </tr>
        </table>
    </form>

</body>
</html>
