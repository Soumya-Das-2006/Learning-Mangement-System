<?php
session_start();
include('dbcon.php');

// Check if user is logged in
if (!isset($_SESSION['id'])) {
    echo json_encode(['success' => false, 'error' => 'Unauthorized']);
    exit();
}

// Check if it's a POST request with file
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_FILES['file'])) {
    echo json_encode(['success' => false, 'error' => 'Invalid request']);
    exit();
}

// Validate required parameters
$meeting_id = $_POST['meeting_id'] ?? null;
$user_id = $_POST['user_id'] ?? null;
$chunk_index = $_POST['chunk_index'] ?? 0;

if (!$meeting_id || !$user_id) {
    echo json_encode(['success' => false, 'error' => 'Missing parameters']);
    exit();
}

// Verify user has access to this meeting
$query = mysqli_query($conn, 
    "SELECT oc.* FROM online_classes oc
     INNER JOIN class_attendance ca ON oc.class_id = ca.class_id
     WHERE oc.class_id = '$meeting_id' AND ca.student_id = '$user_id'");
     
if (mysqli_num_rows($query) === 0) {
    echo json_encode(['success' => false, 'error' => 'Access denied']);
    exit();
}

// Create directory structure if it doesn't exist
$base_dir = "recordings/tmp/{$meeting_id}/{$user_id}/";
if (!file_exists($base_dir)) {
    mkdir($base_dir, 0777, true);
}

// Validate file
$file = $_FILES['file'];
$max_size = 50 * 1024 * 1024; // 50MB
$allowed_types = ['video/webm', 'video/mp4'];

if ($file['size'] > $max_size) {
    echo json_encode(['success' => false, 'error' => 'File too large']);
    exit();
}

if (!in_array($file['type'], $allowed_types)) {
    echo json_encode(['success' => false, 'error' => 'Invalid file type']);
    exit();
}

// Generate filename and save file
$filename = "chunk_{$chunk_index}_" . time() . ".webm";
$filepath = $base_dir . $filename;

if (move_uploaded_file($file['tmp_name'], $filepath)) {
    // Log the chunk in database
    $recording_query = mysqli_query($conn, 
        "SELECT recording_id FROM class_recordings 
         WHERE class_id = '$meeting_id' AND student_id = '$user_id' 
         ORDER BY recording_id DESC LIMIT 1");
    
    $recording_id = null;
    if (mysqli_num_rows($recording_query) > 0) {
        $recording = mysqli_fetch_assoc($recording_query);
        $recording_id = $recording['recording_id'];
    } else {
        // Create a new recording entry
        $teacher_id_query = mysqli_query($conn, 
            "SELECT teacher_id FROM online_classes WHERE class_id = '$meeting_id'");
        $teacher = mysqli_fetch_assoc($teacher_id_query);
        $teacher_id = $teacher['teacher_id'];
        
        mysqli_query($conn, 
            "INSERT INTO class_recordings (class_id, teacher_id, student_id, file_path, recording_type, network_condition) 
             VALUES ('$meeting_id', '$teacher_id', '$user_id', '$filepath', 'student_auto', 'poor')");
        
        $recording_id = mysqli_insert_id($conn);
    }
    
    // Save chunk reference
    mysqli_query($conn, 
        "INSERT INTO recording_chunks (recording_id, chunk_index, file_path) 
         VALUES ('$recording_id', '$chunk_index', '$filepath')");
    
    echo json_encode(['success' => true, 'chunk_index' => $chunk_index]);
} else {
    echo json_encode(['success' => false, 'error' => 'Failed to save file']);
}