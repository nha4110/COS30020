<!DOCTYPE html> 
<head> 
    <meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
    <meta name="description" content="Web Application Development :: Lab 3" /> 
    <meta name="keywords" content="Web,programming" />
    <meta name="author" content="Lu Nhat Hoang - 105234956">
    <title>Using if and while statements</title> 
</head> 
<body> 
    <?php 
        include ("mathfunctions.php"); 
    ?> 
    <h1>Web Programming - Lab 3</h1> 
    <?php 
    if (isset ($_GET["U_num"])) { // check if form data exists 
        $num = $_GET["U_num"];  
        if ($num > 0) { // check positive
            if ($num == round($num)) {  
                echo "<p>", $num, "! is ", factorial($num), ".</p>"; 
            } else {    
                echo "<p>Please enter an integer.</p>"; 
            } 
        } else {    
            // number is not positive 
            echo "<p>Please enter a positive integer.</p>"; 
        } 
    } else {     
        // no input could use requied in form to skip this.
        echo "<p>Please enter a positive integer.</p>"; 
    } 
    ?> 
</body> 
</html>
