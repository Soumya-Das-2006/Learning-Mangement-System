<?php
include('header_dashboard.php');
include('session.php');

// Get teacher stats
$total_classes = mysqli_query($conn, 
    "SELECT COUNT(*) as count FROM online_classes 
     WHERE teacher_id = '$session_id'");
$total_classes = mysqli_fetch_assoc($total_classes)['count'];

$ongoing_classes = mysqli_query($conn, 
    "SELECT COUNT(*) as count FROM online_classes 
     WHERE teacher_id = '$session_id' AND status = 'ongoing'");
$ongoing_classes = mysqli_fetch_assoc($ongoing_classes)['count'];

$scheduled_classes = mysqli_query($conn, 
    "SELECT COUNT(*) as count FROM online_classes 
     WHERE teacher_id = '$session_id' AND status = 'scheduled'");
$scheduled_classes = mysqli_fetch_assoc($scheduled_classes)['count'];

// Get recent classes
$recent_classes = mysqli_query($conn, 
    "SELECT * FROM online_classes 
     WHERE teacher_id = '$session_id' 
     ORDER BY start_time DESC LIMIT 5");
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
                        <li><a href="#"><b>Online Classroom</b></a></li>
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
                            <div class="muted pull-left">Online Classroom Dashboard</div>
                            <div class="pull-right">
                                <a href="create_class.php" class="btn btn-primary">
                                    <i class="icon-plus icon-white"></i> Create New Class
                                </a>
                            </div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <div class="well">
                                    <h4>Welcome to Online Classroom</h4>
                                    <p>From here you can create, manage, and join online classes. Use the buttons below to quickly access your classes or create new ones.</p>
                                    
                                    <div class="btn-group" style="margin-top: 15px;">
                                        <a href="create_class.php" class="btn btn-large btn-success">
                                            <i class="icon-plus icon-white"></i> Create New Class
                                        </a>
                                        <a href="my_classes.php" class="btn btn-large btn-info">
                                            <i class="icon-list icon-white"></i> View My Classes
                                        </a>
                                    </div>
                                </div>
                                
                                <div class="row-fluid">
                                    <div class="span6">
                                        <div class="well">
                                            <h4>Quick Stats</h4>
                                            <ul class="unstyled">
                                                <li><i class="icon-facetime-video"></i> Total Classes: <strong><?php echo $total_classes; ?></strong></li>
                                                <li><i class="icon-play-circle"></i> Ongoing Classes: <strong><?php echo $ongoing_classes; ?></strong></li>
                                                <li><i class="icon-time"></i> Scheduled Classes: <strong><?php echo $scheduled_classes; ?></strong></li>
                                            </ul>
                                        </div>
                                    </div>
                                    
                                    <div class="span6">
                                        <div class="well">
                                            <h4>Recent Classes</h4>
                                            <?php if (mysqli_num_rows($recent_classes) > 0): ?>
                                                <ul class="unstyled">
                                                <?php while ($class = mysqli_fetch_assoc($recent_classes)):
                                                    $status_class = '';
                                                    if ($class['status'] == 'ongoing') {
                                                        $status_class = 'label label-success';
                                                    } elseif ($class['status'] == 'scheduled') {
                                                        $status_class = 'label label-warning';
                                                    } else {
                                                        $status_class = 'label';
                                                    }
                                                ?>
                                                    <li>
                                                        <i class="icon-facetime-video"></i> 
                                                        <?php echo htmlspecialchars($class['class_name']); ?>
                                                        <span class="<?php echo $status_class; ?>"><?php echo ucfirst($class['status']); ?></span>
                                                        <small class="muted"><?php echo date('M j, g:i A', strtotime($class['start_time'])); ?></small>
                                                    </li>
                                                <?php endwhile; ?>
                                                </ul>
                                            <?php else: ?>
                                                <p class="muted">No classes found. Create your first class!</p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
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