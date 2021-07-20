<?php
    include('../function.php');
	session_start();
	if(!isset($_SESSION['sid']))
	{
	redirect('index.php');
	}
if ($_REQUEST['case'] == 'add') {

    if (isset($_REQUEST['submit'])) {
        $qid = 'Q' . rand('111', '999');
        $result = questionInsertion($_POST['subject'],$_POST['addque'], $_POST['ans1'], $_POST['ans2'], $_POST['ans3'], $_POST['ans4'], $_POST['anstrue']);
        if ($result) {
            $message = "Question Inserted Succesfully!!";
            $color = "green";
        } else {
            $message = "Question Not Inserted";
            $color = "red";
        }
    }
}
if ($_REQUEST['case'] == 'edit') {
    if (isset($_REQUEST['submit'])) {
        $id = $_REQUEST['ep'];
        $res = updateQuestion($_POST['addque'], $_POST['ans1'], $_POST['ans2'], $_POST['ans3'], $_POST['ans4'], $_POST['anstrue'], $id);
        if ($res) {

            header('location:display-questions.php');
        } else {
            header('location:questions.php?case=edit');
        }
    } 
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Teacher</title>
</head>
<body>
<?php  if($_REQUEST['case']=='add'){?>
  <p align="center"><a href="dashboard.php"><button >Dashboard</button></a></p>
  <h2 align="center">Questions</h2>
  <p align="center" style="color: <?php print $color;?>"><?php isset($message)? print $message:null;?></p>
  <form action="#" method="post">
  <table align="center" border="1">
      <tr>
          <td height="26"><div align="left"><strong> Select Subject </strong></div></td>

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
        <td height="26"><div align="left"><strong> Enter Question </strong></div></td>
      
      <td><textarea name="addque" cols="60" rows="2" id="addque"></textarea></td>
    </tr>
    <tr>
      <td height="26"><div align="left"><strong>Enter Answer1 </strong></div></td>
     
      <td><input name="ans1" type="text" id="ans1" size="85" maxlength="85"></td>
    </tr>
    <tr>
      <td height="26"><strong>Enter Answer2 </strong></td>
    
      <td><input name="ans2" type="text" id="ans2" size="85" maxlength="85"></td>
    </tr>
    <tr>
      <td height="26"><strong>Enter Answer3 </strong></td>
      
      <td><input name="ans3" type="text" id="ans3" size="85" maxlength="85"></td>
    </tr>
    <tr>
      <td height="26"><strong>Enter Answer4</strong></td>
      
      <td><input  name="ans4" type="text" id="ans4" size="85" maxlength="85"></td>
    </tr>
    <tr>
      <td height="26"><strong>Enter True Answer </strong></td>
      
      <td><input  name="anstrue" type="text" id="anstrue" size="50" maxlength="50"></td>
    </tr>
    <tr>
      <td height="26"></td>
      
      <td><input class="btn btn-primary" type="submit" name="submit" value="Add" ></td>
    </tr>
  </table>
</form>
<?php }else if($_REQUEST['case']=='edit'){?>
    <?php

    $uid=$_REQUEST['ep'];
    $connectDB=connect();
    $q=query($connectDB,"SELECT * FROM `ei_question` WHERE `id`='".$uid."' ");
    $fetch=fetch($q);
    ?>
    <p align="center"><a href="dashboard.php"><button >Dashboard</button></a></p>
    <h2 align="center">Edit Questions</h2>


    <form action="#" method="post">
        <table align="center" border="1">

            <tr>
                <td height="26"><div align="left"><strong> Enter Question </strong></div></td>

                <td><textarea name="addque" cols="60" rows="2" id="addque" ><?=$fetch['question']?></textarea></td>
            </tr>
            <tr>
                <td height="26"><div align="left"><strong>Enter Answer1 </strong></div></td>

                <td><input name="ans1" type="text" id="ans1" value="<?=$fetch['wrong1']?>" size="85" maxlength="85"></td>
            </tr>
            <tr>
                <td height="26"><strong>Enter Answer2 </strong></td>

                <td><input name="ans2" type="text" id="ans2" value="<?=$fetch['wrong2']?>" size="85" maxlength="85"></td>
            </tr>
            <tr>
                <td height="26"><strong>Enter Answer3 </strong></td>

                <td><input name="ans3" type="text" id="ans3" size="85" value="<?=$fetch['wrong3']?>" maxlength="85"></td>
            </tr>
            <tr>
                <td height="26"><strong>Enter Answer4</strong></td>

                <td><input  name="ans4" type="text" id="ans4" size="85" maxlength="85" value="<?=$fetch['wrong4']?>"></td>
            </tr>
            <tr>
                <td height="26"><strong>Enter True Answer </strong></td>

                <td><input  name="anstrue" type="text" id="anstrue" size="50" maxlength="50" value="<?=$fetch['correct']?>"></td>
            </tr>
            <tr>
                <td height="26"></td>

                <td><input class="btn btn-primary" type="submit" name="submit" value="Update" ></td>
            </tr>
        </table>
    </form>

<?php } ?>
</body>
</html>