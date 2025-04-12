<?php
session_start();
session_unset(); // Clear session data
session_destroy(); // End session
header("Location: login.php"); // Redirect to login
exit();
?>