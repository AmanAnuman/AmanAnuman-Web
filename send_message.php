<?php
$servername = "localhost"; // Change if needed
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "my-web-contact"; // Your database name

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// SQL Query
$sql = "INSERT INTO messages (NAME, PHONE, EMAIL, SUBJECT, MESSAGE)
        VALUES (?, ?, ?, ?, ?)";

// Check if prepare() is successful
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("sssss", $name, $phone, $email, $subject, $message);

if ($stmt->execute()) {
    header("Location: contact.html?status=success");
} else {
    header("Location: contact.html?status=error") . $stmt->error;
}

$stmt->close();
$conn->close();
?>
