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
    <h2>Sign Guestbook</h2>
    <hr>
    <?php
        $valid = true;

        // Check input
        if (!isset($_POST["Name"]) || !isset($_POST["Email"])) {
            echo "<p>You must enter your name and email! <br> Use the browser's 'Go Back' button to return to the guestbook form.</p>";
            $valid = false; // rather than using exit i use this to add the <hr> line at the bottom 
        }

        if ($valid) {
            // Trim whitespace
            $Name  = trim($_POST["Name"]);
            $Email = trim($_POST["Email"]);

            // Check empty OR whitespace-only input
            if ($Name === "" || $Email === "") {
                echo "<p>Invalid input</p>";
                echo "<p>Use the browser's 'Go Back' button to return to the guestbook form.</p>";
                $valid = false;
            }

            // Challenge: validate email format
            if ($valid && !filter_var($Email, FILTER_VALIDATE_EMAIL)) {
                echo "<p>Email address is not valid. Please go back and try again.</p>";
                $valid = false;
            }
        }

        if ($valid) {
            // Set permissions and create directory if not exists
            umask(0007);
            $dir = "../../data/lab06";
            if (!is_dir($dir)) {
                mkdir($dir, 02770, true);
            }

            // File path
            $filename = "../../data/lab06/guestbook.txt";
            $alldata  = array();
            $names    = array();
            $emails   = array();

            if (file_exists($filename)) {
                $handle = fopen($filename, "r");
                while (!feof($handle)) {
                    $onedata = fgets($handle);
                    if ($onedata != "") {
                        $data = explode(",", trim($onedata));
                        $alldata[] = $data;
                        $names[]   = $data[0];
                        $emails[]  = $data[1];
                    }
                }
                fclose($handle);

                // Prevent duplicate name or email
                $newdata = !(in_array($Name, $names) || in_array($Email, $emails));
            } else {
                $newdata = true;
            }

            if ($newdata) {
                // Open file in append mode
                $handle = fopen($filename, "a");
                $data   = $Name . "," . $Email . "\n";     
                fwrite($handle, $data);             
                fclose($handle);                   

                $alldata[] = array($Name, $Email);  

                echo "<p>Guest added to guestbook</p>";       
            } else {
                echo "<p>Name or Email already exists in guestbook</p>";
            }
        }
    ?>
    <hr>
    <a href="../lab06/guestbookform.php">Add Another Visitor</a> <br>
    <a href="../lab06/guestbookshow.php">View Guest Book</a>
</body>
</html>
