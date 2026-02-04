<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
    <meta name="description" content="Web Application Development :: Lab 5" /> 
    <meta name="keywords" content="Web,programming" />
    <meta name="author" content="Lu Nhat Hoang - 105234956">
    <title>shopping form</title> 
</head> 
<body> 
    <h1>Web Programming - Lab 5</h1> 
    <?php // read the comments for hints on how to answer each item Item_Name Amount_Item
        if (isset($_POST['Item']) && isset($_POST['Quantity'])) {      
        // check if both form data exists 
        $item = $_POST["Item"];    
        $qty  = $_POST["Quantity"];    
        // obtain the form item data 
        // obtain the form quantity data  

        // ✅ Task 1 requires shop.txt directly in data/
        $filename = "../../data/shop.txt"; // assumes php file is inside lab05 

        $handle = fopen($filename, "a"); // open the file in append mode 
        if ($handle) {
            $data = $item . "," . $qty . "\n";      // concatenate item and qty delimited by comma 
            fwrite ($handle, $data);     
            fclose($handle);       
        } else {
            echo "<p>Cannot open file for writing. Check permissions.</p>";
        }

        echo "<p>Shopping List</p> ";    
        // write string to text file 
        // close the text file 
        // generate shopping list 

        $handle = fopen($filename, "r"); // open the file in read mode 
        if ($handle) {
            while (! feof($handle)) {    // loop while not end of file 
                $data = fgets($handle);       // read a line from the text file 
                if (trim($data) !== "") {
                    echo "<p>", htmlspecialchars($data), "</p>";    
                }
            } 
            fclose($handle);       
        } else {
            echo "<p>Cannot open file for reading.</p>";
        }

        } else {        
        // generate HTML output of the data 
        // close the text file 
        // no input 
        echo "<p>Please enter item and quantity in the input form.</p>"; 
        } 
    ?> 
</body> 
</html>
