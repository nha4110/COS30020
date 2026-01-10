<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="web development">
    <meta name="keyword" content="HTML, CSS, JavaScript">
    <meta name="author" content="Lu Nhat Hoang - 105234956">
    <title>My Second PHP webpage</title>
</head>
<body>
    <h1>Use of PHP built-in functions</h1> 

    <?php
    /* Use of abs() and pow() built in functions, and echo statement. 
       abs make sure the number even if it's negative will output posi EX: -4 output: 4
       pow X^power
    */
    echo "<p>Absolute value of -9 is: " . abs(-9) . ".</p>";
    echo "<p>2 to the power of 5 is: " . pow(2,5) . ".</p>";
    ?>

    <?php
    /* Use of decbin() and bindec() functions. 
       convert from bit to number
       convert from number to bit
    */
    echo "<p>Decimal equivalent of 1101 is: " . bindec(1101) . ".</p>";
    echo "<p>Binary equivalent of 14 is: " . decbin(14) . ".</p>";
    ?>
</body>
</html>
