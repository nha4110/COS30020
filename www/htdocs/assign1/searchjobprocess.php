<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
    <meta name="description" content="Web Application Development :: Assignment 1" /> 
    <meta name="keywords" content="Web,programming" />
    <meta name="author" content="Lu Nhat Hoang - 105234956">
    <title>Search process</title> 
    <link rel="stylesheet" href="style/style.css">
</head> 
<body> 
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
            while(!feof($file)) {
                $line = trim(fgets($file));
                if ($line != "") {
                    $Records[] = $line;
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
            echo "<div class='search-process-card'><p class='search-process-job'>$job</p></div>";
        }

        echo "</div>";
        echo "<div id='search-process-links'>
                <a id='search-process-home' href='index.php'>Home</a> |
                <a id='search-process-search' href='searchjobform.php'>Search Again</a>
            </div>";
    }
    // req 1: check if title exits in txt if not return error
    $Title = $_GET["Title"] ?? "";
    $filename = "../../data/jobs/positions.txt";
    // Check if title exits
    if (trim($Title) === '') {
        Show_Error("Please enter a valid title");
    }
    // Check if file txt exits
    if (!file_exists($filename)) {
        Show_Error("There are no job vacancies in the system.");
    }
    // req 2 + req 3: search match charactor not whole string, if found much be listed + link to return home
    $Records = read_positions($filename);
    $Match = array();
    foreach ($Records as $Record) {
        if (stripos($Record, $Title) !== false) {
            $Match[] = $Record; // write every record found into 1 array
        }
    }
    // req 4: if error found or not output link to go home and back to seach
    Show_Output($Match);
    ?>
</body> 
</html>
