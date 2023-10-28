<?php
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish a database connection (replace these with your database details)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "appointment";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get user input from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // SQL query to insert data into the database
    $sql = "INSERT INTO registration (name, email, phone) VALUES ('$name', '$email', '$phone')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registration successful. Thank you for registering!')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Free Check-up Camp Registration</title>
    <link rel="stylesheet" href="checkup.css">
</head>

<body>
    <div class="checkup-container">
        <div class="image-container">
            <img src="img/checkup.jpg" alt="">
        </div>


    

    <a href="index.php" class="checkup-back">
        <button>Go Back</button></a>

    <form action="checkup.php" method="POST">
    <div class="checkup-logo">
             <img src="img/hoslogo.png" alt="Your Logo">
        </div>
        <h1>Registration for Checkup</h1>
        <label for="name">Name:</label>
        <input type="text" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" required><br><br>

        <input type="submit" value="Register">
    </form>
</div>
</body>

</html>