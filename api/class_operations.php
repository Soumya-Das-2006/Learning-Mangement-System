<?php
include('../dbcon.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
    exit();
}

// Get JSON input
$input = json_decode(file_get_contents('php://input'), true);

if (!isset($input['action'])) {
    echo json_encode(['success' => false, 'error' => 'Missing action']);
    exit();
}

$action = mysqli_real_escape_string($conn, $input['action']);
$class_id = isset($input['class_id']) ? mysqli_real_escape_string($conn, $input['class_id']) : null;

if ($action === 'end_class') {
    // End the class
    $query = "UPDATE online_classes SET status = 'completed', end_time = NOW() WHERE class_id = '$class_id'";
    
    if (mysqli_query($conn, $query)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => mysqli_error($conn)]);
    }
    
} elseif ($action === 'raise_hand') {
    // Student raises hand
    $student_id = mysqli_real_escape_string($conn, $input['student_id']);
    $student_name = mysqli_real_escape_string($conn, $input['student_name']);
    
    // Log hand raise event
    $query = "INSERT INTO hand_raise_events (class_id, student_id, student_name, raised_at) 
              VALUES ('$class_id', '$student_id', '$student_name', NOW())";
    
    if (mysqli_query($conn, $query)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => mysqli_error($conn)]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid action']);
}
?>