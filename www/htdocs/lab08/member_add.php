<?php
    require_once("settings.php");

    $conn = @mysqli_connect($host, $user, $pswd, $dbnm);

    if (!$conn) {
        die("<p>Database connection failure</p>");
    }

    // Step 3: Create table if it doesn't exist
    $sql_create = "CREATE TABLE IF NOT EXISTS vipmembers (
        member_id INT AUTO_INCREMENT PRIMARY KEY,
        fname VARCHAR(40),
        lname VARCHAR(40),
        gender VARCHAR(1),
        email VARCHAR(40),
        phone VARCHAR(20)
    )";
    mysqli_query($conn, $sql_create);

    // Get data from form
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    // Insert data
    $sql_insert = "INSERT INTO vipmembers (fname, lname, gender, email, phone) 
                   VALUES ('$fname', '$lname', '$gender', '$email', '$phone')";
    
    $result = mysqli_query($conn, $sql_insert);

    if ($result) {
        echo "<p>Success! New member added.</p>";
    } else {
        echo "<p>Error: " . mysqli_error($conn) . "</p>";
    }

    mysqli_close($conn);
    echo "<p><a href='vip_member.php'>Back to Home</a></p>";
?>