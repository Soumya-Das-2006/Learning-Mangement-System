<?php
<<<<<<< HEAD
//Start session
session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['id']) || ($_SESSION['id'] == '')) {
=======
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include('dbcon.php');

// If no session, redirect
if (!isset($_SESSION['id']) || empty($_SESSION['id']) || !isset($_SESSION['user_type'])) {
>>>>>>> 41343db (Added LMS project files)
    header("location: index.php");
    exit();
}

<<<<<<< HEAD
$session_id=$_SESSION['id'];
?>
=======
$session_id = $_SESSION['id'];
$user_type  = $_SESSION['user_type'];

// Validate user exists in the correct table
if ($user_type === 'student') {
    $verify = mysqli_query($conn, "SELECT * FROM student WHERE student_id = '$session_id'") or die(mysqli_error($conn));
    if (mysqli_num_rows($verify) == 0) {
        session_destroy();
        header("location: index.php?error=Invalid student session");
        exit();
    }
} elseif ($user_type === 'teacher') {
    $verify = mysqli_query($conn, "SELECT * FROM teacher WHERE teacher_id = '$session_id'") or die(mysqli_error($conn));
    if (mysqli_num_rows($verify) == 0) {
        session_destroy();
        header("location: index.php?error=Invalid teacher session");
        exit();
    }
} elseif ($user_type === 'admin') {
    $verify = mysqli_query($conn, "SELECT * FROM users WHERE user_id = '$session_id'") or die(mysqli_error($conn));
    if (mysqli_num_rows($verify) == 0) {
        session_destroy();
        header("location: index.php?error=Invalid admin session");
        exit();
    }
} else {
    // Invalid role
    session_destroy();
    header("location: index.php?error=Invalid role");
    exit();
}

// Make user details available
$user_username = $_SESSION['username'] ?? '';
$user_name     = $_SESSION['name'] ?? '';
>>>>>>> 41343db (Added LMS project files)
