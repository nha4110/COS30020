<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
    <meta name="description" content="Web Application Development :: Lab 8" /> 
    <meta name="keywords" content="Web,programming" />
    <meta name="author" content="Lu Nhat Hoang - 105234956">
    <title>Display sql table</title> 
</head> 
<body> 
    <h1>Web Programming - Lab08</h1> 
    <?php
        require_once("settings.php");

        // 1. Open the connection
        $conn = @mysqli_connect($host, $user, $pswd, $dbnm);
        // 2. check if there a database
        if (!$conn) {
            echo "<p>Database connection failure: " . mysqli_connect_error() . "</p>";
        } else {
            $query = "SELECT car_id, make, model, price FROM cars";
            $queryResult = mysqli_query($conn, $query);

            if (!$queryResult) {
                echo "<p>Something went wrong with the query: " . mysqli_error($conn) . "</p>";
            } else {
                echo "<table border='1'>";
                echo "<tr><th>Car ID</th><th>Make</th><th>Model</th><th>Price</th></tr>";
                // Cleaner loop syntax
                while ($row = mysqli_fetch_row($queryResult)) {
                    echo "<tr>
                            <td>{$row[0]}</td>
                            <td>{$row[1]}</td>
                            <td>{$row[2]}</td>
                            <td>{$row[3]}</td>
                        </tr>";
                }
                echo "</table>";
                
                // Only free result if it was successful
                mysqli_free_result($queryResult);
            }
            mysqli_close($conn);
        }
    ?>
</body> 
</html> 