<?php 
    function factorial ($n) { // declare the factorial function 
        $result = 1;  
        // declare and initialise the result variable 
        $factor = $n;  
        while ($factor > 1) { 
        // declare and initialise the factor variable 
        // loop to multiple all factors until 1 
        $result = $result * $factor; 
        $factor--;  
        // next factor 
        }    
        return $result; 
    } 
?>
