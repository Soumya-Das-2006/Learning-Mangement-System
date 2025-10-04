<?php
include('session.php');

if (!isset($_GET['recording_id'])) {
    header('Location: '.($_SESSION['user_type'] == 'teacher' ? 'my_classes.php' : 'student_online.php'));
    exit();
}

$recording_id = mysqli_real_escape_string($conn, $_GET['recording_id']);
$query = mysqli_query($conn, 
    "SELECT cr.*, oc.class_name, oc.subject_code 
     FROM class_recordings cr
     INNER JOIN online_classes oc ON cr.class_id = oc.class_id
     WHERE cr.recording_id = '$recording_id'");
$recording = mysqli_fetch_assoc($query);

if (!$recording) {
    header('Location: '.($_SESSION['user_type'] == 'teacher' ? 'my_classes.php' : 'student_online.php'));
    exit();
}

// Check if user has access to this recording
if ($_SESSION['user_type'] == 'student') {
    $access_query = mysqli_query($conn, 
        "SELECT * FROM teacher_class_student tcs
         INNER JOIN teacher_class tc ON tcs.teacher_class_id = tc.teacher_class_id
         WHERE tcs.student_id = '$session_id' AND tc.subject_code = '{$recording['subject_code']}'");
    
    if (mysqli_num_rows($access_query) == 0) {
        header('Location: student_online.php?error=Access denied');
        exit();
    }
} else if ($_SESSION['user_type'] == 'teacher' && $recording['teacher_id'] != $session_id) {
    header('Location: my_classes.php?error=Access denied');
    exit();
}

// Serve the file for download
if (file_exists($recording['file_path'])) {
    header('Content-Description: File Transfer');
    header('Content-Type: video/mp4');
    header('Content-Disposition: attachment; filename="'.basename($recording['file_path']).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($recording['file_path']));
    readfile($recording['file_path']);
    exit;
} else {
    header('Location: class_recordings.php?class_id='.$recording['class_id'].'&error=File not found');
    exit();
}
?>