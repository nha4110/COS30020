<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="utf-8" /> 
    <meta name="description" content="Web application development" /> 
    <meta name="keywords" content="PHP" /> 
    <meta name="author"   content="Your Name" /> 
    <title>TITLE</title> 
</head> 
<body> 
    <h1>Web Programming - Lab08</h1> 
<?php
    require_once("settings.php");

    // 1. Open the connection
    $conn = @mysqli_connect($host, $user, $pswd, $dbnm)
        or die("<p>Connection failed: " . mysqli_connect_error() . "</p>");

    // 2. Set up SQL string and execute
    $query = "SELECT car_id, make, model, price FROM cars";
    $queryResult = mysqli_query($conn, $query);

    if (!$queryResult) {
        echo "<p>Something went wrong with the query: " . mysqli_error($conn) . "</p>";
    } else {
        // Display results in a table
        echo "<table border='1' width='100%'>";
        echo "<tr><th>Car ID</th><th>Make</th><th>Model</th><th>Price</th></tr>";

        $row = mysqli_fetch_row($queryResult);
        while ($row) {
            echo "<tr>";
            echo "<td>{$row[0]}</td>";
            echo "<td>{$row[1]}</td>";
            echo "<td>{$row[2]}</td>";
            echo "<td>{$row[3]}</td>";
            echo "</tr>";
            $row = mysqli_fetch_row($queryResult);
        }
        echo "</table>";
    }

    // 3. Close the connection
    mysqli_free_result($queryResult);
    mysqli_close($conn);
?>

</body> 
</html> 