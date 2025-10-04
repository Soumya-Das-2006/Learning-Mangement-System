<?php
include('header_dashboard.php');
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
?>
<body>
    <?php 
    if ($_SESSION['user_type'] == 'teacher') {
        include('navbar_teacher.php');
    } else {
        include('navbar_student.php');
    }
    ?>
    
    <div class="container-fluid">
        <div class="row-fluid">
            <?php 
            if ($_SESSION['user_type'] == 'teacher') {
                include('teacher_online_sidebar.php');
            } else {
                include('student_online_sidebar.php');
            }
            ?>
            
            <div class="span9" id="content">
                <div class="row-fluid">
                    <ul class="breadcrumb">
                        <li><a href="#"><b>My Class</b></a><span class="divider">/</span></li>
                        <li><a href="class_recordings.php?class_id=<?php echo $recording['class_id']; ?>"><b>Recordings: <?php echo htmlspecialchars($recording['class_name']); ?></b></a><span class="divider">/</span></li>
                        <li><a href="#"><b>Play Recording</b></a></li>
                    </ul>
                    
                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">Play Recording: <?php echo htmlspecialchars(basename($recording['file_path'])); ?></div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <div class="recording-info">
                                    <p>
                                        <strong>Class:</strong> <?php echo htmlspecialchars($recording['class_name']); ?> |
                                        <strong>Subject:</strong> <?php echo htmlspecialchars($recording['subject_code']); ?> |
                                        <strong>Duration:</strong> <?php echo gmdate("H:i:s", $recording['duration']); ?> |
                                        <strong>Recorded:</strong> <?php echo date('M j, Y g:i A', strtotime($recording['created_at'])); ?>
                                    </p>
                                </div>
                                
                                <div class="video-player">
                                    <video controls width="100%" height="auto">
                                        <source src="<?php echo $recording['file_path']; ?>" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                                
                                <div class="recording-actions" style="margin-top: 20px;">
                                    <a href="<?php echo $recording['file_path']; ?>" download class="btn btn-success">
                                        <i class="icon-download icon-white"></i> Download Recording
                                    </a>
                                    <a href="class_recordings.php?class_id=<?php echo $recording['class_id']; ?>" class="btn">
                                        <i class="icon-arrow-left"></i> Back to Recordings
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
    <?php include('script.php'); ?>
</body>
</html>