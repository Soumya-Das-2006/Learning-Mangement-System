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

if ($action === 'send') {
    // Send a chat message
    if (!isset($input['user_id']) || !isset($input['user_type']) || !isset($input['message'])) {
        echo json_encode(['success' => false, 'error' => 'Missing parameters for send action']);
        exit();
    }
    
    $user_id = mysqli_real_escape_string($conn, $input['user_id']);
    $user_type = mysqli_real_escape_string($conn, $input['user_type']);
    $message = mysqli_real_escape_string($conn, $input['message']);
    
    $query = "INSERT INTO class_chat (class_id, user_id, user_type, message) 
              VALUES ('$class_id', '$user_id', '$user_type', '$message')";
    
    if (mysqli_query($conn, $query)) {
        echo json_encode(['success' => true, 'message_id' => mysqli_insert_id($conn)]);
    } else {
        echo json_encode(['success' => false, 'error' => mysqli_error($conn)]);
    }
    
} elseif ($action === 'fetch') {
    // Fetch chat messages
    $last_message_id = isset($input['last_message_id']) ? mysqli_real_escape_string($conn, $input['last_message_id']) : 0;
    
    $query = "SELECT cc.*, 
                     CASE 
                         WHEN cc.user_type = 'teacher' THEN CONCAT(t.firstname, ' ', t.lastname)
                         ELSE CONCAT(s.firstname, ' ', s.lastname)
                     END as user_name
              FROM class_chat cc
              LEFT JOIN teacher t ON cc.user_type = 'teacher' AND cc.user_id = t.teacher_id
              LEFT JOIN student s ON cc.user_type = 'student' AND cc.user_id = s.student_id
              WHERE cc.class_id = '$class_id' AND cc.chat_id > '$last_message_id'
              ORDER BY cc.sent_at ASC";
    
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        $messages = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $messages[] = $row;
        }
        echo json_encode(['success' => true, 'messages' => $messages]);
    } else {
        echo json_encode(['success' => false, 'error' => mysqli_error($conn)]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid action']);
}
?>