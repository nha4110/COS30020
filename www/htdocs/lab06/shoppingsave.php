<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="utf-8" /> 
    <meta name="description" content="Web Application Development :: Lab 6" /> 
    <meta name="keywords" content="Web,programming" />
    <meta name="author" content="Lu Nhat Hoang - 105234956">
    <title>Purchases item and amount</title> 
</head> 
<body> 
<h1>Web Programming - Lab06</h1> 

<?php // read the comments for hints on how to answer each item 
    // check
    if (isset($_POST["Item"]) && isset($_POST["Quantity"])) {  // check if both form data exists   
        $item = $_POST["Item"];           
        $qty  = $_POST["Quantity"];           
        $filename = "../../data/shop.txt";      

        $alldata = array();            // create an empty array          

        if (file_exists($filename)) {                            
            $itemdata = array();                    
            $handle = fopen($filename, "r");          

            while (!feof($handle)) {              
                $onedata = fgets($handle);          
                if ($onedata != "") {               
                    $data = explode("," , trim($onedata));                    
                    $alldata[] = $data;      
                    $itemdata[] = $data[0];          
                }   
            } 
            fclose($handle);                       
            $newdata = !(in_array($item, $itemdata)); 
        } else { 
            $newdata = true;   // file does not exists, thus it must be a new data 
        } 

        if ($newdata) { 
            $handle = fopen($filename, "a");   
            $data = $item . "," . $qty . "\n"; 
            fwrite($handle, $data);            
            fclose($handle);                   
            $alldata[] = array($item, $qty);   // add data to array 
            echo "<p>Shopping item added</p>"; 
        } else { 
            echo "<p>Shopping item already exists</p>"; 
        } 

        usort($alldata, function($a, $b) { // sort array elements 
            return strcmp($a[0], $b[0]); 
        });

        echo "<p>Shopping List</p>"; 
        foreach ($alldata as $data) {            
            echo "<p>", $data[0], " -- ", $data[1], "</p>"; 
        }   
    } else {       
        echo "<p>Please enter item and quantity in the input form.</p>"; 
    } 
?> 

</body> 
</html>
