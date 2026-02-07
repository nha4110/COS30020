<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
    <meta name="description" content="Web Application Development :: Lab 6" /> 
    <meta name="keywords" content="Web,programming" />
    <meta name="author" content="Lu Nhat Hoang - 105234956">
    <title>Show Guest Book lab06 update</title> 
</head> 
<body> 
    <h1>Lab06 Task 2 - Guest Book</h1> 
    <form action = "guestbooksave.php" method ="post" > 
        <fieldset>
            <legend>Enter your details to sign our guest book</legend>
            <label for="User_Name">Name: </label>
            <input type="text" id="User_Name" name="Name"> <br> <br>
            <label for="User_Email">E-mail: </label> 
            <input type="text" id="User_Email" name="Email"> <br> <br>
            <input type="submit" value="Sign">
            <input type="reset" value="Reset Form">
        </fieldset>
    </form> 
    <a href="../lab06/guestbookshow.php">Show Guest Book</a>
</body> 
</html> 