<!DOCTYPE html> 
<html lang="en" > 
<head> 
    <meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
    <meta name="description" content="Web Application Development :: Lab 4" /> 
    <meta name="keywords" content="Web,programming" />
    <meta name="author" content="Lu Nhat Hoang - 105234956">
    <title>Self Check Standard Palindrome</title> 
</head> 
<body> 
    <h1>Lab 04 Task 3 - Self Standard Palindrome</h1>
    <hr>
    <form action="standardpalindromeself.php" method="get">
        <p>
            <label for="Palindrome">String</label>
            <input type="text" id="Palindrome" name="Palindrome" required>
            <button type="submit">Check for Standard Palindrome</button>
        </p>
    </form>
    <hr>
     <?php 
        // check input
        if (!isset($_GET['Palindrome'])) {
            exit;
        }
        $Input = $_GET['Palindrome'];
        
        $Raw_Input = strtolower( str_replace( 
            array(" ", ",", ".", "'", "!", "?", ";", ":", "-", "_"), "", $Input 
        ) );
        // Check if its input is only white space space than remove
        if ($Raw_Input === '') {
            echo "<p>invalid input</p>";
            exit;
        }
        // function check for standard palindrome
        function Is_Standard_Palindrome($I) {
            if (strcmp($I,strrev($I))) {
                return false;
            }
            return true;
        }
        if (Is_Standard_Palindrome($Raw_Input)) {
            echo "<p>The text you entered: '" . htmlspecialchars($Input) . "' is a standard palindrome!</p>";
        }
        else {
            echo "<p>The text you entered: '" . htmlspecialchars($Input) . "' is not a standard palindrome!</p>";
        }
    
    ?>
</body> 
</html> 