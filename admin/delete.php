<?php
include('../function.php');
$id = $_REQUEST['del'];
$table="ei_question";
$res=deleteRow($table,$id);
if ($res) {
    header('location:display-questions.php');
}else{
    echo "Delete Not Successful";
}
