<?php include('header_dashboard.php'); ?>
<<<<<<< HEAD
    <body id="class_div">
		<?php include('navbar_about.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12" id="content">
                     <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
								<div class="navbar navbar-inner block-header">
									<div id="" class="muted pull-right"><a href="index.php"><i class="icon-arrow-left"></i> Back</a></div>
								</div>
                            <div class="block-content collapse in">
                                <div class="span12">

										<?php
											$mission_query = mysqli_query($conn,"select * from content where title  = 'History' ")or die(mysqli_error());
											$mission_row = mysqli_fetch_array($mission_query);
											echo $mission_row['content'];
										?>
								<hr>
		
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
<body id="class_div">
    <?php include('navbar_about.php'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12" id="content">
                <div class="row-fluid">
                    <!-- block -->
                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-right">
                                <a href="index.php"><i class="icon-arrow-left"></i> Back</a>
                            </div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">

                                <?php
                                // ✅ Check database connection first
                                if (!$conn) {
                                    echo "<div class='alert alert-danger'>Database connection failed: " . mysqli_connect_error() . "</div>";
                                } else {
                                    $mission_query = mysqli_query($conn, "SELECT * FROM content WHERE title = 'History'");
                                    if (!$mission_query) {
                                        echo "<div class='alert alert-danger'>Query failed: " . mysqli_error($conn) . "</div>";
                                    } else {
                                        $mission_row = mysqli_fetch_array($mission_query, MYSQLI_ASSOC);
                                        if ($mission_row) {
                                            echo "<div class='mail-card'>
                                                    <div class='mail-header'>
                                                        <h3>History</h3>
                                                    </div>
                                                    <div class='mail-body'>"
                                                        . $mission_row['content'] .
                                                    "</div>
                                                  </div>";
                                        } else {
                                            echo "<div class='alert alert-warning'>No content found for 'History'.</div>";
                                        }
                                    }
                                }
                                ?>

                                <hr>

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

    <!-- ✅ Inline Styles for Mail-Style UI -->
    <style>
        .mail-card {
            border: 1px solid #ddd;
            border-radius: 12px;
            background: #fff;
            box-shadow: 0px 3px 10px rgba(0,0,0,0.05);
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
        }
        .mail-header {
            border-bottom: 1px solid #eee;
            margin-bottom: 15px;
            padding-bottom: 5px;
        }
        .mail-header h3 {
            margin: 0;
            font-weight: 600;
            font-size: 1.4rem;
            color: #333;
        }
        .mail-body {
            font-size: 1rem;
            line-height: 1.6;
            color: #444;
        }
    </style>
</body>
</html>
>>>>>>> 41343db (Added LMS project files)
