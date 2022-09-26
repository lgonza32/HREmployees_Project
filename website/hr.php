<html lang="en">
    <head>
        <title>ITCS 3160</title>
        <meta name="description" content="Home">
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

        <main id="hr">
            <h1 style="text-align: center;">HR Section</h1>
            <hr>
            <div id="changeemployeesalary">
                <p style="text-align: center;">This Form is for HR to Edit Employee Salary</p>

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

                    if (mysqli_error($conn)) 
                        {die("MySQL error: ".mysqli_error($conn));} 
                    $row = mysqli_fetch_assoc($result);
                ?>

                <form name="changeemployeesalaryinfo" method="POST" action="submitemployeesalarychanges.php">
                    <p>Enter the updated salary information for this employee below.</p>
                    <p>If any fields have no changes, enter the current information in the "new information" field (do not leave it blank!).</p>
                    <p>Any field left blank on this form will be stored as blank in the database, effectively deleting the information.</p>

                    <input type="hidden" name="selectedEmployeeID" value="<?php echo $selectedID; ?>">
                    <p>Employee ID: <?php echo $row['Employee_ID'] ?></p>

                    <label for="salaryyear">Salary Year:</label>
                    <input type="text" name="salaryyear" maxlength="4" required />
                    
                    <table>
                        <tr><th>Current Salary</th><th>New Salary</th></tr>
                        <tr><td><?php echo $row['Salary'] ?></td>
                            <td><input type="text" name="newsalary" required></td></tr>

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

                <form name="selectemployee" method="POST" action="hr.php">
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
            <div id="performancereview">
                <p style="text-align: center;">This Form is for HR to Edit Employee Performance Reviews</p>
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

                    if (mysqli_error($conn)) 
                        {die("MySQL error: ".mysqli_error($conn));} 
                    $row = mysqli_fetch_assoc($result);
                ?>

                <form name="employeereview" method="POST" action="submitreview.php">
                    <p>Enter the updated performance information for this employee below.</p>
                    <p>If any fields have no changes, enter the current information in the "new information" field (do not leave it blank!).</p>
                    <p>Any field left blank on this form will be stored as blank in the database, effectively deleting the information.</p>

                    <input type="hidden" name="selectedEmployeeID" value="<?php echo $selectedID; ?>">
                    <p>Employee ID: <?php echo $row['Employee_ID'] ?></p>
                    <table>
                        <tr><td><label for="reviewyear">Review Year:</label></td>
                            <td><input type="text" name="reviewyear" maxlength="4" required /></td></tr>
                        <tr><td>
                            <label for="performance">Select performance:</label></td>
                            <td><select name="performance">
                            <option value="ERROR" selected>Select Performance...</option>
                                <option value="Excellent">Excellent</option>
                                <option value="Good">Good</option>
                                <option value="Average">Average</option>
                                <option value="Poor">Poor</option>
                            </select></td></tr>
                        <tr><td><label for="raise">Raise:</label></td>
                            <td><input type="number" name="raise" step="0.01" required /></td></tr>
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

                <form name="selectemployee" method="POST" action="hr.php">
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
            <div id="changeprobationstatus">
            <p style="text-align: center;">This Form is for HR to Edit Employee Probation Status</p>
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

                    if (mysqli_error($conn)) 
                        {die("MySQL error: ".mysqli_error($conn));} 
                    $row = mysqli_fetch_assoc($result);
                ?>

                <form name="changeprobationstatus" method="POST" action="changeprobationstatus.php">
                    <p>Enter the updated probation status for this employee below.</p>

                    <input type="hidden" name="selectedEmployeeID" value="<?php echo $selectedID; ?>">
                    <p>Employee ID: <?php echo $row['Employee_ID'] ?></p>
                    <p>Current Probation Status: <?php echo $row['Probation_Status'] ?></p>
                    <label for="newprobationstatus">New Probation Status (Yes/No):</label>
                    <input type="text" name="newprobationstatus" maxlength="3" required />
                    
                    <p> <input type="submit" value="Click to submit" /></p>
                </form>

                <?php 
                    else: 
                    $query = "SELECT Employee_ID, CONCAT(First_Name,' ',Last_Name) AS EmployeeName FROM EMPLOYEES ORDER BY Last_Name;";
                    $result = mysqli_query($conn,$query);
                    if (mysqli_error($conn)) 
                        {die("MySQL error: ".mysqli_error($conn));}
                ?>

                <form name="selectemployee" method="POST" action="hr.php">
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
            <div id="showprobationemployees">
                <p style="text-align: center;">This Form is for HR to Edit Employee Probation Status</p>
                <form name="showprobationlist" method="POST" action="showprobationlist.php">
                    <input type="submit" name="showprobationlist" value="Find Probationed Employees"/>
                </form>
        </main>
    </body>
</html>