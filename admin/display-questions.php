<?php
    include('../function.php');
    ?>
<!DOCTYPE html>
<html>
<head>
    <title>Teacher</title>
</head>
<body>
<p align="center"><a href="dashboard.php"><button >Dashboard</button></a></p>
<h2 align="center">Questions</h2>
<table border="1" align="center" width="70">
    <tr>
        <th>Sl.No.</th>
        <th>Questionid</th>
        <th>Subject</th>

        <th>Question</th>
        <th>Wrong1</th>
        <th>Wrong2</th>
        <th>Wrong3</th>
        <th>Wrong4</th>
        <th>Correct_Answer</th>
        <th>Action</th>
    </tr>
    <?php

    $table="ei_question";
    $where="ORDER BY `id`";
    $res=showTable($table,$where);
    $num=numrows($res);
    $i=1;
    if($num>0)
    {
        while($fetch=fetch($res))
        {
            ?>
            <tr>
                <td><?=$i?></td>
                <td><?=$fetch['qid']?></td>
                <td><?=getSubject($fetch['subjectid'],'subject')?></td>
                <td><?=$fetch['question']?></td>
                <td><?=$fetch['wrong1']?></td>
                <td><?=$fetch['wrong2']?></td>
                <td><?=$fetch['wrong3']?></td>
                <td><?=$fetch['wrong4']?></td>
                <td><?=$fetch['correct']?></td>
                <td><a href=questions.php?case=edit&ep=<?php echo $fetch['id']?>">Edit/</a>
                    <a href="delete.php?del=<?php echo $fetch['id'] ?>">Delete</a>
                </td>
            </tr>

            <?php $i++; } } ?>

</table>
</body>
</html>