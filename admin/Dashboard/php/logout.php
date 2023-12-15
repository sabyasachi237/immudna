<?php
// Perform logout actions, such as destroying the session
session_start();
session_destroy();

// Redirect the user to the homepage
header("Location: index.php"); // Change "index.php" to the actual homepage URL
exit();
?>
