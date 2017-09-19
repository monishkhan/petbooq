<?php
session_start();
$pet_error = $dob_error = $sex_error = $email_error = $country_error = $phone_error = "";
if (isset($_POST['sub'])) {
    $name = trim($_POST['pet_type']);
    $dob = trim($_POST['dob']);
    $sex = trim($_POST['sex']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $country = trim($_POST['country']);
    if (empty($_POST['pet_type'])) {
        $pet_error = "Select pet type";
    }
    if (empty($_POST['dob'])) {
        $dob_error = "Select date of birth";
    }
    if (empty($_POST['sex'])) {
        $sex_error = "Select sex";
    }
    if (empty($_POST['phone'])) {
        $phone_error = "Enter phone number";
    }
    if (empty($_POST['email'])) {
        $email_error = "Enter email";
    }
    if (empty($_POST['country'])) {
        $country_error = "Select country";
    }
    else{
        require_once 'dbcon.php';
        $otp = rand(1000, 9000);
        $status = 0;
        $sql = "Insert into petowner(typeofpet,dob,sex,email,phone,country,otp,status)values('$name','$dob','$sex','$email','$phone','$country','$otp','$status')";
        if (mysqli_query($conn, $sql)) {
            echo "Record insert successfully";
            print_r($otp);
            require 'PHPMailer/PHPMailerAutoload.php';
            $mail = new PHPMailer;
            //$mail->SMTPDebug = 3;                               // Enable verbose debug output
//            $mail->SMTPDebug = 4;
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'ssl://smtp.gmail.com';                   // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'md.monish@gmail.com';                 // SMTP username
            $mail->Password = 'Monish@1';                           // SMTP password
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;                                    // TCP port to connect to
            $mail->From = 'md.monish@gmail.com';
            $mail->FromName = 'Test phpmailer';
            $mail->addAddress($email,'johdn@gmail.com');                           // Name is optional
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body = 'This is the HTML message body <b>in bold!</b>' . $otp;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
//            print_r($passwrd);
            if (!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } 
            else {
                echo 'Message has been sent';
                $_SESSION['otp']=$otp;
                header('Location:process.php');
            }
        }
    }
}
?>

<form method="post" action="#" id="myform">
    <select name="pet_type" id="pet_type">
        <option value="">Select pet</option>
        <option value="Pet name 1">Pet name 1</option>
        <option value="Pet name 2">Pet name 2</option>
        <option value="Pet name 3">Pet name 3</option>
    </select>
<?php if (empty($name)) { echo $pet_error; } ?>
    <input type="text" class="datepicker" id="dob" name="dob" placeholder="dob">
<?php if (empty($dob)) { echo $dob_error; } ?>
    <select name="sex" id="sex">
        <option value="">Select sex</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select>
    <?php if (empty($sex)) {echo $sex_error;} ?>
    <input type="text" name="email" id="email" placeholder="Email">
<?php if (empty($email)) {echo $email_error;} ?>
    <input type="text" name="phone" placeholder="Mobile">
    <?php if (empty($phone)) {echo $phone_error;} ?>
    <select name="country">
        <option value="">Select Country</option>
        <option value="India">India</option>
        <option value="France">France</option>
    </select>
<?php if (empty($country)) {echo $country_error;} ?>
    <input type="submit" value="Submit" name="sub">
</form>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
   
    $(function () {
        $(".datepicker").datepicker({
            changeMonth: true,
            changeYear: true
        });
    });
</script>
