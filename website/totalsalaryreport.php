<html lang="en">
    <head>
        <title>ITCS 3160</title>
        <meta name="description" content="Total Salary PHP form">
        <meta name="author" content="ITSC3160 Project">
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="base.css">
    </head>

    <body>
        <h1 style="text-align:center;">Employees Records System</h1>
        <h2 style="text-align:center;">Probation Status Report</h2>

        <?php
            include("/var/www/db_settings.php"); 
            $conn = mysqli_connect($db_host, $db_user_03, $db_pw_03, "team03");
            if (!$conn) {die( "Connection failed: " . mysqli_connect_error());}

            $query = "SELECT * FROM EMPLOYEES WHERE Probation_Status = 'Yes';";
            $result = mysqli_query($conn,$query);
            

            if (mysqli_error($conn)) 
                {die("MySQL error: ".mysqli_error($conn));}
            mysqli_close($conn);
        ?>
        <p><a href="index.html">Return Home</a></p>
    </body>
</html>