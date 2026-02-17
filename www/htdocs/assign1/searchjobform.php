<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
    <meta name="description" content="Web Application Development :: Assignment 1" /> 
    <meta name="keywords" content="Web,programming" />
    <meta name="author" content="Lu Nhat Hoang - 105234956">
    <title>Search Form</title> 
    <link rel="stylesheet" href="style/style.css">
</head> 
<body> 
    <div>
        <h1>Job Vacancy Posting System</h1>
        <form action="searchjobprocess.php" method="get">
            <div>
                <label for="Job_Title">job Title: </label>
                <input type="text" id="Job_Title" name="Title">
            </div>
            <details>
                <summary>Advanced search</summary>
                <div>
                    <p>Position</p>
                    <input type="radio" id="Full_Time" name="Position" value="Full Time"> 
                    <label for="Full_Time">Full Time</label>
                    <input type="radio" id="Part_Time" name="Position" value="Part Time"> 
                    <label for="Part_Time">Part Time</label>
                </div>
                <div>
                    <p>Contract</p>
                    <input type="radio" id="On_Going" name="Contract" value="On-going"> 
                    <label for="On_Going">On-Going</label>
                    <input type="radio" id="Fixed_Term" name="Contract" value="Fixed Term"> 
                    <label for="Fixed_Term">Fixed Term</label>
                </div>
                <div>
                    <p>Accept Application</p>
                    <input type="checkbox" id="Accept_Post" name="Application[]" value="Post"> 
                    <label for="Accept_Post">Post</label>
                    <input type="checkbox" id="Accept_Email" name="Application[]" value="Email"> 
                    <label for="Accept_Email">Email</label>
                </div>
                <div>
                    <p>Location</p>
                    <input type="radio" id="On_Site" name="Location" value="On site"> 
                    <label for="On_Site">On Site</label>
                    <input type="radio" id="Remote" name="Location" value="Remote"> 
                    <label for="Remote">Remote</label>
                </div>
            </details>
            <input type="reset" value="reset">
            <input type="submit" value="Search">
        </form>
        <p><a href="index.php">Return home</a></p>
    </div>
</body> 
</html>
