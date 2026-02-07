<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Web Application Development :: Lab 6" />
    <meta name="keywords" content="Web,programming" />
    <meta name="author" content="Lu Nhat Hoang - 105234956">
    <title>View Guest Book</title>
</head>
<body>
    <h1>Lab06 Task 2 - Guest Book</h1>
    <br>
    <?php
        $filename = "../../data/lab06/guestbook.txt";

        if (is_readable($filename)) {
            $alldata = array();

            // Read file into array
            $handle = fopen($filename, "r");
            while (!feof($handle)) {
                $line = fgets($handle);
                if ($line != "") {
                    $data = explode(",", trim($line));
                    $alldata[] = $data;
                }
            }
            fclose($handle);

            // Sort by Name (first column)
            usort($alldata, function($a, $b) {
                return strcmp($a[0], $b[0]);
            });

            // Display in table with numbering
            echo "<table border='1' cellpadding='5'>";
            echo "<tr><th>No.</th><th>Name</th><th>Email</th></tr>";

            $count = 1;
            foreach ($alldata as $entry) {
                echo "<tr>";
                echo "<td>" . $count . "</td>";
                echo "<td>" . htmlspecialchars($entry[0]) . "</td>";
                echo "<td>" . htmlspecialchars($entry[1]) . "</td>";
                echo "</tr>";
                $count++;
            }
            echo "</table>";


        } else {
            echo "<p>Guest book is empty or cannot be read.</p>";
        }
    ?>
    <a href="../lab06/guestbookform.php">Add Another Visitor</a>
</body>
</html>
