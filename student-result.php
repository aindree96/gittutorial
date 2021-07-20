<?php
include ('function.php');

session_start();
if (!isset($_SESSION['mid'])) {
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student</title>
</head>
<body>
<p align="center"><a href="student-dashboard.php"><button>Dashboard</button></a></p>
<h2 align="center">Students</h2>
<table border="1" align="center">
    <tr>
        <th>Stuid</th>
        <th>Name</th>
        <th>Subject</th>
        <th>Marks_Obtained</th>
        <th>Total_Marks</th>
        <th>Date</th>

    </tr>
    <?php
    $table="ei_result";
    $where="WHERE `stuid`='".getStuid($_SESSION['mid'],'stuid')."' ORDER BY `id`";
    $res=showTable($table,$where);
    $num=numrows($res);
    if($num>0)
    {
        while($fetch=fetch($res))
        {
            ?>
            <tr>
                <td><?=$fetch['stuid']?></td>
                <td><?=getStuid($_SESSION['mid'],'name')?></td>
                <td><?=getSubject($fetch['subjectid'],'subject')?></td>
                <td><?=$fetch['marksobt']?></td>
                <td><?=$fetch['totalmarks']?></td>
                <td><?=$fetch['date']?></td>

            </tr>
            <?php
        }

    }else
    {
        ?><td colspan="6"><?php echo "No records found"?></td><?php
    }
    ?>

    </tr>
</table>

</body>
</html>