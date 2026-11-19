<?php
include('header_dashboard.php');
include('session.php');

if (!isset($_GET['class_id'])) {
    header('Location: '.($_SESSION['user_type'] == 'teacher' ? 'my_classes.php' : 'student_online.php'));
    exit();
}

$class_id = mysqli_real_escape_string($conn, $_GET['class_id']);
$query = mysqli_query($conn, "SELECT * FROM online_classes WHERE class_id = '$class_id'");
$class = mysqli_fetch_assoc($query);

if (!$class) {
    header('Location: '.($_SESSION['user_type'] == 'teacher' ? 'my_classes.php' : 'student_online.php'));
    exit();
}

// Check if user has access to this class
if ($_SESSION['user_type'] == 'teacher' && $class['teacher_id'] != $session_id) {
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
                        <li><a href="class_recordings.php?class_id=<?php echo $class['class_id']; ?>"><b>Recordings: <?php echo htmlspecialchars($class['class_name']); ?></b></a><span class="divider">/</span></li>
                        <li><a href="#"><b>Attendance</b></a></li>
                    </ul>
                    
                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">Class Attendance: <?php echo htmlspecialchars($class['class_name']); ?></div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <?php
                                $attendance_query = mysqli_query($conn, 
                                    "SELECT oa.*, s.firstname, s.lastname, s.student_id 
                                     FROM online_attendance oa
                                     INNER JOIN student s ON oa.student_id = s.student_id
                                     WHERE oa.class_id = '$class_id'
                                     ORDER BY oa.join_time DESC") or die(mysqli_error($conn));
                                
                                if (mysqli_num_rows($attendance_query) > 0) {
                                    echo '<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Student Name</th>
                                                    <th>Student ID</th>
                                                    <th>Join Time</th>
                                                    <th>Leave Time</th>
                                                    <th>Duration</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
                                    
                                    while ($row = mysqli_fetch_array($attendance_query)) {
                                        $duration = $row['duration'] > 0 ? gmdate("H:i:s", $row['duration']) : 'N/A';
                                        $leave_time = $row['leave_time'] ? date('M j, Y g:i A', strtotime($row['leave_time'])) : 'Still in class';
                                        
                                        echo "<tr>
                                            <td>".htmlspecialchars($row['firstname'].' '.$row['lastname'])."</td>
                                            <td>".htmlspecialchars($row['student_id'])."</td>
                                            <td>".date('M j, Y g:i A', strtotime($row['join_time']))."</td>
                                            <td>{$leave_time}</td>
                                            <td>{$duration}</td>
                                            <td><span class='label label-success'>Present</span></td>
                                        </tr>";
                                    }
                                    
                                    echo '</tbody></table>';
                                } else {
                                    echo '<div class="alert alert-info">
                                            <strong>No attendance records found.</strong> 
                                            Students will appear here once they join the class.
                                          </div>';
                                }
                                ?>
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