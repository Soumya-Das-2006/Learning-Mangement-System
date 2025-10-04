<?php
include('../dbcon.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
    exit();
}

// Get JSON input
$input = json_decode(file_get_contents('php://input'), true);

if (!isset($input['class_id']) || !isset($input['student_id']) || !isset($input['action'])) {
    echo json_encode(['success' => false, 'error' => 'Missing parameters']);
    exit();
}

$class_id = mysqli_real_escape_string($conn, $input['class_id']);
$student_id = mysqli_real_escape_string($conn, $input['student_id']);
$action = mysqli_real_escape_string($conn, $input['action']);

if ($action === 'leave') {
    // Update leave time and calculate duration
    $query = "UPDATE class_attendance 
              SET leave_time = NOW(), 
                  duration = TIMESTAMPDIFF(SECOND, join_time, NOW()) 
              WHERE class_id = '$class_id' AND student_id = '$student_id' AND leave_time IS NULL";
} else {
    // Insert join time (should already be done in join_class.php)
    $query = "INSERT INTO class_attendance (class_id, student_id, join_time) 
              VALUES ('$class_id', '$student_id', NOW())";
}

if (mysqli_query($conn, $query)) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => mysqli_error($conn)]);
}