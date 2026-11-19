<?php
include('header_dashboard.php');
include('session.php');
include('dbcon.php');

// Get teacher's classes
$classes_query = mysqli_query($conn, 
    "SELECT oc.*, s.subject_title, 
            (SELECT COUNT(*) FROM class_attendance WHERE class_id = oc.class_id) as attendance_count,
            (SELECT COUNT(*) FROM class_recordings WHERE class_id = oc.class_id) as recording_count
     FROM online_classes oc
     INNER JOIN subject s ON oc.subject_code = s.subject_code
     WHERE oc.teacher_id = '$session_id'
     ORDER BY oc.start_time DESC");
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
                        <li><a href="#"><b>My Classes</b></a></li>
                    </ul>
                    
                    <?php if (isset($_GET['success'])): ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?php echo htmlspecialchars($_GET['success']); ?>
                    </div>
                    <?php endif; ?>
                    
                    <?php if (isset($_GET['error'])): ?>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?php echo htmlspecialchars($_GET['error']); ?>
                    </div>
                    <?php endif; ?>
                    
                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">My Online Classes</div>
                            <div class="pull-right">
                                <a href="create_class.php" class="btn btn-primary">
                                    <i class="icon-plus icon-white"></i> Create New Class
                                </a>
                            </div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <?php if (mysqli_num_rows($classes_query) > 0): ?>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Class Name</th>
                                            <th>Subject</th>
                                            <th>Start Time</th>
                                            <th>Status</th>
                                            <th>Attendance</th>
                                            <th>Recordings</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($class = mysqli_fetch_assoc($classes_query)): 
                                            $status_class = '';
                                            if ($class['status'] == 'ongoing') {
                                                $status_class = 'label label-success';
                                            } elseif ($class['status'] == 'scheduled') {
                                                $status_class = 'label label-warning';
                                            } else {
                                                $status_class = 'label';
                                            }
                                        ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($class['class_name']); ?></td>
                                                <td><?php echo htmlspecialchars($class['subject_code'] . ' - ' . $class['subject_title']); ?></td>
                                                <td><?php echo date('M j, Y g:i A', strtotime($class['start_time'])); ?></td>
                                                <td><span class="<?php echo $status_class; ?>"><?php echo ucfirst($class['status']); ?></span></td>
                                                <td><?php echo $class['attendance_count']; ?> students</td>
                                                <td><?php echo $class['recording_count']; ?> recordings</td>
                                                <td>
                                                    <?php if ($class['status'] == 'ongoing' || $class['status'] == 'scheduled'): ?>
                                                        <a href="join_class.php?class_id=<?php echo $class['class_id']; ?>" class="btn btn-success btn-small">
                                                            <i class="icon-facetime-video icon-white"></i> Join
                                                        </a>
                                                    <?php endif; ?>
                                                    <?php if ($class['status'] == 'completed'): ?>
                                                        <a href="class_recordings.php?class_id=<?php echo $class['class_id']; ?>" class="btn btn-info btn-small">
                                                            <i class="icon-download icon-white"></i> Recordings
                                                        </a>
                                                    <?php endif; ?>
                                                    <a href="delete_class.php?class_id=<?php echo $class['class_id']; ?>" class="btn btn-danger btn-small" onclick="return confirm('Are you sure you want to delete this class?')">
                                                        <i class="icon-trash icon-white"></i> Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                                <?php else: ?>
                                <div class="alert alert-info">
                                    <h4>No classes found</h4>
                                    <p>You haven't created any online classes yet. <a href="create_class.php">Create your first class</a> to get started.</p>
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
</body>
</html>