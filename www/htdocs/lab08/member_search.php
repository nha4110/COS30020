<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
    <meta name="description" content="Web Application Development :: Lab 8" /> 
    <meta name="keywords" content="Web,programming" />
    <meta name="author" content="Lu Nhat Hoang - 105234956">
    <title>Search form</title> 
</head>
<body>
    <h1>Search for a Member</h1>
    <form action="member_search.php" method="post">
        <p>Last Name: <input type="text" name="search_lname" required />
        <input type="submit" value="Search" /></p>
    </form>

<?php
    // check if exits in the database
    if (isset($_POST["search_lname"]) && !empty($_POST["search_lname"])) {
        require_once("settings.php");
        $conn = @mysqli_connect($host, $user, $pswd, $dbnm);

        if (!$conn) {
            echo "<p>Connection failed.</p>";
        } else {
            $search = mysqli_real_escape_string($conn, $_POST["search_lname"]);
            $query = "SELECT member_id, fname, lname, email FROM vipmembers WHERE lname LIKE '%$search%'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                echo "<h2>Search Results</h2>";
                echo "<table border='1'>
                        <tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th></tr>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$row['member_id']}</td>
                            <td>{$row['fname']}</td>
                            <td>{$row['lname']}</td>
                            <td>{$row['email']}</td>
                          </tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No members found with that last name.</p>";
            }
            mysqli_close($conn);
        }
    }
?>
    <p><a href="vip_member.php">Back to Home</a></p>
</body>
</html>