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
    <link rel="stylesheet" href="style.css?v=4">
</head>
<body class="background-class">
    <div id="about-container">
        <h1 id="about-title">About This Assignment</h1>

        <div id="about-content">
            <h2 class="about-section-header">Answers</h2>
            <ul id="about-list">
                <li class="about-list-item">
                    <strong class="highlight-text">PHP version installed:</strong> 
                    <?php echo phpversion(); ?>
                </li>
                <li class="about-list-item">
                    <strong class="highlight-text">Tasks not attempted:</strong> 
                    <p class="about-text">All tasks completed according to requirements.</p>
                </li>
                <li class="about-list-item">
                    <strong class="highlight-text">Special features:</strong> 
                    <p class="about-text">Implemented advanced search with a drop down button, date sorting, and a CSS theme across all pages.</p>
                </li>
            </ul>

            <h2 class="about-section-header">Discussion Board Participation</h2>
            <div id="discussion-box">
                <p class="about-text">
                    Below is the screenshot of my participation in the unit discussion board:
                </p>
                <img src="style/screenshot.png" id="discussion-image" alt="Discussion Board Screenshot">
            </div>
        </div>

        <div id="about-footer">
            <a href="index.php" id="about-home-link">Return to Home</a>
        </div>
    </div>
</body>