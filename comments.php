<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $comment = $_POST["comment"];

    $stmt = $conn->prepare("INSERT INTO comments (name, comment) VALUES (?, ?)");

if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("ss", $name, $comment);

if (!$stmt->execute()) {
    die("Execute failed: " . $stmt->error);
}
}

$result = $conn->query("SELECT * FROM comments");
?>

<form method="POST">
    <input type="text" name="name" placeholder="Your name">
    <br><br>
    <textarea name="comment" placeholder="Write a comment"></textarea>
    <br><br>
    <button type="submit">Post Comment</button>
</form>

<h2>Comments</h2>

<?php
while ($row = $result->fetch_assoc()) {
    echo "<b>" . htmlspecialchars($row["name"]) . "</b><br>";
    echo htmlspecialchars($row["comment"]) . "<hr>";
}
?>
