<?php
    require_once("settings.php");
    $conn = @mysqli_connect($host, $user, $pswd, $dbnm);

    if ($conn) {
        $query = "SELECT member_id, fname, lname FROM vipmembers";
        $result = mysqli_query($conn, $query);

        echo "<h1>All VIP Members</h1>";
        echo "<table border='1'>
                <tr><th>ID</th><th>First Name</th><th>Last Name</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>{$row['member_id']}</td><td>{$row['fname']}</td><td>{$row['lname']}</td></tr>";
        }
        echo "</table>";
        mysqli_close($conn);
    }
    echo "<p><a href='vip_member.php'>Back to Home</a></p>";
?>