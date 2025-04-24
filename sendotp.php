<?php
session_start();

// Store email from the form
$_SESSION["usemailforotp"] = $_POST['email'];

try {
    // Generate OTP
    $_SESSION['otp'] = rand(10000, 99999);

    $headers = "MIME-Version: 1.0" . "\r\n";                  //Multipurpose Internet Mail Extensions
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: Cookie Rookie" . "\r\n";
    // Email details
    $to = $_SESSION["usemailforotp"];
    $subject = 'Change Password For Your Cookie Rookie Account';
    $message = '
        <div style="font-family: Arial, sans-serif; padding: 20px; background-color:rgb(244, 244, 244);">
            <div style="max-width: 600px; margin: auto; background: #fff; padding: 20px; border-radius: 10px;">
                <h2 style="text-align:center; color: #ff4b5c;">🍪 Cookie Rookie OTP Verification</h2>
                <p style="font-size: 18px; color: #333;">Hello,</p>
                <p style="font-size: 16px; color: #555;">
                    We received a request to change the password for your Cookie Rookie account.
                </p>
                <p style="font-size: 20px; text-align: center; background: #ffefef; padding: 10px; border-radius: 5px;">
                    Your OTP is: <b style="color: #d6336c;">' . $_SESSION["otp"] . '</b>
                </p>
                <p style="font-size: 14px; color: #777;">
                    If you did not request this, you can ignore this email.
                </p>
                <br>
                <p style="text-align: center; font-size: 14px; color: #aaa;">
                    © 2025 Cookie Rookie. All rights reserved.
                </p>
            </div>
        </div>';


    // Send the email using the mail() function
    if (mail($to, $subject, $message, $headers)) {
        // Redirect on success
        header('Location: takeotp.php');
        exit;
    } else {
        $_SESSION['error'] = "Message could not be sent. Please try again.";
        header('Location: login.php');
        exit;
    }
} catch (Exception $e) {
    $_SESSION['error'] = "An error occurred: " . $e->getMessage();
    header('Location: login.php');
    exit;
}
?>
