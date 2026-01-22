<!DOCTYPE html> 
<html lang="en" > 
<head> 
    <meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
    <meta name="description" content="Web Application Development :: Lab 3" /> 
    <meta name="keywords" content="Web,programming" />
    <meta name="author" content="Lu Nhat Hoang - 105234956">
    <title>prime number calculation</title> 
</head> 
<body> 
    <h1>Lab 03 Task 3 - Prime Number</h1>
    <?php 
        // prime number can only be divided by itself or by 1. 
        if (!isset($_GET['Pri_num'])) {
            echo "<p>Invalid input</p>";
            exit;
        }
        $prime = $_GET['Pri_num'];
        function is_prime($P) {
            // Don't have to check every number just have to check every integer below the squa root of the num 
            $count = floor(sqrt($P)); // floor to try to avoid floating point
            // Will be the number of loop and number of integer we need to divide
            for ($i = 2; $i <= $count ; $i++) {
                if ($P % $i == 0) {
                    return false;
                }
            }
            return true;
        }

        if (!is_numeric($prime)) {
            echo "<p>Invalid input</p>"; 
            exit; 
        }
        
        if ($prime < 1) {
            echo "<p>The number you enter $prime is not a prime number</p>"; 
            exit;
        }
        if (is_prime($prime) || $prime == 1) {
            echo "<p>The number you enter $prime is a prime number</p>";
        } else {
            echo "<p>The number you enter $prime is not a prime number</p>";
        }        
    ?>    
</body> 
</html> 