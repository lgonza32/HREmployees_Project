<html lang="en">
    <head>
        <title>ITCS 3160</title>
        <meta name="description" content="Probation List PHP form">
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
            

            if(mysqli_num_rows($result) > 0) {
                echo "<p>All Probationed Employees:</p>";

                echo "<table>";
                echo "<tr><th>Employee_ID</th><th>First_Name</th><th>Last_Name</th><th>Salary</th><th>Raise</th><th>Performance Level</th></tr>";
                while($row = mysqli_fetch_assoc($result)) {
                    $selectedID = $row['Employee_ID'];
                    $query1 = "SELECT * FROM REVIEW WHERE Employee_ID = $selectedID;";
                    $result1 = mysqli_query($conn,$query1);
                    $row1 = mysqli_fetch_assoc($result1);
                    echo "<tr><td>".$row['Employee_ID']."</td><td>".
                        $row['First_Name']."</td><td>".
                        $row['Last_Name']."</td><td>".
                        $row['Salary']."</td><td>".
                        $row1['Raise']."</td><td>".
                        $row1['Performance']."</td></tr>";
                }
                echo "</table>";
            }
            else {    echo "No probationed employees were found.";   }

            if (mysqli_error($conn)) 
                {die("MySQL error: ".mysqli_error($conn));}
            mysqli_close($conn);
        ?>
        <p><a href="index.html">Return Home</a></p>
    </body>
</html>