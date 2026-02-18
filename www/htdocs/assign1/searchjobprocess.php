<?php 
    // Function block
    // Error handle
    function Show_Error($Message) { // output error message
        echo '<div id="search-process-error-container">';

        echo '<h1 id="search-process-error-title">Error</h1>';
        echo "<p id='search-process-error-message'>$Message</p>";

        echo '<div id="search-process-error-links">';
        echo '<a id="search-process-error-home" href="index.php">Return to Home</a> | ';
        echo '<a id="search-process-error-search" href="searchjobform.php">Return to search</a>';
        echo '</div>';
        echo '</div>';
        exit;
    }

    // read file
    function read_positions($filename) {
        $Records = array();
        $file = fopen($filename, "r");
        if ($file) {
            while (!feof($file)) {
                $line = trim(fgets($file));
                if ($line != "") {
                    // Split each line into fields by tab
                    $fields = explode("\t", $line);

                    // Trim whitespace from each field
                    $fields = array_map('trim', $fields);

                    // Ensure at least 9 fields exist (pad missing ones)
                    while (count($fields) < 9) {
                        $fields[] = "";
                    }

                    // Store the array of fields instead of raw line
                    $Records[] = $fields;
                }
            }
            fclose($file);
        }
        return $Records;
    }

    // Output message
    function Show_Output($Match) {
        if (count($Match) == 0) {
            Show_Error("No Result Found");
        }

        echo "<h2 id='search-process-success-title'>Search Results</h2>";
        echo "<div id='search-process-details'>";

        foreach ($Match as $job) {
            echo "<div class='search-process-card'>";
            echo "<p><strong>Position ID:</strong> {$job[0]}</p>";
            echo "<p><strong>Title:</strong> {$job[1]}</p>";
            echo "<p><strong>Description:</strong> {$job[2]}</p>";
            echo "<p><strong>Closing Date:</strong> {$job[3]}</p>";
            echo "<p><strong>Position:</strong> {$job[4]}</p>";
            echo "<p><strong>Contract:</strong> {$job[5]}</p>";
            echo "<p><strong>Location:</strong> {$job[6]}</p>";
            echo "<p><strong>Application:</strong> {$job[7]} {$job[8]}</p>";
            echo "</div>";
        }

        echo "</div>";
        echo "<div id='search-process-links'>
                <a id='search-process-home' href='index.php'>Home</a> |
                <a id='search-process-search' href='searchjobform.php'>Search Again</a>
            </div>";
    }
?>
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
    <meta name="description" content="Web Application Development :: Assignment 1" /> 
    <meta name="keywords" content="Web,programming" />
    <meta name="author" content="Lu Nhat Hoang - 105234956">
    <title>Search process</title> 
    <link rel="stylesheet" href="style.css?v=4">
</head> 
<body class="background-class"> 
    <?php  
    // req 1: check if title exits in txt if not return error
    $Title = trim($_GET["Title"] ?? "");
    // Advanced search
    $Position = trim($_GET["Position"] ?? "");
    $Contract = trim($_GET["Contract"] ?? "");
    $Applications = $_GET["Application"] ?? [];
    $Location = trim($_GET["Location"] ?? "");

    $filename = "../../data/jobs/positions.txt";
    
    // Check if title exits
    if ($Title === '') {
        Show_Error("Please enter a valid title");
    }

    // Check if file txt exits
    if (!file_exists($filename)) {
        Show_Error("There are no job vacancies in the system.");
    }

    // req 2 + req 3: search match charactor not whole string, if found much be listed + link to return home
    $Records = read_positions($filename); 
    $Match = []; 
    foreach ($Records as $fields) {
        $ok = true; 

        // Title (must match) 
        if (!empty($Title) && stripos($fields[1], $Title) === false) {
            $ok = false; 
        } 

        // Position 
        if (!empty($Position) && strcasecmp($fields[4], $Position) !== 0) { 
            $ok = false; 
        } 

        // Contract 
        if (!empty($Contract) && strcasecmp($fields[5], $Contract) !== 0) { 
            $ok = false; 
        } 

        // Location 
        if (!empty($Location) && strcasecmp($fields[6], $Location) !== 0) { 
            $ok = false; 
        } 

        // Application type 
        if (!empty($Applications)) { 
            $appsLower = array_map('strtolower', $Applications); 
            $field7 = strtolower($fields[7]);
            $field8 = strtolower($fields[8]);
            if (!in_array($field7, $appsLower) && !in_array($field8, $appsLower)) {
                $ok = false; 
            } 
        }

        if ($ok) { 
            $Match[] = $fields; 
        } 
    }

    // Task 8: sort by closing date (field[3])
    usort($Match, function($a, $b) {
        $dateA = DateTime::createFromFormat('d/m/y', $a[3]);
        $dateB = DateTime::createFromFormat('d/m/y', $b[3]);
        return $dateB <=> $dateA; // descending
    });

    // Filter out past dates
    $today = new DateTime();
    $Match = array_filter($Match, function($fields) use ($today) {
        $date = DateTime::createFromFormat('d/m/y', $fields[3]);
        return $date >= $today;
    });

    // req 4: if error found or not output link to go home and back to seach
    Show_Output($Match);
    ?>
    <div class="index-footer">
        <footer>
            <p>&copy; COS30020 — Job Vacancy Posting System | Developed in 2026</p>
        </footer>
    </div>
</body> 
</html>
