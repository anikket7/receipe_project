<?php
require_once('PHPMailer/PHPMailerAutoload.php');
session_start();

// Create PHPMailer instance
$mail = new PHPMailer(true);

// Store email and generate OTP
$_SESSION["usemailforotp"] = $_POST['email'];
$_SESSION['otp'] = rand(10000, 99999); 

try {
    // Server settings
    $mail->SMTPDebug = 2; // Change to 0 in production
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'aniket70045@gmail.com';  // Your Gmail
    $mail->Password = 'lbxh nhvk yefm oxoc'; // ❗ Use an App Password here if 2FA is on
    $mail->SMTPSecure = 'ssl'; // Use 'ssl' for port 465
    $mail->Port = 465;

    // Sender and recipient
    $mail->setFrom('cookierookierecipes@gmail.com', 'Admin');
    $mail->addAddress($_SESSION["usemailforotp"]);

    // Email content
    $mail->isHTML(true);
    $mail->Subject = 'Change Password For Account of Cookie Rookie';
    $mail->Body = 'One Time Password for Change Password for a Cookie Rookie Account:<br><b>' . $_SESSION["otp"] . '</b>';
    $mail->AltBody = 'One Time Password: ' . $_SESSION["otp"];

    // Send the mail
    $mail->send();

    // Redirect on success
    header('Location: takeotp.php');
    exit;
} catch (phpmailerException $e) {
    $_SESSION['error'] = "Message could not be sent. Mailer Error: " . $e->getMessage();
    header('Location: login.php');
    exit;
}
?>
