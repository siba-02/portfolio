CREATE DATABASE IF NOT EXISTS studentdb;
USE studentdb;

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    age INT,
    course VARCHAR(100)
);

INSERT INTO students (name, age, course) VALUES
('Rahul Kumar', 21, 'Computer Science'),
('Priya Sharma', 22, 'Electronics'),
('Amit Verma', 20, 'Mechanical');
