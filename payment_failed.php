<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Failed - Traffic Portal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Online Traffic Portal</h1>
        <a href="logout.php" class="logout-btn">Logout</a>
    </header>

    <main>
        <section style="text-align: center; padding: 50px 20px;">
            <h2 style="color: #d9534f; font-size: 28px;">Payment Failed ❌</h2>
            <p style="font-size: 18px; margin-top: 15px;">Unfortunately, your payment could not be completed or was cancelled.</p>
            <p>Please try again.</p>
            
            <a href="home.php" style="text-decoration: none;">
                <button style="width: auto; padding: 10px 25px; margin-top: 20px;">Return to Dashboard</button>
            </a>
        </section>
    </main>
</body>
</html>
