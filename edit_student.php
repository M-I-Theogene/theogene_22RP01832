<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

require 'db.php';
require 'navbar.php'; // Include the navbar

$errors = [];
$student_id = null;
$first_name = $last_name = $dob = $email = $phone = '';
$student = [];

if (isset($_GET['id'])) {
    $student_id = intval($_GET['id']);

    // Fetch existing student data
    $sql = "SELECT * FROM students WHERE id = $student_id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $student = mysqli_fetch_assoc($result);
        $first_name = $student['first_name'];
        $last_name = $student['last_name'];
        $dob = $student['dob'];
        $email = $student['email'];
        $phone = $student['phone'];
    } else {
        die('Error fetching student data');
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $dob = $_POST['dob'];
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);

    // Validate input
    if (empty($first_name) || empty($last_name)) {
        $errors[] = "First name and last name are required.";
    } elseif (!preg_match("/^[a-zA-Z-' ]+$/", $first_name) || !preg_match("/^[a-zA-Z-' ]+$/", $last_name)) {
        $errors[] = "Names can only contain letters and whitespace.";
    }

  
    if (empty($dob)) {
        $errors[] = "Date of birth is required.";
    }
    else{
        $dob_timestamp = strtotime($dob);
        if (!$dob_timestamp) {
            $errors[] = "Invalid date format.";
        } else {
            $current_timestamp = time();
            $max_age_timestamp = strtotime('-120 years');
            if ($dob_timestamp >= $current_timestamp) {
                $errors[] = "Date of birth cannot be today or in the future.";
            } elseif ($dob_timestamp < $max_age_timestamp) {
                $errors[] = "Date of birth cannot be more than 120 years ago.";
            }
        }
    }
 

    if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($email)) {
        $errors[] = "Invalid email format.";
    }

    if (!preg_match('/^07[0-9]{8,10}$/', $phone) && !empty($phone)) {
        $errors[] = "Phone number must start with '07' and be between 10 to 12 digits long.";
    }

    // Check email uniqueness
    if (empty($errors)) {
        $email_check_sql = "SELECT id FROM students WHERE email = '$email' AND id != $student_id";
        $email_check_result = mysqli_query($conn, $email_check_sql);
        if (mysqli_num_rows($email_check_result) > 0) {
            $errors[] = "Email is already in use.";
        }
    }

    // Perform update if no errors
    if (empty($errors)) {
        $sql_update = "UPDATE students 
                       SET first_name = '$first_name', 
                           last_name = '$last_name', 
                           dob = '$dob', 
                           email = '$email', 
                           phone = '$phone' 
                       WHERE id = $student_id";
        if (mysqli_query($conn, $sql_update)) {
            header('Location: view_students.php');
            exit();
        } else {
            $errors[] = 'Failed to update student: ' . mysqli_error($conn);
        }
    }
}
?>

<?php if (!empty($errors)): ?>
        <div class="alert alert-danger mt-4">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

<div class="container mt-4">
    <h1>Edit Student</h1>
    <form method="POST">
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" id="first_name" name="first_name" class="form-control" value="<?php echo htmlspecialchars($first_name); ?>" >
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" id="last_name" name="last_name" class="form-control" value="<?php echo htmlspecialchars($last_name); ?>" >
        </div>
        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="date" id="dob" name="dob" class="form-control" value="<?php echo htmlspecialchars($dob); ?>" >
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone" class="form-control" value="<?php echo htmlspecialchars($phone); ?>">
        </div>
        <button type="submit" class="btn btn-primary">Update Student</button>
    </form>

   
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
