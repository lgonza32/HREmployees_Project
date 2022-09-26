CREATE TABLE locations (
    location VARCHAR(20) NOT NULL,
    address VARCHAR(35) NOT NULL,
    state VARCHAR(2) NOT NULL,
    zip_code MEDIUMINT NOT NULL,
    office_phone BIGINT NOT NULL,
    cost_of_living DECIMAL(4,2) NOT NULL,
    PRIMARY KEY(location)
);

CREATE TABLE position_titles (
    title VARCHAR(20) NOT NULL,
    division VARCHAR(20) NOT NULL,
    education_requirement VARCHAR(20) NOT NULL,
    minimum_salary DECIMAL(5,2) NOT NULL,
    maximum_salary DECIMAL(7,2) NOT NULL,
    total_salary DECIMAL(7,2) NOT NULL,
    PRIMARY KEY(title)
);

CREATE TABLE employees (
    employee_id INT NOT NULL,
    manager_id INT NOT NULL,
    first_name VARCHAR(20) NOT NULL,
    last_name VARCHAR(20) NOT NULL,
    gender VARCHAR(1) NOT NULL,
    title VARCHAR(20) NOT NULL,
    salary INT NOT NULL,
    location VARCHAR(20) NOT NULL,
    performance VARCHAR(20) NOT NULL,
    2020_raise DECIMAL(3,2) NOT NULL,
    hire_date DATE NOT NULL,
    probation_status TINYINT(1) NOT NULL,
    PRIMARY KEY(employee_id),
    FOREIGN KEY(title) references position_titles(title),
    FOREIGN KEY(location) references locations(location)
);

CREATE TABLE SALARY (
  Employee_ID INT UNSIGNED NOT NULL,
  Year year NOT NULL,
  Employee_Salary INT UNSIGNED NOT NULL,
  FOREIGN KEY (Employee_ID) REFERENCES EMPLOYEES (Employee_ID)
);

CREATE TABLE review(
    Employee_ID INT NOT NULL,
    Review_ID INT NOT NULL,
    Performance VARCHAR(20) NOT NULL,
    Raise DECIMAL(3,2) NOT NULL,
    PRIMARY KEY (Review_ID),
    FOREIGN KEY (Employee_ID) REFERENCES employees (Employee_ID)
);