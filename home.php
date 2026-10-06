<?php
// Start the session to access session variables
session_start();

// Security check: If the user is NOT logged in, redirect them back to the login page (index.html)
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traffic Portal - Home</title>
    <!-- Link to CSS for styling -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Online Traffic Portal</h1>
        <!-- Display the logged-in user's name safely using htmlspecialchars -->
        <p>Logged in as: <?php echo htmlspecialchars($_SESSION['username']); ?></p>
        <a href="logout.php" class="logout-btn">Logout</a>
    </header>

    <main>
        <!-- Section for Traffic Rules -->
        <section class="rules-section">
            <h2>Traffic Rules & Regulations</h2>
            <ul>
                <li>Always wear a seatbelt while driving.</li>
                <li>Do not exceed the designated speed limits.</li>
                <li>Never use a mobile phone while driving.</li>
                <li>Stop completely at red lights and stop signs.</li>
                <li>Yield to pedestrians at crosswalks.</li>
            </ul>
        </section>

        <!-- Section for Violation Charges -->
        <!-- Toggle Switch UI -->
        <div class="toggle-container">
            <span class="toggle-label">All Rules</span>
            <label class="switch">
                <input type="checkbox" id="viewToggle">
                <span class="slider round"></span>
            </label>
            <span class="toggle-label">My Violations</span>
        </div>

        <div class="dashboard-container">
            <!-- Right Side / Bottom: General Violation Charges (Default Shown) -->
            <section id="generalViolationsSection" class="general-violations-section">
                <h2>Charges for Violating the Rule</h2>
                <p>Official penalties for breaking traffic laws.</p>
                
                <div id="chargesList">
                    <table>
                        <tr>
                            <th>Traffic Violation</th>
                            <th>Fine Amount (NPR)</th>
                        </tr>
                        <tr>
                            <td>Riding or Driving Without a Licence</td>
                            <td>Up to Rs. 5,000</td>
                        </tr>
                        <tr>
                            <td>Failure to Wear a Helmet or Seatbelt</td>
                            <td>Rs. 1,000</td>
                        </tr>
                        <tr>
                            <td>Using a Mobile Phone While Driving</td>
                            <td>Rs. 2,000</td>
                        </tr>
                        <tr>
                            <td>Lane Discipline Violation</td>
                            <td>Rs. 1,500</td>
                        </tr>
                        <tr>
                            <td>Speeding</td>
                            <td>Rs. 1,500 - 3,000</td>
                        </tr>
                        <tr>
                            <td>Drink and Drive</td>
                            <td>Rs. 1,000</td>
                        </tr>
                        <tr>
                            <td>Parking Violations</td>
                            <td>Rs. 1,000</td>
                        </tr>
                    </table>
                </div>
            </section>

            <!-- Left Side / Top: My Violations (Default Hidden) -->
            <section id="myViolationsSection" class="my-violations-section hidden">
                <h2>My Violations</h2>
                <table>
                    <tr>
                        <th>Traffic Violation</th>
                        <th>Fine Amount (NPR)</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td>Driving without a driving license</td>
                        <td>Rs. 100</td>
                        <td>
                            <a href="esewa_checkout.php" style="text-decoration: none;">
                                <button style="padding: 5px 10px; font-size: 14px; background-color: #4CAF50; width: auto;">Pay with eSewa</button>
                            </a>
                        </td>
                    </tr>
                </table>
            </section>
        </div>
    </main>

    <!-- Link to our external JavaScript file for interactive behavior -->
    <script src="script.js"></script>
</body>
</html>
