<?php
include('dbcon.php');
include('session.php');

if (!isset($_GET['class_id'])) {
    header('Location: my_classes.php');
    exit();
}

$class_id = mysqli_real_escape_string($conn, $_GET['class_id']);

// Verify the class belongs to the teacher
$verify_query = mysqli_query($conn, 
    "SELECT * FROM online_classes WHERE class_id = '$class_id' AND teacher_id = '$session_id'");
    
if (mysqli_num_rows($verify_query) == 0) {
    header('Location: my_classes.php?error=Class not found or access denied');
    exit();
}

// Delete class and related data
mysqli_query($conn, "DELETE FROM class_attendance WHERE class_id = '$class_id'");
mysqli_query($conn, "DELETE FROM network_logs WHERE class_id = '$class_id'");
mysqli_query($conn, "DELETE FROM class_chat WHERE class_id = '$class_id'");

// Delete recordings and chunks
$recordings_query = mysqli_query($conn, "SELECT recording_id, file_path FROM class_recordings WHERE class_id = '$class_id'");
while ($recording = mysqli_fetch_assoc($recordings_query)) {
    // Delete recording file
    if (file_exists($recording['file_path'])) {
        unlink($recording['file_path']);
    }
    
    // Delete chunks
    $chunks_query = mysqli_query($conn, "SELECT file_path FROM recording_chunks WHERE recording_id = '{$recording['recording_id']}'");
    while ($chunk = mysqli_fetch_assoc($chunks_query)) {
        if (file_exists($chunk['file_path'])) {
            unlink($chunk['file_path']);
        }
    }
    
    mysqli_query($conn, "DELETE FROM recording_chunks WHERE recording_id = '{$recording['recording_id']}'");
}

mysqli_query($conn, "DELETE FROM class_recordings WHERE class_id = '$class_id'");
mysqli_query($conn, "DELETE FROM online_classes WHERE class_id = '$class_id'");

header('Location: my_classes.php?success=Class deleted successfully');
exit();