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
        // Check input
        if (!isset($_POST["Name"]) || !isset($_POST["Email"])) {
            echo "<p>You must enter your name and email! Use the browser's 'Go Back' button to return to the guestbook form.</p>";
            exit;
        }

        // Trim whitespace
        $Name = trim($_POST["Name"]);
        $Email = trim($_POST["Email"]);

        // Check empty OR whitespace-only input
        if ($Name === "" || $Email === "") {
            echo "<p>Invalid input</p>";
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
            while (!feof($handle)) {
                $onedata = fgets($handle);
                if ($onedata != "") {
                    $data = explode(",", trim($onedata));
                    $alldata[] = $data;
                    // store both name and email for duplicate check
                    $itemdata[] = $data[0];
                    $itemdata[] = $data[1];
                }
            }
            fclose($handle);
            $newdata = !(in_array($Name, $itemdata) || in_array($Email, $itemdata));
        } else {
            $newdata = true;
        }

        if ($newdata) {
            // Open file in append mode
            $handle = fopen($filename, "a");
            $data = $Name . "," . $Email . "\n";     
            fputs($handle, $data);             
            fclose($handle);                   

            $alldata[] = array($Name, $Email);  

            echo "<p>Guest added to guestbook</p>";       
        } else {
            echo "<p>Name or Email already exists in guestbook</p>";
        }
    ?>
</body>
</html>
