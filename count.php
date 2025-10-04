<<<<<<< HEAD
					<?php
						$school_year_query = mysqli_query($conn,"select * from school_year order by school_year DESC")or die(mysqli_error());
						$school_year_query_row = mysqli_fetch_array($school_year_query);
						$school_year = $school_year_query_row['school_year'];
						?>
				
	 				<?php $query_yes = mysqli_query($conn,"select * from teacher_class_student
					LEFT JOIN teacher_class ON teacher_class.teacher_class_id = teacher_class_student.teacher_class_id 
					LEFT JOIN class ON class.class_id = teacher_class.class_id 
					LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
					LEFT JOIN teacher ON teacher.teacher_id = teacher_class_student.teacher_id 
					JOIN notification ON notification.teacher_class_id = teacher_class.teacher_class_id 
					where teacher_class_student.student_id = '$session_id' and school_year = '$school_year'   order by notification.date_of_notification DESC
					")or die(mysqli_error());
					$count_no = mysqli_num_rows($query_yes);

		
		            ?>
					<?php $query_no = mysqli_query($conn,"select * from notification 
					LEFT JOIN notification_read ON notification_read.notification_id = notification.notification_id
					where notification_read.student_id  = '$session_id'
					")or die(mysqli_error());
					$count_yes = mysqli_num_rows($query_no);
					
		            ?>
					
					<?php $not_read = $count_no -  $count_yes; ?>
=======
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
>>>>>>> 41343db (Added LMS project files)
