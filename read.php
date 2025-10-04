<?php
include('admin/dbcon.php');
include('session.php');

if (isset($_POST['read'])) {
    // Make sure selector exists and is an array
    if (isset($_POST['selector']) && is_array($_POST['selector'])) {
        $id = $_POST['selector'];
        $N = count($id);

        for ($i = 0; $i < $N; $i++) {
            $notif_id = mysqli_real_escape_string($conn, $id[$i]);
            mysqli_query(
                $conn,
                "INSERT INTO notification_read (student_id, student_read, notification_id) 
                 VALUES ('$session_id', 'yes', '$notif_id')"
            ) or die(mysqli_error($conn));
        }
    }
    ?>
    <script>
    window.location = 'student_notification.php';
    </script>
    <?php
}
?>
