<h1>Profile wall</h1>
<?php
session_start();
//print_r($_SESSION["pet_unique_id"]);die;
//SELECT * FROM `addfriends` JOIN user_inf on addfriends.child_id = user_inf.pet_unique_id JOIN post ON post.child_post_id = user_inf.pet_unique_id WHERE addfriends.parent_id =14028
$parent_id = $_SESSION["pet_unique_id"];
require './dbcon.php';
$display = "SELECT * FROM `addfriends` JOIN user_infos on addfriends.child_id = user_infos.pet_unique_id WHERE addfriends.parent_id ='$parent_id'";
$result = mysqli_query($conn, $display);
if(mysqli_num_rows($result))
{
    while($row = mysqli_fetch_assoc($result))
    {
        echo '<pre>'.$row["child_id"].'-'.$row["pet_name"].'-'.$row["powner_name"].'-'.$row["email"].'</pre>';
    }
}
?>
