<html lang="en">
    <head>
        <title>ITCS 3160</title>
        <meta name="description" content="Managers Section">
        <meta name="author" content="ITSC3160 Project">
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="base.css">
    </head>

    <body>
        <h1 style="text-align:center;">Employees Records System</h1>
        <h2 style="text-align:center;">Edited Employee Record</h2>
        <?php
            include("/var/www/db_settings.php"); 
            $conn = mysqli_connect($db_host, $db_user_03, $db_pw_03, "team03");
            if (!$conn) {die( "Connection failed: " . mysqli_connect_error());}

            $employeeID = $_POST['selectedEmployeeID'];
            $ESClastname = mysqli_real_escape_string($conn, $_POST['newlast']);
            $ESCfirstname = mysqli_real_escape_string($conn, $_POST['newfirst']);
            $position = $_POST['newpositiontitle'];
            $location = $_POST['newlocation'];
            $hire_date = "'".$_POST['hiredate']."'";
            $managerID = (int)$_POST['managerID'];

            $query = "UPDATE EMPLOYEES SET Last_Name='$ESClastname',
                                            First_Name='$ESCfirstname',
                                            Title='$position',
                                            Location='$location',
                                            Hire_Date=$hire_date,
                                            Manager_ID=$managerID
                                            WHERE Employee_ID=$employeeID;";

            // SUBMIT UPDATE STATEMENT
            mysqli_query($conn,$query);

            // CHECK FOR ERRORS
            if (mysqli_error($conn)) 
                {die("MySQL error: ".mysqli_error($conn));}

            echo "<p>Employee information successfully changed. </p>";
        ?>

        <?php
            // Close the open connection named $conn
            mysqli_close($conn);
        ?>
        <p><a href="index.html">Return Home</a></p>
    </body>
</html>