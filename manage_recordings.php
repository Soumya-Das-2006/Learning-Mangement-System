<?php
include('header_dashboard.php');
include('session.php');
include('dbcon.php');

if ($_SESSION['user_type'] != 'teacher') {
    header('Location: index.php?error=Access denied');
    exit();
}

if (!isset($_GET['class_id'])) {
    header('Location: my_classes.php');
    exit();
}

$class_id = mysqli_real_escape_string($conn, $_GET['class_id']);

// Verify the teacher owns this class
$verify_query = mysqli_query($conn, 
    "SELECT * FROM online_classes WHERE class_id = '$class_id' AND teacher_id = '$session_id'");
    
if (mysqli_num_rows($verify_query) == 0) {
    header('Location: my_classes.php?error=Class not found');
    exit();
}

$class = mysqli_fetch_assoc($verify_query);

// Handle recording deletion
if (isset($_GET['delete_recording'])) {
    $recording_id = mysqli_real_escape_string($conn, $_GET['delete_recording']);
    
    // Get recording details to delete file
    $recording_query = mysqli_query($conn, 
        "SELECT * FROM class_recordings WHERE recording_id = '$recording_id' AND class_id = '$class_id'");
    
    if (mysqli_num_rows($recording_query) > 0) {
        $recording = mysqli_fetch_assoc($recording_query);
        
        // Delete physical file
        if (file_exists($recording['file_path'])) {
            unlink($recording['file_path']);
        }
        
        // Delete database record
        mysqli_query($conn, "DELETE FROM class_recordings WHERE recording_id = '$recording_id'");
        
        header('Location: manage_recordings.php?class_id=' . $class_id . '&success=Recording deleted');
        exit();
    }
}

// Get all recordings for this class
$recordings_query = mysqli_query($conn, 
    "SELECT cr.*, s.firstname, s.lastname, s.username as enrollment_no
     FROM class_recordings cr
     LEFT JOIN student s ON cr.student_id = s.student_id
     WHERE cr.class_id = '$class_id'
     ORDER BY cr.created_at DESC");
?>

<body>
    <?php include('navbar_teacher.php'); ?>
    
    <div class="container-fluid">
        <div class="row-fluid">
            <?php include('teacher_sidebar.php'); ?>
            
            <div class="span9" id="content">
                <div class="row-fluid">
                    <ul class="breadcrumb">
                        <li><a href="#"><b>My Class</b></a><span class="divider">/</span></li>
                        <li><a href="my_classes.php"><b>Online Classes</b></a><span class="divider">/</span></li>
                        <li><a href="class_recordings.php?class_id=<?php echo $class_id; ?>"><b>Recordings</b></a><span class="divider">/</span></li>
                        <li><a href="#"><b>Manage Recordings</b></a></li>
                    </ul>
                    
                    <!-- Rest of the management interface similar to class_recordings.php but with more admin controls -->
                </div>
            </div>
        </div>
    </div>
    
    <?php include('footer.php'); ?>
</body>
</html>