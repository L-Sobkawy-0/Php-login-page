<?php
include "connection.php";
$result = $conn->query("SELECT * FROM Feedback");
?>

<h2>Admin - Feedback</h2>

<?php
while ($row = $result->fetch_assoc()) {
    echo "<b>" . htmlspecialchars($row["name"]) . "</b><br>";
    echo htmlspecialchars($row["feedback"]) . "<hr>";
}
?>
