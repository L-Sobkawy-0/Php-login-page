<?php
include "connection.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_SESSION['logged_in'])) {
        http_response_code(403);
        exit("You must be logged in to post a comment.");
    }

    $name = $_POST["name"];
    $comment = $_POST["comment"];
    $query = "INSERT INTO comments (name, comment) VALUES ('$name', '$comment')";
    $conn->query($query);
}

$result = $conn->query("SELECT * FROM comments");
?>
<?php if (!empty($_SESSION['logged_in'])): ?>
<form method="POST">
    <input type="text" name="name" placeholder="Your name">
    <br><br>
    <textarea name="comment" placeholder="Write a comment"></textarea>
    <br><br>
    <button type="submit">Post Comment</button>
</form>
<?php else: ?>
    <p>Please <a href="index.php">log in</a> to post a comment.</p>
<?php endif; ?>

<h2>Comments</h2>
<?php
while ($row = $result->fetch_assoc()) {
    echo "<b>" . htmlspecialchars($row["name"]) . "</b><br>";
    echo htmlspecialchars($row["comment"]) . "<hr>";
}
?>
