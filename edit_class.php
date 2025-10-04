<?php
include('header_dashboard.php');
include('session.php');

if (!isset($_GET['class_id'])) {
    header('Location: my_classes.php');
    exit();
}

$class_id = mysqli_real_escape_string($conn, $_GET['class_id']);
$query = mysqli_query($conn, "SELECT * FROM online_classes WHERE class_id = '$class_id' AND teacher_id = '$session_id'");
$class = mysqli_fetch_assoc($query);

if (!$class) {
    header('Location: my_classes.php?error=Class not found');
    exit();
}
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
                        <li><a href="my_classes.php"><b>My Online Classes</b></a><span class="divider">/</span></li>
                        <li><a href="#"><b>Edit Class: <?php echo htmlspecialchars($class['class_name']); ?></b></a></li>
                    </ul>
                    
                    <?php if (isset($_GET['error'])): ?>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?php echo htmlspecialchars($_GET['error']); ?>
                    </div>
                    <?php endif; ?>
                    
                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">Edit Online Class</div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <form class="form-horizontal" method="post" action="update_class.php">
                                    <input type="hidden" name="class_id" value="<?php echo $class['class_id']; ?>">
                                    
                                    <div class="control-group">
                                        <label class="control-label">Class Name</label>
                                        <div class="controls">
                                            <input type="text" name="class_name" class="span8" value="<?php echo htmlspecialchars($class['class_name']); ?>" required>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label">Subject</label>
                                        <div class="controls">
                                            <select name="subject_code" class="span8" required>
                                                <?php
                                                $subjects_query = mysqli_query($conn, "SELECT * FROM teacher_class 
                                                    LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id 
                                                    WHERE teacher_id = '$session_id' 
                                                    GROUP BY subject.subject_id") or die(mysqli_error($conn));
                                                while ($row = mysqli_fetch_array($subjects_query)) {
                                                    $selected = $row['subject_code'] == $class['subject_code'] ? 'selected' : '';
                                                    echo "<option value='".$row['subject_code']."' $selected>".$row['subject_code']." - ".$row['subject_title']."</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label">Start Time</label>
                                        <div class="controls">
                                            <input type="datetime-local" name="start_time" class="span8" 
                                                   value="<?php echo date('Y-m-d\TH:i', strtotime($class['start_time'])); ?>" required>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <label class="control-label">Enable Auto-Recording</label>
                                        <div class="controls">
                                            <label class="checkbox">
                                                <input type="checkbox" name="allow_recording" value="1" <?php echo $class['allow_recording'] ? 'checked' : ''; ?>> 
                                                Automatically record when student network is poor
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" name="update" class="btn btn-success">
                                                <i class="icon-ok icon-white"></i> Update Class
                                            </button>
                                            <a href="my_classes.php" class="btn">
                                                <i class="icon-remove"></i> Cancel
                                            </a>
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