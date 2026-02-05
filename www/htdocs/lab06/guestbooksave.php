<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Web Application Development :: Lab 6" />
    <meta name="keywords" content="Web,programming" />
    <meta name="author" content="Lu Nhat Hoang - 105234956">
    <title>Sign Guest Book update</title>
</head>
<body>
    <h1>Lab06 Task 2 - Sign Guest Book</h1>

    <?php
        $page = "guestbookshow.php";

        // Check input
        if (!isset($_POST["Name"]) || !isset($_POST["Email"])) {
            echo "<p>You must enter your first and last name! Use the browser's 'Go Back' button to return to the guestbook form.</p>";
            exit;
        }


        // Trim whitespace
        $Name = trim($_POST["Name"]);
        $Email  = trim($_POST["Email"]);

        // Check empty OR whitespace-only input
        if ($Name === "" || $Email === "") {
            echo "<p>invalid input</p>";
            echo "<p>Use the browser's 'Go Back' button to return to the guestbook form.</p>";
            exit;
        }



        // Set permissions and create directory if not exists
        umask(0007);
        $dir = "../../data/lab06";
        if (!is_dir($dir)) {
            mkdir($dir, 02770, true);
        }

        // File path
        $filename = "../../data/lab06/guestbook.txt";

        $alldata = array();



        if (file_exists($filename)) {
            $itemdata = array();
            $handle = fopen($filename, "r");
            while (! feof($handle)) {
                $onedata = fgets($handle);
                if ($onedata != "") {
                    $data = explode("," , trim($onedata));
                    $alldata [] = $data;
                    $itemdata[] = $data [0];
                }
            }
            fclose($handle);
            $newdata = !(in_array($item, $itemdata));
        }
        else {
            $newdata = true;
        }


        if ($newdata) {
            // Open file in append mode
            $handle = fopen($filename, "a");
            $data = $Name . ", " . $Email . "\n";     
            fputs($handle, $data);             // write string to text file 
            fclose($handle);                   // close the text file 

            $alldata [] = array($item, $qty);  // add data to array 

            echo "<p>Shopping item added</p>";       
        }
        else {
            echo "<p>Cannot open file for writing. Check permissions.</p>";
        }


    ?>

</body>
</html>
