<?php
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $comment = $_POST["comment"];

    $query = "INSERT INTO comments (name, comment) VALUES ('$name', '$comment')";
    $conn->query($query);
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
    echo "<b>" . $row["name"] . "</b><br>";
    echo $row["comment"] . "<hr>";
}
?>
