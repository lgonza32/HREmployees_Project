Team 3
Authors: Laurenz Luke Gonzales, Ed Salinas 
Home Page Name: index.html

DID NOT DO / NOT IMPLEMENTED:
-1 REPORT (Total Salaries Report)
-Team Report does not have a location sort

BUGS:
-INSERT INTO SELECT does not insert data into SALARY table (submitemployeessalarychanges.php)
-When starting to go back and see if my other implementations were okay, editing the employee's position and location
drop-down menu stopped working properly. -> I think I fixed it, but I do not know if this bug will occur again.

Changes to Tables:
    EMPLOYEE:
        Salary NOT NULL -> NULL
        Hire_Date NOT NULL -> NULL 
        Probation_Status NOT NULL -> NULL
        Manager_ID NOT NULL -> NULL
        
    NEW TABLE:
        CREATE TABLE SALARY (
            Employee_ID INT UNSIGNED NOT NULL,
            Year year NOT NULL,
            Employee_Salary INT UNSIGNED NOT NULL,
            FOREIGN KEY (Employee_ID) REFERENCES EMPLOYEES (Employee_ID)
        );

Assumptions:
-When there is a new employee, managers are to input their hire date
-When there is a new employee, managers are to input their manager ID
-Managers are only able to see the employees they oversee
-HR Employees are the only ones able to edit/enter probation status for each employee
-HR Employees are the only ones able to edit/enter raise and salary
-HR Employees are the only ones to be able to edit and access employee performance review

IMPORTANT INFORMATION
-Laurenz Luke Gonzales created 95-99% of all the pages within this project
-Ed Salinas contributed heavily in the table implementations
-Taylor Rodgers and Kobi Fon-Ndikum did not contribute at all to this project
