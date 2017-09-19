<?php
if(isset($_POST['submit']))
{
    $rand = rand(11111, 99999);
    $dir = $_POST['otpvalue']; // directory name from form
    mkdir("C:/$dir-$rand",0777,TRUE);
    mkdir("C:/$dir-$rand/Photo",0777,TRUE);
    mkdir("C:/$dir-$rand/Video",0777,TRUE);
    mkdir("C:/$dir-$rand/Sharephoto",0777,TRUE);
}
?>
<!DOCTYPE html>
<html>
<title>Form</title>
<body>
<form action="#" method="post">
<input type="text" name="otpvalue"/>
<input type="submit" value="submit" name="submit"/>
</form>
</body>
</html>