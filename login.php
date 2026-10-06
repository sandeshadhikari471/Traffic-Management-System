<?php
// Start a PHP session to keep the user logged in across multiple pages
session_start();

// Check if the form was submitted via the POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Retrieve the username and password from the submitted form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Simple check for demonstration purposes. 
    // In a real application, you would check these against a database.
    if ($username === 'admin' && $password === '12345') {
        
        // If credentials are correct, set session variables
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        
        // Redirect the user to the homepage
        header("Location: home.php");
        exit; // Stop executing this script after redirecting
        
    } else {
        // If credentials are wrong, show a Javascript alert and send them back to login
        echo "<script>
                alert('Invalid username or password! Please try admin / 12345'); 
                window.location.href='index.html';
              </script>";
    }
}
?>
