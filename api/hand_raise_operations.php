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

if ($action === 'raise_hand') {
    // Student raises hand
    if (!isset($input['student_id']) || !isset($input['student_name'])) {
        echo json_encode(['success' => false, 'error' => 'Missing parameters']);
        exit();
    }
    
    $student_id = mysqli_real_escape_string($conn, $input['student_id']);
    $student_name = mysqli_real_escape_string($conn, $input['student_name']);
    
    // Check if already raised hand
    $check_query = mysqli_query($conn, 
        "SELECT * FROM hand_raise_events 
         WHERE class_id = '$class_id' AND student_id = '$student_id' AND status = 'raised'");
    
    if (mysqli_num_rows($check_query) == 0) {
        $query = "INSERT INTO hand_raise_events (class_id, student_id, student_name, raised_at, status) 
                  VALUES ('$class_id', '$student_id', '$student_name', NOW(), 'raised')";
        
        if (mysqli_query($conn, $query)) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => mysqli_error($conn)]);
        }
    } else {
        echo json_encode(['success' => true, 'message' => 'Hand already raised']);
    }
    
} elseif ($action === 'lower_hand') {
    // Student lowers hand
    if (!isset($input['student_id'])) {
        echo json_encode(['success' => false, 'error' => 'Missing student_id']);
        exit();
    }
    
    $student_id = mysqli_real_escape_string($conn, $input['student_id']);
    
    $query = "UPDATE hand_raise_events 
              SET status = 'lowered' 
              WHERE class_id = '$class_id' AND student_id = '$student_id' AND status = 'raised'";
    
    if (mysqli_query($conn, $query)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => mysqli_error($conn)]);
    }
    
} elseif ($action === 'get_raised_hands') {
    // Get all raised hands for teacher
    $query = "SELECT * FROM hand_raise_events 
              WHERE class_id = '$class_id' AND status = 'raised' 
              ORDER BY raised_at ASC";
    
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        $raised_hands = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $raised_hands[] = $row;
        }
        echo json_encode(['success' => true, 'raised_hands' => $raised_hands]);
    } else {
        echo json_encode(['success' => false, 'error' => mysqli_error($conn)]);
    }
    
} elseif ($action === 'clear_hand') {
    // Teacher clears a raised hand
    if (!isset($input['event_id'])) {
        echo json_encode(['success' => false, 'error' => 'Missing event_id']);
        exit();
    }
    
    $event_id = mysqli_real_escape_string($conn, $input['event_id']);
    
    $query = "UPDATE hand_raise_events SET status = 'lowered' WHERE event_id = '$event_id'";
    
    if (mysqli_query($conn, $query)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => mysqli_error($conn)]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid action']);
}
?>