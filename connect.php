<?php
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$password = $_POST['password'];
$number = $_POST['number'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'test1');
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed : " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO registration(firstName, lastName, email, password, number) VALUES(?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $firstName, $lastName, $email, $password, $number);
    $execval = $stmt->execute();
    if ($execval) {
        $message = "Registration successful!";
    } else {
        $message = "Registration failed.";
    }
    $stmt->close();
    $conn->close();
}

// Redirect to success.php with the message
echo "<script type='text/javascript'>
			alert('Registration successfully...');
			window.location.href = 'index.html';
		</script>";
		exit();
?>
