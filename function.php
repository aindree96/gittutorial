<?php


function connect(){
    $serverName="127.0.0.1";
    $uName="root";
    $uPassword="";
    $databaseName="interview";
    return mysqli_connect($serverName, $uName, $uPassword, $databaseName);
}


function query($connectDB,$sql)
{
    $res=mysqli_query($connectDB,$sql);
    return $res;
}

function numrows($res)
{
    $num=mysqli_num_rows($res);
    return $num;
}

function fetch($res)
{
    $fetch=mysqli_fetch_array($res);
    return $fetch;
}

function insertData( $table_name, $data )
{
    $key = array_keys($data);
    $value = array_values($data);

    $query ="INSERT INTO $table_name ( ". implode(',' , $key) .") VALUES('". implode("','" , $value) ."')";

    return $query;
}



function userRegistration($name,$email,$phone,$password)
{
    $connectDB=connect();
    $stuid='EI'.rand('1111','9999');
    $password=base64_encode(trim(mysqli_real_escape_string($connectDB,$password))); $date=date('Y-m-d');

    $table_name="ei_student";
    $data=array(
        "stuid" => "$stuid",
        "name" => "$name",
        "password" => "$password",
        "email" => "$email",
        "phone" => "$phone",
        "date" => "$date"

    );

    $sql1=insertData( $table_name, $data );

    return query($connectDB,$sql1);
}
function studentLogin($tablename,$stuid,$password){
    $connectDB=connect();
    $sql="SELECT * FROM $tablename WHERE `stuid`='".$stuid."' AND `password`='".base64_encode(mysqli_real_escape_string($connectDB,$password))."'";
    return query($connectDB,$sql);
}

function showQuestionsExam($tablename,$where){
    $connectDB=connect();
     $sql="SELECT * FROM $tablename WHERE $where ORDER BY RAND() LIMIT 5";
    return query($connectDB,$sql);

}

function showTable($tablename,$where){
    $connectDB=connect();
    $sql="SELECT * FROM $tablename  $where ";
    return query($connectDB,$sql);

}

function questionInsertion($subject,$question,$wrong1,$wrong2,$wrong3,$wrong4,$correct)
{
    $connectDB=connect();
    $qid='Q'.rand('111','999');

    $table_name="ei_question";
    $data=array(
        "qid" => "$qid",
        "subjectid" => "$subject",
        "question" => "$question",
        "wrong1" => "$wrong1",
        "wrong2" => "$wrong2",
        "wrong3" => "$wrong3",
        "wrong4" => "$wrong4",
        "correct" => "$correct"
    );

    $sql1=insertData( $table_name, $data );

    return query($connectDB,$sql1);
}

function adminLogin($tablename,$username,$password){
    $connectDB=connect();
    $sql="SELECT * FROM $tablename WHERE `username`='".$username."' AND `password`='".base64_encode(mysqli_real_escape_string($connectDB,$password))."'";
    return query($connectDB,$sql);
}



function deleteRow($table,$id){
    $connectDB=connect();
    $sql = "DELETE FROM $table WHERE `id`='".$id."' ";
    return query($connectDB,$sql);
}

function updatetData( $table_name, $data,$id )
{

    $sql="UPDATE  $table_name SET ";
    foreach($data as $key=>$value)
    {
        $sql.="$key = $value,";
    }
    $sql.="WHERE `id`='" . $id . "'";

    return $sql;

}

function updateQuestion($question,$wrong1,$wrong2,$wrong3,$wrong4,$correct,$id){
    $connectDB=connect();
    $sql="UPDATE `ei_question` SET `question`='".$question."',`wrong1`='".$wrong1."',`wrong2`='".$wrong2."',`wrong3`='".$wrong3."',`wrong4`='".$wrong4."',`correct`='".$correct."' WHERE `id`='".$id."'";
    $table_name="ei_question";
    $data=array(
        "question" => "$question",
        "wrong1" => "$wrong1",
        "wrong2" => "$wrong2",
        "wrong3" => "$wrong3",
        "wrong4" => "$wrong4",
        "correct" => "$correct"
    );

    $sql1=updatetData( $table_name, $data ,$id);

    return query($connectDB,$sql1);
}

function result($subjectid){
    $table="ei_question";
    $where="WHERE `subjectid`='".$subjectid."'";
    $res=showTable($table,$where);
    $data=[];
    $i = 0;

    while ($fetch = fetch($res)) {

        $data[]=[
            "answered" => $fetch[$_POST['a' . $i]],
            "correct" => $fetch['correct']
        ];
    }
    return $data;
}


function subjectInsertion($subject)
{
    $connectDB=connect();
    $table_name="ei_subject";
    $data=array(
        "subject" => "$subject"
    );

    $sql1=insertData( $table_name, $data );

    return query($connectDB,$sql1);
}

function questionByID($subjectid){
    $connectDB=connect();
    $sql="SELECT * FROM `ei_question` WHERE `subjectid`='".$subjectid."' ORDER BY `id`";
    $res=query($connectDB,$sql);
    return numrows($res);

}

function resultInsertion($stuid,$subject,$marksobt,$totalmarks)
{
    $connectDB=connect();
    $table_name="ei_result";
    $date=date('Y-m-d');
    $data=array(
        "stuid"  =>"$stuid",
        "subjectid" => "$subject",
        "marksobt" => "$marksobt",
        "totalmarks" => "$totalmarks",
        "date" => "$date"

    );

    $sql1=insertData( $table_name, $data );

    return query($connectDB,$sql1);
}
function getStuid($id,$field)
{
    $connectDB=connect();
    $sql="SELECT * FROM `ei_student` WHERE `id`='".$id."'";
    $res=query($connectDB,$sql);
    $num=numrows($res);
    if($num>0)
    {
        $fetch=fetch($res);

        return $fetch[$field];
    }
}

function getSubject($subjectid,$field)
{
    $connectDB=connect();
    $sql="SELECT * FROM `ei_subject` WHERE `id`='".$subjectid."'";
    $res=query($connectDB,$sql);
    $num=numrows($res);
    if($num>0)
    {
        $fetch=fetch($res);

        return $fetch[$field];
    }
}
function getStudentBYStudid($stuid,$field)
{
    $connectDB=connect();
    $sql="SELECT * FROM `ei_student` WHERE `stuid`='".$stuid."'";
    $res=query($connectDB,$sql);
    $num=numrows($res);
    if($num>0)
    {
        $fetch=fetch($res);

        return $fetch[$field];
    }
}