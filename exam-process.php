<?php
include('function.php');
?>
<html>
    <body>
    <?php
    session_start();
    if(!isset($_SESSION['mid']))
    {
    header('location:index.php');
    }

    $subjectid=$_REQUEST['subjectid'];
    $result=result($subjectid);
    $totalScore=0;
    foreach($result as $score){
        $acolor=$score['answered']===$score['correct']?"green":"red";
        $totalScore=$score['answered']===$score['correct']?$totalScore+1:$totalScore;
        echo 'you answered <font color=' . $acolor . '>' . $score['answered'] . '<font color=black> <br />';
        echo 'the correct answer was ' . $score['correct'] . '<br />' ;
        echo '-------------------------------------- <br />' ;
    }
     echo 'You had a total of ' . $totalScore . ' out of ' . count($result) . ' questions right!';
    $stuid=getStuid($_SESSION['mid'],'stuid');
    $sql=resultInsertion($stuid,$subjectid,$totalScore,count($result));

    ?>
    </body>
    </html>