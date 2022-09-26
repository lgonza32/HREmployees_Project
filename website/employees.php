<html lang="en">
    <head>
        <title>ITCS 3160</title>
        <meta name="description" content="Employees Section">
        <meta name="author" content="ITSC3160 Project">
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="base.css">
    </head>

    <body>
        <header>
            <nav class="nav-ul" aria-label="Primary">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="employees.php">Employees</a></li>
                    <li><a href="managers.php">Managers</a></li>
                    <li><a href="hr.php">HR</a></li>
                </ul>
            </nav>
        </header>

        <main id="employees">
            <h1 style="text-align: center;">Employees Section</h1>
            <hr>
            <div id="new_employee_contact" name="new_employee_contact">
                <h2 style="text-align: center;">Enter New Contact Information</h1>
                <p style="text-align: center;">This form is for employees to enter their contact information</p>

                <form method="POST" action="newemployee.php">
                    <?php
                        include("/var/www/db_settings.php"); 
                        $conn = mysqli_connect($db_host, $db_user_03, $db_pw_03, "team03");
                        $query1 = "SELECT CONCAT(Title) AS PositionTitle FROM POSITION_TITLES";
                        $result1 = mysqli_query($conn,$query1);
                        $query2 = "SELECT CONCAT(Location) AS Location FROM LOCATIONS";
                        $result2 = mysqli_query($conn,$query2);
                        if (!$conn) {die( "Connection failed: " . mysqli_connect_error());}
                    ?>
                    <table>
                        <tr><td><label for="lastname">Employee Last Name:</label></td>
                            <td><input type="text" name="lastname" maxlength="20" required /></td></tr>
                        <tr><td><label for="lastname">Employee First Name:</label></td>
                            <td><input type="text" name="firstname" maxlength="20" required /></td></tr>
                        <tr><td><label for="lastname">Gender (M/F):</label></td>
                            <td><input type="text" name="gender" maxlength="1" style="text-transform: uppercase;" required /></td></tr>
                        <tr><td>
                            <label for="Position_Titles"> Select Your Position: </label></td>
                            <td><select name="Position_Titles">
                            <option value="ERROR" selected>Select Position...</option>
                                <?php
                                while($row = mysqli_fetch_assoc($result1)) {
                                    echo '<option value="'.$row['PositionTitle'].'" >'.$row['PositionTitle'].'</option>';}
                                ?>
                            </select></td></tr>
                        <tr><td>
                            <label for="Location"> Select Your Location: </label></td>
                            <td><select name="Location">
                            <option value="ERROR" selected>Select Location...</option>
                                <?php
                                while($row = mysqli_fetch_assoc($result2)) {
                                    echo '<option value="'.$row['Location'].'" >'.$row['Location'].'</option>';}
                                ?>
                            </select></td></tr>
                    </table>   
                    <p> <input type="submit" value="Click to submit" /></p>
                </form>
                <?php
                    // Close the open connection named $conn
                    mysqli_close($conn);
                ?>
            </div>
        </main>
    </body>
</html>