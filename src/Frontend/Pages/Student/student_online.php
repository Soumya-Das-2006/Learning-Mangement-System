<?php
include('header_dashboard.php');
include('session.php');
include('dbcon.php');

// Ensure only students can access
// if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'student') {
//     header("Location: login.php");
//     exit();
// }

$session_id = $_SESSION['id']; // student_id from session
?>
<body>
    <?php include('navbar_student.php'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <?php include('student_online_sidebar.php'); ?>
            <div class="span9" id="content">
                <div class="row-fluid">
                    <ul class="breadcrumb">
                        <li><a href="#"><b>My Class</b></a><span class="divider">/</span></li>
                        <li><a href="#"><b>Online Classes</b></a></li>
                    </ul>
                    
                    <!-- Upcoming/ongoing classes -->
                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">Available Online Classes</div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <?php
                                // FIXED QUERY: Added DISTINCT to remove duplicate classes
                                $query = mysqli_query($conn, 
                                    "SELECT DISTINCT oc.class_id, oc.class_name, oc.teacher_id, oc.subject_code, 
                                            oc.start_time, oc.status, oc.room_name,
                                            s.subject_title 
                                     FROM online_classes oc
                                     INNER JOIN subject s ON oc.subject_code = s.subject_code
                                     INNER JOIN teacher_class tc ON s.subject_id = tc.subject_id
                                     INNER JOIN teacher_class_student tcs ON tc.teacher_class_id = tcs.teacher_class_id
                                     WHERE tcs.student_id = '$session_id' 
                                       AND oc.status IN ('scheduled', 'ongoing')
                                     ORDER BY oc.start_time DESC") or die(mysqli_error($conn));
                                
                                if (mysqli_num_rows($query) > 0): ?>
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Class Name</th>
                                                <th>Subject</th>
                                                <th>Teacher</th>
                                                <th>Start Time</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $displayed_classes = array(); // Track displayed classes to avoid duplicates
                                            while ($row = mysqli_fetch_array($query)):
                                                // Check if we've already displayed this class
                                                if (in_array($row['class_id'], $displayed_classes)) {
                                                    continue; // Skip duplicate
                                                }
                                                $displayed_classes[] = $row['class_id']; // Add to displayed list
                                                
                                                $teacher_query = mysqli_query($conn, 
                                                    "SELECT firstname, lastname FROM teacher WHERE teacher_id = '{$row['teacher_id']}'");
                                                $teacher = mysqli_fetch_assoc($teacher_query);
                                                $teacher_name = $teacher['firstname'] . ' ' . $teacher['lastname'];
                                                
                                                $status_class = '';
                                                if ($row['status'] == 'ongoing') {
                                                    $status_class = 'label label-success';
                                                } elseif ($row['status'] == 'scheduled') {
                                                    $status_class = 'label label-warning';
                                                }
                                                ?>
                                                <tr>
                                                    <td><?php echo htmlspecialchars($row['class_name']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['subject_code'])." - ".htmlspecialchars($row['subject_title']); ?></td>
                                                    <td><?php echo htmlspecialchars($teacher_name); ?></td>
                                                    <td><?php echo date('M j, Y g:i A', strtotime($row['start_time'])); ?></td>
                                                    <td><span class="<?php echo $status_class; ?>"><?php echo ucfirst($row['status']); ?></span></td>
                                                    <td>
                                                        <?php if ($row['status'] == 'ongoing'): ?>
                                                            <a href="join_class.php?class_id=<?php echo $row['class_id']; ?>" class="btn btn-success btn-small">
                                                                <i class="icon-facetime-video icon-white"></i> Join Class
                                                            </a>
                                                        <?php elseif ($row['status'] == 'scheduled'): ?>
                                                            <button class="btn btn-warning btn-small" disabled>
                                                                <i class="icon-time icon-white"></i> Not Started
                                                            </button>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                <?php else: ?>
                                    <div class="alert alert-info">
                                        <strong>No online classes scheduled.</strong> Check back later for upcoming classes.
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Previous Classes Section -->
                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">Previous Classes with Recordings</div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <?php
                                // FIXED QUERY: Added DISTINCT to remove duplicate classes
                                $prev_query = mysqli_query($conn, 
                                    "SELECT DISTINCT oc.class_id, oc.class_name, oc.teacher_id, oc.subject_code, 
                                            oc.start_time, oc.status, oc.room_name,
                                            s.subject_title 
                                     FROM online_classes oc
                                     INNER JOIN subject s ON oc.subject_code = s.subject_code
                                     INNER JOIN teacher_class tc ON s.subject_id = tc.subject_id
                                     INNER JOIN teacher_class_student tcs ON tc.teacher_class_id = tcs.teacher_class_id
                                     WHERE tcs.student_id = '$session_id' 
                                       AND oc.status = 'completed'
                                     ORDER BY oc.start_time DESC") or die(mysqli_error($conn));
                                
                                if (mysqli_num_rows($prev_query) > 0): ?>
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Class Name</th>
                                                <th>Subject</th>
                                                <th>Teacher</th>
                                                <th>Date</th>
                                                <th>Recordings</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $displayed_prev_classes = array(); // Track displayed previous classes
                                            while ($row = mysqli_fetch_array($prev_query)):
                                                // Check if we've already displayed this class
                                                if (in_array($row['class_id'], $displayed_prev_classes)) {
                                                    continue; // Skip duplicate
                                                }
                                                $displayed_prev_classes[] = $row['class_id']; // Add to displayed list
                                                
                                                $teacher_query = mysqli_query($conn, 
                                                    "SELECT firstname, lastname FROM teacher WHERE teacher_id = '{$row['teacher_id']}'");
                                                $teacher = mysqli_fetch_assoc($teacher_query);
                                                $teacher_name = $teacher['firstname'] . ' ' . $teacher['lastname'];
                                                
                                                $recording_query = mysqli_query($conn, 
                                                    "SELECT COUNT(*) as count FROM class_recordings 
                                                     WHERE class_id = '{$row['class_id']}'");
                                                $recording_count = mysqli_fetch_assoc($recording_query)['count'];
                                                ?>
                                                <tr>
                                                    <td><?php echo htmlspecialchars($row['class_name']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['subject_code'])." - ".htmlspecialchars($row['subject_title']); ?></td>
                                                    <td><?php echo htmlspecialchars($teacher_name); ?></td>
                                                    <td><?php echo date('M j, Y', strtotime($row['start_time'])); ?></td>
                                                    <td>
                                                        <?php if ($recording_count > 0): ?>
                                                            <a href="class_recordings.php?class_id=<?php echo $row['class_id']; ?>" class="btn btn-info btn-small">
                                                                <i class="icon-download icon-white"></i> View Recordings (<?php echo $recording_count; ?>)
                                                            </a>
                                                        <?php else: ?>
                                                            <span class="text-muted">No recordings available</span>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                <?php else: ?>
                                    <div class="alert alert-info">
                                        <strong>No previous classes with recordings.</strong>
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