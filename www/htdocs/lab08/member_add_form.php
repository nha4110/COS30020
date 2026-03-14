<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
    <meta name="description" content="Web Application Development :: Lab 8" /> 
    <meta name="keywords" content="Web,programming" />
    <meta name="author" content="Lu Nhat Hoang - 105234956">
    <title>Add new vip member</title> 
</head>
<body>
    <h1>Add New VIP Member</h1>
    <form action="member_add.php" method="post">
        <p>First Name: <input type="text" name="fname" required /></p>
        <p>Last Name: <input type="text" name="lname" required /></p>
        <p>Gender: </p>
        <p>
            <input type="radio" name="gender" value="M" /> M
            <input type="radio" name="gender" value="F" /> F
        </p>
        <p>Email: <input type="email" name="email" required /></p>
        <p>Phone: <input type="text" name="phone" required /></p>
        <input type="submit" value="Register Member" />
    </form>
    <p><a href="vip_member.php">Back to Home</a></p>
</body>
</html>