<?php
include "connection.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_SESSION['logged_in'])) {
        http_response_code(403);
        exit("You must be logged in to submit feedback.");
    }

    $name = $_POST["name"];
    $feedback = $_POST["feedback"];
    $query = "INSERT INTO Feedback (name, feedback) VALUES ('$name', '$feedback')";
    $conn->query($query);
    header("Location: admin.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Feedback</title>
</head>
<body>
<?php if (!empty($_SESSION['logged_in'])): ?>
<form method="POST" action="feedback.php">
    <input type="text" name="name" placeholder="Your name">
    <br><br>
    <textarea name="feedback" placeholder="Write your feedback"></textarea>
    <br><br>
    <button type="submit">Send Feedback</button>
</form>
<?php else: ?>
    <p>Please <a href="index.php">log in</a> to submit feedback.</p>
<?php endif; ?>
</body>
</html>
