<?php
include('function.php');
?>

<?php
    session_start();
    if(!isset($_SESSION['mid']))
    {
    header('location:index.php');
    }
if (isset($_REQUEST['submit'])) {


    if (questionByID($_POST['subject'])) {
        header('location:exam.php?subjectid='.$_POST['subject']);
    } else {
        $message = "Exam Not Created For This Subject";
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

<p align="center"><a href="student-dashboard.php"><button >Dashboard</button></a></p>
<h2 align="center">Select Subject For Exam</h2>
<p align="center" style="color: <?php print $color;?>"><?php isset($message)? print $message:null;?></p>
<form action="#" method="post">
    <table align="center" border="1">


        <tr>
            <td height="26"><div align="left"><strong>Select Subject </strong></div></td>

            <td><select name="subject" id="subject" class="form-control  border-primary" required>
                    <option value="">Select Subject</option>
                    <?php
                    $connectDB=connect();
                    $sqlst="SELECT * FROM `ei_subject` ORDER BY `id`";
                    $resst=query($connectDB,$sqlst);
                    $numst=numrows($resst);
                    if($numst>0)
                    {
                        while($fetchst=fetch($resst))
                        {
                            ?>
                            <option value="<?=$fetchst['id']?>"><?=ucwords(strtolower($fetchst['subject']))?> </option>
                        <?php }}?>
                </select></td>
        </tr>


        <tr>
            <td height="26"></td>

            <td><input class="btn btn-primary" type="submit" name="submit" value="Submit" ></td>
        </tr>
    </table>
</form>

</body>
</html>

