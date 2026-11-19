<?php
include('session.php');
require('opener_db.php');

$conn = $connector->DbConnector();

// Generate a unique room name
$room_name = "class_".time()."_".mt_rand(1000, 9999);

// Save class to database
$teacher_id = $session_id;
$class_name = mysqli_real_escape_string($conn, $_POST['class_name']);
$subject_code = mysqli_real_escape_string($conn, $_POST['subject_code']);
$start_time = mysqli_real_escape_string($conn, $_POST['start_time']);
$allow_recording = isset($_POST['allow_recording']) ? 1 : 0;

$query = "INSERT INTO online_classes 
          (teacher_id, class_name, subject_code, start_time, room_name, allow_recording, status) 
          VALUES ('$teacher_id', '$class_name', '$subject_code', '$start_time', '$room_name', '$allow_recording', 'scheduled')";

if (mysqli_query($conn, $query)) {
    $class_id = mysqli_insert_id($conn);
    
    // Redirect to class management page
    header("Location: my_classes.php?success=Class created successfully");
    exit();
} else {
    header("Location: create_class.php?error=".urlencode(mysqli_error($conn)));
    exit();
}
?>