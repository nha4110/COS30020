<!DOCTYPE html>
<html lang="en">
<head><title>Search Member</title></head>
<body>
    <h1>Search for a Member</h1>
    <form action="member_search.php" method="post">
        Last Name: <input type="text" name="search_lname" />
        <input type="submit" value="Search" />
    </form>

<?php
    if (isset($_POST["search_lname"])) {
        require_once("settings.php");
        $conn = @mysqli_connect($host, $user, $pswd, $dbnm);
        $search = $_POST["search_lname"];

        $query = "SELECT member_id, fname, lname, email FROM vipmembers WHERE lname LIKE '%$search%'";
        $result = mysqli_query($conn, $query);

        echo "<h2>Search Results</h2>";
        echo "<table border='1'>
                <tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th></tr>";
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>{$row['member_id']}</td><td>{$row['fname']}</td><td>{$row['lname']}</td><td>{$row['email']}</td></tr>";
        }
        echo "</table>";
        mysqli_close($conn);
    }
?>
    <p><a href="vip_member.php">Back to Home</a></p>
</body>
</html>