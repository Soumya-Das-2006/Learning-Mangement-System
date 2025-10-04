<?php
include('admin/dbcon.php');
include('session.php');

if (isset($_POST['read'])) {

    // ✅ Check if selector exists and is a non-empty array
    if (isset($_POST['selector']) && is_array($_POST['selector']) && count($_POST['selector']) > 0) {

        $id = $_POST['selector'];
        $N = count($id);

        for ($i = 0; $i < $N; $i++) {
            $notification_id = mysqli_real_escape_string($conn, $id[$i]);

            mysqli_query(
                $conn,
                "INSERT INTO notification_read_teacher (teacher_id, student_read, notification_id)
                 VALUES ('$session_id', 'yes', '$notification_id')"
            ) or die(mysqli_error($conn));
        }

        // ✅ Redirect after success
        echo "<script>window.location = 'notification_teacher.php';</script>";

    } else {
        // ✅ No notification selected → show alert and redirect back
        echo "<script>alert('No notifications selected!'); window.location = 'notification_teacher.php';</script>";
    }
}
?>
