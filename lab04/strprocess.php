<!DOCTYPE html> 
<html lang="en"> 
<head> 
  <meta charset="utf-8" /> 
  <meta name="description" content="Web application development" /> 
  <meta name="keywords" content="PHP" /> 
  <meta name="author"   content="Your Name" /> 
  <title>String Processing</title> 
</head> 
<body> 
<h1>Web Programming - Lab 4</h1> 
<?php  
  if (isset ($_POST["inputstr"])){ // (1) check if form data exists 
    $str = $_POST["inputstr"];    // (2) obtain the form data 
    $pattern = "/^[A-Za-z ]+$/";  // set regular expression pattern 
    if (preg_match($pattern, $str)) {  // (3) check if $str matches regex 
      $ans = "";                  // initialise variable for the answer 
      $len = strlen($str);        // (4) obtain length of string $str 
      for ($i = 0; $i < $len; $i++) {  // checks all characters in $str 
        $letter = substr($str, $i, 1);   // (5) extract 1 char using substr  
        // check using strpos 
        if ((strpos("AEIOUaeiou", $letter)) === false){  // (6) check if not vowel
          $ans = $ans . $letter;   // concatenate letter to answer 
        } 
      } 
      // generate answer after all letters are checked 
      echo "<p>The word with no vowels is ", $ans, ".</p>"; 
    } else {    // string contains invalid characters 
      echo "<p>Please enter a string containing only letters or space.</p>"; 
    } 
  } else {     // no input 
    echo "<p>Please enter string from the input form.</p>"; 
  } 
?> 
</body> 
</html>
