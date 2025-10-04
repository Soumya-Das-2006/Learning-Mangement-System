<?php
// Get the latest school year
$school_year_query = mysqli_query($conn,"SELECT * FROM school_year ORDER BY school_year DESC") 
    or die(mysqli_error($conn));
$school_year_query_row = mysqli_fetch_array($school_year_query);
$school_year = $school_year_query_row ? $school_year_query_row['school_year'] : '';

// Total notifications for this student (in this school year)
$query_total = mysqli_query(
    $conn,
    "SELECT n.notification_id
     FROM teacher_class_student tcs
     LEFT JOIN teacher_class tc ON tc.teacher_class_id = tcs.teacher_class_id 
     JOIN notification n ON n.teacher_class_id = tc.teacher_class_id 
     WHERE tcs.student_id = '$session_id' 
       AND tc.school_year = '$school_year'"
) or die(mysqli_error($conn));
$count_total = mysqli_num_rows($query_total);

// Total notifications that student has already read (filtered by same school_year)
$query_read = mysqli_query(
    $conn,
    "SELECT r.notification_id
     FROM notification_read r
     JOIN notification n ON n.notification_id = r.notification_id
     JOIN teacher_class tc ON tc.teacher_class_id = n.teacher_class_id
     WHERE r.student_id = '$session_id'
       AND tc.school_year = '$school_year'
       AND r.student_read = 'yes'"
) or die(mysqli_error($conn));
$count_read = mysqli_num_rows($query_read);

// Unread notifications = total - read, but never below 0
$not_read = max(0, $count_total - $count_read);
?>
