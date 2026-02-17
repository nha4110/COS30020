<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
    <meta name="description" content="Web Application Development :: Assignment 1" /> 
    <meta name="keywords" content="Web,programming" />
    <meta name="author" content="Lu Nhat Hoang - 105234956">
    <title>Job Form</title> 
    <link rel="stylesheet" href="style.css">
</head> 
<body> 
    <?php
        // Get current server date
        $today = date('d/m/y');
    ?>
    <!-- Main container -->
    <div id="form-container">
        <h1 id="form-title">Job Vacancy Form</h1>
        <form id="job-form" action="postjobprocess.php" method="post">
            <fieldset id="form-fieldset">
                <legend id="form-legend">Job vacancy</legend>

                <div id="position-id">
                    <label for="Position_ID">Position ID</label>
                    <input type="text" id="Position_ID" name="ID"
                           maxlength="5" 
                           pattern="^ID[0-9]{3}$"
                           title="Position ID must be ID followed by 3 digits"
                           required>
                </div>

                <div id="job-title">
                    <label for="Job_Title">Title</label>
                    <input type="text" id="Job_Title" name="Title"
                           pattern="[A-Za-z0-9 ,.!]{1,20}"
                           maxlength="20"
                           required>
                </div>

                <div id="job-description">
                    <label for="Job_Description">Description</label>
                    <textarea id="Job_Description" name="Description"
                              maxlength="100"
                              required></textarea>
                </div>

                <div id="closing-date">
                    <label for="Closing_Date">Closing Date</label>
                    <input type="text" 
                        id="Closing_Date" 
                        name="Date" 
                        value="<?php echo $today; ?>"
                        pattern="\d{2}/\d{2}/\d{2}"
                        title="Format: dd/mm/yy"
                        required>
                </div>

                <div id="position-type">
                    <p>Position</p>
                    <input type="radio" id="Full_Time" name="Position" value="Full Time"> 
                    <label for="Full_Time">Full Time</label>
                    <input type="radio" id="Part_Time" name="Position" value="Part Time"> 
                    <label for="Part_Time">Part Time</label>
                </div>

                <div id="contract-type">
                    <p>Contract</p>
                    <input type="radio" id="On_Going" name="Contract" value="On-going"> 
                    <label for="On_Going">On-Going</label>
                    <input type="radio" id="Fixed_Term" name="Contract" value="Fixed Term"> 
                    <label for="Fixed_Term">Fixed Term</label>
                </div>

                <div id="location-type">
                    <p>Location</p>
                    <input type="radio" id="On_Site" name="Location" value="On site"> 
                    <label for="On_Site">On Site</label>
                    <input type="radio" id="Remote" name="Location" value="Remote"> 
                    <label for="Remote">Remote</label>
                </div>

                <div id="application-type">
                    <p>Accept Application</p>
                    <input type="checkbox" id="Accept_Post" name="Application[]" value="Post"> 
                    <label for="Accept_Post">Post</label>
                    <input type="checkbox" id="Accept_Email" name="Application[]" value="Email"> 
                    <label for="Accept_Email">Email</label>
                </div>

                <div id="form-actions">
                    <input type="submit" value="Submit">
                    <input type="reset" value="Reset Form">
                    <a href="index.php">Return to home</a>
                </div>
            </fieldset>
        </form> 
    </div>
</body> 
</html>
