<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
    <meta name="description" content="Web Application Development :: Lab 5" /> 
    <meta name="keywords" content="Web,programming" />
    <meta name="author" content="Lu Nhat Hoang - 105234956">
    <title>Show Guest Book</title> 
</head> 
<body> 
    <h1>Lab05 Task 2 - Guest Book</h1> 
    <form action = "guestbooksave.php" method ="post" > 
        <fieldset>
            <legend>Enter your details to sign our guest book</legend>
            <label for="First_Name">First Name </label>
            <input type="text" id="First_Name" name="First"> <br> <br>
            <label for="Last_Name">Last Name </label> 
            <input type="text" id="Last_Name" name="Last"> <br> <br>
            <input type="submit" value="Save">
        </fieldset>
    </form> 
    <a href="../lab05/guestbookshow.php">Show Guest Book</a>
</body> 
</html> 