<?php
include('header_dashboard.php');
include('session.php');
include('dbcon.php');
include('notification_system.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $teacher_id = $session_id;
    $subject_code = mysqli_real_escape_string($conn, $_POST['subject_code']);
    $class_name = mysqli_real_escape_string($conn, $_POST['class_name']);
    $start_time = mysqli_real_escape_string($conn, $_POST['start_time']);
    $allow_recording = isset($_POST['allow_recording']) ? 1 : 0;
    
    // Generate unique room name
    $room_name = "parul_class_" . uniqid();
    
    $query = "INSERT INTO online_classes (teacher_id, subject_code, class_name, room_name, start_time, allow_recording) 
              VALUES ('$teacher_id', '$subject_code', '$class_name', '$room_name', '$start_time', '$allow_recording')";
    
    if (mysqli_query($conn, $query)) {
        $class_id = mysqli_insert_id($conn);
        
        // Send notification to students
        $message = "New class scheduled: $class_name at " . date('M j, g:i A', strtotime($start_time));
        sendClassNotification($class_id, $message);
        
        header("Location: my_classes.php?success=Class created successfully and notifications sent to students");
        exit();
    } else {
        $error = "Error creating class: " . mysqli_error($conn);
    }
}

// Get teacher's subjects
$subjects_query = mysqli_query($conn, 
    "SELECT DISTINCT s.subject_code, s.subject_title 
     FROM subject s 
     INNER JOIN teacher_class tc ON s.subject_id = tc.subject_id 
     WHERE tc.teacher_id = '$session_id'");
?>

<body>
    <?php include('navbar_teacher.php'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <?php include('teacher_online_sidebar.php'); ?>
            <div class="span9" id="content">
                <div class="row-fluid">
                    <ul class="breadcrumb">
                        <li><a href="#"><b>My Class</b></a><span class="divider">/</span></li>
                        <li><a href="teacher_online.php"><b>Online Classroom</b></a><span class="divider">/</span></li>
                        <li><a href="#"><b>Create New Class</b></a></li>
                    </ul>
                    
                    <?php if (isset($error)): ?>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?php echo $error; ?>
                    </div>
                    <?php endif; ?>
                    
                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">Create New Online Class</div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <form method="POST" class="form-horizontal">
                                    <div class="control-group">
                                        <label class="control-label" for="subject_code">Subject</label>
                                        <div class="controls">
                                            <select name="subject_code" id="subject_code" required>
                                                <option value="">Select Subject</option>
                                                <?php while ($subject = mysqli_fetch_assoc($subjects_query)): ?>
                                                <option value="<?php echo $subject['subject_code']; ?>">
                                                    <?php echo $subject['subject_code'] . ' - ' . $subject['subject_title']; ?>
                                                </option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="class_name">Class Name</label>
                                        <div class="controls">
                                            <input type="text" name="class_name" id="class_name" required 
                                                   placeholder="e.g., Data Structures Lecture 1">
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="start_time">Start Time</label>
                                        <div class="controls">
                                            <input type="datetime-local" name="start_time" id="start_time" required>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="allow_recording">Recording</label>
                                        <div class="controls">
                                            <label class="checkbox">
                                                <input type="checkbox" name="allow_recording" id="allow_recording" value="1" checked>
                                                Allow automatic recording for students with poor network
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" class="btn btn-success">
                                                <i class="icon-plus icon-white"></i> Create Class
                                            </button>
                                            <a href="teacher_online.php" class="btn">Cancel</a>
                                        </div>
                                    </div>
                                </form>
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