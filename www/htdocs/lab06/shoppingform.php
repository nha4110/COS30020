<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
    <meta name="description" content="Web Application Development :: Lab 6" /> 
    <meta name="keywords" content="Web,programming" />
    <meta name="author" content="Lu Nhat Hoang - 105234956">
    <title>purchases item and amount</title> 
</head> 
<body> 
    <h1>Task 1 - Lab06 Shopping list</h1>
    <form action="shoppingsave.php" method="post">
        <label for="Item_Name">Enter the item you want to buy: </label>
        <input type="text" id="Item_Name" name="Item"> <br> <br>
        <label for="Quantity_Item">Enter the quantity of item: </label>
        <input type="text" id="Quantity_Item" name="Quantity"> <br> <br> 
        <input type="submit" value="Save">
    </form>
</body> 
</html> 