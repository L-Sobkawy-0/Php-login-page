<?php
session_start();
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    header("Location: index.php");
    exit();
}
include "connection.php";

$name = $_GET['name'] ?? '';
$result = $conn->query("SELECT * FROM Feedback WHERE name LIKE '%$name%'");
?>
<h2>Admin - Feedback</h2>
<?php
while ($row = $result->fetch_assoc()) {
    echo "<b>" . htmlspecialchars($row["name"]) . "</b><br>";
    echo htmlspecialchars($row["feedback"]) . "<hr>";
}
?>
