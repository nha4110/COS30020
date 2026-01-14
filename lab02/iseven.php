<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" > 
    <meta name="description" content="Web Programming :: Lab 2" > 
    <meta name="keywords" content="Web,programming" > 
    <meta name="author" content="Lu Nhat Hoang - 105234956">
    <title>Check if number and if it's even or not</title>
</head>
<body>
    <?php
        // 1 variable
        echo "<h1>Check 1 hard code variable</h1>";
        $a = 2;
        // check if its a number
        if (!is_numeric($a)) {
            echo "<p>The variable <b>$a</b> is not a number.</p>";
        } 
        elseif (round($a) % 2 != 0) { // use % instead of / because we just need the remainder
                echo "<p>The variable <b>$a</b> is an number. But it is odd</p>";
        } 
        else {
                echo "<p>The variable <b>$a</b> is an even number.</p>";
        }
        // check its even 
        // Check array variable for even number
        echo "<h1>Check an array of variable</h1>";
        $values = array(2, "12", "two", 17, 8);
        for ($x = 0; $x < count($values); $x++) {
            if (!is_numeric($values[$x])) {
                echo "<p>The variable <b>{$values[$x]}</b> is not a number.</p>";
            }
            elseif (round($values[$x]) % 2 != 0) {
                echo "<p>The variable <b>{$values[$x]}</b> contains an number. But it is odd</p>";
            }
            else {
                echo "<p>The variable <b>{$values[$x]}</b> contains an even number.</p>";
            }
        }
        // variable from form.html
        if (isset($_GET['Variable_Text'])){
            $z = $_GET['Variable_Text'];
            // check if its a number
            echo "<h1>Your variable output:</h1>";
            if (!is_numeric($z)) {
                echo "<p>The variable <b>$z</b> is not a number.</p>";
            } 
            elseif (round($z) % 2 != 0) {
                    echo "<p>The variable <b>$z</b> is an number. But it is odd</p>";
            } 
            else {
                    echo "<p>The variable <b>$z</b> is an even number.</p>";
            }
        }
    ?>
</body>
</html>