<?php
include('session.php');
require('opener_db.php');

$conn = $connector->DbConnector();

// Get form data
$class_id = mysqli_real_escape_string($conn, $_POST['class_id']);
$class_name = mysqli_real_escape_string($conn, $_POST['class_name']);
$subject_code = mysqli_real_escape_string($conn, $_POST['subject_code']);
$start_time = mysqli_real_escape_string($conn, $_POST['start_time']);
$allow_recording = isset($_POST['allow_recording']) ? 1 : 0;

// Verify the teacher owns this class
$verify_query = mysqli_query($conn, 
    "SELECT * FROM online_classes 
     WHERE class_id = '$class_id' AND teacher_id = '$session_id'");
     
if (mysqli_num_rows($verify_query) == 0) {
    header("Location: my_classes.php?error=You do not have permission to update this class");
    exit();
}

// Update class
$query = "UPDATE online_classes 
          SET class_name = '$class_name', subject_code = '$subject_code', 
              start_time = '$start_time', allow_recording = '$allow_recording'
          WHERE class_id = '$class_id'";

if (mysqli_query($conn, $query)) {
    header("Location: my_classes.php?success=Class updated successfully");
    exit();
} else {
    header("Location: edit_class.php?class_id=$class_id&error=".urlencode(mysqli_error($conn)));
    exit();
}
?>