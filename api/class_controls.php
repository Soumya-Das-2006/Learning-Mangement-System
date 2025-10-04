<?php
include('../dbcon.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
    exit();
}

$input = json_decode(file_get_contents('php://input'), true);

if (!isset($input['action'])) {
    echo json_encode(['success' => false, 'error' => 'Missing action']);
    exit();
}

$action = mysqli_real_escape_string($conn, $input['action']);
$class_id = isset($input['class_id']) ? mysqli_real_escape_string($conn, $input['class_id']) : null;

if ($action === 'update_controls') {
    // Update class controls
    if (!isset($input['teacher_id'])) {
        echo json_encode(['success' => false, 'error' => 'Missing teacher_id']);
        exit();
    }
    
    $teacher_id = mysqli_real_escape_string($conn, $input['teacher_id']);
    $enable_chat = isset($input['enable_chat']) ? intval($input['enable_chat']) : 1;
    $enable_polls = isset($input['enable_polls']) ? intval($input['enable_polls']) : 1;
    $enable_raise_hand = isset($input['enable_raise_hand']) ? intval($input['enable_raise_hand']) : 1;
    $enable_whiteboard = isset($input['enable_whiteboard']) ? intval($input['enable_whiteboard']) : 1;
    
    // Check if controls exist
    $check_query = mysqli_query($conn, "SELECT * FROM class_controls WHERE class_id = '$class_id'");
    
    if (mysqli_num_rows($check_query) > 0) {
        // Update existing
        $query = "UPDATE class_controls SET 
                  enable_chat = '$enable_chat',
                  enable_polls = '$enable_polls',
                  enable_raise_hand = '$enable_raise_hand',
                  enable_whiteboard = '$enable_whiteboard',
                  updated_by = '$teacher_id',
                  updated_at = NOW()
                  WHERE class_id = '$class_id'";
    } else {
        // Insert new
        $query = "INSERT INTO class_controls 
                  (class_id, enable_chat, enable_polls, enable_raise_hand, enable_whiteboard, updated_by) 
                  VALUES ('$class_id', '$enable_chat', '$enable_polls', '$enable_raise_hand', '$enable_whiteboard', '$teacher_id')";
    }
    
    if (mysqli_query($conn, $query)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => mysqli_error($conn)]);
    }
    
} elseif ($action === 'get_controls') {
    // Get current controls
    $query = "SELECT * FROM class_controls WHERE class_id = '$class_id'";
    $result = mysqli_query($conn, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $controls = mysqli_fetch_assoc($result);
        echo json_encode(['success' => true, 'controls' => $controls]);
    } else {
        // Return default controls
        echo json_encode(['success' => true, 'controls' => [
            'enable_chat' => 1,
            'enable_polls' => 1,
            'enable_raise_hand' => 1,
            'enable_whiteboard' => 1
        ]]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid action']);
}
?>