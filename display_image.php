<?php

require_once './dbcon.php';
$sql = "SELECT * FROM imageupload";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) { 
        while ($row = mysqli_fetch_assoc($result)) { 
            
            ?>

               <img src="upload/<?php echo $row['img_name'];?>" alt=" " height="75" width="75">
            <?php  
            
        }
}
?>


