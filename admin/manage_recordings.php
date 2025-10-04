<?php
include('../header_dashboard.php');
include('../session.php');

if (!isset($_GET['class_id'])) {
    header('Location: online_classes.php');
    exit();
}

$class_id = mysqli_real_escape_string($conn, $_GET['class_id']);
$query = mysqli_query($conn, "SELECT * FROM online_classes WHERE class_id = '$class_id'");
$class = mysqli_fetch_assoc($query);

if (!$class) {
    header('Location: online_classes.php');
    exit();
}
?>
<body>
    <?php include('navbar_admin.php'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <?php include('sidebar_admin.php'); ?>
            <div class="span9" id="content">
                <div class="row-fluid">
                    <ul class="breadcrumb">
                        <li><a href="#"><b>Admin</b></a><span class="divider">/</span></li>
                        <li><a href="online_classes.php"><b>Online Classes</b></a><span class="divider">/</span></li>
                        <li><a href="#"><b>Manage Recordings: <?php echo htmlspecialchars($class['class_name']); ?></b></a></li>
                    </ul>
                    
                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">Manage Recordings</div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <?php
                                $recordings_query = mysqli_query($conn, 
                                    "SELECT cr.*, s.firstname, s.lastname 
                                     FROM class_recordings cr
                                     LEFT JOIN student s ON cr.student_id = s.student_id
                                     WHERE cr.class_id = '$class_id'
                                     ORDER BY cr.created_at DESC") or die(mysqli_error($conn));
                                
                                if (mysqli_num_rows($recordings_query) > 0) {
                                    echo '<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Recording</th>
                                                    <th>Type</th>
                                                    <th>Recorded By</th>
                                                    <th>Duration</th>
                                                    <th>Date</th>
                                                    <th>File Size</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
                                    
                                    while ($row = mysqli_fetch_array($recordings_query)) {
                                        $recorded_by = $row['student_id'] ? 
                                            $row['firstname'] . ' ' . $row['lastname'] : 'Teacher';
                                        
                                        $duration = gmdate("H:i:s", $row['duration']);
                                        $file_size = round($row['file_size'] / (1024 * 1024), 2) . ' MB';
                                        
                                        echo "<tr>
                                            <td>".htmlspecialchars(basename($row['file_path']))."</td>
                                            <td><span class='label'>".ucfirst($row['recording_type'])."</span></td>
                                            <td>".htmlspecialchars($recorded_by)."</td>
                                            <td>{$duration}</td>
                                            <td>".date('M j, Y g:i A', strtotime($row['created_at']))."</td>
                                            <td>{$file_size}</td>
                                            <td>
                                                <a href='../play_recording.php?recording_id={$row['recording_id']}' class='btn btn-info btn-small'>
                                                    <i class='icon-play icon-white'></i> Play
                                                </a>
                                                <a href='../download_recording.php?recording_id={$row['recording_id']}' class='btn btn-small'>
                                                    <i class='icon-download'></i> Download
                                                </a>
                                                <a href='delete_recording.php?recording_id={$row['recording_id']}' class='btn btn-danger btn-small' onclick='return confirm(\"Are you sure you want to delete this recording?\")'>
                                                    <i class='icon-trash icon-white'></i> Delete
                                                </a>
                                            </td>
                                        </tr>";
                                    }
                                    
                                    echo '</tbody></table>';
                                } else {
                                    echo '<div class="alert alert-info">
                                            <strong>No recordings available.</strong>
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
    <?php include('../footer.php'); ?>
    <?php include('../script.php'); ?>
</body>
</html>