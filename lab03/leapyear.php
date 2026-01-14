<!DOCTYPE html> 
<html lang="en" lang="en" > 
<head> 
    <meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
    <meta name="description" content="Web Application Development :: Lab 3" /> 
    <meta name="keywords" content="Web,programming" />
    <meta name="author" content="Lu Nhat Hoang - 105234956">
    <title>leap year calculation</title> 
</head> 
<body> 
    <h1>Lab 03 Task 2 - Leap Year</h1>
    <?php
        function is_leapyear ($year) {
            return ($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0);
        }
        // leap year calculation 
        if (!isset ($_GET['leap_cal'])) {
            echo "<p>Please retry and enter a year in integer form.</p>";
            exit;
        }
        $y = $_GET['leap_cal'];
        if (!is_numeric($y) || $y <= 0) { // check if its a number
            echo "<p>Please retry and enter a year in integer form.</p>";
            exit;
        }
        if (is_leapyear($y)) {
            echo "<p>The year you entered $y is a leap year.</p>";
        }
        else {
            echo "<p>The year you entered $y is not a leap year.</p>";
        }        
    ?>
</body> 
</html> 