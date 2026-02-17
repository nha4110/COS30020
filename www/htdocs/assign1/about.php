<?php
// about.php

// Function to show error (if needed)
function Show_Error($Message) {
    echo "<h1>Error</h1>";
    echo "<p>$Message</p>";
    echo "<p><a href='index.php'>Return to Home</a></p>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="Web Application Development :: Assignment 1" />
    <meta name="keywords" content="Web,programming" />
    <meta name="author" content="Lu Nhat Hoang - 105234956">
    <title>About This Assignment</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>About This Assignment</h1>

    <h2>Answers</h2>
    <ul>
        <li>
            <strong>PHP version installed in Mercury:</strong> 
            <?php echo phpversion(); ?>
        </li>
        <li>
            <strong>Tasks not attempted or not completed:</strong> 
            <p>At this stage, all major tasks have been attempted. If any minor styling or optional features are incomplete, they will be noted here.</p>
        </li>
        <li>
            <strong>Special features attempted:</strong> 
            <p>Implemented advanced search with multiple criteria, date validation and sorting by closing date, and improved output formatting with labeled fields.</p>
        </li>
    </ul>

    <h2>Discussion Board Participation</h2>
    <p>
        <!-- Replace this with your screenshot or explanation -->
        <em>Screenshot of discussion participation goes here.</em>
    </p>
    <p>
        If no participation occurred, state your reason here (e.g., "Did not participate due to workload").
    </p>

    <p><a href="index.php">Return to Home</a></p>
</body>
</html>
