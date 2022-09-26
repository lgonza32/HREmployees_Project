<html lang="en">
    <head>
        <title>ITCS 3160</title>
        <meta name="description" content="Team Report PHP form">
        <meta name="author" content="ITSC3160 Project">
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="base.css">
    </head>

    <body>
        <h1 style="text-align:center;">Employees Records System</h1>
        <h2 style="text-align:center;">Team Report</h2>

        <form name="managerid" method="POST" action="teamreport.php">
            <input type="text" name="managerID" required>   
            <p> <input type="submit" value="Next >>" /></p>
        </form>
        <!-- <form name="managerid" method="POST" action="teamreport.php">
            <p> <input type="submit" name="sortlocation" value="Sort Location" /></p>
        </form> -->
        <?php
            include("/var/www/db_settings.php"); 
            $conn = mysqli_connect($db_host, $db_user_03, $db_pw_03, "team03");
            if (!$conn) {die( "Connection failed: " . mysqli_connect_error());}

            
            $managerID = (int)$_POST['managerID'];
            $query = "SELECT * FROM EMPLOYEES WHERE Manager_ID LIKE $managerID";
            $result = mysqli_query($conn,$query);

            if (mysqli_num_rows($result) > 0) {
                echo "<table>";
                echo "<tr><th>Employee_ID</th><th>First_Name</th><th>Last_Name</th><th>Position</th><th>Location</th></tr>";
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr><td>".$row['Employee_ID']."</td><td>".
                        $row['First_Name']."</td><td>".
                        $row['Last_Name']."</td><td>".
                        $row['Title']."</td><td>".
                        $row['Location']."</td></tr>";
                }
                echo "</table>";
            } 
            else {    echo "No owners meeting your search criteria were found.";   }

            // if ($_POST['sortlocation'] > 0) {
            //     $query = "SELECT * FROM EMPLOYEES WHERE Manager_ID LIKE $managerID ORDER BY Location";
            //     $result = mysqli_query($conn,$query);

            //     if (mysqli_num_rows($result) > 0) {
            //         echo "<table>";
            //         echo "<tr><th>Employee_ID</th><th>First_Name</th><th>Last_Name</th><th>Position</th><th>Location</th></tr>";
            //         while($row = mysqli_fetch_assoc($result)) {
            //             echo "<tr><td>".$row['Employee_ID']."</td><td>".
            //                 $row['First_Name']."</td><td>".
            //                 $row['Last_Name']."</td><td>".
            //                 $row['Title']."</td><td>".
            //                 $row['Location']."</td></tr>";
            //         }
            //         echo "</table>";
            //     } 
            //     else {    echo "No owners meeting your search criteria were found.";   }
            // }

            if (mysqli_error($conn)) 
                {die("MySQL error: ".mysqli_error($conn));}
            mysqli_close($conn);
        ?>
        <p><a href="index.html">Return Home</a></p>
    </body>
</html>