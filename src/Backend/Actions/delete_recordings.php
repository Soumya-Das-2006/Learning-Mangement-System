<?php
include('session.php');
include('dbcon.php');

if ($_SESSION['user_type'] != 'teacher') {
    header('Location: index.php?error=Access denied');
    exit();
}

if (!isset($_GET['recording_id']) || !isset($_GET['class_id'])) {
    header('Location: my_classes.php');
    exit();
}

$recording_id = mysqli_real_escape_string($conn, $_GET['recording_id']);
$class_id = mysqli_real_escape_string($conn, $_GET['class_id']);

// Verify the teacher owns this recording
$verify_query = mysqli_query($conn, 
    "SELECT cr.* FROM class_recordings cr
     INNER JOIN online_classes oc ON cr.class_id = oc.class_id
     WHERE cr.recording_id = '$recording_id' AND oc.teacher_id = '$session_id'");
    
if (mysqli_num_rows($verify_query) == 0) {
    header('Location: class_recordings.php?class_id=' . $class_id . '&error=Recording not found');
    exit();
}

$recording = mysqli_fetch_assoc($verify_query);

// Delete physical file
if (file_exists($recording['file_path'])) {
    unlink($recording['file_path']);
}

// Delete database record
mysqli_query($conn, "DELETE FROM class_recordings WHERE recording_id = '$recording_id'");

header('Location: class_recordings.php?class_id=' . $class_id . '&success=Recording deleted successfully');
exit();
?>