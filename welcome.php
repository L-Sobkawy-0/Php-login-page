<?php
session_start();

if (!isset($_SESSION['full_name'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['full_name']); ?>!</h1>

    <form method="GET">
        <input type="text" name="search_input">
        <button type="submit">Search</button>
    </form>

    <?php
    if (isset($_GET['search_input'])) {
        echo "Your input is: " . htmlspecialchars($_GET['search_input']);
    }
    ?>
</body>
</html>
