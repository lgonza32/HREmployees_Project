<html lang="en">
    <head>
        <title>ITCS 3160</title>
        <meta name="description" content="Managers Section">
        <meta name="author" content="ITSC3160 Project">
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="base.css">
    </head>

    <body>
        <h1 style="text-align:center;">Employees Review Records System</h1>
        <h2 style="text-align:center;">Review Record</h2>
        <?php
            include("/var/www/db_settings.php"); 
            $conn = mysqli_connect($db_host, $db_user_03, $db_pw_03, "team03");
            if (!$conn) {die( "Connection failed: " . mysqli_connect_error());}

            $employeeID = $_POST['selectedEmployeeID'];
            $ESCyear = mysqli_real_escape_string($conn, $_POST['reviewyear']);
            $ESCperformance = mysqli_real_escape_string($conn, $_POST['performance']);
            $raise = number_format($_POST['raise'], 2, '.', ',');
            $query = "INSERT INTO REVIEW(Review_Year, Employee_ID, Performance, Raise) VALUES('$ESCyear', '$employeeID', '$ESCperformance', '$raise');";
            mysqli_query($conn,$query);

            if (mysqli_error($conn)) 
                {die("MySQL error: ".mysqli_error($conn));}
            echo "<p>Review added successfully. </p>";
            // Always remember to close the connection to the database when you're done!
            mysqli_close($conn);
        ?>
        <p><a href="index.html">Return Home</a></p>
    </body>
</html>