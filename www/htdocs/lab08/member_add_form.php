<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Add Member</title>
</head>
<body>
    <h1>Add New VIP Member</h1>
    <form action="member_add.php" method="post">
        <p>First Name: <input type="text" name="fname" required /></p>
        <p>Last Name: <input type="text" name="lname" required /></p>
        <p>Gender: 
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