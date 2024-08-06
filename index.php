<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

require 'db.php';
require 'navbar.php'; // Include the navbar

// Fetch metrics from the database
$student_count_query = "SELECT COUNT(*) AS count FROM students";
$student_count_result = mysqli_query($conn, $student_count_query);
$student_count = mysqli_fetch_assoc($student_count_result)['count'];

$user_count_query = "SELECT COUNT(*) AS count FROM users";
$user_count_result = mysqli_query($conn, $user_count_query);
$user_count = mysqli_fetch_assoc($user_count_result)['count'];
?>

<div class="container mt-4">
    <h1>Dashboard</h1>
    <div class="row">
        <!-- Students Card -->
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-user-graduate fa-3x text-primary mr-3"></i> <!-- Font Awesome Icon -->
                        <div>
                            <h5 class="card-title">Total Students</h5>
                            <p class="card-text"><?php echo htmlspecialchars($student_count); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Users Card -->
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-users fa-3x text-success mr-3"></i> <!-- Font Awesome Icon -->
                        <div>
                            <h5 class="card-title">Total Users</h5>
                            <p class="card-text"><?php echo htmlspecialchars($user_count); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add more metrics cards as needed -->
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
