______________________________________________________________________________________________________
______________________________________________________________________________________________________
!!! NB : use username: thg while password must be : Chelsea@17 on login.php interface
___________________________________________________________________________________________________________
_______________________________________________________________________________________________________________




Student Management System
________________________________________________

Overview

The Student Management System is a web-based application built using PHP and MySQL for managing student records in a school. It allows administrators to log in, view, add, edit, and delete student records through a user-friendly web interface. The system ensures secure access with session-based authentication and provides a responsive design using Bootstrap.
___________________________________________________________________________________________________________________________________________
____________________________________________________________________________________________________________________________________________

Features

*User Authentication: Secure login for administrators.
*CRUD Operations: Create, Read, Update, and Delete student records.
*Validation: Ensures data integrity with validation for email uniqueness and phone number format.
*Responsive Design: Mobile-friendly interface using Bootstrap.
*Icons: Utilizes Font Awesome icons for intuitive navigation and actions.
Installation
Prerequisites
___________________________________________________________________________________________________________________________
___________________________________________________________________________________________________________________________

PHP (version 7.4 or higher)
MySQL (version 5.7 or higher)
A web server like Apache (XAMPP or similar)
Setup
Clone the Repository


git clone https://github.com/yourusername/student-management-system.git
cd student-management-system
Configure the Database

Create a MySQL database named student_management.
then import from the phpMyAdmin interface the student_management.sql found in database folder 

_________________________________________________________________________________________________________________

Set Up Your Web Server
_________________________________________________________________________________________________________________________

Place the project files in the web server's document root directory (e.g., htdocs for XAMPP).
Ensure that your server is running and navigate to http://localhost/student_management_system in your web browser.
Usage
Log In

Visit login.php to log in as an administrator. Enter your credentials to access the dashboard.

______________________________________________________________________________________________________
______________________________________________________________________________________________________
!!! NB : use username: thg while password must be : Chelsea@17
___________________________________________________________________________________________________________
_______________________________________________________________________________________________________________


Manage Students

View Students: Navigate to index.php to see the list of students.
Add Student: Use add_student.php to add new student records.
Edit Student: Click the edit button next to a student's record to modify their details.
Delete Student: Click the delete button to remove a student record.
Validation Rules
Email: Must be unique across all student records.
Phone Number: Must start with "07" and be 10 digits long.
Date of birth must not be in future or today and it must not be more than 120 years

