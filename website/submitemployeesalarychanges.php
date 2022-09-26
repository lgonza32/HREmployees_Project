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
            $ESCyear = mysqli_real_escape_string($conn, $_POST['salaryyear']);
            $newSalary = (int)$_POST['newsalary'];

            $query = "INSERT INTO SALARY(Employee_ID, Employee_Salary) SELECT Employee_ID, Salary FROM EMPLOYEES;";
            $query1 = "INSERT INTO SALARY(Year) VALUES('$ESCyear');";
            mysqli_query($conn,$query);
            mysqli_query($conn,$query1);

            $query2 = "UPDATE EMPLOYEES SET Salary=$newSalary WHERE Employee_ID=$employeeID;";
            mysqli_query($conn,$query2);

            if (mysqli_error($conn)) 
                {die("MySQL error: ".mysqli_error($conn));}

            echo "<p>Employee salary successfully changed. </p>";
        ?>

        <?php
            // Close the open connection named $conn
            mysqli_close($conn);
        ?>
        <p><a href="index.html">Return Home</a></p>
    </body>
</html>