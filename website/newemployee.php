<html lang="en">
    <head>
        <title>ITCS 3160</title>
        <meta name="description" content="Employees PHP form">
        <meta name="author" content="ITSC3160 Project">
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="base.css">
    </head>

    <body>
        <h1 style="text-align:center;">Employees Records System</h1>
        <h2 style="text-align:center;">New Employee Record</h2>

        <?php
            include("/var/www/db_settings.php"); 
            $conn = mysqli_connect($db_host, $db_user_03, $db_pw_03, "team03");
            if (!$conn) {die( "Connection failed: " . mysqli_connect_error());}

            $ESClastname = mysqli_real_escape_string($conn, $_POST['lastname']);
            $ESCfirstname = mysqli_real_escape_string($conn, $_POST['firstname']);
            $ESCgender = strtoupper(mysqli_real_escape_string($conn, $_POST['gender']));
            $position = $_POST['Position_Titles'];
            $location = $_POST['Location'];
            $query = "INSERT INTO EMPLOYEES(Last_Name, First_Name, Gender, Title, Location) VALUES('$ESClastname', '$ESCfirstname', '$ESCgender', '$position', '$location');";
            mysqli_query($conn,$query);


            if (mysqli_error($conn)) 
                {die("MySQL error: ".mysqli_error($conn));}
            echo "<p>Employee added successfully. </p>";
            // Always remember to close the connection to the database when you're done!
            mysqli_close($conn);
        ?>
        <p><a href="index.html">Return Home</a></p>
    </body>
</html>