<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful - Traffic Portal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Online Traffic Portal</h1>
        <a href="logout.php" class="logout-btn">Logout</a>
    </header>

    <main>
        <section style="text-align: center; padding: 50px 20px;">
            <h2 style="color: #4CAF50; font-size: 28px;">Payment Successful! ✅</h2>
            <p style="font-size: 18px; margin-top: 15px;">Thank you for clearing your violation charge.</p>
            
            <div style="background: #f9f9f9; padding: 20px; border: 1px solid #ddd; margin: 20px auto; max-width: 400px; text-align: left;">
                <p><strong>Status:</strong> COMPLETED</p>
                <p><strong>Transaction ID:</strong> <?php echo htmlspecialchars($_GET['transaction_uuid'] ?? 'N/A'); ?></p>
            </div>
            
            <a href="home.php" style="text-decoration: none;">
                <button style="width: auto; padding: 10px 25px; margin-top: 20px;">Return to Dashboard</button>
            </a>
        </section>
    </main>
</body>
</html>
