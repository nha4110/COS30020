<?php 
    // function
    // Error message
    function Show_Error($Message) { // output error message
        echo '<div id="process-error">';

        echo '<h1 id="process-error-title">Error</h1>';
        echo "<p id=\"process-error-message\">$Message</p>";

        echo '<div id="process-error-links">';
        echo '<a href="index.php">Return to Home</a> | ';
        echo '<a href="postjobform.php">Return to form</a>';
        echo '</div>';
        echo '</div>';
        exit;
    } 
    // success message
    function Show_Success($PositionID, $Title, $Description, $Date, $Position, $Contract, $Location, $Applications) { // output final stored position
        echo '<div id="process-success">';

        echo '<h2 id="process-success-title">Job Vacancy Saved Successfully</h2>';

        echo '<div id="process-success-details">';
        echo "<p id=\"success-id\"><strong>Position ID:</strong> $PositionID</p>";
        echo "<p id=\"success-title\"><strong>Title:</strong> $Title</p>";
        echo "<p id=\"success-description\"><strong>Description:</strong> $Description</p>";
        echo "<p id=\"success-date\"><strong>Closing Date:</strong> $Date</p>";
        echo "<p id=\"success-position\"><strong>Position:</strong> $Position</p>";
        echo "<p id=\"success-contract\"><strong>Contract:</strong> $Contract</p>";
        echo "<p id=\"success-location\"><strong>Location:</strong> $Location</p>";
        echo "<p id=\"success-applications\"><strong>Applications Accepted:</strong> " . implode(", ", $Applications) . "</p>";
        echo '</div>';

        echo '<div id="process-success-links">';
        echo '<a href="index.php">Return to Home</a>';
        echo '</div>';

        echo '</div>';
    }
?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
    <meta name="description" content="Web Application Development :: Assignment 1" /> 
    <meta name="keywords" content="Web,programming" />
    <meta name="author" content="Lu Nhat Hoang - 105234956">
    <title>Job Form</title> 
    <link rel="stylesheet" href="style.css?v=4">
</head> 
<body class="background-class">
    <?php  
    // get data and check for null
    // i switch from isset to ?? to help prevent undefine error
    $PositionID = $_POST["ID"] ?? ''; 
    $Title = $_POST["Title"] ?? '';
    $Description = $_POST["Description"] ?? '';
    $Date = $_POST["Date"] ?? '';
    $Position = $_POST["Position"] ?? ""; 
    $Contract = $_POST["Contract"] ?? "";
    $Location = $_POST["Location"] ?? "";
    $Applications = $_POST['Application'] ?? [];


    // Req 1: a) all fields are mandatory making sure an error message is output
    if (
        trim($PositionID) === '' ||
        trim($Title) === '' ||
        trim($Description) === '' ||
        trim($Date) === '' ||
        trim($Position) === '' ||
        trim($Contract) === '' ||
        trim($Location) === '' ||
        empty($Applications)
    ) {
        Show_Error("All Required fields much be fill");
    }
    // Req 1: b) date validated
    if (!preg_match('/^(\d{2})\/(\d{2})\/(\d{2})$/', $Date, $matches)) {
        Show_Error("Date must be in dd/mm/yy format.");
    }

    $day   = (int)$matches[1];
    $month = (int)$matches[2];
    $year  = (int)$matches[3] + 2000; // convert yy → yyyy

    // year must be 2020 or later
    if ($year < 2020) {
        Show_Error("Year must be 2020 or later.");
    }

    // check real calendar date (handles 30/31/FEB/leap year correctly)
    if (!checkdate($month, $day, $year)) {
        Show_Error("Invalid calendar date.");
    }
    // Req 1: c) position id format double check
    if (!preg_match('/^ID\d{3}$/', $PositionID)) {
        Show_Error("Position ID must start with 'ID' followed by 3 digits."); 
    }
    // Req 2: Created if not exit jobs folder + positions.txt
    umask(0007);
    $dir = "../../data/jobs";
    if (!is_dir($dir)) {
        mkdir($dir,02770, true);
    }
    // making the txt
    $file = $dir . "/positions.txt";
    // check for uniqueness ID in the file
    if (file_exists($file)) {
        $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            $fields = explode("\t", $line);
            if ($fields[0] === $PositionID) {
                Show_Error("The Positive ID already exists. Please try with another ID.");
            }
        }
    }
    // Req 3: Save the record position
    // Connvert array to variable
    $ByPost = in_array("Post", $Applications) ? "Post" : "";
    $ByEmail = in_array("Email", $Applications) ? "Email" : "";

    $Record = implode("\t", [
        $PositionID,
        $Title,
        $Description,
        $Date,
        $Position,
        $Contract,
        $Location,
        $ByPost,
        $ByEmail
    ]);

    file_put_contents($file, $Record . PHP_EOL, FILE_APPEND); // add record

    // req 4: show sucess message
    Show_Success(
        $PositionID,
        $Title,
        $Description,
        $Date,
        $Position,
        $Contract,
        $Location,
        $Applications
    );
    ?>
</body>
</html>