<?php
session_start();
print_r($_SESSION);
if (isset($_POST['submit'])) {
   
    $filetmp = $_FILES["file_img"]["tmp_name"];
    $filname = $_FILES["file_img"]["name"];
    $filetype = $_FILES["file_img"]["type"];
    //random number generate
    $rand = rand(11111, 99999);
    $dirPath = $rand;
    //dynamic directory create
    $result = mkdir($dirPath."/Photo", 0777, TRUE);
    if ($result == '1') {
        //targeted apth craete for image upload
        $target_path = $dirPath ."/Photo/". basename($_FILES['file_img']['name']);
         if (move_uploaded_file($_FILES['file_img']['tmp_name'], $target_path)) {
            echo "The file " . basename($_FILES['file_img']['name']) .
            " has been uploaded";
            require './dbcon.php';
            $files = $dirPath."/Photo/".$_FILES['file_img']['name'];
            $sql = "insert into imageupload(img_name,img_type,img_path)values('$filname','$filetype','$files')";
            mysqli_query($conn, $sql);
//            $_SESSION['random']=$rand;
            header("Location:display_image.php/id=".$rand);
        } else {
            echo "There was an error uploading the file, please try again!";
        }
    } else {
        echo $dirPath . " has NOT been created";
    }
    
    
    
}
?>

<form method="post" action="#" enctype="multipart/form-data">
    <input type="file" name="file_img">
    <input type="submit" value="submit" name="submit">
</form>
