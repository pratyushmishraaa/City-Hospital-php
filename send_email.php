<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = $_POST["to"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $headers = "From: pratyush@gmail.com"; // Replace with your email address

    // MailHog SMTP server settings
    $smtpServer = "localhost"; // MailHog runs on localhost
    $smtpPort = 1025; // MailHog's SMTP port

    // Configure PHP to use MailHog's SMTP server
    ini_set("SMTP", $smtpServer);
    ini_set("smtp_port", $smtpPort);

    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully!";
    } else {
        echo "Email sending failed.";
    }
}
?>

<!DOCTYPE html>

<html>

<head>
   <title>Email Form</title>
</head>

<body>
   <h2>Send an Email</h2>
   <form method="post" action="send_email.php">
      <label for="to">To:</label>
      <input type="email" name="to" id="to" required><br><br>

      <label for="subject">Subject:</label>
      <input type="text" name="subject" id="subject" required><br><br>

      <label for="message">Message:</label><br>
      <textarea name="message" id="message" rows="5" required></textarea><br><br>

      <input type="submit" value="Send Email">
   </form>
</body>

</html>