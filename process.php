<?php
session_start();
$otp_verify = $_SESSION['otp'];
$error_otp="";
print_r($otp_verify);
if(isset($_POST['submit']))
{
    if(empty($_POST['otp']))
    {
      $error_otp = "Enter otp";
    }
    else
    {
    //echo "data enter here";
    $otp_varify = $_POST['otp'];    
//    $link = mysqli_connect("localhost", "root", "", "petbooq");
//    if ($link == FALSE) {
//        die("Error:Could not connect" . mysqli_connect_error());
//    }
    require_once 'dbcon.php';
    $query = "select otp from petowner where otp=$otp_varify";
    $results = mysqli_query($conn, $query);
    if(mysqli_num_rows($results)==1)
    {
       $status=1;
       echo "Data match";
       $update = "update petowner set status = $status where otp = $otp_varify";
       if($conn->query($update)==TRUE)
       {
           echo 'Update successfully';
       }
       else
       {
           echo 'Somthing worng here';
       }
   }
   else{
       echo "Data not match";
   }
    }
}
?>
<h1>Verify you otp</h1>
<form method="post" action="#">
    <input type="text" name="otp">
    <?php if(empty($_POST['otp'])){echo $error_otp;}?>
    <input type="submit" name="submit" value="Submit">
</form>