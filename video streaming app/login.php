<?php
session_start(); // Start the session

// Establish database connection
$host = "localhost";
$username = "root";
$password = "";
$database = "login_db";
$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Check if login form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    // Query database for login
    $query = "SELECT * FROM users WHERE username='$uname' AND password='$pass'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // Successful login
        $_SESSION['username'] = $uname; // Use $uname here
        header("Location: index.php"); // Replace with your success page
        exit();
    } else {
        // Invalid login
        header("Location: loginpage.php?error=1");
        exit();
    }
}

// Close database connection
mysqli_close($conn);
?>