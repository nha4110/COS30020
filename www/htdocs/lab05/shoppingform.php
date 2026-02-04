<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
    <meta name="description" content="Web Application Development :: Lab 5" /> 
    <meta name="keywords" content="Web,programming" />
    <meta name="author" content="Lu Nhat Hoang - 105234956">
    <title>Shopping form</title> 
</head> 
<body> 
    <h1>Web Programming Form - Lab 5</h1> 
    <form action = "shoppingsave.php" method ="post" > 
        <label for="Item_Name">Enter your item name: </label>
        <input type="text" id="Item_Name" name="Item">
        <label for="Quantity">Your amount of item: </label>
        <input type="text" id="Quantity" name="Quantity">
        <input type="submit" value="Save">
    </form> 
</body> 
</html> 