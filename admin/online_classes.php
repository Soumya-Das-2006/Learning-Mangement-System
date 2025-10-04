<?php
include('../header_dashboard.php');
include('../session.php');
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
                        <li><a href="#"><b>Online Classes Management</b></a></li>
                    </ul>
                    
                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">All Online Classes</div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Class Name</th>
                                            <th>Subject</th>
                                            <th>Teacher</th>
                                            <th>Start Time</th>
                                            <th>Status</th>
                                            <th>Recordings</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = mysqli_query($conn, 
                                            "SELECT oc.*, t.firstname, t.lastname 
                                             FROM online_classes oc
                                             INNER JOIN teacher t ON oc.teacher_id = t.teacher_id
                                             ORDER BY oc.start_time DESC") or die(mysqli_error($conn));
                                        
                                        while ($row = mysqli_fetch_array($query)) {
                                            $status_class = '';
                                            if ($row['status'] == 'ongoing') {
                                                $status_class = 'label label-success';
                                            } elseif ($row['status'] == 'scheduled') {
                                                $status_class = 'label label-warning';
                                            } else {
                                                $status_class = 'label';
                                            }
                                            
                                            // Count recordings
                                            $recording_query = mysqli_query($conn, 
                                                "SELECT COUNT(*) as count FROM class_recordings 
                                                 WHERE class_id = '{$row['class_id']}'");
                                            $recording_count = mysqli_fetch_assoc($recording_query)['count'];
                                            
                                            echo "<tr>
                                                <td>".htmlspecialchars($row['class_name'])."</td>
                                                <td>".htmlspecialchars($row['subject_code'])."</td>
                                                <td>".htmlspecialchars($row['firstname'].' '.$row['lastname'])."</td>
                                                <td>".date('M j, Y g:i A', strtotime($row['start_time']))."</td>
                                                <td><span class='{$status_class}'>".ucfirst($row['status'])."</span></td>
                                                <td>{$recording_count}</td>
                                                <td>
                                                    <a href='../class_recordings.php?class_id={$row['class_id']}' class='btn btn-info btn-small'>
                                                        <i class='icon-download icon-white'></i> View
                                                    </a>
                                                    <a href='manage_recordings.php?class_id={$row['class_id']}' class='btn btn-small'>
                                                        <i class='icon-cog'></i> Manage
                                                    </a>
                                                </td>
                                            </tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
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