<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mysqli = new mysqli("localhost", "root", "", "appointment");

    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $patient_name = $_POST['patient_name'];
    $contact_number = $_POST['contact_number'];
    $pickup_location = $_POST['pickup_location'];
    $destination = $_POST['destination'];

    $sql = "INSERT INTO ambulance_bookings (patient_name, contact_number, pickup_location, destination)
            VALUES ('$patient_name', '$contact_number', '$pickup_location', '$destination')";

    if ($mysqli->query($sql) === TRUE) {
        // Send email receipt
        $to = "abc@gmail.com"; // Replace with the recipient's email address
        $subject = "Ambulance Booking Receipt";
        $message = "Thank you for booking an ambulance with us!\n\n";
        $message .= "Patient Name: $patient_name\n";
        $message .= "Contact Number: $contact_number\n";
        $message .= "Pickup Location: $pickup_location\n";
        $message .= "Destination: $destination\n";

        // Additional headers
        $headers = "From: pratyush@gmail.com" . "\r\n" .
        "Reply-To: pratyush@gmail.com" . "\r\n" .
        "X-Mailer: PHP/" . phpversion(); // Replace with your email address

        // Send the email
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
        echo "<script>window.location.href = 'index.php';</script>";
    } else {
        // An error occurred
        echo "An error occurred while booking.";
    }

    // Close the database connection
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Book Your Ambulance</title>
    <link rel="stylesheet" href="ambulance.css">
</head>

<body>
    <div class="ambulance-container">
        

        <a href="index.php" class="ambulance-back">
            <button>Go Back</button></a>

        <form method="POST" action="ambulance.php">
            <div class="ambulance-logo">
                <img src="img/hoslogo.png" alt="Your Logo">
            </div>

            <h2>Book Your Ambulance</h2>

            <label for="patient_name">Patient Name :</label>
            <input type="text" name="patient_name" required><br>

            <label for="contact_number">Contact Number :</label>
            <input type="tel" name="contact_number" required><br>

            <label for="pickup_location">Pickup Location :</label>
            <input type="text" name="pickup_location" required><br>

            <label for="destination">Destination :</label>
            <input type="text" name="destination" required><br>

            <input type="submit" value="Book Ambulance">
        </form>

    </div>
</body>

</html>