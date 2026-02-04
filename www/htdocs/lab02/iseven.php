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
        echo "<h1>Example check 1 hard code variable</h1>";
        $a = 2;
        $message = is_numeric($a)
            ? ((round($a) % 2 == 0)
            ? "The value " . round($a) . " is even." : "The value " . round($a) . " is odd.") 
            : "The value is not a number.";
        echo "<p>$message</p>";

        // variable from form.html
        echo "<h1>Your value output: </h1>";
        if (isset($_GET['Variable_Text'])){
            $z = $_GET['Variable_Text'];
            $message = is_numeric($z)
                ? ((round($z) % 2 == 0)
                ? "The variable " . round($z) . " is an even number." 
                : "The variable " . round($z) . " is a number but it is odd.")
                : "The variable $z is not a number.";
            echo "<p>$message</p>";
        }
        else {
            echo "No input";
        }
    ?>
</body>
</html>