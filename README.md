
______________________________________________________________________________________________________
______________________________________________________________________________________________________
<b>!!! NB : use username: <b>thg</b> while password must be : <b>Chelsea@17</b> on login.php interface</b>
___________________________________________________________________________________________________________
_______________________________________________________________________________________________________________




<h2>Student Management System</h2>  
________________________________________________

<h3>Overview</h3>

The Student Management System is a web-based application built using PHP and MySQL for managing student records in a school. It allows administrators to log in, view, add, edit, and delete student records through a user-friendly web interface. The system ensures secure access with session-based authentication and provides a responsive design using Bootstrap.
___________________________________________________________________________________________________________________________________________
____________________________________________________________________________________________________________________________________________

<h3>Features</h3>

*User Authentication: Secure login for administrators.
*CRUD Operations: Create, Read, Update, and Delete student records.
*Validation: Ensures data integrity with validation for email uniqueness and phone number format.
*Responsive Design: Mobile-friendly interface using Bootstrap.
*Icons: Utilizes Font Awesome icons for intuitive navigation and actions.
<h3>Installation Prerequisites</h3>  
___________________________________________________________________________________________________________________________
___________________________________________________________________________________________________________________________

PHP (version 7.4 or higher)
MySQL (version 5.7 or higher)
A web server like Apache (XAMPP or similar)
<h3>Setup</h3>
<b>Clone the Repository</b>  
<ul>
  <li>git clone https://github.com/M-I-Theogene/theogene_22RP01832</li>
  <li>cd student-management-system</li>
</li>
</ul>

<h3>Configure the Database</h3>
<ul>
  <li>Create a MySQL database named student_management.</li>
  <li>then import from the phpMyAdmin interface the student_management.sql found in database folder </li>
</ul>



_________________________________________________________________________________________________________________

<h3>Set Up Your Web Server</h3>
_________________________________________________________________________________________________________________________

<ul>
  <li>Place the project files in the web server's document root directory (e.g., htdocs for XAMPP).</li>
  <li>Ensure that your server is running and navigate to http://localhost/student_management_system in your web browser.
Usage</li>
<li>
  
<b>Log In</b>

Visit login.php to log in as an administrator. Enter your credentials to access the dashboard.
</li>
  
</ul>



______________________________________________________________________________________________________
______________________________________________________________________________________________________
<b>!!! NB : use username: thg while password must be : Chelsea@17</b>
___________________________________________________________________________________________________________
_______________________________________________________________________________________________________________


<h3>Manage Students</h3>
<ul>
  <li>
    View Students: Navigate to index.php to see the list of students.

  </li>
  <li>
    Add Student: Use add_student.php to add new student records.
  </li>
  <li>
    Edit Student: Click the edit button next to a student's record to modify their details.</li>
  </li>
  
  <li>Delete Student: Click the delete button to remove a student record.</li>

  <li>
   <b> Validation Rules</b>
Email: Must be unique across all student records.
Phone Number: Must start with "07" and be 10 digits long.
Date of birth must not be in future or today and it must not be more than 120 years
  </li>
  
</ul>

