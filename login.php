<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = mysqli_connect("localhost", "root", "", "users");

    $query = "SELECT username, password FROM person WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['password'];

        if (password_verify($password, $hashed_password)) {

            setcookie('username', $username, time() + 3600, '/');//here i am setting the cookie

            $_SESSION['username'] = $username;
            header("Location: index.php");
            exit();
        } else {
            echo "<script>alert('Incorrect Password');</script>";
        }
    } else {
        echo "<script>alert('User Not Found, Please Register Yourself');</script>";
    }
}
elseif (isset($_SESSION['username'])) {
    
    session_unset(); 
    session_destroy(); 
    setcookie('username', '', time() - 3600, '/'); // here i am destroying the cookie in 3600 sec

    exit();
}
?>

<html>
<link rel="stylesheet" href="login.css">

<body>
    <div class="login-container">

    <div class="video-container">
        <video autoplay loop muted>
            <source src="img/login.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
        
    <form method="post" action="login.php">
        <img src="img/hoslogo.png" alt="Your Logo">
        <h1>Login</h1>
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" value="Login">
        <p>Don't have an account? <a href="register.php">Register here</a></p>
    </form>


</div>
</body>

</html>