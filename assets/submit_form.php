<?php
// Enable error reporting for debugging (remove in production)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data by using the element's name attributes value as key
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $project = $_POST['project'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // For demonstration purposes, echo the data
    echo "<h1>Received Input:</h1>";
    echo "<p>Name: " . htmlspecialchars($name) . "</p>";
    echo "<p>Email: " . htmlspecialchars($email) . "</p>";
    echo "<p>Phone: " . htmlspecialchars($phone) . "</p>";
    echo "<p>Project: " . htmlspecialchars($project) . "</p>";
    echo "<p>Subject: " . htmlspecialchars($subject) . "</p>";
    echo "<p>Message: " . nl2br(htmlspecialchars($message)) . "</p>";

    // Prepare email body
    $emailBody = "You have received a new message from the user $name.\n".
                 "Here is the message:\n $message";

    // Send email
    $toEmail = "Gajankethi@gmail.com"; // Your email address
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();
    if (mail($toEmail, $subject, $emailBody, $headers)) {
        echo '<p>Message sent successfully!</p>';
    } else {
        echo '<p>Error: Message not sent.</p>';
    }
} else {
    // Not a POST request
    echo '<p>Error: You need to submit the form!</p>';
}
?>
