<?php
// Get the form data
$email = $_POST['email'];
$password = $_POST['password'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'test1');
if ($conn->connect_error) {
    die("Connection Failed : " . $conn->connect_error);
} else {
    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT * FROM registration WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a user was found
    if ($result->num_rows > 0) {
        // Successful login
        echo "<script type='text/javascript'>
            alert('Login successful!');
            window.location.href = 'home.html'; // Redirect to the home page or dashboard
        </script>";
    } else {
        // Failed login
        echo "<script type='text/javascript'>
            alert('Login failed. Please check your email and password and try again.');
            window.location.href = 'login.html'; // Redirect back to the login page
        </script>";
    }

    // Close connections
    $stmt->close();
    $conn->close();
}
?>
