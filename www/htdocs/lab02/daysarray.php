<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" > 
    <meta name="description" content="Web Programming :: Lab 2" > 
    <meta name="keywords" content="Web,programming" >
    <meta name="author" content="Lu Nhat Hoang - 105234956">
    <title>Days display</title>
</head>
<body>
    <!-- display days in english and french-->
     <?php
        $days = array ("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
        
        echo "<p>The days of the week in English are:</p>";
        // for loop to loop throught the array if statement to make sure the last one is a "."
        echo implode(", ", $days) . ".";
        // step 3 reassign the values of days
        $days = array ("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
        echo "<p>The days of the week in French are: </p>";
        echo implode(", ", $days) . ".";
     ?>
</body>
</html>