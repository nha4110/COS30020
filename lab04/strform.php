<!DOCTYPE html> 
<html lang="en"> 
<head> 
<meta charset="utf-8" /> 
<meta name="description" content="Web application development" /> 
<meta name="keywords" content="PHP" /> 
<meta name="author"   content="Your Name" /> 
<title>String Form</title> 
</head> 
<body> 
<h1>Web Programming Form - Lab 4</h1> 

<form action="strprocess.php" method="post"> <!-- (7) and (8) -->
  <p>
    <label for="inputstr">Enter a string: </label> <!-- (9) -->
    <input type="text" id="inputstr" name="inputstr" /> <!-- (10) -->
  </p>
  <p>
    <input type="submit" value="Submit" />
    <input type="reset" value="Reset" />
  </p>
</form> 

</body> 
</html>
