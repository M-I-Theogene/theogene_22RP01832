<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

require 'db.php';

$student_id = $_GET['id'];
$sql = "DELETE FROM students WHERE id = $student_id";

if (mysqli_query($conn, $sql)) {
    header('Location: view_students.php');
    exit();
} else {
    echo 'Failed to delete student';
}
?>
