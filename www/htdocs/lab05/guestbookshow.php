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
            $content = file_get_contents($filename); // extra challenge file_get_contents() function, explode()
            $names = explode("\n", $content); 
            $names = array_filter(array_map('stripslashes', $names)); 
            echo "<pre>" . implode(", ", $names) . "</pre>"; 
        }
        else {
            echo "<p>Guest book is empty or cannot be read.</p>"; 
        } 
    ?>
    <a href="../lab05/guestbookform.php">Add Another guestbook</a>

</body>
</html>
