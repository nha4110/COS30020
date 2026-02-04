<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
    <meta name="description" content="Web Application Development :: Lab 4" /> 
    <meta name="keywords" content="Web,programming" />
    <meta name="author" content="Lu Nhat Hoang - 105234956">
    <title>Test String Input</title> 
</head> 
<body> 
    <h1>Lab 04 Task 2 - Perfect Palindrome</h1>
    <hr>
    <?php 
        // check for valid input
        if (!isset($_GET['String_Input'])) {
            echo "<p>invalid input</p>";
            exit;
        }
        $Input = $_GET['String_Input'];
        // check for white space
        $Raw_Input = trim($Input);
        if ($Raw_Input === '') {
            echo "<p>invalid input</p>";
            exit;
        }

        function Is_Palindrome($I) {
            // reverce the input and compare them
            if (strcmp($I,strrev($I))) {
                return false;
            }
            return true;
        }
        if (Is_Palindrome($Input)) {
            echo "<p>The text you entered: '" . htmlspecialchars($Input) . "' is a perfect palindrome!</p>";
        }
        else {
            echo "<p>The text you entered: '" . htmlspecialchars($Input) . "' is not a perfect palindrome!</p>";
        }
    ?>
</body> 
</html> 