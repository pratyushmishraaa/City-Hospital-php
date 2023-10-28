<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Connect to your MySQL database
    $conn = mysqli_connect("localhost", "root", "", "users");

    $query = "INSERT INTO person (username, password) VALUES ('$username','$hashed_password')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: login.php");
        exit();
    } else {
        echo "Registration failed. Please try again.";
    }
}
?>

<html>
<link rel="stylesheet" href="register.css">

<body>
    <div class="registration-container">

        <div class="image-container">
            <img src="img/login2.jpg" alt="">
        </div>

        <form method="post" action="register.php">
            <img src="img/hoslogo.png" alt="Your Logo">
            <h1>Please Register Yourself</h1>
            Username: <input type="text" name="username"><br>
            Password: <input type="password" name="password"><br>
            <input type="submit" value="Register">
            <p>Already have an account? <a href="login.php">Back to login page</a></p>
        </form>

    </div>
</body>

</html>