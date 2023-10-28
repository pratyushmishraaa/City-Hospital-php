<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST["full_name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $query = $_POST["query"];

    // Connect to your MySQL server
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "contact";

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO contacts (full_name, phone, email, address, query) VALUES ('$full_name', '$phone', '$email', '$address', '$query')";

    if ($conn->query($sql) === TRUE) {
      echo "<script>alert('Query Submitted Successfully')</script>";
      echo "<script>window.location.href = 'index.php';</script>";
  } else {
      // An error occurred, send a response to JavaScript
      echo "error";
  }

    $conn->close();
}
