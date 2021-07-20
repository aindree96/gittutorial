<?php
include ('../function.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Teacher</title>
</head>
<body>
<p align="center"><a href="dashboard.php"><button>Dashboard</button></a></p>
<h2 align="center">Students</h2>
<table border="1" align="center">
    <tr>
        <th>Stuid</th>
        <th>Name</th>
        <th>Password</th>
        <th>Email</th>
        <th>Phone</th>

    </tr>
    <?php
    $table="ei_student";
    $where="ORDER BY `id`";
    $res=showTable($table,$where);
    $num=numrows($res);
    if($num>0)
    {
        while($fetch=fetch($res))
        {
            ?>
            <tr>
                <td><?=$fetch['stuid']?></td>
                <td><?=$fetch['name']?></td>
                <td><?=base64_decode($fetch['password'])?></td>
                <td><?=$fetch['email']?></td>
                <td><?=$fetch['phone']?></td>

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