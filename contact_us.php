<?php
include 'dbcon.php';
// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Prepare and bind SQL query
    $stmt = $conn->prepare("INSERT INTO contacts (name, email, subject, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $subject, $message);

    if ($stmt->execute()) {
        echo "<script>alert('Message Sent Successfully!');</script>";
    } else {
        echo "<script>alert('Error sending message. Please try again.');</script>";
    }
    $stmt->close();
}
$conn->close();
?>
