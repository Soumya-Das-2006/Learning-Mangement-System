<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<?php 
$get_id = $_GET['id']; 
$quiz_question_id = $_GET['quiz_question_id']; 
?>
<body>
<?php include('navbar_teacher.php'); ?>
<div class="container-fluid">
    <div class="row-fluid">
        <?php include('quiz_sidebar_teacher.php'); ?>
        <div class="span9" id="content">
            <div class="row-fluid">
                <!-- breadcrumb -->
                <ul class="breadcrumb">
                    <?php
                    $school_year_query = mysqli_query($conn,"SELECT * FROM school_year ORDER BY school_year DESC") or die(mysqli_error($conn));
                    $school_year_query_row = mysqli_fetch_array($school_year_query);
                    ?>
                    <li><a href="#"><b>My Class</b></a><span class="divider">/</span></li>
                    <li><a href="#">School Year: <?php echo $school_year_query_row['school_year']; ?></a><span class="divider">/</span></li>
                    <li><a href="#"><b>Quiz Question</b></a></li>
                </ul>
                <!-- end breadcrumb -->

                <!-- block -->
                <div id="block_bg" class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-right">
                            <a href="quiz_question.php<?php echo '?id='.$get_id; ?>" class="btn btn-success"><i class="icon-arrow-left"></i> Back</a>
                        </div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                        <?php
                        $query = mysqli_query($conn,"SELECT * FROM quiz_question
                            LEFT JOIN question_type ON quiz_question.question_type_id = question_type.question_type_id
                            WHERE quiz_id = '$get_id' AND quiz_question_id = '$quiz_question_id'  
                            ORDER BY date_added DESC") or die(mysqli_error($conn));
                        $row = mysqli_fetch_array($query);
                        ?>
                        
                        <form class="form-horizontal" method="post">
                            <div class="control-group">
                                <label class="control-label">Question</label>
                                <div class="controls">
                                    <textarea name="question" id="ckeditor_full" required><?php echo $row['question_text']; ?></textarea>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Question Type:</label>
                                <div class="controls">			
                                    <select id="qtype" name="question_type" required>
                                        <option value="<?php echo $row['question_type_id']; ?>" selected>
                                            <?php echo $row['question_type']; ?>
                                        </option>
                                        <?php
                                        $query_question = mysqli_query($conn,"SELECT * FROM question_type") or die(mysqli_error($conn));
                                        while($query_question_row = mysqli_fetch_array($query_question)){
                                        ?>
                                        <option value="<?php echo $query_question_row['question_type_id']; ?>">
                                            <?php echo $query_question_row['question_type']; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">			
                                    <div id="opt11">
                                    <?php
                                    $a=$b=$c=$d=$correct="";
                                    $sqlz = mysqli_query($conn,"SELECT * FROM answer WHERE quiz_question_id = '$quiz_question_id'") or die(mysqli_error($conn));
                                    while($rowz = mysqli_fetch_array($sqlz)){
                                        if($rowz['choices'] == 'A'){ $a = $rowz['answer_text']; if(isset($rowz['correct'])) $correct=$rowz['correct']; }
                                        if($rowz['choices'] == 'B'){ $b = $rowz['answer_text']; if(isset($rowz['correct'])) $correct=$rowz['correct']; }
                                        if($rowz['choices'] == 'C'){ $c = $rowz['answer_text']; if(isset($rowz['correct'])) $correct=$rowz['correct']; }
                                        if($rowz['choices'] == 'D'){ $d = $rowz['answer_text']; if(isset($rowz['correct'])) $correct=$rowz['correct']; }
                                    }
                                    ?>
                                    A.) <input type="text" name="ans1" size="60" value="<?php echo $a;?>">
                                    <input name="correctm" value="A" <?php if($correct == 'A'){ echo 'checked'; }?> type="radio"><br /><br />

                                    B.) <input type="text" name="ans2" size="60" value="<?php echo $b;?>">
                                    <input name="correctm" value="B" <?php if($correct == 'B'){ echo 'checked'; }?> type="radio"><br /><br />

                                    C.) <input type="text" name="ans3" size="60" value="<?php echo $c;?>">
                                    <input name="correctm" value="C" <?php if($correct == 'C'){ echo 'checked'; }?> type="radio"><br /><br />

                                    D.) <input type="text" name="ans4" size="60" value="<?php echo $d;?>">
                                    <input name="correctm" value="D" <?php if($correct == 'D'){ echo 'checked'; }?> type="radio"><br /><br />
                                    </div>

                                    <div id="opt12">
                                        <input name="correctt" <?php if($row['answer'] == 'True'){ echo 'checked'; }?> value="t" type="radio"> True<br /><br />
                                        <input name="correctt" <?php if($row['answer'] == 'False'){ echo 'checked'; }?> value="f" type="radio"> False<br /><br />
                                    </div>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <button name="save" type="submit" class="btn btn-info"><i class="icon-save"></i> Save</button>
                                </div>
                            </div>		
                        </form>							

                        <?php
                        if (isset($_POST['save'])){
                            $question = $_POST['question'];
                            $type = $_POST['question_type'];
                            
                            $ans1 = $_POST['ans1'] ?? '';
                            $ans2 = $_POST['ans2'] ?? '';
                            $ans3 = $_POST['ans3'] ?? '';
                            $ans4 = $_POST['ans4'] ?? '';
                            
                            if ($type == '2'){ // True/False
                                mysqli_query($conn,"UPDATE quiz_question 
                                    SET question_text='$question', answer='".$_POST['correctt']."', question_type_id='$type'
                                    WHERE quiz_question_id = '$quiz_question_id'") or die(mysqli_error($conn));
                            } else { // Multiple choice
                                $correct = $_POST['correctm'] ?? '';
                                mysqli_query($conn,"UPDATE quiz_question 
                                    SET question_text='$question', answer='$correct', question_type_id='$type'
                                    WHERE quiz_question_id = '$quiz_question_id'") or die(mysqli_error($conn));

                                mysqli_query($conn,"UPDATE answer SET answer_text='$ans1' WHERE quiz_question_id='$quiz_question_id' AND choices='A'") or die(mysqli_error($conn));
                                mysqli_query($conn,"UPDATE answer SET answer_text='$ans2' WHERE quiz_question_id='$quiz_question_id' AND choices='B'") or die(mysqli_error($conn));
                                mysqli_query($conn,"UPDATE answer SET answer_text='$ans3' WHERE quiz_question_id='$quiz_question_id' AND choices='C'") or die(mysqli_error($conn));
                                mysqli_query($conn,"UPDATE answer SET answer_text='$ans4' WHERE quiz_question_id='$quiz_question_id' AND choices='D'") or die(mysqli_error($conn));
                            }
                        ?>
                            <script>
                                window.location = 'quiz_question.php<?php echo '?id='.$get_id; ?>';
                            </script>
                        <?php
                        }
                        ?>
                        </div>
                    </div>
                </div>
                <!-- /block -->
            </div>
        </div>
    </div>
    <script>
    jQuery(document).ready(function(){
        jQuery("#opt11").hide();
        jQuery("#opt12").hide();
        jQuery("#opt13").hide();		

        jQuery("#qtype").change(function(){	
            var x = jQuery(this).val();			
            if(x == '1') {
                jQuery("#opt11").show();
                jQuery("#opt12").hide();
                jQuery("#opt13").hide();
            } else if(x == '2') {
                jQuery("#opt11").hide();
                jQuery("#opt12").show();
                jQuery("#opt13").hide();
            }
        });
    });
    </script>
    <?php include('footer.php'); ?>
</div>
<?php include('script.php'); ?>
</body>
</html>
