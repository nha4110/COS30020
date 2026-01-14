<!DOCTYPE html> 
<html lang="en" lang="en" > 
<head> 
    <meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
    <meta name="description" content="Web Application Development :: Lab 3" /> 
    <meta name="keywords" content="Web,programming" /> 
    <title>leap year calculation</title> 
</head> 
<body> 
    <?php 
        // leap year calculation 
        if (isset ($_GET["leap_cal"])) {
            $y = $_GET["leap_cal"];
            if (is_numeric($y)) { // check if its a number
                if ($y % 4 == 0 && $y % 100 == 0 && $y % 400 == 0 ) {
                    echo "<p>The year you entered $y is a leap year.</p>";
                }
                else {
                    echo "<p>The year you entered $y is not a leap year.</p>";
                }
            }
            else {
                echo "<p>Please retry and enter a year in integer form.</p>";
            }
        } 
    ?>
    
</body> 
</html> 