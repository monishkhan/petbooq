<?php
if(isset($_POST['form_submit']))
{
    $name= $_POST['user_name'];
    $email = $_POST['email'];
    $uniqueid = rand(1000, 9999);
    require './dbcon.php';
    $sql = "insert into registration(username,email,uniqueid) values('$name','$email','$uniqueid')";
//    $result = "insert into uploadimages(uniqueid) values('$uniqueid')";
//    mysqli_query($conn, $result);
    mysqli_query($conn, $sql);
    $new = mysql_insert_id();
//    print_r( mysqli_insert_id($conn));
//    directory create users register
    mkdir($uniqueid,0777,TRUE);
    mkdir($uniqueid.'/photo',0777,TRUE);
    mkdir($uniqueid.'/video',0777,TRUE);
    header("Location:login.php");
    
}
?>
<form method="post">
    <input type="text" name="user_name" placeholder="name">
    <input type="text" name="email" placeholder="email">
    <input type="submit" name="form_submit" value="submit">
</form>