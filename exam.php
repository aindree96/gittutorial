<?php
include ('function.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<form  action="exam-process.php?subjectid=<?=$_REQUEST['subjectid']?>" method="post">
    <?php
    $tablename="ei_question";
    $where="`subjectid`='".$_REQUEST['subjectid']."'";
    $res=showQuestionsExam($tablename,$where);

    $i=0;
    while($fetch=fetch($res))
    {?>
    <table>
        <?php echo "Question: ".$fetch['question'] . '<br />'; //q_do are my questions
        echo '<input type="radio" name="a'.$i.'" value="wrong1" />' ,"A ".$fetch['wrong1'] . '<br />';
        echo '<input type="radio" name="a'.$i.'" value="wrong2"/>' ,"B ".$fetch['wrong2'] . '<br />';
        echo '<input type="radio" name="a'.$i.'" value="wrong3" />' ,"C ".$fetch['wrong3'] . '<br />';
        echo '<input type="radio" name="a'.$i.'" value="wrong4"/>' ,"D ".$fetch['wrong4'] . '<br />';
        $i++;}
        ?>
        <tr><td colspan="5" align="center"><input type="submit" name="Submit" value="Submit" /> </td></tr>
    </table>
</form>

</body>
</html>