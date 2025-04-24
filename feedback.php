<?php

try {
    $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=cookie_rookie(4)', 'root', '');
    $dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $username = $_POST['uname'];
    $email = $_POST['email'];
    $feedback = $_POST['feedback'];

    if (!empty($email) && !empty($feedback)) {
        // Insert feedback into the database
        $query = $dbhandler->prepare("INSERT INTO feedback (uname, uemail, feedback) VALUES (?, ?, ?)");
        $query->execute(array($username, $email, $feedback));

        $count = $query->rowCount();

        if ($count > 0) {
            // Feedback inserted successfully, now send it via email to the admin
            $adminEmail = "aniket70045@gmail.com"; // Replace with the admin's email address
            $subjectToAdmin = "New Feedback Received";
            $messageToAdmin = "You have received new feedback:\n\n" .
                              "Name: $username\n" .
                              "Email: $email\n" .
                              "Feedback: $feedback\n";
            //$headersToAdmin = "From: aniket70045@gmail.com"; // Replace with a valid "from" email address

            if (mail($adminEmail, $subjectToAdmin, $messageToAdmin)) {
                echo 'The feedback has been sent and emailed to the admin.';
            } else {
                echo 'The feedback has been sent, but the email to the admin could not be delivered.';
            }

            // Send confirmation email to the user
            $subjectToUser = "Feedback Confirmation";
            $messageToUser = "Dear $username,\n\n" .
                             "Thank you for your feedback! We have received your message:\n\n" .
                             "\"$feedback\"\n\n" .
                             "We appreciate your input and will get back to you if necessary.\n\n" .
                             "Best regards,\nCookie Rookie Team";
            //$headersToUser = "From: aniket70045@gmail.com"; // Replace with a valid "from" email address

            if (mail($email, $subjectToUser, $messageToUser)) {
                echo ' A confirmation email has also been sent to the user.';
            } else {
                echo ' However, the confirmation email to the user could not be delivered.';
            }
        } else {
            echo 'Failed to submit feedback.';
        }
    } else {
        echo "Email or feedback can't be empty.";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
    die();
}
?>