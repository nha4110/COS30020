<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Web Application Development :: Lab 5" />
    <meta name="keywords" content="Web,programming" />
    <meta name="author" content="Lu Nhat Hoang - 105234956">
    <title>Show Guest Book</title>
</head>
<body>
    <h1>Lab05 Task 2 - Guest Book</h1>

    <?php
        $filename = "../../data/lab05/guestbook.txt";

        if (is_readable($filename)) {
            echo "<pre>";
            $content = file_get_contents($filename);
            echo stripslashes($content);
            echo "</pre>";
        } else {
            echo "<p>Guest book is empty or cannot be read.</p>";
        }
    ?>

</body>
</html>
