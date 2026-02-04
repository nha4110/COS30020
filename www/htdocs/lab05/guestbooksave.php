<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Web Application Development :: Lab 5" />
    <meta name="keywords" content="Web,programming" />
    <meta name="author" content="Lu Nhat Hoang - 105234956">
    <title>Sign Guest Book</title>
</head>
<body>
    <h1>Lab05 Task 2 - Sign Guest Book</h1>

    <?php
        $page = "guestbookshow.php";

        // Check input
        if (!isset($_POST["First"]) || !isset($_POST["Last"])) {
            echo "<p>You must enter your first and last name! Use the browser's 'Go Back' button to return to the guestbook form.</p>";
            exit;
        }


        // Trim whitespace
        $First = trim($_POST["First"]);
        $Last  = trim($_POST["Last"]);

        // Check empty OR whitespace-only input
        if ($First === "" || $Last === "") {
            echo "<p>invalid input</p>";
            echo "<p>Use the browser's 'Go Back' button to return to the guestbook form.</p>";
            exit;
        }

        // Escape input (as required by spec)
        $First = addslashes($First);
        $Last  = addslashes($Last);

        // Set permissions and create directory if not exists
        umask(0007);
        $dir = "../../data/lab05";
        if (!is_dir($dir)) {
            mkdir($dir, 02770, true);
        }

        // File path
        $filename = "../../data/lab05/guestbook.txt";

        // Open file in append mode
        $handle = fopen($filename, "a");

        if ($handle) {
            $data = $First . ", " . $Last . "\n";
            if (fwrite($handle, $data)) {
                echo "<p>Thank you for signing the Guest Book!</p>";
            } else {
                echo "<p>Cannot add your name to the Guest Book.</p>";
            }
            fclose($handle);
        } else {
            echo "<p>Cannot open file for writing. Check permissions.</p>";
        }

        echo "<a href='$page'>Show Guest Book</a>";
    ?>

</body>
</html>
