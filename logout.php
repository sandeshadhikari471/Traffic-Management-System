<?php
// Start session so we can destroy it
session_start();

// Destroy all data registered to a session (logs the user out)
session_destroy();

// Redirect back to the login page
header("Location: index.html");
exit;
?>
