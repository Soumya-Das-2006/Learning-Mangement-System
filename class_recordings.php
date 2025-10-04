<?php
include('header_dashboard.php');
include('session.php');
include('dbcon.php');

// Get class ID from URL
$class_id = isset($_GET['class_id']) ? mysqli_real_escape_string($conn, $_GET['class_id']) : null;

if (!$class_id) {
    header('Location: '.($_SESSION['user_type'] == 'teacher' ? 'my_classes.php' : 'student_online.php'));
    exit();
}

// Get class details with better error handling
$class_query = mysqli_query($conn, 
    "SELECT oc.*, t.firstname, t.lastname, s.subject_title 
     FROM online_classes oc
     INNER JOIN teacher t ON oc.teacher_id = t.teacher_id
     INNER JOIN subject s ON oc.subject_code = s.subject_code
     WHERE oc.class_id = '$class_id'");

if (!$class_query) {
    die('Database error: ' . mysqli_error($conn));
}

$class = mysqli_fetch_assoc($class_query);

if (!$class) {
    header('Location: '.($_SESSION['user_type'] == 'teacher' ? 'my_classes.php' : 'student_online.php') . '?error=Class not found');
    exit();
}

// Check access permissions with improved validation
if ($_SESSION['user_type'] == 'student') {
    $access_query = mysqli_query($conn, 
        "SELECT tcs.* FROM teacher_class_student tcs
         INNER JOIN teacher_class tc ON tcs.teacher_class_id = tc.teacher_class_id
         INNER JOIN subject s ON tc.subject_id = s.subject_id
         WHERE tcs.student_id = '$session_id' AND s.subject_code = '{$class['subject_code']}'");
    
    if (mysqli_num_rows($access_query) == 0) {
        header('Location: student_online.php?error=Access denied to this class');
        exit();
    }
} else if ($_SESSION['user_type'] == 'teacher' && $class['teacher_id'] != $session_id) {
    header('Location: my_classes.php?error=You do not have access to this class');
    exit();
}

// Get recordings for this class with improved query
if ($_SESSION['user_type'] == 'teacher') {
    $recordings_query = mysqli_query($conn, 
        "SELECT cr.*, 
                s.firstname, 
                s.lastname,
                s.username as student_enrollment
         FROM class_recordings cr
         LEFT JOIN student s ON cr.student_id = s.student_id
         WHERE cr.class_id = '$class_id'
         ORDER BY cr.created_at DESC");
} else {
    $recordings_query = mysqli_query($conn, 
        "SELECT cr.*, 
                t.firstname, 
                t.lastname,
                t.username as teacher_id
         FROM class_recordings cr
         INNER JOIN teacher t ON cr.teacher_id = t.teacher_id
         WHERE cr.class_id = '$class_id' 
         AND (cr.student_id IS NULL OR cr.student_id = '$session_id')
         ORDER BY cr.created_at DESC");
}

// Check if query was successful
if (!$recordings_query) {
    die('Database error: ' . mysqli_error($conn));
}

$recordings_count = mysqli_num_rows($recordings_query);
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
                include('teacher_sidebar.php');
            } else {
                include('student_sidebar.php');
            }
            ?>
            
            <div class="span9" id="content">
                <div class="row-fluid">
                    <ul class="breadcrumb">
                        <li><a href="#"><b>My Class</b></a><span class="divider">/</span></li>
                        <li><a href="<?php echo $_SESSION['user_type'] == 'teacher' ? 'my_classes.php' : 'student_online.php'; ?>"><b>Online Classes</b></a><span class="divider">/</span></li>
                        <li><a href="#"><b>Recordings: <?php echo htmlspecialchars($class['class_name']); ?></b></a></li>
                    </ul>
                    
                    <!-- Class Information -->
                    <div class="class-info alert alert-info">
                        <h4><?php echo htmlspecialchars($class['class_name']); ?></h4>
                        <p class="mb-0">
                            <strong>Subject:</strong> <?php echo htmlspecialchars($class['subject_code'] . ' - ' . $class['subject_title']); ?> | 
                            <strong>Teacher:</strong> <?php echo htmlspecialchars($class['firstname'] . ' ' . $class['lastname']); ?> | 
                            <strong>Date:</strong> <?php echo date('M j, Y g:i A', strtotime($class['start_time'])); ?> |
                            <strong>Status:</strong> <span class="label label-<?php echo $class['status'] == 'completed' ? 'success' : 'warning'; ?>">
                                <?php echo ucfirst($class['status']); ?>
                            </span>
                        </p>
                    </div>
                    
                    <!-- Recording Statistics -->
                    <?php if ($_SESSION['user_type'] == 'teacher' && $recordings_count > 0): ?>
                    <div class="alert alert-success">
                        <strong>Recording Statistics:</strong> 
                        Total <?php echo $recordings_count; ?> recording(s) available
                    </div>
                    <?php endif; ?>
                    
                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">Class Recordings</div>
                            <div class="pull-right">
                                <?php if ($_SESSION['user_type'] == 'teacher'): ?>
                                <a href="manage_recordings.php?class_id=<?php echo $class_id; ?>" class="btn btn-warning btn-small">
                                    <i class="icon-cog icon-white"></i> Manage Recordings
                                </a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <?php if ($recordings_count > 0): ?>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Recording Name</th>
                                                <?php if ($_SESSION['user_type'] == 'teacher'): ?>
                                                <th>Recorded By</th>
                                                <th>Enrollment No</th>
                                                <?php else: ?>
                                                <th>Type</th>
                                                <?php endif; ?>
                                                <th>Duration</th>
                                                <th>File Size</th>
                                                <th>Network Condition</th>
                                                <th>Recorded Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $counter = 1;
                                            while ($recording = mysqli_fetch_assoc($recordings_query)): 
                                                // Format file size
                                                $file_size = 'N/A';
                                                if ($recording['file_size'] > 0) {
                                                    if ($recording['file_size'] < 1024 * 1024) {
                                                        $file_size = round($recording['file_size'] / 1024, 2) . ' KB';
                                                    } else {
                                                        $file_size = round($recording['file_size'] / (1024 * 1024), 2) . ' MB';
                                                    }
                                                }
                                                
                                                // Format duration
                                                $duration = 'N/A';
                                                if ($recording['duration'] > 0) {
                                                    $hours = floor($recording['duration'] / 3600);
                                                    $minutes = floor(($recording['duration'] % 3600) / 60);
                                                    $seconds = $recording['duration'] % 60;
                                                    
                                                    if ($hours > 0) {
                                                        $duration = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
                                                    } else {
                                                        $duration = sprintf("%02d:%02d", $minutes, $seconds);
                                                    }
                                                }
                                                
                                                // Determine recording type and styling
                                                $recording_type = 'Teacher Recording';
                                                $type_badge = 'label-success';
                                                
                                                if ($recording['recording_type'] == 'student_auto') {
                                                    $recording_type = 'Auto Recording';
                                                    $type_badge = 'label-info';
                                                } elseif ($recording['student_id']) {
                                                    $recording_type = 'Student Recording';
                                                    $type_badge = 'label-warning';
                                                }
                                            ?>
                                            <tr>
                                                <td><?php echo $counter++; ?></td>
                                                <td>
                                                    <span class="label <?php echo $type_badge; ?>">
                                                        <?php echo $recording_type; ?>
                                                    </span>
                                                    <?php 
                                                    // Show filename if available
                                                    if (!empty($recording['file_path'])) {
                                                        $filename = basename($recording['file_path']);
                                                        echo '<br><small class="text-muted">' . htmlspecialchars($filename) . '</small>';
                                                    }
                                                    ?>
                                                </td>
                                                
                                                <?php if ($_SESSION['user_type'] == 'teacher'): ?>
                                                <td>
                                                    <?php if ($recording['student_id'] && !empty($recording['firstname'])): ?>
                                                    <?php echo htmlspecialchars($recording['firstname'] . ' ' . $recording['lastname']); ?>
                                                    <?php else: ?>
                                                    <strong><?php echo htmlspecialchars($class['firstname'] . ' ' . $class['lastname']); ?></strong>
                                                    <small class="text-muted">(Teacher)</small>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if ($recording['student_id'] && !empty($recording['student_enrollment'])): ?>
                                                    <?php echo htmlspecialchars($recording['student_enrollment']); ?>
                                                    <?php else: ?>
                                                    <span class="text-muted">-</span>
                                                    <?php endif; ?>
                                                </td>
                                                <?php else: ?>
                                                <td>
                                                    <span class="label <?php echo $type_badge; ?>">
                                                        <?php echo $recording_type; ?>
                                                    </span>
                                                </td>
                                                <?php endif; ?>
                                                
                                                <td><?php echo $duration; ?></td>
                                                <td><?php echo $file_size; ?></td>
                                                <td>
                                                    <?php if ($recording['network_condition']): ?>
                                                    <span class="label label-danger">Poor Network</span>
                                                    <?php else: ?>
                                                    <span class="label label-success">Good</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo date('M j, Y g:i A', strtotime($recording['created_at'])); ?></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="play_recording.php?recording_id=<?php echo $recording['recording_id']; ?>" 
                                                           class="btn btn-info btn-small" target="_blank" title="Play Recording">
                                                            <i class="icon-play icon-white"></i> Play
                                                        </a>
                                                        <a href="download_recording.php?recording_id=<?php echo $recording['recording_id']; ?>" 
                                                           class="btn btn-success btn-small" title="Download Recording">
                                                            <i class="icon-download icon-white"></i> Download
                                                        </a>
                                                        <?php if ($_SESSION['user_type'] == 'teacher'): ?>
                                                        <a href="delete_recording.php?recording_id=<?php echo $recording['recording_id']; ?>&class_id=<?php echo $class_id; ?>" 
                                                           class="btn btn-danger btn-small" 
                                                           onclick="return confirm('Are you sure you want to delete this recording?')"
                                                           title="Delete Recording">
                                                            <i class="icon-trash icon-white"></i>
                                                        </a>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <!-- Additional information for teachers -->
                                <?php if ($_SESSION['user_type'] == 'teacher'): ?>
                                <div class="alert alert-warning">
                                    <h5>Recording Information:</h5>
                                    <ul class="unstyled">
                                        <li><span class="label label-success">Teacher Recording</span> - Recordings created by you</li>
                                        <li><span class="label label-warning">Student Recording</span> - Recordings created by students</li>
                                        <li><span class="label label-info">Auto Recording</span> - Automatic recordings due to network issues</li>
                                        <li><span class="label label-danger">Poor Network</span> - Recording was made during poor network conditions</li>
                                    </ul>
                                </div>
                                <?php endif; ?>
                                
                                <?php else: ?>
                                <div class="alert alert-info text-center">
                                    <h4>No recordings available</h4>
                                    <p>There are no recordings for this class yet.</p>
                                    <?php if ($_SESSION['user_type'] == 'teacher'): ?>
                                    <p class="mt-3">
                                        <strong>Note:</strong> Recordings will appear here automatically after you start recording during a class session.
                                    </p>
                                    <?php else: ?>
                                    <p class="mt-3">
                                        <strong>Note:</strong> Recordings will appear here once they are available. Please check back later.
                                    </p>
                                    <?php endif; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php include('footer.php'); ?>
    <?php include('script.php'); ?>
    
    <style>
    .table-responsive {
        overflow-x: auto;
    }
    .btn-group .btn {
        margin-right: 2px;
    }
    .class-info {
        border-left: 4px solid #5bc0de;
    }
    </style>
</body>
</html>