<?php
session_start();
if(isset($_POST['login']))
{
    $login = $_POST['email'];
    
    require_once './dbcon.php';
    $result = "select * from registration where email='$login'";
    $query = mysqli_query($conn, $result);
    if(mysqli_num_rows($query)==1)
    {
      echo "you login";
      $_SESSION['email']=$login;
     $unique = "select(uniqueid) from registration where email ='".$_SESSION['email']."'";
     $res = mysqli_query($conn, $unique);
     if(mysqli_num_rows($res)==1)
     {
         while ($row = mysqli_fetch_assoc($res))
         {
//             echo $row['email'];
             $id_unique = $row['uniqueid'];
            header("Location:image_upload.php?id=".$id_unique);
         }
     }
//      $unique = "select(uniqueid) from registration";
//      $getid = mysqli_query($conn, $unique);
//      while ($row = mysqli_fetch_assoc($getid))
//      {
////          echo $row['uniqueid'];
//          $id_unique = $row['uniqueid'];
//          echo $id_unique;
//          $_SESSION['uniqueid'] = $id_unique;
//          header("Location:image_upload.php?id=".$id_unique);
//          
//      }
    }
    else{
        echo "You are not login";
    }
}

?>
<form method="post">
    <input type="text" name="email">
    <input type="submit" value="login" name="login">
    
</form>