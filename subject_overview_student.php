<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<<<<<<< HEAD
<?php $get_id = $_GET['id']; ?>
    <body>
		<?php include('navbar_student.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('subject_overview_link_student.php'); ?>
                <div class="span9" id="content">
                     <div class="row-fluid">
					  <!-- breadcrumb -->
				
										<?php $class_query = mysqli_query($conn,"select * from teacher_class
										LEFT JOIN class ON class.class_id = teacher_class.class_id
										LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
										where teacher_class_id = '$get_id'")or die(mysqli_error());
										$class_row = mysqli_fetch_array($class_query);
										?>
				
					     <ul class="breadcrumb">
							<li><a href="#"><?php echo $class_row['class_name']; ?></a> <span class="divider">/</span></li>
							<li><a href="#"><?php echo $class_row['subject_code']; ?></a> <span class="divider">/</span></li>
							<li><a href="#"><b>Subject Overview</b></a></li>
						</ul>
						 <!-- end breadcrumb -->
					 
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								
  											<?php $query = mysqli_query($conn,"select * from teacher_class
										LEFT JOIN class ON class.class_id = teacher_class.class_id
										LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
										LEFT JOIN teacher ON teacher.teacher_id = teacher_class.teacher_id
										
										where teacher_class_id = '$get_id'")or die(mysqli_error());
										$row = mysqli_fetch_array($query);
										$id = $row['teacher_class_id'];
				
										?>
										
										
										Instructor: <strong><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></strong>
															<br>
															<img id="avatar" class="img-polaroid" src="admin/<?php echo $row['location']; ?>" width>
															<p><a href=""><i class="icon-search"></i> view info</a></p>
															<hr>
										<?php $query = mysqli_query($conn,"select * from teacher_class
											LEFT JOIN class_subject_overview ON class_subject_overview.teacher_class_id = teacher_class.teacher_class_id
											where class_subject_overview.teacher_class_id = '$get_id'")or die(mysqli_error());
											$row_subject = mysqli_fetch_array($query); ?>
										<?php echo $row_subject['content']; ?>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>
</html>
=======
<?php 
// Validate GET id
$get_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
?>
<body>
    <?php include('navbar_student.php'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <?php include('subject_overview_link_student.php'); ?>
            <div class="span9" id="content">
                <div class="row-fluid">
                    <!-- breadcrumb -->
                    <?php 
                    $class_query = mysqli_query($conn,"
                        SELECT * FROM teacher_class
                        LEFT JOIN class ON class.class_id = teacher_class.class_id
                        LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
                        WHERE teacher_class_id = '$get_id'
                    ") or die(mysqli_error($conn));

                    $class_row = mysqli_fetch_array($class_query);
                    ?>

                    <ul class="breadcrumb">
                        <?php if ($class_row): ?>
                            <li><a href="#"><?php echo htmlspecialchars($class_row['class_name']); ?></a> <span class="divider">/</span></li>
                            <li><a href="#"><?php echo htmlspecialchars($class_row['subject_code']); ?></a> <span class="divider">/</span></li>
                        <?php else: ?>
                            <li><a href="#">Unknown Class</a> <span class="divider">/</span></li>
                        <?php endif; ?>
                        <li><a href="#"><b>Subject Overview</b></a></li>
                    </ul>
                    <!-- end breadcrumb -->

                    <!-- block -->
                    <div id="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
                            <div id="" class="muted pull-left"></div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">

                                <?php 
                                $query = mysqli_query($conn,"
                                    SELECT * FROM teacher_class
                                    LEFT JOIN class ON class.class_id = teacher_class.class_id
                                    LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
                                    LEFT JOIN teacher ON teacher.teacher_id = teacher_class.teacher_id
                                    WHERE teacher_class_id = '$get_id'
                                ") or die(mysqli_error($conn));

                                $row = mysqli_fetch_array($query);
                                ?>

                                <?php if ($row): ?>
                                    Instructor: 
                                    <strong><?php echo htmlspecialchars($row['firstname']); ?> <?php echo htmlspecialchars($row['lastname']); ?></strong>
                                    <br>
                                    <?php if (!empty($row['location'])): ?>
                                        <img id="avatar" class="img-polaroid" src="admin/<?php echo htmlspecialchars($row['location']); ?>" width>
                                    <?php else: ?>
                                        <img id="avatar" class="img-polaroid" src="admin/uploads/default_avatar.png" width>
                                    <?php endif; ?>
                                    <p><a href=""><i class="icon-search"></i> view info</a></p>
                                    <hr>
                                <?php else: ?>
                                    <p><strong>No instructor information found.</strong></p>
                                <?php endif; ?>

                                <?php 
                                $query = mysqli_query($conn,"
                                    SELECT * FROM teacher_class
                                    LEFT JOIN class_subject_overview 
                                        ON class_subject_overview.teacher_class_id = teacher_class.teacher_class_id
                                    WHERE class_subject_overview.teacher_class_id = '$get_id'
                                ") or die(mysqli_error($conn));

                                $row_subject = mysqli_fetch_array($query);
                                ?>

                                <?php if ($row_subject): ?>
                                    <?php echo $row_subject['content']; ?>
                                <?php else: ?>
                                    <p><em>No subject overview available.</em></p>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                    <!-- /block -->
                </div>
            </div>
        </div>
        <?php include('footer.php'); ?>
    </div>
    <?php include('script.php'); ?>
</body>
</html>
>>>>>>> 41343db (Added LMS project files)
