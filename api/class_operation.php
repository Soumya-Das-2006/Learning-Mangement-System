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

if ($action === 'end_class') {
    if (!isset($input['class_id'])) {
        echo json_encode(['success' => false, 'error' => 'Missing class_id']);
        exit();
    }
    
    $class_id = mysqli_real_escape_string($conn, $input['class_id']);
    
    // Verify the class belongs to the teacher
    $verify_query = mysqli_query($conn, 
        "SELECT * FROM online_classes WHERE class_id = '$class_id' AND teacher_id = '{$_SESSION['id']}'");
        
    if (mysqli_num_rows($verify_query) == 0) {
        echo json_encode(['success' => false, 'error' => 'Class not found or access denied']);
        exit();
    }
    
    // Update class status to completed
    $query = "UPDATE online_classes SET status = 'completed', end_time = NOW() WHERE class_id = '$class_id'";
    
    if (mysqli_query($conn, $query)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => mysqli_error($conn)]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid action']);
}