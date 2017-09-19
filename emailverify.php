<h1>Email verification</h1>
<?php
if (isset($_POST['name']) && isset($_POST['email'])) {

    $name = mysql_escape_string($_POST['name']);
    $email = mysql_escape_string($_POST['email']);

    if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)) {
        $msg = 'The email you have entered is invalid, please try again.';
    } else {
        $msg = 'Your account has been made, <br /> please verify it by clicking the activation link that has been send to your email.';
        $hash = md5(rand(1, 1000));
        $passwrd = rand(1000, 5000);
//        print_r($passwrd);die;
        //$sql2 = "insert into user(username,email,hash,password)values('$name','$email','$hash',$password)";
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "petbooq";
//        /ini_set();

        $mysqli = mysqli_connect($servername, $username, $password, $dbname);
        if (!$mysqli) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql2 = "INSERT INTO users (username, password, email,hash,active) VALUES ('$name', '$passwrd', '$email','$hash','1')";
        $result2 = mysqli_query($mysqli, $sql2) or die(mysqli_error());
        if ($result2) {

            require 'PHPMailer/PHPMailerAutoload.php';

            $mail = new PHPMailer;
//$mail->SMTPDebug = 3;                               // Enable verbose debug output
//            $mail->SMTPDebug = 4;
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'ssl://smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'md.monish@gmail.com';                 // SMTP username
            $mail->Password = 'Monish@1';                           // SMTP password
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;                                    // TCP port to connect to
            $mail->From = $email;
            $mail->FromName = 'Test phpmailer';
            $mail->addAddress($email);               // Name is optional
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body = 'This is the HTML message body <b>in bold!</b>'.$passwrd;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            if (!$mail->send()) {
                
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo 'Message has been sent';
                header("Location:opt.php");
            }
        }
    }
}
?>
<?php
 $passwrd = rand(1000, 5000);
        print_r($passwrd);die;
?>
<form action="#" method="post">
    <input type="text" name="name">
    <input type="text" name="email">
    <input type="submit" name="submit" value="signup">
</form>

