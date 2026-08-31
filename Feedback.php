<?php
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

<form method="POST" action="feedback.php">
    <input type="text" name="name" placeholder="Your name">
    <br><br>
    <textarea name="feedback" placeholder="Write your feedback"></textarea>
    <br><br>
    <button type="submit">Send Feedback</button>
</form>

</body>
</html>
