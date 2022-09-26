<html lang="en">
    <head>
        <title>ITCS 3160</title>
        <meta name="description" content="Managers Section">
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

        <main id="managers">
            <h1 style="text-align: center;">Manager Section</h1>
            <hr>
            <div id="editemployeeinformation">
                <p style="text-align: center;">This Form is for Managers to Edit Employee Information</p>

                <?php
                    include("/var/www/db_settings.php"); 
                    $conn = mysqli_connect($db_host, $db_user_03, $db_pw_03, "team03");
                    if (!$conn) {die( "Connection failed: " . mysqli_connect_error());}
                ?>

                <?php 
                    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ): 

                    $selectedID = $_POST['employeeID'];
                    $query = "SELECT * FROM EMPLOYEES WHERE Employee_ID = $selectedID;";
                    $result = mysqli_query($conn,$query);
                    $query1 = "SELECT CONCAT(Title) AS PositionTitle FROM POSITION_TITLES";
                    $result1 = mysqli_query($conn,$query1);
                    $query2 = "SELECT CONCAT(Location) AS Location FROM LOCATIONS";
                    $result2 = mysqli_query($conn,$query2);

                    if (mysqli_error($conn)) 
                        {die("MySQL error: ".mysqli_error($conn));} 
                    $row = mysqli_fetch_assoc($result);
                    $row1 = mysqli_fetch_assoc($result1);
                    $row2 = mysqli_fetch_assoc($result2);
                ?>
                <form name="changeemployeeinfo" method="POST" action="submitemployeechanges.php">
                    <p>Enter the updated contact information for this employee below.</p>
                    <p>If any fields have no changes, enter the current information in the "new information" field (do not leave it blank!).</p>
                    <p>Any field left blank on this form will be stored as blank in the database, effectively deleting the information.</p>

                    <input type="hidden" name="selectedEmployeeID" value="<?php echo $selectedID; ?>">
                    <table>
                        <tr><td></td><th>Current Information</th><th>New Information</th></tr>
                        <tr><td>First Name: </td>
                            <td><?php echo $row['First_Name'] ?></td>
                            <td><input type="text" name="newfirst" maxlength="20" required></td></tr>
                        <tr><td>Last Name: </td>
                            <td><?php echo $row['Last_Name'] ?></td>
                            <td><input type="text" name="newlast" maxlength="20" required></td></tr>
                        <tr><td>Position Title:</td>
                            <td><?php echo $row['Title'] ?></td>
                            <td><select name="newpositiontitle">
                            <option value="ERROR" selected>Select Position...</option>
                                <?php
                                while($row1 = mysqli_fetch_assoc($result1)) {
                                    echo '<option value="'.$row1['PositionTitle'].'" >'.$row1['PositionTitle'].'</option>';}
                                ?>
                            </select></td></tr>
                        <tr><td>Location:</td>
                            <td><?php echo $row['Location'] ?></td>
                            <td><select name="newlocation">
                            <option value="ERROR" selected>Select Location...</option>
                                <?php
                                while($row2 = mysqli_fetch_assoc($result2)) {
                                    echo '<option value="'.$row2['Location'].'" >'.$row2['Location'].'</option>';}
                                ?>
                            </select></td></tr>
                        <tr><td>Hire Date:</td>
                            <td><?php echo $row['Hire_Date'] ?></td>
                            <td><input type="date" name="hiredate"></td></tr>
                        <tr><td>Manager ID:</td>
                            <td><?php echo $row['Manager_ID'] ?></td>
                            <td><input type="text" name="managerID" required></td></tr>
                    </table>   
                    <p> <input type="submit" value="Click to submit" /></p>
                </form>
                <?php 
                    else: 
                    $query = "SELECT Employee_ID, CONCAT(First_Name,' ',Last_Name) AS EmployeeName FROM EMPLOYEES ORDER BY Last_Name;";
                    $result = mysqli_query($conn,$query);
                    if (mysqli_error($conn)) 
                        {die("MySQL error: ".mysqli_error($conn));}
                ?>

                <form name="selectemployee" method="POST" action="managers.php">
                    <table>
                    <tr><td>
                        <select name="employeeID">
                        <option value="ERROR" selected>Select Employee...</option>
                        
                        <?php
                            while($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="'.$row["Employee_ID"].'">'.$row["EmployeeName"].'</option>';}
                        ?>
                        </select></td><td></td></tr>
                        </table>
                    <p> <input type="submit" value="Next >>" /></p>
                </form>

                <?php endif; 
                    mysqli_close($conn); 
                ?>
            </div>
            <hr>
        </main>
    </body>
</html>