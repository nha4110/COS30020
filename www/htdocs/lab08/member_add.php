<?php
    // Check if the form was actually submitted
    if (isset($_POST["fname"])) {
        require_once("settings.php");

        $conn = @mysqli_connect($host, $user, $pswd, $dbnm);

        if (!$conn) {
            die("<p>Database connection failure: " . mysqli_connect_error() . "</p>");
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

        // Sanitize data
        $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
        $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
        $gender = isset($_POST["gender"]) ? mysqli_real_escape_string($conn, $_POST["gender"]) : "";

        // Double check that fields aren't just empty strings
        if ($fname == "" || $lname == "" || $email == "" || $phone == "") {
            echo "<p>Please fill out all required fields in the <a href='member_add_form.php'>form</a>.</p>";
        } else {
            // Insert data
            $sql_insert = "INSERT INTO vipmembers (fname, lname, gender, email, phone) 
                           VALUES ('$fname', '$lname', '$gender', '$email', '$phone')";
            
            $result = mysqli_query($conn, $sql_insert);

            if ($result) {
                echo "<h1>Success!</h1><p>New member added to the database.</p>";
            } else {
                echo "<h1>Error</h1><p>Something went wrong: " . mysqli_error($conn) . "</p>";
            }
        }

        mysqli_close($conn);
    } else {
        // This runs if they tried to access the file directly without the form
        echo "<h1>Direct Access Forbidden</h1>";
        echo "<p>Please use the <a href='member_add_form.php'>Add Member Form</a> to add records.</p>";
    }

    echo "<p><a href='vip_member.php'>Back to Home</a></p>";
?>