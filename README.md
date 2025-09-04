--------------------------------------------------------------------------------
1 | [![Soumya-Das-2006/Learning-Mangement-System context](https://badge.forgithub.com/Soumya-Das-2006/Learning-Mangement-System)](https://uithub.com/Soumya-Das-2006/Learning-Mangement-System)
2 | 


--------------------------------------------------------------------------------
/add_announcement_save.php:
--------------------------------------------------------------------------------
 1 | <?php
 2 | include('admin/dbcon.php');
 3 | include('session.php');
 4 | 	$content = $_POST['content'];		
 5 | 	$id=$_POST['selector'];
 6 | 		$N = count($id);
 7 | 		for($i=0; $i < $N; $i++)
 8 | 		{			
 9 | 			mysqli_query($conn,"insert into teacher_class_announcements (teacher_class_id,teacher_id,content,date) values('$id[$i]','$session_id','$content',NOW())")or die(mysqli_error());
10 | 			mysqli_query($conn,"insert into notification (teacher_class_id,notification,date_of_notification,link) value('$id[$i]','Add Annoucements',NOW(),'announcements_student.php')")or die(mysqli_error());
11 | 		}
12 | ?>
13 | 
14 | 
15 | 


--------------------------------------------------------------------------------
/add_student_action.php:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/add_student_action.php


--------------------------------------------------------------------------------
/admin/assets/TR Century Gothic.ttf:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/assets/TR Century Gothic.ttf


--------------------------------------------------------------------------------
/admin/assets/scripts.js:
--------------------------------------------------------------------------------
 1 | $(function() {
 2 |     // Side Bar Toggle
 3 |     $('.hide-sidebar').click(function() {
 4 | 	  $('#sidebar').hide('fast', function() {
 5 | 	  	$('#content').removeClass('span9');
 6 | 	  	$('#content').addClass('span12');
 7 | 	  	$('.hide-sidebar').hide();
 8 | 	  	$('.show-sidebar').show();
 9 | 	  });
10 | 	});
11 | 
12 | 	$('.show-sidebar').click(function() {
13 | 		$('#content').removeClass('span12');
14 | 	   	$('#content').addClass('span9');
15 | 	   	$('.show-sidebar').hide();
16 | 	   	$('.hide-sidebar').show();
17 | 	  	$('#sidebar').show('fast');
18 | 	});
19 | });


--------------------------------------------------------------------------------
/admin/bootstrap/css/Molot.otf:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/bootstrap/css/Molot.otf


--------------------------------------------------------------------------------
/admin/bootstrap/css/ProximaNova-Light.otf:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/bootstrap/css/ProximaNova-Light.otf


--------------------------------------------------------------------------------
/admin/bootstrap/css/TR Century Gothic.ttf:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/bootstrap/css/TR Century Gothic.ttf


--------------------------------------------------------------------------------
/admin/bootstrap/css/hetilica.ttf:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/bootstrap/css/hetilica.ttf


--------------------------------------------------------------------------------
/admin/bootstrap/font/FontAwesome.otf:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/bootstrap/font/FontAwesome.otf


--------------------------------------------------------------------------------
/admin/bootstrap/font/fontawesome-webfont.eot:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/bootstrap/font/fontawesome-webfont.eot


--------------------------------------------------------------------------------
/admin/bootstrap/font/fontawesome-webfont.ttf:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/bootstrap/font/fontawesome-webfont.ttf


--------------------------------------------------------------------------------
/admin/bootstrap/font/fontawesome-webfont.woff:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/bootstrap/font/fontawesome-webfont.woff


--------------------------------------------------------------------------------
/admin/bootstrap/img/glyphicons-halflings-white.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/bootstrap/img/glyphicons-halflings-white.png


--------------------------------------------------------------------------------
/admin/bootstrap/img/glyphicons-halflings.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/bootstrap/img/glyphicons-halflings.png


--------------------------------------------------------------------------------
/admin/calendar_of_events.php:
--------------------------------------------------------------------------------
 1 | <?php  include('header.php'); ?>
 2 | <?php  include('session.php'); ?>
 3 |     <body>
 4 | 		<?php include('navbar.php') ?>
 5 |         <div class="container-fluid">
 6 |             <div class="row-fluid">
 7 | 					<?php include('sidebar_calendar.php'); ?>
 8 |                 
 9 |                 <!--/span-->
10 |                 <div class="span9" id="content">
11 | 								        <div id="block_bg" class="block">
12 |                 
13 | 								<div class="block-content collapse in">
14 | 										<div class="span8">
15 | 							<!-- block -->
16 | 										<div class="navbar navbar-inner block-header">
17 | 											<div class="muted pull-left">Calendar</div>
18 | 										</div>
19 | 															<div id='calendar'></div>		
20 | 										</div>
21 | 										
22 | 										<div class="span4">
23 | 												<?php include('add_class_event.php'); ?>
24 | 										</div>	
25 | 							<!-- block -->
26 | 						
27 | 										</div>
28 |                                 </div>		
29 |                 </div>
30 |             </div>
31 |     
32 |          <?php include('footer.php'); ?>
33 |         </div>
34 | 	<?php include('script.php'); ?>
35 | 	<?php include('admin_calendar_script.php'); ?>
36 |     </body>
37 | 
38 | </html>


--------------------------------------------------------------------------------
/admin/dbcon.php:
--------------------------------------------------------------------------------
1 | <?php
2 | $conn = mysqli_connect('localhost','root','','capstone') or die(mysqli_error());
3 | ?>


--------------------------------------------------------------------------------
/admin/de_activate.php:
--------------------------------------------------------------------------------
1 | <?php
2 | include('dbcon.php');
3 | $get_id = $_GET['id'];
4 | mysqli_query($conn,"update teacher set teacher_stat = 'Deactivated' where teacher_id = '$get_id'");
5 | header('location:teachers.php');
6 | ?>


--------------------------------------------------------------------------------
/admin/delete_class.php:
--------------------------------------------------------------------------------
 1 | <?php
 2 | include('dbcon.php');
 3 | if (isset($_POST['delete_class'])){
 4 | $id=$_POST['selector'];
 5 | $N = count($id);
 6 | for($i=0; $i < $N; $i++)
 7 | {
 8 | 	$result = mysqli_query($conn,"DELETE FROM class where class_id='$id[$i]'");
 9 | }
10 | header("location: class.php");
11 | }
12 | ?>


--------------------------------------------------------------------------------
/admin/delete_content.php:
--------------------------------------------------------------------------------
 1 | <?php
 2 | include('dbcon.php');
 3 | if (isset($_POST['delete_content'])){
 4 | $id=$_POST['selector'];
 5 | $N = count($id);
 6 | for($i=0; $i < $N; $i++)
 7 | {
 8 | 	$result = mysqli_query($conn,"DELETE FROM content where content_id='$id[$i]'");
 9 | }
10 | header("location: content.php");
11 | }
12 | ?>


--------------------------------------------------------------------------------
/admin/delete_department.php:
--------------------------------------------------------------------------------
 1 | <?php
 2 | include('dbcon.php');
 3 | if (isset($_POST['delete_department'])){
 4 | $id=$_POST['selector'];
 5 | $N = count($id);
 6 | for($i=0; $i < $N; $i++)
 7 | {
 8 | 	$result = mysqli_query($conn,"DELETE FROM department where department_id='$id[$i]'");
 9 | }
10 | header("location: department.php");
11 | }
12 | ?>


--------------------------------------------------------------------------------
/admin/delete_event.php:
--------------------------------------------------------------------------------
1 | <?php
2 | include('dbcon.php');
3 | $get_id = $_GET['id'];
4 | mysqli_query($conn,"delete from event where event_id = '$get_id'")or die(mysqli_error());
5 | ?>
6 | <script>
7 | window.location = 'calendar_of_events.php';
8 | </script>


--------------------------------------------------------------------------------
/admin/delete_student.php:
--------------------------------------------------------------------------------
 1 | <?php
 2 | include('dbcon.php');
 3 | if (isset($_POST['delete_student'])){
 4 | $id=$_POST['selector'];
 5 | $N = count($id);
 6 | for($i=0; $i < $N; $i++)
 7 | {
 8 | 	 mysqli_query($conn,"DELETE FROM student where student_id='$id[$i]'");
 9 | 	 mysqli_query($conn,"DELETE FROM teacher_class_student where student_id='$id[$i]'");
10 | }
11 | header("location: students.php");
12 | }
13 | ?>


--------------------------------------------------------------------------------
/admin/delete_subject.php:
--------------------------------------------------------------------------------
 1 | <?php
 2 | include('dbcon.php');
 3 | if (isset($_POST['delete_subject'])){
 4 | $id=$_POST['selector'];
 5 | $N = count($id);
 6 | for($i=0; $i < $N; $i++)
 7 | {
 8 | 	$result = mysqli_query($conn,"DELETE FROM subject where subject_id='$id[$i]'");
 9 | }
10 | header("location: subjects.php");
11 | }
12 | ?>


--------------------------------------------------------------------------------
/admin/delete_sy.php:
--------------------------------------------------------------------------------
 1 | <?php
 2 | include('dbcon.php');
 3 | if (isset($_POST['delete_user'])){
 4 | $id=$_POST['selector'];
 5 | $N = count($id);
 6 | for($i=0; $i < $N; $i++)
 7 | {
 8 | 	$result = mysqli_query($conn,"DELETE FROM school_year where school_year_id='$id[$i]'");
 9 | }
10 | header("location: school_year.php");
11 | }
12 | ?>


--------------------------------------------------------------------------------
/admin/delete_teacher.php:
--------------------------------------------------------------------------------
 1 | <?php
 2 | include('dbcon.php');
 3 | if (isset($_POST['delete_teacher'])){
 4 | $id=$_POST['selector'];
 5 | $N = count($id);
 6 | for($i=0; $i < $N; $i++)
 7 | {
 8 | 	$result = mysqli_query($conn,"DELETE FROM teacher where teacher_id='$id[$i]'");
 9 | }
10 | header("location: teachers.php");
11 | }
12 | ?>


--------------------------------------------------------------------------------
/admin/delete_users.php:
--------------------------------------------------------------------------------
 1 | <?php
 2 | include('dbcon.php');
 3 | if (isset($_POST['delete_user'])){
 4 | $id=$_POST['selector'];
 5 | $N = count($id);
 6 | for($i=0; $i < $N; $i++)
 7 | {
 8 | 	$result = mysqli_query($conn,"DELETE FROM users where user_id='$id[$i]'");
 9 | }
10 | header("location: admin_user.php");
11 | }
12 | ?>


--------------------------------------------------------------------------------
/admin/footer.php:
--------------------------------------------------------------------------------
1 | <div class="pull-right">
2 | 		<footer>
3 |            <p></p>
4 |         </footer>
5 | </div>


--------------------------------------------------------------------------------
/admin/images/Logo.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/images/Logo.png


--------------------------------------------------------------------------------
/admin/images/background.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/images/background.jpg


--------------------------------------------------------------------------------
/admin/images/bg-input-focus.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/images/bg-input-focus.png


--------------------------------------------------------------------------------
/admin/images/bg-input.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/images/bg-input.png


--------------------------------------------------------------------------------
/admin/images/index.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/images/index.jpg


--------------------------------------------------------------------------------
/admin/images/index.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/images/index.png


--------------------------------------------------------------------------------
/admin/images/index1.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/images/index1.jpg


--------------------------------------------------------------------------------
/admin/images/jelyn.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/images/jelyn.jpg


--------------------------------------------------------------------------------
/admin/images/jkev.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/images/jkev.jpg


--------------------------------------------------------------------------------
/admin/images/jorge.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/images/jorge.jpg


--------------------------------------------------------------------------------
/admin/images/logo_chmsc.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/images/logo_chmsc.png


--------------------------------------------------------------------------------
/admin/images/mich.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/images/mich.jpg


--------------------------------------------------------------------------------
/admin/images/pattern.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/images/pattern.png


--------------------------------------------------------------------------------
/admin/images/pixel-60fff.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/images/pixel-60fff.png


--------------------------------------------------------------------------------
/admin/images/sprite.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/images/sprite.png


--------------------------------------------------------------------------------
/admin/login.php:
--------------------------------------------------------------------------------
 1 | <?php
 2 | 		include('dbcon.php');
 3 | 		session_start();
 4 | 		$username = $_POST['username'];
 5 | 		$password = $_POST['password'];
 6 | 
 7 | 		$query = mysqli_query($conn,"SELECT * FROM users WHERE username='$username' AND password='$password'")or die(mysqli_error());
 8 | 		$count = mysqli_num_rows($query);
 9 | 		$row = mysqli_fetch_array($query);
10 | 
11 | 
12 | 		if ($count > 0){
13 | 		
14 | 		$_SESSION['id']=$row['user_id'];
15 | 		
16 | 		echo 'true';
17 | 		
18 | 		mysqli_query($conn,"insert into user_log (username,login_date,user_id)values('$username',NOW(),".$row['user_id'].")")or die(mysqli_error());
19 | 		 }else{ 
20 | 		echo 'false';
21 | 		}	
22 | 				
23 | 		?>


--------------------------------------------------------------------------------
/admin/logout.php:
--------------------------------------------------------------------------------
1 | <?php
2 | include('dbcon.php');
3 | include('session.php');
4 | mysqli_query($conn,"update user_log set logout_Date = NOW() where user_id = '$session_id' ")or die(mysqli_error());
5 | 
6 |  session_destroy();
7 | header('location:index.php'); 
8 | ?>


--------------------------------------------------------------------------------
/admin/navbar_index.php:
--------------------------------------------------------------------------------
 1 |   <div class="navbar navbar-fixed-top navbar-inverse">
 2 |             <div class="navbar-inner">
 3 |                 <div class="container-fluid">
 4 |                     <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
 5 |                      <span class="icon-bar"></span>
 6 |                      <span class="icon-bar"></span>
 7 |                     </a>
 8 |                     <a class="brand" href="#">Learning Management System</a>
 9 |                     <div class="nav-collapse collapse">
10 |                  
11 |                     </div>
12 |                     <!--/.nav-collapse -->
13 |                 </div>
14 |             </div>
15 |         </div>


--------------------------------------------------------------------------------
/admin/save_student.php:
--------------------------------------------------------------------------------
 1 | <?php
 2 | include('dbcon.php');
 3 |         
 4 |                $un = $_POST['un'];
 5 |                $fn = $_POST['fn'];
 6 |                $ln = $_POST['ln'];
 7 |                $class_id = $_POST['class_id'];
 8 | 
 9 |                mysqli_query($conn,"insert into student (username,firstname,lastname,location,class_id,status)
10 | 		values ('$un','$fn','$ln','uploads/NO-IMAGE-AVAILABLE.jpg','$class_id','Unregistered')                                    
11 | 		") or die(mysqli_error()); ?>
12 | <?php    ?>


--------------------------------------------------------------------------------
/admin/session.php:
--------------------------------------------------------------------------------
 1 | <?php
 2 |  session_start(); 
 3 | //Check whether the session variable SESS_MEMBER_ID is present or not
 4 | if (!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')) { ?>
 5 | <script>
 6 | window.location = "index.php";
 7 | </script>
 8 | <?php
 9 | }
10 | $session_id=$_SESSION['id'];
11 | 
12 | $user_query = mysqli_query($conn,"select * from users where user_id = '$session_id'")or die(mysqli_error());
13 | $user_row = mysqli_fetch_array($user_query);
14 | $user_username = $user_row['username'];
15 | ?>


--------------------------------------------------------------------------------
/admin/uploads/100px-Rasmus_Lerdorf_cropped.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/100px-Rasmus_Lerdorf_cropped.jpg


--------------------------------------------------------------------------------
/admin/uploads/1016616_10200832748845693_1037423318_n.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/1016616_10200832748845693_1037423318_n.jpg


--------------------------------------------------------------------------------
/admin/uploads/1238242_601181029920712_1808577925_n.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/1238242_601181029920712_1808577925_n.jpg


--------------------------------------------------------------------------------
/admin/uploads/1240518_10200243579963092_2073745461_n.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/1240518_10200243579963092_2073745461_n.jpg


--------------------------------------------------------------------------------
/admin/uploads/17924_505204576195828_1356977928_n.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/17924_505204576195828_1356977928_n.jpg


--------------------------------------------------------------------------------
/admin/uploads/22CBEA3C.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/22CBEA3C.jpg


--------------------------------------------------------------------------------
/admin/uploads/2552_File_sample.pdf:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/2552_File_sample.pdf


--------------------------------------------------------------------------------
/admin/uploads/2840_File_IMG_0698.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/2840_File_IMG_0698.jpg


--------------------------------------------------------------------------------
/admin/uploads/2848_File_sample.pdf:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/2848_File_sample.pdf


--------------------------------------------------------------------------------
/admin/uploads/3094_384893504898082_1563225657_n.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/3094_384893504898082_1563225657_n.jpg


--------------------------------------------------------------------------------
/admin/uploads/320726_247884481932319_143095752_n.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/320726_247884481932319_143095752_n.jpg


--------------------------------------------------------------------------------
/admin/uploads/3579_File_sample.pdf:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/3579_File_sample.pdf


--------------------------------------------------------------------------------
/admin/uploads/380903_288008981235527_682004916_n.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/380903_288008981235527_682004916_n.jpg


--------------------------------------------------------------------------------
/admin/uploads/389040_384893534898079_1248204755_n.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/389040_384893534898079_1248204755_n.jpg


--------------------------------------------------------------------------------
/admin/uploads/3952_File_sample.pdf:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/3952_File_sample.pdf


--------------------------------------------------------------------------------
/admin/uploads/3CDA102486.JPG:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/3CDA102486.JPG


--------------------------------------------------------------------------------
/admin/uploads/4358_File_sample.pdf:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/4358_File_sample.pdf


--------------------------------------------------------------------------------
/admin/uploads/449E26DB.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/449E26DB.jpg


--------------------------------------------------------------------------------
/admin/uploads/4F5FC0A1.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/4F5FC0A1.jpg


--------------------------------------------------------------------------------
/admin/uploads/5037_File_sample.pdf:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/5037_File_sample.pdf


--------------------------------------------------------------------------------
/admin/uploads/5134_File_sample.pdf:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/5134_File_sample.pdf


--------------------------------------------------------------------------------
/admin/uploads/526114_436242963105449_345726317_n.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/526114_436242963105449_345726317_n.jpg


--------------------------------------------------------------------------------
/admin/uploads/5343_File_sample.pdf:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/5343_File_sample.pdf


--------------------------------------------------------------------------------
/admin/uploads/552629_384562911597808_1087140773_n.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/552629_384562911597808_1087140773_n.jpg


--------------------------------------------------------------------------------
/admin/uploads/6898_File_sample.pdf:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/6898_File_sample.pdf


--------------------------------------------------------------------------------
/admin/uploads/7234_File_sample.pdf:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/7234_File_sample.pdf


--------------------------------------------------------------------------------
/admin/uploads/7277_File_sample.pdf:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/7277_File_sample.pdf


--------------------------------------------------------------------------------
/admin/uploads/730009-mount-fuji.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/730009-mount-fuji.jpg


--------------------------------------------------------------------------------
/admin/uploads/7614_File_1476273_644977475552481_2029187901_n.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/7614_File_1476273_644977475552481_2029187901_n.jpg


--------------------------------------------------------------------------------
/admin/uploads/7820_File_sample.pdf:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/7820_File_sample.pdf


--------------------------------------------------------------------------------
/admin/uploads/7939_File_449E26DB.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/7939_File_449E26DB.jpg


--------------------------------------------------------------------------------
/admin/uploads/8289_File_sample.pdf:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/8289_File_sample.pdf


--------------------------------------------------------------------------------
/admin/uploads/8565_File_q:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/8565_File_q


--------------------------------------------------------------------------------
/admin/uploads/9224_File_sample.pdf:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/9224_File_sample.pdf


--------------------------------------------------------------------------------
/admin/uploads/9401_File_sample.pdf:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/9401_File_sample.pdf


--------------------------------------------------------------------------------
/admin/uploads/9486_File_sample.pdf:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/9486_File_sample.pdf


--------------------------------------------------------------------------------
/admin/uploads/9664_File_sample.pdf:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/9664_File_sample.pdf


--------------------------------------------------------------------------------
/admin/uploads/9719_File_image.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/9719_File_image.png


--------------------------------------------------------------------------------
/admin/uploads/9782_File_sample.pdf:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/9782_File_sample.pdf


--------------------------------------------------------------------------------
/admin/uploads/Africa.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/Africa.jpg


--------------------------------------------------------------------------------
/admin/uploads/CADAGAT.JPG:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/CADAGAT.JPG


--------------------------------------------------------------------------------
/admin/uploads/Desert.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/Desert.jpg


--------------------------------------------------------------------------------
/admin/uploads/HONEY.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/HONEY.jpg


--------------------------------------------------------------------------------
/admin/uploads/Koala.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/Koala.jpg


--------------------------------------------------------------------------------
/admin/uploads/MORANTE.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/MORANTE.jpg


--------------------------------------------------------------------------------
/admin/uploads/NO-IMAGE-AVAILABLE.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/NO-IMAGE-AVAILABLE.jpg


--------------------------------------------------------------------------------
/admin/uploads/PABUAYA.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/PABUAYA.jpg


--------------------------------------------------------------------------------
/admin/uploads/avatar.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/avatar.jpg


--------------------------------------------------------------------------------
/admin/uploads/baby.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/baby.jpg


--------------------------------------------------------------------------------
/admin/uploads/ca.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/ca.jpg


--------------------------------------------------------------------------------
/admin/uploads/cabrera.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/cabrera.jpg


--------------------------------------------------------------------------------
/admin/uploads/carel.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/carel.jpg


--------------------------------------------------------------------------------
/admin/uploads/dionele.JPG:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/dionele.JPG


--------------------------------------------------------------------------------
/admin/uploads/dp.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/dp.jpg


--------------------------------------------------------------------------------
/admin/uploads/ds.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/ds.jpg


--------------------------------------------------------------------------------
/admin/uploads/em2.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/em2.jpg


--------------------------------------------------------------------------------
/admin/uploads/ergin.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/ergin.jpg


--------------------------------------------------------------------------------
/admin/uploads/harry.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/harry.jpg


--------------------------------------------------------------------------------
/admin/uploads/jamila.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/jamila.jpg


--------------------------------------------------------------------------------
/admin/uploads/kirb.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/kirb.jpg


--------------------------------------------------------------------------------
/admin/uploads/maica.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/maica.jpg


--------------------------------------------------------------------------------
/admin/uploads/mark.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/mark.jpg


--------------------------------------------------------------------------------
/admin/uploads/noli.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/noli.jpg


--------------------------------------------------------------------------------
/admin/uploads/nonie.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/nonie.jpg


--------------------------------------------------------------------------------
/admin/uploads/razel.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/razel.jpg


--------------------------------------------------------------------------------
/admin/uploads/redoblo.JPG:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/redoblo.JPG


--------------------------------------------------------------------------------
/admin/uploads/teph.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/teph.jpg


--------------------------------------------------------------------------------
/admin/uploads/thumbnails.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/thumbnails.jpg


--------------------------------------------------------------------------------
/admin/uploads/thumbnails.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/thumbnails.png


--------------------------------------------------------------------------------
/admin/uploads/tin.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/tin.jpg


--------------------------------------------------------------------------------
/admin/uploads/von.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/von.jpg


--------------------------------------------------------------------------------
/admin/uploads/w.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/w.jpg


--------------------------------------------------------------------------------
/admin/uploads/win_boot_screen_16_9_by_medi_dadu-d4s7dc1.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/win_boot_screen_16_9_by_medi_dadu-d4s7dc1.gif


--------------------------------------------------------------------------------
/admin/uploads/xenia.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/uploads/xenia.jpg


--------------------------------------------------------------------------------
/admin/vendors/bootstrap-wysihtml5/.gitignore:
--------------------------------------------------------------------------------
1 | .DS_Store
2 | .c9revisions
3 | /*.project
4 | 


--------------------------------------------------------------------------------
/admin/vendors/bootstrap-wysihtml5/.settings/.gitignore:
--------------------------------------------------------------------------------
1 | /*.jsdtscope
2 | /*.eclipse.wst.jsdt.ui.superType.container
3 | /*.eclipse.wst.jsdt.ui.superType.name
4 | 


--------------------------------------------------------------------------------
/admin/vendors/bootstrap-wysihtml5/Gemfile:
--------------------------------------------------------------------------------
1 | source 'https://rubygems.org'
2 | 
3 | gem 'rake'
4 | gem 'therubyracer'
5 | gem 'uglifier'


--------------------------------------------------------------------------------
/admin/vendors/bootstrap-wysihtml5/Gemfile.lock:
--------------------------------------------------------------------------------
 1 | GEM
 2 |   remote: https://rubygems.org/
 3 |   specs:
 4 |     execjs (1.3.0)
 5 |       multi_json (~> 1.0)
 6 |     libv8 (3.3.10.4)
 7 |     multi_json (1.1.0)
 8 |     rake (0.9.2.2)
 9 |     therubyracer (0.9.10)
10 |       libv8 (~> 3.3.10)
11 |     uglifier (1.2.3)
12 |       execjs (>= 0.3.0)
13 |       multi_json (>= 1.0.2)
14 | 
15 | PLATFORMS
16 |   ruby
17 | 
18 | DEPENDENCIES
19 |   rake
20 |   therubyracer
21 |   uglifier
22 | 


--------------------------------------------------------------------------------
/admin/vendors/bootstrap-wysihtml5/LICENCE:
--------------------------------------------------------------------------------
1 | The MIT License (MIT)
2 | 
3 | Copyright (c) 2012 JFHollingworth LTD
4 | 
5 | Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
6 | 
7 | The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
8 | 
9 | THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.


--------------------------------------------------------------------------------
/admin/vendors/bootstrap-wysihtml5/VERSION:
--------------------------------------------------------------------------------
1 | 0.0.2


--------------------------------------------------------------------------------
/admin/vendors/bootstrap-wysihtml5/component.json:
--------------------------------------------------------------------------------
1 | {
2 |     "name": "bootstrap-wysihtml5",
3 |     "version": "0.1.0",
4 |     "main": ["src/bootstrap-wysihtml5.css", "src/bootstrap-wysihtml5.js"],
5 |     "dependencies": {
6 |         "wysihtml5": "~0.3.0"
7 |     }
8 | }
9 | 


--------------------------------------------------------------------------------
/admin/vendors/bootstrap-wysihtml5/lib/css/prettify.css:
--------------------------------------------------------------------------------
 1 | .com { color: #93a1a1; }
 2 | .lit { color: #195f91; }
 3 | .pun, .opn, .clo { color: #93a1a1; }
 4 | .fun { color: #dc322f; }
 5 | .str, .atv { color: #D14; }
 6 | .kwd, .linenums .tag { color: #1e347b; }
 7 | .typ, .atn, .dec, .var { color: teal; }
 8 | .pln { color: #48484c; }
 9 | 
10 | .prettyprint {
11 |   padding: 8px;
12 |   background-color: #f7f7f9;
13 |   border: 1px solid #e1e1e8;
14 | }
15 | .prettyprint.linenums {
16 |   -webkit-box-shadow: inset 40px 0 0 #fbfbfc, inset 41px 0 0 #ececf0;
17 |      -moz-box-shadow: inset 40px 0 0 #fbfbfc, inset 41px 0 0 #ececf0;
18 |           box-shadow: inset 40px 0 0 #fbfbfc, inset 41px 0 0 #ececf0;
19 | }
20 | 
21 | /* Specify class=linenums on a pre to get line numbering */
22 | ol.linenums {
23 |   margin: 0 0 0 33px; /* IE indents via margin-left */
24 | } 
25 | ol.linenums li {
26 |   padding-left: 12px;
27 |   color: #bebec5;
28 |   line-height: 18px;
29 |   text-shadow: 0 1px 0 #fff;
30 | }


--------------------------------------------------------------------------------
/admin/vendors/bootstrap-wysihtml5/lib/css/wysiwyg-color.css:
--------------------------------------------------------------------------------
 1 | .wysiwyg-color-black {
 2 |   color: black;
 3 | }
 4 | 
 5 | .wysiwyg-color-silver {
 6 |   color: silver;
 7 | }
 8 | 
 9 | .wysiwyg-color-gray {
10 |   color: gray;
11 | }
12 | 
13 | .wysiwyg-color-white {
14 |   color: white;
15 | }
16 | 
17 | .wysiwyg-color-maroon {
18 |   color: maroon;
19 | }
20 | 
21 | .wysiwyg-color-red {
22 |   color: red;
23 | }
24 | 
25 | .wysiwyg-color-purple {
26 |   color: purple;
27 | }
28 | 
29 | .wysiwyg-color-fuchsia {
30 |   color: fuchsia;
31 | }
32 | 
33 | .wysiwyg-color-green {
34 |   color: green;
35 | }
36 | 
37 | .wysiwyg-color-lime {
38 |   color: lime;
39 | }
40 | 
41 | .wysiwyg-color-olive {
42 |   color: olive;
43 | }
44 | 
45 | .wysiwyg-color-yellow {
46 |   color: yellow;
47 | }
48 | 
49 | .wysiwyg-color-navy {
50 |   color: navy;
51 | }
52 | 
53 | .wysiwyg-color-blue {
54 |   color: blue;
55 | }
56 | 
57 | .wysiwyg-color-teal {
58 |   color: teal;
59 | }
60 | 
61 | .wysiwyg-color-aqua {
62 |   color: aqua;
63 | }
64 | 
65 | .wysiwyg-color-orange {
66 |   color: orange;
67 | }


--------------------------------------------------------------------------------
/admin/vendors/bootstrap-wysihtml5/lib/img/glyphicons-halflings-white.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/bootstrap-wysihtml5/lib/img/glyphicons-halflings-white.png


--------------------------------------------------------------------------------
/admin/vendors/bootstrap-wysihtml5/lib/img/glyphicons-halflings.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/bootstrap-wysihtml5/lib/img/glyphicons-halflings.png


--------------------------------------------------------------------------------
/admin/vendors/bootstrap-wysihtml5/src/wysiwyg-color.css:
--------------------------------------------------------------------------------
 1 | .wysiwyg-color-black {
 2 |   color: black;
 3 | }
 4 | 
 5 | .wysiwyg-color-silver {
 6 |   color: silver;
 7 | }
 8 | 
 9 | .wysiwyg-color-gray {
10 |   color: gray;
11 | }
12 | 
13 | .wysiwyg-color-white {
14 |   color: white;
15 | }
16 | 
17 | .wysiwyg-color-maroon {
18 |   color: maroon;
19 | }
20 | 
21 | .wysiwyg-color-red {
22 |   color: red;
23 | }
24 | 
25 | .wysiwyg-color-purple {
26 |   color: purple;
27 | }
28 | 
29 | .wysiwyg-color-fuchsia {
30 |   color: fuchsia;
31 | }
32 | 
33 | .wysiwyg-color-green {
34 |   color: green;
35 | }
36 | 
37 | .wysiwyg-color-lime {
38 |   color: lime;
39 | }
40 | 
41 | .wysiwyg-color-olive {
42 |   color: olive;
43 | }
44 | 
45 | .wysiwyg-color-yellow {
46 |   color: yellow;
47 | }
48 | 
49 | .wysiwyg-color-navy {
50 |   color: navy;
51 | }
52 | 
53 | .wysiwyg-color-blue {
54 |   color: blue;
55 | }
56 | 
57 | .wysiwyg-color-teal {
58 |   color: teal;
59 | }
60 | 
61 | .wysiwyg-color-aqua {
62 |   color: aqua;
63 | }
64 | 
65 | .wysiwyg-color-orange {
66 |   color: orange;
67 | }


--------------------------------------------------------------------------------
/admin/vendors/bootstrap-wysihtml5/test/README:
--------------------------------------------------------------------------------
 1 | To run the tests, just open index.html in your wysihtml5-compatible
 2 | browser.
 3 | 
 4 | The following files are ported from the wyshtml5 project's unit tests:
 5 | 
 6 | browser_test.js
 7 | incompatible_test.js
 8 | editor_test.js
 9 | undo_manager.js
10 | 
11 | These files should be left more or less alone, for purposes of
12 | maintainability.  Put new tests in the bootstrap_wysihtml5/ directory,
13 | and modify index.html to reference any new files you create.
14 | 
15 | If you're testing the underlying wysihtml5 library rather the
16 | bootstrap_wysihtml5 jquery plugin wrapper around that library, then
17 | you're probably contributing to the wrong project :).  See
18 | https://github.com/xing/wysihtml5 for that.
19 | 


--------------------------------------------------------------------------------
/admin/vendors/bootstrap-wysihtml5/test/lib:
--------------------------------------------------------------------------------
1 | ../lib/


--------------------------------------------------------------------------------
/admin/vendors/chosen-sprite.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/chosen-sprite.png


--------------------------------------------------------------------------------
/admin/vendors/chosen-sprite@2x.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/chosen-sprite@2x.png


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/config.js:
--------------------------------------------------------------------------------
 1 | /**
 2 |  * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 3 |  * For licensing, see LICENSE.html or http://ckeditor.com/license
 4 |  */
 5 | 
 6 | CKEDITOR.editorConfig = function( config ) {
 7 | 	// Define changes to default configuration here. For example:
 8 | 	// config.language = 'fr';
 9 | 	// config.uiColor = '#AADC6E';
10 | };
11 | 


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/a11yhelp/dialogs/lang/_translationstatus.txt:
--------------------------------------------------------------------------------
 1 | Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 2 | For licensing, see LICENSE.md or http://ckeditor.com/license
 3 | 
 4 | cs.js      Found: 30 Missing: 0
 5 | cy.js      Found: 30 Missing: 0
 6 | da.js      Found: 12 Missing: 18
 7 | de.js      Found: 30 Missing: 0
 8 | el.js      Found: 25 Missing: 5
 9 | eo.js      Found: 30 Missing: 0
10 | fa.js      Found: 30 Missing: 0
11 | fi.js      Found: 30 Missing: 0
12 | fr.js      Found: 30 Missing: 0
13 | gu.js      Found: 12 Missing: 18
14 | he.js      Found: 30 Missing: 0
15 | it.js      Found: 30 Missing: 0
16 | mk.js      Found: 5 Missing: 25
17 | nb.js      Found: 30 Missing: 0
18 | nl.js      Found: 30 Missing: 0
19 | no.js      Found: 30 Missing: 0
20 | pt-br.js   Found: 30 Missing: 0
21 | ro.js      Found: 6 Missing: 24
22 | tr.js      Found: 30 Missing: 0
23 | ug.js      Found: 27 Missing: 3
24 | vi.js      Found: 6 Missing: 24
25 | zh-cn.js   Found: 30 Missing: 0
26 | 


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/about/dialogs/hidpi/logo_ckeditor.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/about/dialogs/hidpi/logo_ckeditor.png


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/about/dialogs/logo_ckeditor.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/about/dialogs/logo_ckeditor.png


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/dialog/dialogDefinition.js:
--------------------------------------------------------------------------------
1 | ﻿/*
2 |  Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
3 |  For licensing, see LICENSE.md or http://ckeditor.com/license
4 | */
5 | 


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/fakeobjects/images/spacer.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/fakeobjects/images/spacer.gif


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/flash/images/placeholder.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/flash/images/placeholder.png


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/forms/images/hiddenfield.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/forms/images/hiddenfield.gif


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/icons.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/icons.png


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/icons_hidpi.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/icons_hidpi.png


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/iframe/images/placeholder.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/iframe/images/placeholder.png


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/image/images/noimage.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/image/images/noimage.png


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/link/images/anchor.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/link/images/anchor.png


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/link/images/hidpi/anchor.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/link/images/hidpi/anchor.png


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/magicline/images/hidpi/icon.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/magicline/images/hidpi/icon.png


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/magicline/images/icon.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/magicline/images/icon.png


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/pagebreak/images/pagebreak.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/pagebreak/images/pagebreak.gif


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/preview/preview.html:
--------------------------------------------------------------------------------
 1 | <script>
 2 | 
 3 | var doc = document;
 4 | doc.open();
 5 | doc.write( window.opener._cke_htmlToLoad );
 6 | doc.close();
 7 | 
 8 | delete window.opener._cke_htmlToLoad;
 9 | 
10 | </script>
11 | 


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/scayt/README.md:
--------------------------------------------------------------------------------
 1 | CKEditor SCAYT Plugin
 2 | =====================
 3 | 
 4 | This plugin brings Spell Check As You Type (SCAYT) into CKEditor.
 5 | 
 6 | SCAYT is a "installation-less", using the web-services of [WebSpellChecker.net](http://www.webspellchecker.net/). It's an out of the box solution.
 7 | 
 8 | Installation
 9 | ------------
10 | 
11 | 1. Clone/copy this repository contents in a new "plugins/scayt" folder in your CKEditor installation.
12 | 2. Enable the "scayt" plugin in the CKEditor configuration file (config.js):
13 | 
14 |         config.extraPlugins = 'scayt';
15 | 
16 | That's all. SCAYT will appear on the editor toolbar and will be ready to use.
17 | 
18 | License
19 | -------
20 | 
21 | Licensed under the terms of any of the following licenses at your choice: [GPL](http://www.gnu.org/licenses/gpl.html), [LGPL](http://www.gnu.org/licenses/lgpl.html) and [MPL](http://www.mozilla.org/MPL/MPL-1.1.html).
22 | 
23 | See LICENSE.md for more information.
24 | 
25 | Developed in cooperation with [WebSpellChecker.net](http://www.webspellchecker.net/).
26 | 


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/showblocks/images/block_address.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/showblocks/images/block_address.png


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/showblocks/images/block_blockquote.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/showblocks/images/block_blockquote.png


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/showblocks/images/block_div.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/showblocks/images/block_div.png


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/showblocks/images/block_h1.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/showblocks/images/block_h1.png


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/showblocks/images/block_h2.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/showblocks/images/block_h2.png


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/showblocks/images/block_h3.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/showblocks/images/block_h3.png


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/showblocks/images/block_h4.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/showblocks/images/block_h4.png


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/showblocks/images/block_h5.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/showblocks/images/block_h5.png


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/showblocks/images/block_h6.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/showblocks/images/block_h6.png


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/showblocks/images/block_p.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/showblocks/images/block_p.png


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/showblocks/images/block_pre.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/showblocks/images/block_pre.png


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/smiley/images/angel_smile.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/smiley/images/angel_smile.gif


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/smiley/images/angry_smile.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/smiley/images/angry_smile.gif


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/smiley/images/broken_heart.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/smiley/images/broken_heart.gif


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/smiley/images/confused_smile.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/smiley/images/confused_smile.gif


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/smiley/images/cry_smile.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/smiley/images/cry_smile.gif


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/smiley/images/devil_smile.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/smiley/images/devil_smile.gif


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/smiley/images/embaressed_smile.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/smiley/images/embaressed_smile.gif


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/smiley/images/embarrassed_smile.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/smiley/images/embarrassed_smile.gif


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/smiley/images/envelope.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/smiley/images/envelope.gif


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/smiley/images/heart.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/smiley/images/heart.gif


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/smiley/images/kiss.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/smiley/images/kiss.gif


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/smiley/images/lightbulb.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/smiley/images/lightbulb.gif


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/smiley/images/omg_smile.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/smiley/images/omg_smile.gif


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/smiley/images/regular_smile.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/smiley/images/regular_smile.gif


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/smiley/images/sad_smile.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/smiley/images/sad_smile.gif


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/smiley/images/shades_smile.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/smiley/images/shades_smile.gif


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/smiley/images/teeth_smile.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/smiley/images/teeth_smile.gif


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/smiley/images/thumbs_down.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/smiley/images/thumbs_down.gif


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/smiley/images/thumbs_up.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/smiley/images/thumbs_up.gif


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/smiley/images/tongue_smile.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/smiley/images/tongue_smile.gif


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/smiley/images/tounge_smile.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/smiley/images/tounge_smile.gif


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/smiley/images/whatchutalkingabout_smile.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/smiley/images/whatchutalkingabout_smile.gif


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/smiley/images/wink_smile.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/smiley/images/wink_smile.gif


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/specialchar/dialogs/lang/_translationstatus.txt:
--------------------------------------------------------------------------------
 1 | Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 2 | For licensing, see LICENSE.md or http://ckeditor.com/license
 3 | 
 4 | cs.js      Found: 118 Missing: 0
 5 | cy.js      Found: 118 Missing: 0
 6 | de.js      Found: 118 Missing: 0
 7 | el.js      Found: 16 Missing: 102
 8 | eo.js      Found: 118 Missing: 0
 9 | et.js      Found: 31 Missing: 87
10 | fa.js      Found: 24 Missing: 94
11 | fi.js      Found: 23 Missing: 95
12 | fr.js      Found: 118 Missing: 0
13 | hr.js      Found: 23 Missing: 95
14 | it.js      Found: 118 Missing: 0
15 | nb.js      Found: 118 Missing: 0
16 | nl.js      Found: 118 Missing: 0
17 | no.js      Found: 118 Missing: 0
18 | tr.js      Found: 118 Missing: 0
19 | ug.js      Found: 39 Missing: 79
20 | zh-cn.js   Found: 118 Missing: 0
21 | 


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/templates/templates/images/template1.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/templates/templates/images/template1.gif


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/templates/templates/images/template2.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/templates/templates/images/template2.gif


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/templates/templates/images/template3.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/plugins/templates/templates/images/template3.gif


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/plugins/wsc/README.md:
--------------------------------------------------------------------------------
 1 | CKEditor WebSpellChecker Plugin
 2 | ===============================
 3 | 
 4 | This plugin brings Web Spell Checker (WSC) into CKEditor.
 5 | 
 6 | WSC is "installation-less", using the web-services of [WebSpellChecker.net](http://www.webspellchecker.net/). It's an out of the box solution.
 7 | 
 8 | Installation
 9 | ------------
10 | 
11 | 1. Clone/copy this repository contents in a new "plugins/wsc" folder in your CKEditor installation.
12 | 2. Enable the "wsc" plugin in the CKEditor configuration file (config.js):
13 | 
14 |         config.extraPlugins = 'wsc';
15 | 
16 | That's all. WSC will appear on the editor toolbar and will be ready to use.
17 | 
18 | License
19 | -------
20 | 
21 | Licensed under the terms of any of the following licenses at your choice: [GPL](http://www.gnu.org/licenses/gpl.html), [LGPL](http://www.gnu.org/licenses/lgpl.html) and [MPL](http://www.mozilla.org/MPL/MPL-1.1.html).
22 | 
23 | See LICENSE.md for more information.
24 | 
25 | Developed in cooperation with [WebSpellChecker.net](http://www.webspellchecker.net/).
26 | 


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/samples/assets/inlineall/logo.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/samples/assets/inlineall/logo.png


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/samples/assets/sample.css:
--------------------------------------------------------------------------------
1 | /**
2 |  * Required by tests (dom/document.html).
3 |  */
4 | 


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/samples/assets/sample.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/samples/assets/sample.jpg


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/samples/plugins/dialog/assets/my_dialog.js:
--------------------------------------------------------------------------------
 1 | ﻿/**
 2 |  * Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 3 |  * For licensing, see LICENSE.md or http://ckeditor.com/license
 4 |  */
 5 | 
 6 | CKEDITOR.dialog.add( 'myDialog', function( editor ) {
 7 | 	return {
 8 | 		title: 'My Dialog',
 9 | 		minWidth: 400,
10 | 		minHeight: 200,
11 | 		contents: [
12 | 			{
13 | 				id: 'tab1',
14 | 				label: 'First Tab',
15 | 				title: 'First Tab',
16 | 				elements: [
17 | 					{
18 | 						id: 'input1',
19 | 						type: 'text',
20 | 						label: 'Text Field'
21 | 					},
22 | 					{
23 | 						id: 'select1',
24 | 						type: 'select',
25 | 						label: 'Select Field',
26 | 						items: [
27 | 							[ 'option1', 'value1' ],
28 | 							[ 'option2', 'value2' ]
29 | 						]
30 | 					}
31 | 				]
32 | 			},
33 | 			{
34 | 				id: 'tab2',
35 | 				label: 'Second Tab',
36 | 				title: 'Second Tab',
37 | 				elements: [
38 | 					{
39 | 						id: 'button1',
40 | 						type: 'button',
41 | 						label: 'Button Field'
42 | 					}
43 | 				]
44 | 			}
45 | 		]
46 | 	};
47 | });
48 | 
49 | 


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/samples/plugins/htmlwriter/assets/outputforflash/outputforflash.fla:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/samples/plugins/htmlwriter/assets/outputforflash/outputforflash.fla


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/samples/plugins/htmlwriter/assets/outputforflash/outputforflash.swf:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/samples/plugins/htmlwriter/assets/outputforflash/outputforflash.swf


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/samples/sample_posteddata.php:
--------------------------------------------------------------------------------
 1 | <?php /* <body><pre>
 2 | 
 3 | -------------------------------------------------------------------------------------------
 4 |   CKEditor - Posted Data
 5 | 
 6 |   We are sorry, but your Web server does not support the PHP language used in this script.
 7 | 
 8 |   Please note that CKEditor can be used with any other server-side language than just PHP.
 9 |   To save the content created with CKEditor you need to read the POST data on the server
10 |   side and write it to a file or the database.
11 | 
12 |   Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
13 |   For licensing, see LICENSE.md or <a href="http://ckeditor.com/license">http://ckeditor.com/license</a>
14 | -------------------------------------------------------------------------------------------
15 | 
16 | </pre><div style="display:none"></body> */ include "assets/posteddata.php"; ?>
17 | 


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/skins/moono/icons.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/skins/moono/icons.png


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/skins/moono/icons_hidpi.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/skins/moono/icons_hidpi.png


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/skins/moono/images/arrow.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/skins/moono/images/arrow.png


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/skins/moono/images/close.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/skins/moono/images/close.png


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/skins/moono/images/hidpi/close.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/skins/moono/images/hidpi/close.png


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/skins/moono/images/hidpi/lock-open.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/skins/moono/images/hidpi/lock-open.png


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/skins/moono/images/hidpi/lock.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/skins/moono/images/hidpi/lock.png


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/skins/moono/images/hidpi/refresh.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/skins/moono/images/hidpi/refresh.png


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/skins/moono/images/lock-open.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/skins/moono/images/lock-open.png


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/skins/moono/images/lock.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/skins/moono/images/lock.png


--------------------------------------------------------------------------------
/admin/vendors/ckeditor/skins/moono/images/refresh.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/ckeditor/skins/moono/images/refresh.png


--------------------------------------------------------------------------------
/admin/vendors/datatables/images/Sorting icons.psd:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/datatables/images/Sorting icons.psd


--------------------------------------------------------------------------------
/admin/vendors/datatables/images/back_disabled.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/datatables/images/back_disabled.png


--------------------------------------------------------------------------------
/admin/vendors/datatables/images/back_enabled.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/datatables/images/back_enabled.png


--------------------------------------------------------------------------------
/admin/vendors/datatables/images/back_enabled_hover.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/datatables/images/back_enabled_hover.png


--------------------------------------------------------------------------------
/admin/vendors/datatables/images/favicon.ico:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/datatables/images/favicon.ico


--------------------------------------------------------------------------------
/admin/vendors/datatables/images/forward_disabled.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/datatables/images/forward_disabled.png


--------------------------------------------------------------------------------
/admin/vendors/datatables/images/forward_enabled.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/datatables/images/forward_enabled.png


--------------------------------------------------------------------------------
/admin/vendors/datatables/images/forward_enabled_hover.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/datatables/images/forward_enabled_hover.png


--------------------------------------------------------------------------------
/admin/vendors/datatables/images/sort_asc.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/datatables/images/sort_asc.png


--------------------------------------------------------------------------------
/admin/vendors/datatables/images/sort_asc_disabled.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/datatables/images/sort_asc_disabled.png


--------------------------------------------------------------------------------
/admin/vendors/datatables/images/sort_both.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/datatables/images/sort_both.png


--------------------------------------------------------------------------------
/admin/vendors/datatables/images/sort_desc.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/datatables/images/sort_desc.png


--------------------------------------------------------------------------------
/admin/vendors/datatables/images/sort_desc_disabled.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/datatables/images/sort_desc_disabled.png


--------------------------------------------------------------------------------
/admin/vendors/datatables/src/model/model.search.js:
--------------------------------------------------------------------------------
 1 | 
 2 | 
 3 | 
 4 | /**
 5 |  * Template object for the way in which DataTables holds information about
 6 |  * search information for the global filter and individual column filters.
 7 |  *  @namespace
 8 |  */
 9 | DataTable.models.oSearch = {
10 | 	/**
11 | 	 * Flag to indicate if the filtering should be case insensitive or not
12 | 	 *  @type boolean
13 | 	 *  @default true
14 | 	 */
15 | 	"bCaseInsensitive": true,
16 | 
17 | 	/**
18 | 	 * Applied search term
19 | 	 *  @type string
20 | 	 *  @default <i>Empty string</i>
21 | 	 */
22 | 	"sSearch": "",
23 | 
24 | 	/**
25 | 	 * Flag to indicate if the search term should be interpreted as a
26 | 	 * regular expression (true) or not (false) and therefore and special
27 | 	 * regex characters escaped.
28 | 	 *  @type boolean
29 | 	 *  @default false
30 | 	 */
31 | 	"bRegex": false,
32 | 
33 | 	/**
34 | 	 * Flag to indicate if DataTables is to use its smart filtering or not.
35 | 	 *  @type boolean
36 | 	 *  @default true
37 | 	 */
38 | 	"bSmart": true
39 | };
40 | 
41 | 


--------------------------------------------------------------------------------
/admin/vendors/datatables/unit_testing/index.html:
--------------------------------------------------------------------------------
1 | <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
2 | <html>
3 | 	<frameset rows="20%,80%">
4 | 		<frame name="controller" id="controller" src="controller.php">
5 | 		<frame name="test_arena" id="test_arena">
6 | 	</frameset>
7 | </html>


--------------------------------------------------------------------------------
/admin/vendors/datatables/unit_testing/tests_onhold/1_dom/-iDraw.js:
--------------------------------------------------------------------------------
 1 | // DATA_TEMPLATE: dom_data
 2 | oTest.fnStart( "iDraw - check that iDraw increments for each draw" );
 3 | 
 4 | 
 5 | $(document).ready( function () {
 6 | 	var oTable = $('#example').dataTable();
 7 | 	var oSettings = oTable.fnSettings();
 8 | 	
 9 | 	oTest.fnTest( 
10 | 		"After first draw, iDraw is 1",
11 | 		null,
12 | 		function () { return oSettings.iDraw == 1; }
13 | 	);
14 | 	
15 | 	oTest.fnTest( 
16 | 		"After second draw, iDraw is 2",
17 | 		function () { oTable.fnDraw() },
18 | 		function () { return oSettings.iDraw == 2; }
19 | 	);
20 | 	
21 | 	oTest.fnTest( 
22 | 		"After sort",
23 | 		function () { oTable.fnSort([[1,'asc']]) },
24 | 		function () { return oSettings.iDraw == 3; }
25 | 	);
26 | 	
27 | 	oTest.fnTest( 
28 | 		"After filter",
29 | 		function () { oTable.fnFilter('gecko') },
30 | 		function () { return oSettings.iDraw == 4; }
31 | 	);
32 | 	
33 | 	oTest.fnTest( 
34 | 		"After another filter",
35 | 		function () { oTable.fnFilter('gec') },
36 | 		function () { return oSettings.iDraw == 5; }
37 | 	);
38 | 	
39 | 	
40 | 	oTest.fnComplete();
41 | } );


--------------------------------------------------------------------------------
/admin/vendors/datatables/unit_testing/tests_onhold/1_dom/2512.js:
--------------------------------------------------------------------------------
 1 | // DATA_TEMPLATE: 2512
 2 | oTest.fnStart( "Check filtering with BR and HTML entity" );
 3 | 
 4 | 
 5 | $(document).ready( function () {
 6 | 	$('#example').dataTable();
 7 | 	
 8 | 	/* Basic checks */
 9 | 	oTest.fnTest( 
10 | 		"Check filtering",
11 | 		function () { $('#example').dataTable().fnFilter('testsearchstring'); },
12 | 		function () { return $('#example tbody tr').length == 1; }
13 | 	);
14 | 	
15 | 	
16 | 	oTest.fnComplete();
17 | } );


--------------------------------------------------------------------------------
/admin/vendors/datatables/unit_testing/tests_onhold/1_dom/2530-2.js:
--------------------------------------------------------------------------------
 1 | // DATA_TEMPLATE: dom_data
 2 | oTest.fnStart( "User given with is left when no scrolling" );
 3 | 
 4 | $(document).ready( function () {
 5 | 	$('#example')[0].style.width = "80%";
 6 | 	$('#example').dataTable();
 7 | 	
 8 | 	oTest.fnTest( 
 9 | 		"Check user width is left",
10 | 		null,
11 | 		function () { return $('#example').width() == 640; }
12 | 	);
13 | 	
14 | 	oTest.fnComplete();
15 | } );


--------------------------------------------------------------------------------
/admin/vendors/datatables/unit_testing/tests_onhold/1_dom/2530.js:
--------------------------------------------------------------------------------
 1 | // DATA_TEMPLATE: dymanic_table
 2 | oTest.fnStart( "2530 - Check width's when dealing with empty strings" );
 3 | 
 4 | 
 5 | $(document).ready( function () {
 6 | 	$('#example').dataTable( {
 7 | 		"aaData": [
 8 | 			['','Internet Explorer 4.0','Win 95+','4','X'],
 9 | 			['','Internet Explorer 5.0','Win 95+','5','C']
10 | 		],
11 | 		"aoColumns": [
12 | 			{ "sTitle": "", "sWidth": "40px" },
13 | 			{ "sTitle": "Browser" },
14 | 			{ "sTitle": "Platform" },
15 | 			{ "sTitle": "Version", "sClass": "center" },
16 | 			{ "sTitle": "Grade", "sClass": "center" }
17 | 		]
18 | 	} );
19 | 	
20 | 	/* Basic checks */
21 | 	oTest.fnTest( 
22 | 		"Check calculated widths",
23 | 		null,
24 | 		function () { return $('#example tbody tr td:eq(0)').width() < 100; }
25 | 	);
26 | 	
27 | 	
28 | 	oTest.fnComplete();
29 | } );


--------------------------------------------------------------------------------
/admin/vendors/datatables/unit_testing/tests_onhold/1_dom/2569.js:
--------------------------------------------------------------------------------
 1 | // DATA_TEMPLATE: dom_data
 2 | oTest.fnStart( "Destroy with hidden columns" );
 3 | 
 4 | $(document).ready( function () {
 5 | 	$('#example').dataTable( {
 6 | 		"aoColumnDefs": [ 
 7 | 			{ "bSearchable": false, "bVisible": false, "aTargets": [ 2 ] },
 8 | 			{ "bVisible": false, "aTargets": [ 3 ] }
 9 | 		]
10 | 	} );
11 | 	$('#example').dataTable().fnDestroy();
12 | 	
13 | 	oTest.fnTest( 
14 | 		"Check that the number of columns in table is correct",
15 | 		null,
16 | 		function () { return $('#example tbody tr:eq(0) td').length == 5; }
17 | 	);
18 | 	
19 | 	
20 | 	oTest.fnTest( 
21 | 		"And with scrolling",
22 | 		function () {
23 | 			$('#example').dataTable( {
24 | 				"sScrollY": 200,
25 | 				"aoColumnDefs": [ 
26 | 					{ "bSearchable": false, "bVisible": false, "aTargets": [ 2 ] },
27 | 					{ "bVisible": false, "aTargets": [ 3 ] }
28 | 				]
29 | 			} );
30 | 			$('#example').dataTable().fnDestroy();
31 | 		},
32 | 		function () { return $('#example tbody tr:eq(0) td').length == 5; }
33 | 	);
34 | 	
35 | 	oTest.fnComplete();
36 | } );


--------------------------------------------------------------------------------
/admin/vendors/datatables/unit_testing/tests_onhold/1_dom/2635.js:
--------------------------------------------------------------------------------
 1 | // DATA_TEMPLATE: dom_data
 2 | oTest.fnStart( "2635 - Hiding column and state saving" );
 3 | 
 4 | $(document).ready( function () {
 5 | 	$('#example').dataTable( {
 6 | 		"bStateSave": true
 7 | 	} );
 8 | 	
 9 | 	oTest.fnTest( 
10 | 		"Set the hidden column",
11 | 		function () {
12 | 			$('#example').dataTable().fnSetColumnVis( 2, false );
13 | 		},
14 | 		function () { return $('#example thead th').length == 4; }
15 | 	);
16 | 	
17 | 	oTest.fnTest( 
18 | 		"Destroy the table and remake it - checking one column was removed",
19 | 		function () {
20 | 			$('#example').dataTable( {
21 | 				"bStateSave": true,
22 | 				"bDestroy": true
23 | 			} );
24 | 		},
25 | 		function () { return $('#example thead th').length == 4; }
26 | 	);
27 | 	
28 | 	oTest.fnTest( 
29 | 		"Do it again without state saving and make sure we are back to 5 columns",
30 | 		function () {
31 | 			$('#example').dataTable( {
32 | 				"bDestroy": true
33 | 			} );
34 | 		},
35 | 		function () { return $('#example thead th').length == 5; }
36 | 	);
37 | 	
38 | 	oTest.fnCookieDestroy( $('#example').dataTable() );
39 | 	oTest.fnComplete();
40 | } );


--------------------------------------------------------------------------------
/admin/vendors/datatables/unit_testing/tests_onhold/1_dom/2799.js:
--------------------------------------------------------------------------------
 1 | // DATA_TEMPLATE: two_tables
 2 | oTest.fnStart( "Initialise two tables" );
 3 | 
 4 | $(document).ready( function () {
 5 | 	$('table.display').dataTable();
 6 | 	
 7 | 	oTest.fnTest( 
 8 | 		"Check that initialisation was okay",
 9 | 		null,
10 | 		function () { return true; }
11 | 	);
12 | 	
13 | 	oTest.fnComplete();
14 | } );


--------------------------------------------------------------------------------
/admin/vendors/datatables/unit_testing/tests_onhold/1_dom/2840-restore-table-width.js:
--------------------------------------------------------------------------------
 1 | // DATA_TEMPLATE: dom_data
 2 | oTest.fnStart( "2840 - Restore table width on fnDestroy" );
 3 | 
 4 | $(document).ready( function () {
 5 | 	document.cookie = "";
 6 | 	$('#example').dataTable( {
 7 | 		"sScrollX": "100%",
 8 | 		"sScrollXInner": "110%"
 9 | 	} );
10 | 	$('#example').dataTable().fnDestroy();
11 | 	
12 | 	oTest.fnTest( 
13 | 		"Width after destroy",
14 | 		null,
15 | 		function () { return $('#example').width() == "800"; }
16 | 	);
17 | 	
18 | 	oTest.fnComplete();
19 | } );


--------------------------------------------------------------------------------
/admin/vendors/datatables/unit_testing/tests_onhold/1_dom/2914-state-save-sort.js:
--------------------------------------------------------------------------------
 1 | // DATA_TEMPLATE: dom_data
 2 | oTest.fnStart( "2914 - State saving with an empty array" );
 3 | 
 4 | $(document).ready( function () {
 5 | 	document.cookie = "";
 6 | 	$('#example').dataTable( {
 7 | 		"bStateSave": true,
 8 | 		"aaSorting": []
 9 | 	} );
10 | 	
11 | 	oTest.fnTest( 
12 | 		"No sort",
13 | 		null,
14 | 		function () { return $('#example tbody td:eq(3)').html() == "4"; }
15 | 	);
16 | 	
17 | 	oTest.fnTest( 
18 | 		"Next page",
19 | 		function () {
20 | 			$('#example').dataTable().fnPageChange( 'next' );
21 | 		},
22 | 		function () { return $('#example tbody td:eq(1)').html() == "Camino 1.0"; }
23 | 	);
24 | 	
25 | 	oTest.fnTest( 
26 | 		"Destroy the table and remake it - checking we are still on the next page",
27 | 		function () {
28 | 			$('#example').dataTable( {
29 | 				"bStateSave": true,
30 | 					"aaSorting": [],
31 | 				"bDestroy": true
32 | 			} );
33 | 		},
34 | 		function () { return $('#example tbody td:eq(1)').html() == "Camino 1.0"; }
35 | 	);
36 | 	
37 | 	oTest.fnCookieDestroy( $('#example').dataTable() );
38 | 	oTest.fnComplete();
39 | } );


--------------------------------------------------------------------------------
/admin/vendors/datatables/unit_testing/tests_onhold/1_dom/5508-xscroll-zero-content.js:
--------------------------------------------------------------------------------
 1 | // DATA_TEMPLATE: dom_data
 2 | oTest.fnStart( "5508 - Table container width doesn't change when filtering applied to scrolling table" );
 3 | 
 4 | $(document).ready( function () {
 5 | 	$('#example').dataTable( {
 6 | 		"sScrollY": "300px",
 7 | 		"bPaginate": false
 8 | 	} );
 9 | 	
10 | 	oTest.fnTest( 
11 | 		"Width of container 800px on init with scroll",
12 | 		null,
13 | 		function () { return $('div.dataTables_scrollBody').width() == 800; }
14 | 	);
15 | 	
16 | 	oTest.fnTest( 
17 | 		"Unaltered when filter applied",
18 | 		function () { $('#example').dataTable().fnFilter('123'); },
19 | 		function () { return $('div.dataTables_scrollBody').width() == 800; }
20 | 	);
21 | 	
22 | 	oTest.fnComplete();
23 | } );


--------------------------------------------------------------------------------
/admin/vendors/datatables/unit_testing/tests_onhold/1_dom/aoColumns.sName.js:
--------------------------------------------------------------------------------
 1 | // DATA_TEMPLATE: dom_data
 2 | oTest.fnStart( "aoColumns.sName" );
 3 | 
 4 | /* This has no effect at all in DOM methods - so we just check that it has applied the name */
 5 | 
 6 | $(document).ready( function () {
 7 | 	/* Check the default */
 8 | 	var oTable = $('#example').dataTable( {
 9 | 		"aoColumns": [
10 | 			null,
11 | 			null,
12 | 			null,
13 | 			{ "sName": 'unit test' },
14 | 			null
15 | 		]
16 | 	} );
17 | 	var oSettings = oTable.fnSettings();
18 | 	
19 | 	oTest.fnTest( 
20 | 		"Names are stored in the columns object",
21 | 		null,
22 | 		function () { return oSettings.aoColumns[3].sName =="unit test"; }
23 | 	);
24 | 	
25 | 	
26 | 	oTest.fnComplete();
27 | } );


--------------------------------------------------------------------------------
/admin/vendors/datatables/unit_testing/tests_onhold/1_dom/bFilter.js:
--------------------------------------------------------------------------------
 1 | // DATA_TEMPLATE: dom_data
 2 | oTest.fnStart( "bFilter" );
 3 | 
 4 | $(document).ready( function () {
 5 | 	/* Check the default */
 6 | 	$('#example').dataTable();
 7 | 	
 8 | 	oTest.fnTest( 
 9 | 		"Filtering div exists by default",
10 | 		null,
11 | 		function () { return document.getElementById('example_filter') != null; }
12 | 	);
13 | 	
14 | 	/* Check can disable */
15 | 	oTest.fnTest( 
16 | 		"Fltering can be disabled",
17 | 		function () {
18 | 			oSession.fnRestore();
19 | 			$('#example').dataTable( {
20 | 				"bFilter": false
21 | 			} );
22 | 		},
23 | 		function () { return document.getElementById('example_filter') == null; }
24 | 	);
25 | 	
26 | 	/* Enable makes no difference */
27 | 	oTest.fnTest( 
28 | 		"Filtering enabled override",
29 | 		function () {
30 | 			oSession.fnRestore();
31 | 			$('#example').dataTable( {
32 | 				"bFilter": true
33 | 			} );
34 | 		},
35 | 		function () { return document.getElementById('example_filter') != null; }
36 | 	);
37 | 	
38 | 	
39 | 	oTest.fnComplete();
40 | } );


--------------------------------------------------------------------------------
/admin/vendors/datatables/unit_testing/tests_onhold/1_dom/bInfo.js:
--------------------------------------------------------------------------------
 1 | // DATA_TEMPLATE: dom_data
 2 | oTest.fnStart( "bInfo" );
 3 | 
 4 | $(document).ready( function () {
 5 | 	/* Check the default */
 6 | 	$('#example').dataTable();
 7 | 	
 8 | 	oTest.fnTest( 
 9 | 		"Info div exists by default",
10 | 		null,
11 | 		function () { return document.getElementById('example_info') != null; }
12 | 	);
13 | 	
14 | 	/* Check can disable */
15 | 	oTest.fnTest( 
16 | 		"Info can be disabled",
17 | 		function () {
18 | 			oSession.fnRestore();
19 | 			$('#example').dataTable( {
20 | 				"bInfo": false
21 | 			} );
22 | 		},
23 | 		function () { return document.getElementById('example_info') == null; }
24 | 	);
25 | 	
26 | 	/* Enable makes no difference */
27 | 	oTest.fnTest( 
28 | 		"Info enabled override",
29 | 		function () {
30 | 			oSession.fnRestore();
31 | 			$('#example').dataTable( {
32 | 				"bInfo": true
33 | 			} );
34 | 		},
35 | 		function () { return document.getElementById('example_info') != null; }
36 | 	);
37 | 	
38 | 	
39 | 	oTest.fnComplete();
40 | } );


--------------------------------------------------------------------------------
/admin/vendors/datatables/unit_testing/tests_onhold/1_dom/bJQueryUI.js:
--------------------------------------------------------------------------------
 1 | // DATA_TEMPLATE: dom_data
 2 | oTest.fnStart( "bJQueryUI" );
 3 | 
 4 | $(document).ready( function () {
 5 | 	$('#example').dataTable( {
 6 | 		"bJQueryUI": true
 7 | 	} );
 8 | 	
 9 | 	oTest.fnTest( 
10 | 		"Header elements are fully wrapped by DIVs",
11 | 		null,
12 | 		function () {
13 | 			var test = true;
14 | 			$('#example thead th').each( function () {
15 | 				if ( this.childNodes > 1 ) {
16 | 					test = false;
17 | 				}
18 | 			} );
19 | 			return test;
20 | 		}
21 | 	);
22 | 	
23 | 	oTest.fnTest( 
24 | 		"One div for each header element",
25 | 		null,
26 | 		function () {
27 | 			return $('#example thead th div').length == 5;
28 | 		}
29 | 	);
30 | 	
31 | 	oTest.fnTest( 
32 | 		"One span for each header element, nested as child of div",
33 | 		null,
34 | 		function () {
35 | 			return $('#example thead th div>span').length == 5;
36 | 		}
37 | 	);
38 | 	
39 | 	oTest.fnComplete();
40 | } );


--------------------------------------------------------------------------------
/admin/vendors/datatables/unit_testing/tests_onhold/1_dom/bServerSide.js:
--------------------------------------------------------------------------------
 1 | // DATA_TEMPLATE: dom_data
 2 | oTest.fnStart( "bServerSide" );
 3 | 
 4 | /* Not interested in server-side processing here other than to check that it is off */
 5 | 
 6 | $(document).ready( function () {
 7 | 	/* Check the default */
 8 | 	var oTable = $('#example').dataTable();
 9 | 	var oSettings = oTable.fnSettings();
10 | 	
11 | 	oTest.fnTest( 
12 | 		"Server side is off by default",
13 | 		null,
14 | 		function () { return oSettings.oFeatures.bServerSide == false; }
15 | 	);
16 | 	
17 | 	oTest.fnComplete();
18 | } );


--------------------------------------------------------------------------------
/admin/vendors/datatables/unit_testing/tests_onhold/1_dom/fnDeleteRow.js:
--------------------------------------------------------------------------------
 1 | // DATA_TEMPLATE: dom_data
 2 | oTest.fnStart( "fnDeleteRow" );
 3 | 
 4 | $(document).ready( function () {
 5 | 	/* Check the default */
 6 | 	var oTable = $('#example').dataTable();
 7 | 	var oSettings = oTable.fnSettings();
 8 | 	
 9 | 	oTest.fnTest( 
10 | 		"Check that the default data is sane",
11 | 		null,
12 | 		function () { return oSettings.asDataSearch.join(' ').match(/4.0/g).length == 3; }
13 | 	);
14 | 	
15 | 	oTest.fnTest( 
16 | 		"Remove the first data row, and check that hte search data has been updated",
17 | 		function () { oTable.fnDeleteRow( 0 ); },
18 | 		function () { return oSettings.asDataSearch.join(' ').match(/4.0/g).length == 2; }
19 | 	);
20 | 	
21 | 	oTest.fnTest( 
22 | 		"Check that the info element has been updated",
23 | 		null,
24 | 		function () { return $('#example_info').html() == "Showing 1 to 10 of 56 entries"; }
25 | 	);
26 | 	
27 | 	
28 | 	
29 | 	oTest.fnComplete();
30 | } );


--------------------------------------------------------------------------------
/admin/vendors/datatables/unit_testing/tests_onhold/1_dom/fnFilter.js:
--------------------------------------------------------------------------------
 1 | // DATA_TEMPLATE: dom_data
 2 | oTest.fnStart( "fnFilter" );
 3 | 
 4 | $(document).ready( function () {
 5 | 	/* Check the default */
 6 | 	var oTable = $('#example').dataTable();
 7 | 	oTable.fnFilter(1);
 8 | 	
 9 | 	oTest.fnTest( 
10 | 		"Filtering with a non-string input is valid",
11 | 		null,
12 | 		function () { return $('#example_info').html() == "Showing 1 to 10 of 32 entries (filtered from 57 total entries)"; }
13 | 	);
14 | 	
15 | 	oTest.fnComplete();
16 | } );


--------------------------------------------------------------------------------
/admin/vendors/datatables/unit_testing/tests_onhold/1_dom/sAjaxSource.js:
--------------------------------------------------------------------------------
 1 | // DATA_TEMPLATE: dom_data
 2 | oTest.fnStart( "sAjaxSource" );
 3 | 
 4 | /* Not interested in ajax source here other than to check it's default */
 5 | 
 6 | $(document).ready( function () {
 7 | 	/* Check the default */
 8 | 	var oTable = $('#example').dataTable();
 9 | 	var oSettings = oTable.fnSettings();
10 | 	
11 | 	oTest.fnTest( 
12 | 		"Server side is off by default",
13 | 		null,
14 | 		function () { return oSettings.sAjaxSource == null; }
15 | 	);
16 | 	
17 | 	oTest.fnComplete();
18 | } );


--------------------------------------------------------------------------------
/admin/vendors/datatables/unit_testing/tests_onhold/2_js/8549--string-sorting-nonstrings.js:
--------------------------------------------------------------------------------
 1 | // DATA_TEMPLATE: empty_table
 2 | oTest.fnStart( "8549 - string sorting non-string types" );
 3 | 
 4 | $(document).ready( function () {
 5 | 	var test = false;
 6 | 
 7 | 	$.fn.dataTable.ext.sErrMode = "throw";
 8 | 
 9 | 
10 | 
11 | 	/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
12 | 	 * Shallow properties
13 | 	 */
14 | 	
15 | 	$('#example').dataTable( {
16 | 		"aaData": [
17 | 			[ null ],
18 | 			[ 5 ],
19 | 			[ "1a" ],
20 | 			[ new Date(0) ]
21 | 		],
22 | 		"aoColumns": [
23 | 			{ "sTitle": "Test" }
24 | 		]
25 | 	} );
26 | 	
27 | 	oTest.fnTest( 
28 | 		"Sorting works - first cell is empty",
29 | 		null,
30 | 		function () { return $('#example tbody tr:eq(0) td:eq(0)').html() === ""; }
31 | 	);
32 | 	
33 | 	oTest.fnTest( 
34 | 		"Second cell is 1a",
35 | 		null,
36 | 		function () { return $('#example tbody tr:eq(1) td:eq(0)').html() === "1a"; }
37 | 	);
38 | 	
39 | 	oTest.fnTest( 
40 | 		"Third cell is 5",
41 | 		null,
42 | 		function () { return $('#example tbody tr:eq(2) td:eq(0)').html() === "5"; }
43 | 	);
44 | 	
45 | 	
46 | 	oTest.fnComplete();
47 | } );


--------------------------------------------------------------------------------
/admin/vendors/datatables/unit_testing/tests_onhold/2_js/aoColumns.sName.js:
--------------------------------------------------------------------------------
 1 | // DATA_TEMPLATE: js_data
 2 | oTest.fnStart( "aoColumns.sName" );
 3 | 
 4 | /* This has no effect at all in DOM methods - so we just check that it has applied the name */
 5 | 
 6 | $(document).ready( function () {
 7 | 	/* Check the default */
 8 | 	var oTable = $('#example').dataTable( {
 9 | 		"aaData": gaaData,
10 | 		"aoColumns": [
11 | 			null,
12 | 			null,
13 | 			null,
14 | 			{ "sName": 'unit test' },
15 | 			null
16 | 		]
17 | 	} );
18 | 	var oSettings = oTable.fnSettings();
19 | 	
20 | 	oTest.fnTest( 
21 | 		"Names are stored in the columns object",
22 | 		null,
23 | 		function () { return oSettings.aoColumns[3].sName =="unit test"; }
24 | 	);
25 | 	
26 | 	
27 | 	oTest.fnComplete();
28 | } );


--------------------------------------------------------------------------------
/admin/vendors/datatables/unit_testing/tests_onhold/2_js/bFilter.js:
--------------------------------------------------------------------------------
 1 | // DATA_TEMPLATE: js_data
 2 | oTest.fnStart( "bFilter" );
 3 | 
 4 | $(document).ready( function () {
 5 | 	/* Check the default */
 6 | 	$('#example').dataTable( {
 7 | 		"aaData": gaaData
 8 | 	} );
 9 | 	
10 | 	oTest.fnTest( 
11 | 		"Filtering div exists by default",
12 | 		null,
13 | 		function () { return document.getElementById('example_filter') != null; }
14 | 	);
15 | 	
16 | 	/* Check can disable */
17 | 	oTest.fnTest( 
18 | 		"Fltering can be disabled",
19 | 		function () {
20 | 			oSession.fnRestore();
21 | 			$('#example').dataTable( {
22 | 				"aaData": gaaData,
23 | 				"bFilter": false
24 | 			} );
25 | 		},
26 | 		function () { return document.getElementById('example_filter') == null; }
27 | 	);
28 | 	
29 | 	/* Enable makes no difference */
30 | 	oTest.fnTest( 
31 | 		"Filtering enabled override",
32 | 		function () {
33 | 			oSession.fnRestore();
34 | 			$('#example').dataTable( {
35 | 				"aaData": gaaData,
36 | 				"bFilter": true
37 | 			} );
38 | 		},
39 | 		function () { return document.getElementById('example_filter') != null; }
40 | 	);
41 | 	
42 | 	
43 | 	oTest.fnComplete();
44 | } );


--------------------------------------------------------------------------------
/admin/vendors/datatables/unit_testing/tests_onhold/2_js/bInfo.js:
--------------------------------------------------------------------------------
 1 | // DATA_TEMPLATE: js_data
 2 | oTest.fnStart( "bInfo" );
 3 | 
 4 | $(document).ready( function () {
 5 | 	/* Check the default */
 6 | 	$('#example').dataTable( {
 7 | 		"aaData": gaaData
 8 | 	} );
 9 | 	
10 | 	oTest.fnTest( 
11 | 		"Info div exists by default",
12 | 		null,
13 | 		function () { return document.getElementById('example_info') != null; }
14 | 	);
15 | 	
16 | 	/* Check can disable */
17 | 	oTest.fnTest( 
18 | 		"Info can be disabled",
19 | 		function () {
20 | 			oSession.fnRestore();
21 | 			$('#example').dataTable( {
22 | 				"aaData": gaaData,
23 | 				"bInfo": false
24 | 			} );
25 | 		},
26 | 		function () { return document.getElementById('example_info') == null; }
27 | 	);
28 | 	
29 | 	/* Enable makes no difference */
30 | 	oTest.fnTest( 
31 | 		"Info enabled override",
32 | 		function () {
33 | 			oSession.fnRestore();
34 | 			$('#example').dataTable( {
35 | 				"aaData": gaaData,
36 | 				"bInfo": true
37 | 			} );
38 | 		},
39 | 		function () { return document.getElementById('example_info') != null; }
40 | 	);
41 | 	
42 | 	
43 | 	oTest.fnComplete();
44 | } );


--------------------------------------------------------------------------------
/admin/vendors/datatables/unit_testing/tests_onhold/2_js/bServerSide.js:
--------------------------------------------------------------------------------
 1 | // DATA_TEMPLATE: js_data
 2 | oTest.fnStart( "bServerSide" );
 3 | 
 4 | /* Not interested in server-side processing here other than to check that it is off */
 5 | 
 6 | $(document).ready( function () {
 7 | 	/* Check the default */
 8 | 	var oTable = $('#example').dataTable( {
 9 | 		"aaData": gaaData
10 | 	} );
11 | 	var oSettings = oTable.fnSettings();
12 | 	
13 | 	oTest.fnTest( 
14 | 		"Server side is off by default",
15 | 		null,
16 | 		function () { return oSettings.oFeatures.bServerSide == false; }
17 | 	);
18 | 	
19 | 	oTest.fnComplete();
20 | } );


--------------------------------------------------------------------------------
/admin/vendors/datatables/unit_testing/tests_onhold/2_js/sAjaxSource.js:
--------------------------------------------------------------------------------
 1 | // DATA_TEMPLATE: js_data
 2 | oTest.fnStart( "sAjaxSource" );
 3 | 
 4 | /* Not interested in ajax source here other than to check it's default */
 5 | 
 6 | $(document).ready( function () {
 7 | 	/* Check the default */
 8 | 	var oTable = $('#example').dataTable( {
 9 | 		"aaData": gaaData
10 | 	} );
11 | 	var oSettings = oTable.fnSettings();
12 | 	
13 | 	oTest.fnTest( 
14 | 		"Server side is off by default",
15 | 		null,
16 | 		function () { return oSettings.sAjaxSource == null; }
17 | 	);
18 | 	
19 | 	oTest.fnComplete();
20 | } );


--------------------------------------------------------------------------------
/admin/vendors/datatables/unit_testing/tests_onhold/3_ajax/aoColumns.sName.js:
--------------------------------------------------------------------------------
 1 | // DATA_TEMPLATE: empty_table
 2 | oTest.fnStart( "aoColumns.sName" );
 3 | 
 4 | /* This has no effect at all in DOM methods - so we just check that it has applied the name */
 5 | 
 6 | $(document).ready( function () {
 7 | 	/* Check the default */
 8 | 	var oTable = $('#example').dataTable( {
 9 | 		"sAjaxSource": "../../../examples/ajax/sources/arrays.txt",
10 | 		"aoColumns": [
11 | 			null,
12 | 			null,
13 | 			null,
14 | 			{ "sName": 'unit test' },
15 | 			null
16 | 		]
17 | 	} );
18 | 	var oSettings = oTable.fnSettings();
19 | 	
20 | 	oTest.fnWaitTest( 
21 | 		"Names are stored in the columns object",
22 | 		null,
23 | 		function () { return oSettings.aoColumns[3].sName =="unit test"; }
24 | 	);
25 | 	
26 | 	
27 | 	oTest.fnComplete();
28 | } );


--------------------------------------------------------------------------------
/admin/vendors/datatables/unit_testing/tests_onhold/3_ajax/bInfo.js:
--------------------------------------------------------------------------------
 1 | // DATA_TEMPLATE: empty_table
 2 | oTest.fnStart( "bInfo" );
 3 | 
 4 | $(document).ready( function () {
 5 | 	/* Check the default */
 6 | 	$('#example').dataTable( {
 7 | 		"sAjaxSource": "../../../examples/ajax/sources/arrays.txt"
 8 | 	} );
 9 | 	
10 | 	oTest.fnWaitTest( 
11 | 		"Info div exists by default",
12 | 		null,
13 | 		function () { return document.getElementById('example_info') != null; }
14 | 	);
15 | 	
16 | 	/* Check can disable */
17 | 	oTest.fnWaitTest( 
18 | 		"Info can be disabled",
19 | 		function () {
20 | 			oSession.fnRestore();
21 | 			$('#example').dataTable( {
22 | 				"sAjaxSource": "../../../examples/ajax/sources/arrays.txt",
23 | 				"bInfo": false
24 | 			} );
25 | 		},
26 | 		function () { return document.getElementById('example_info') == null; }
27 | 	);
28 | 	
29 | 	/* Enable makes no difference */
30 | 	oTest.fnWaitTest( 
31 | 		"Info enabled override",
32 | 		function () {
33 | 			oSession.fnRestore();
34 | 			$('#example').dataTable( {
35 | 				"sAjaxSource": "../../../examples/ajax/sources/arrays.txt",
36 | 				"bInfo": true
37 | 			} );
38 | 		},
39 | 		function () { return document.getElementById('example_info') != null; }
40 | 	);
41 | 	
42 | 	
43 | 	oTest.fnComplete();
44 | } );


--------------------------------------------------------------------------------
/admin/vendors/datatables/unit_testing/tests_onhold/3_ajax/bServerSide.js:
--------------------------------------------------------------------------------
 1 | // DATA_TEMPLATE: empty_table
 2 | oTest.fnStart( "bServerSide" );
 3 | 
 4 | /* Not interested in server-side processing here other than to check that it is off */
 5 | 
 6 | $(document).ready( function () {
 7 | 	/* Check the default */
 8 | 	var oTable = $('#example').dataTable( {
 9 | 		"sAjaxSource": "../../../examples/ajax/sources/arrays.txt"
10 | 	} );
11 | 	var oSettings = oTable.fnSettings();
12 | 	
13 | 	oTest.fnWaitTest( 
14 | 		"Server side is off by default",
15 | 		null,
16 | 		function () { return oSettings.oFeatures.bServerSide == false; }
17 | 	);
18 | 	
19 | 	oTest.fnComplete();
20 | } );


--------------------------------------------------------------------------------
/admin/vendors/datatables/unit_testing/tests_onhold/3_ajax/sAjaxSource.js:
--------------------------------------------------------------------------------
 1 | // DATA_TEMPLATE: empty_table
 2 | oTest.fnStart( "sAjaxSource" );
 3 | 
 4 | /* Sanitfy check really - all the other tests blast this */
 5 | 
 6 | $(document).ready( function () {
 7 | 	/* Check the default */
 8 | 	var oTable = $('#example').dataTable( {
 9 | 		"sAjaxSource": "../../../examples/ajax/sources/arrays.txt"
10 | 	} );
11 | 	var oSettings = oTable.fnSettings();
12 | 	
13 | 	oTest.fnWaitTest( 
14 | 		"Server side is off by default",
15 | 		null,
16 | 		function () { 
17 | 			return oSettings.sAjaxSource == "../../../examples/ajax/sources/arrays.txt";
18 | 		}
19 | 	);
20 | 	
21 | 	oTest.fnComplete();
22 | } );


--------------------------------------------------------------------------------
/admin/vendors/datatables/unit_testing/tests_onhold/4_server-side/-iDraw.js:
--------------------------------------------------------------------------------
 1 | // DATA_TEMPLATE: empty_table
 2 | oTest.fnStart( "iDraw - check that iDraw increments for each draw" );
 3 | 
 4 | 
 5 | $(document).ready( function () {
 6 | 	var oTable = $('#example').dataTable( {
 7 | 		"bServerSide": true,
 8 | 		"sAjaxSource": "../../../examples/server_side/scripts/server_processing.php"
 9 | 	} );
10 | 	var oSettings = oTable.fnSettings();
11 | 	
12 | 	oTest.fnWaitTest( 
13 | 		"After first draw, iDraw is 1",
14 | 		null,
15 | 		function () { return oSettings.iDraw == 1; }
16 | 	);
17 | 	
18 | 	oTest.fnWaitTest( 
19 | 		"After second draw, iDraw is 2",
20 | 		function () { oTable.fnDraw() },
21 | 		function () { return oSettings.iDraw == 2; }
22 | 	);
23 | 	
24 | 	oTest.fnWaitTest( 
25 | 		"After sort",
26 | 		function () { oTable.fnSort([[1,'asc']]) },
27 | 		function () { return oSettings.iDraw == 3; }
28 | 	);
29 | 	
30 | 	oTest.fnWaitTest( 
31 | 		"After filter",
32 | 		function () { oTable.fnFilter('gecko') },
33 | 		function () { return oSettings.iDraw == 4; }
34 | 	);
35 | 	
36 | 	oTest.fnWaitTest( 
37 | 		"After another filter",
38 | 		function () { oTable.fnFilter('gec') },
39 | 		function () { return oSettings.iDraw == 5; }
40 | 	);
41 | 	
42 | 	
43 | 	oTest.fnComplete();
44 | } );


--------------------------------------------------------------------------------
/admin/vendors/datatables/unit_testing/tests_onhold/4_server-side/2440.js:
--------------------------------------------------------------------------------
 1 | // DATA_TEMPLATE: empty_table
 2 | /*
 3 |  * NOTE: There are some differences in this zero config script for server-side
 4 |  * processing compared to the other data sources. The main reason for this is the
 5 |  * difference in how the server-side processing does it's filtering. Also the
 6 |  * sorting state is always reset on each draw.
 7 |  */
 8 | oTest.fnStart( "Info element with display all" );
 9 | 
10 | $(document).ready( function () {
11 | 	var oTable = $('#example').dataTable( {
12 | 		"bServerSide": true,
13 | 		"sAjaxSource": "../../../examples/server_side/scripts/server_processing.php"
14 | 	} );
15 | 	
16 | 	oTable.fnSettings()._iDisplayLength = -1;
17 | 	oTable.oApi._fnCalculateEnd( oTable.fnSettings() );
18 | 	oTable.fnDraw();
19 | 	
20 | 	
21 | 	/* Basic checks */
22 | 	oTest.fnWaitTest( 
23 | 		"Check length is correct when -1 length given",
24 | 		null,
25 | 		function () {
26 | 			return document.getElementById('example_info').innerHTML == 
27 | 				"Showing 1 to 57 of 57 entries";
28 | 		}
29 | 	);
30 | 	
31 | 	oTest.fnComplete();
32 | } );


--------------------------------------------------------------------------------
/admin/vendors/datatables/unit_testing/tests_onhold/4_server-side/aoColumns.bSearchable.js:
--------------------------------------------------------------------------------
 1 | // DATA_TEMPLATE: empty_table
 2 | oTest.fnStart( "aoColumns.bSeachable" );
 3 | 
 4 | $(document).ready( function () {
 5 | 	/* Check the default */
 6 | 	var oTable = $('#example').dataTable( {
 7 | 		"bServerSide": true,
 8 | 		"sAjaxSource": "../../../examples/server_side/scripts/server_processing.php"
 9 | 	} );
10 | 	var oSettings = oTable.fnSettings();
11 | 	
12 | 	oTest.fnWaitTest( 
13 | 		"Columns are searchable by default",
14 | 		function () { oTable.fnFilter("Camino"); },
15 | 		function () { return $('#example tbody tr:eq(0) td:eq(1)').html() == "Camino 1.0"; }
16 | 	);
17 | 	
18 | 	/* NOT ACTUALLY GOING TO TEST BSEARCHABLE HERE. Reason being is that it requires the server
19 | 	 * side to alter it's processing, and this information about columns is not actually sent to
20 | 	 * the server
21 | 	 */
22 | 	
23 | 	
24 | 	oTest.fnComplete();
25 | } );


--------------------------------------------------------------------------------
/admin/vendors/datatables/unit_testing/tests_onhold/4_server-side/aoColumns.sName.js:
--------------------------------------------------------------------------------
 1 | // DATA_TEMPLATE: empty_table
 2 | oTest.fnStart( "aoColumns.sName" );
 3 | 
 4 | /* This has no effect at all in DOM methods - so we just check that it has applied the name */
 5 | 
 6 | $(document).ready( function () {
 7 | 	/* Check the default */
 8 | 	var oTable = $('#example').dataTable( {
 9 | 		"bServerSide": true,
10 | 		"sAjaxSource": "../../../examples/server_side/scripts/server_processing.php",
11 | 		"aoColumns": [
12 | 			null,
13 | 			null,
14 | 			null,
15 | 			{ "sName": 'unit test' },
16 | 			null
17 | 		]
18 | 	} );
19 | 	var oSettings = oTable.fnSettings();
20 | 	
21 | 	oTest.fnWaitTest( 
22 | 		"Names are stored in the columns object",
23 | 		null,
24 | 		function () { return oSettings.aoColumns[3].sName =="unit test"; }
25 | 	);
26 | 	
27 | 	
28 | 	oTest.fnComplete();
29 | } );


--------------------------------------------------------------------------------
/admin/vendors/datatables/unit_testing/tests_onhold/4_server-side/bServerSide.js:
--------------------------------------------------------------------------------
 1 | // DATA_TEMPLATE: empty_table
 2 | oTest.fnStart( "bServerSide" );
 3 | 
 4 | /* All the other scripts blast the ssp processing */
 5 | 
 6 | $(document).ready( function () {
 7 | 	/* Check the default */
 8 | 	var oTable = $('#example').dataTable( {
 9 | 		"bServerSide": true,
10 | 		"sAjaxSource": "../../../examples/server_side/scripts/server_processing.php"
11 | 	} );
12 | 	var oSettings = oTable.fnSettings();
13 | 	
14 | 	oTest.fnWaitTest( 
15 | 		"Server side can be set to on",
16 | 		null,
17 | 		function () { return oSettings.oFeatures.bServerSide == true; }
18 | 	);
19 | 	
20 | 	oTest.fnComplete();
21 | } );


--------------------------------------------------------------------------------
/admin/vendors/datatables/unit_testing/tests_onhold/4_server-side/sAjaxSource.js:
--------------------------------------------------------------------------------
 1 | // DATA_TEMPLATE: empty_table
 2 | oTest.fnStart( "sAjaxSource" );
 3 | 
 4 | /* Sanitfy check really - all the other tests blast this */
 5 | 
 6 | $(document).ready( function () {
 7 | 	/* Check the default */
 8 | 	var oTable = $('#example').dataTable( {
 9 | 		"bServerSide": true,
10 | 		"sAjaxSource": "../../../examples/server_side/scripts/server_processing.php"
11 | 	} );
12 | 	var oSettings = oTable.fnSettings();
13 | 	
14 | 	oTest.fnWaitTest( 
15 | 		"Server side is off by default",
16 | 		null,
17 | 		function () { 
18 | 			return oSettings.sAjaxSource == "../../../examples/server_side/scripts/server_processing.php";
19 | 		}
20 | 	);
21 | 	
22 | 	oTest.fnComplete();
23 | } );


--------------------------------------------------------------------------------
/admin/vendors/datatables/unit_testing/tests_onhold/5_ajax_objects/aoColumns.sName.js:
--------------------------------------------------------------------------------
 1 | // DATA_TEMPLATE: empty_table
 2 | oTest.fnStart( "aoColumns.sName" );
 3 | 
 4 | /* This has no effect at all in DOM methods - so we just check that it has applied the name */
 5 | 
 6 | $(document).ready( function () {
 7 | 	/* Check the default */
 8 | 	var oTable = $('#example').dataTable( {
 9 | 		"sAjaxSource": "../../../examples/ajax/sources/objects.txt",
10 | 		"aoColumns": [
11 | 			{ "mData": "engine" },
12 | 			{ "mData": "browser" },
13 | 			{ "mData": "platform" },
14 | 			{ "mData": "version", "sName": 'unit test' },
15 | 			{ "mData": "grade" }
16 | 		]
17 | 	} );
18 | 	var oSettings = oTable.fnSettings();
19 | 	
20 | 	oTest.fnWaitTest( 
21 | 		"Names are stored in the columns object",
22 | 		null,
23 | 		function () { return oSettings.aoColumns[3].sName =="unit test"; }
24 | 	);
25 | 	
26 | 	
27 | 	oTest.fnComplete();
28 | } );


--------------------------------------------------------------------------------
/admin/vendors/datatables/unit_testing/tests_onhold/5_ajax_objects/bServerSide.js:
--------------------------------------------------------------------------------
 1 | // DATA_TEMPLATE: empty_table
 2 | oTest.fnStart( "bServerSide" );
 3 | 
 4 | /* Not interested in server-side processing here other than to check that it is off */
 5 | 
 6 | $(document).ready( function () {
 7 | 	/* Check the default */
 8 | 	var oTable = $('#example').dataTable( {
 9 | 		"sAjaxSource": "../../../examples/ajax/sources/objects.txt",
10 | 		"aoColumns": [
11 | 			{ "mData": "engine" },
12 | 			{ "mData": "browser" },
13 | 			{ "mData": "platform" },
14 | 			{ "mData": "version" },
15 | 			{ "mData": "grade" }
16 | 		]
17 | 	} );
18 | 	var oSettings = oTable.fnSettings();
19 | 	
20 | 	oTest.fnWaitTest( 
21 | 		"Server side is off by default",
22 | 		null,
23 | 		function () { return oSettings.oFeatures.bServerSide == false; }
24 | 	);
25 | 	
26 | 	oTest.fnComplete();
27 | } );


--------------------------------------------------------------------------------
/admin/vendors/datatables/unit_testing/tests_onhold/5_ajax_objects/sAjaxSource.js:
--------------------------------------------------------------------------------
 1 | // DATA_TEMPLATE: empty_table
 2 | oTest.fnStart( "sAjaxSource" );
 3 | 
 4 | /* Sanitfy check really - all the other tests blast this */
 5 | 
 6 | $(document).ready( function () {
 7 | 	/* Check the default */
 8 | 	var oTable = $('#example').dataTable( {
 9 | 		"sAjaxSource": "../../../examples/ajax/sources/objects.txt",
10 | 		"aoColumns": [
11 | 			{ "mData": "engine" },
12 | 			{ "mData": "browser" },
13 | 			{ "mData": "platform" },
14 | 			{ "mData": "version" },
15 | 			{ "mData": "grade" }
16 | 		]
17 | 	} );
18 | 	var oSettings = oTable.fnSettings();
19 | 	
20 | 	oTest.fnWaitTest( 
21 | 		"Server side is off by default",
22 | 		null,
23 | 		function () { 
24 | 			return oSettings.sAjaxSource == "../../../examples/ajax/sources/objects.txt";
25 | 		}
26 | 	);
27 | 	
28 | 	oTest.fnComplete();
29 | } );


--------------------------------------------------------------------------------
/admin/vendors/datatables/unit_testing/tests_onhold/6_delayed_rendering/aoColumns.sName.js:
--------------------------------------------------------------------------------
 1 | // DATA_TEMPLATE: empty_table
 2 | oTest.fnStart( "aoColumns.sName" );
 3 | 
 4 | /* This has no effect at all in DOM methods - so we just check that it has applied the name */
 5 | 
 6 | $(document).ready( function () {
 7 | 	/* Check the default */
 8 | 	var oTable = $('#example').dataTable( {
 9 | 		"sAjaxSource": "../../../examples/ajax/sources/arrays.txt",
10 | 		"bDeferRender": true,
11 | 		"aoColumns": [
12 | 			null,
13 | 			null,
14 | 			null,
15 | 			{ "sName": 'unit test' },
16 | 			null
17 | 		]
18 | 	} );
19 | 	var oSettings = oTable.fnSettings();
20 | 	
21 | 	oTest.fnWaitTest( 
22 | 		"Names are stored in the columns object",
23 | 		null,
24 | 		function () { return oSettings.aoColumns[3].sName =="unit test"; }
25 | 	);
26 | 	
27 | 	
28 | 	oTest.fnComplete();
29 | } );


--------------------------------------------------------------------------------
/admin/vendors/datatables/unit_testing/tests_onhold/6_delayed_rendering/bServerSide.js:
--------------------------------------------------------------------------------
 1 | // DATA_TEMPLATE: empty_table
 2 | oTest.fnStart( "bServerSide" );
 3 | 
 4 | /* Not interested in server-side processing here other than to check that it is off */
 5 | 
 6 | $(document).ready( function () {
 7 | 	/* Check the default */
 8 | 	var oTable = $('#example').dataTable( {
 9 | 		"sAjaxSource": "../../../examples/ajax/sources/arrays.txt",
10 | 		"bDeferRender": true
11 | 	} );
12 | 	var oSettings = oTable.fnSettings();
13 | 	
14 | 	oTest.fnWaitTest( 
15 | 		"Server side is off by default",
16 | 		null,
17 | 		function () { return oSettings.oFeatures.bServerSide == false; }
18 | 	);
19 | 	
20 | 	oTest.fnComplete();
21 | } );


--------------------------------------------------------------------------------
/admin/vendors/datatables/unit_testing/tests_onhold/6_delayed_rendering/sAjaxSource.js:
--------------------------------------------------------------------------------
 1 | // DATA_TEMPLATE: empty_table
 2 | oTest.fnStart( "sAjaxSource" );
 3 | 
 4 | /* Sanitfy check really - all the other tests blast this */
 5 | 
 6 | $(document).ready( function () {
 7 | 	/* Check the default */
 8 | 	var oTable = $('#example').dataTable( {
 9 | 		"sAjaxSource": "../../../examples/ajax/sources/arrays.txt",
10 | 		"bDeferRender": true
11 | 	} );
12 | 	var oSettings = oTable.fnSettings();
13 | 	
14 | 	oTest.fnWaitTest( 
15 | 		"Server side is off by default",
16 | 		null,
17 | 		function () { 
18 | 			return oSettings.sAjaxSource == "../../../examples/ajax/sources/arrays.txt";
19 | 		}
20 | 	);
21 | 	
22 | 	oTest.fnComplete();
23 | } );


--------------------------------------------------------------------------------
/admin/vendors/easypiechart/jquery.easy-pie-chart.css:
--------------------------------------------------------------------------------
 1 | .easyPieChart {
 2 |     position: relative;
 3 |     text-align: center;
 4 | }
 5 | 
 6 | .easyPieChart canvas {
 7 |     position: absolute;
 8 |     top: 0;
 9 |     left: 0;
10 | }
11 | 


--------------------------------------------------------------------------------
/admin/vendors/flot/.gitignore:
--------------------------------------------------------------------------------
1 | *.min.js
2 | !excanvas.min.js
3 | node_modules/
4 | 


--------------------------------------------------------------------------------
/admin/vendors/flot/.travis.yml:
--------------------------------------------------------------------------------
1 | language: node_js
2 | node_js:
3 |   - 0.8
4 | 


--------------------------------------------------------------------------------
/admin/vendors/flot/LICENSE.txt:
--------------------------------------------------------------------------------
 1 | Copyright (c) 2007-2013 IOLA and Ole Laursen
 2 | 
 3 | Permission is hereby granted, free of charge, to any person
 4 | obtaining a copy of this software and associated documentation
 5 | files (the "Software"), to deal in the Software without
 6 | restriction, including without limitation the rights to use,
 7 | copy, modify, merge, publish, distribute, sublicense, and/or sell
 8 | copies of the Software, and to permit persons to whom the
 9 | Software is furnished to do so, subject to the following
10 | conditions:
11 | 
12 | The above copyright notice and this permission notice shall be
13 | included in all copies or substantial portions of the Software.
14 | 
15 | THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
16 | EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
17 | OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
18 | NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
19 | HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
20 | WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
21 | FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
22 | OTHER DEALINGS IN THE SOFTWARE.
23 | 


--------------------------------------------------------------------------------
/admin/vendors/flot/Makefile:
--------------------------------------------------------------------------------
 1 | # Makefile for generating minified files
 2 | 
 3 | .PHONY: all
 4 | 
 5 | # we cheat and process all .js files instead of an exhaustive list
 6 | all: $(patsubst %.js,%.min.js,$(filter-out %.min.js,$(wildcard *.js)))
 7 | 
 8 | %.min.js: %.js
 9 | 	yui-compressor 
lt; -o $@
10 | 
11 | test:
12 | 	./node_modules/.bin/jshint *jquery.flot.js
13 | 


--------------------------------------------------------------------------------
/admin/vendors/flot/component.json:
--------------------------------------------------------------------------------
1 | {
2 | 	"name": "Flot",
3 | 	"version": "0.8.0-beta",
4 | 	"main": "jquery.flot.js",
5 | 	"dependencies": {
6 | 		"jquery": ">= 1.2.6"
7 | 	}
8 | }
9 | 


--------------------------------------------------------------------------------
/admin/vendors/flot/examples/ajax/data-eu-gdp-growth-1.json:
--------------------------------------------------------------------------------
1 | {
2 |     "label": "Europe (EU27)",
3 |     "data": [[1999, 3.0], [2000, 3.9]]
4 | }
5 | 


--------------------------------------------------------------------------------
/admin/vendors/flot/examples/ajax/data-eu-gdp-growth-2.json:
--------------------------------------------------------------------------------
1 | {
2 |     "label": "Europe (EU27)",
3 |     "data": [[1999, 3.0], [2000, 3.9], [2001, 2.0], [2002, 1.2]]
4 | }
5 | 


--------------------------------------------------------------------------------
/admin/vendors/flot/examples/ajax/data-eu-gdp-growth-3.json:
--------------------------------------------------------------------------------
1 | {
2 |     "label": "Europe (EU27)",
3 |     "data": [[1999, 3.0], [2000, 3.9], [2001, 2.0], [2002, 1.2], [2003, 1.3], [2004, 2.5]]
4 | }
5 | 


--------------------------------------------------------------------------------
/admin/vendors/flot/examples/ajax/data-eu-gdp-growth-4.json:
--------------------------------------------------------------------------------
1 | {
2 |     "label": "Europe (EU27)",
3 |     "data": [[1999, 3.0], [2000, 3.9], [2001, 2.0], [2002, 1.2], [2003, 1.3], [2004, 2.5], [2005, 2.0], [2006, 3.1]]
4 | }
5 | 


--------------------------------------------------------------------------------
/admin/vendors/flot/examples/ajax/data-eu-gdp-growth-5.json:
--------------------------------------------------------------------------------
1 | {
2 |     "label": "Europe (EU27)",
3 |     "data": [[1999, 3.0], [2000, 3.9], [2001, 2.0], [2002, 1.2], [2003, 1.3], [2004, 2.5], [2005, 2.0], [2006, 3.1], [2007, 2.9], [2008, 0.9]]
4 | }
5 | 


--------------------------------------------------------------------------------
/admin/vendors/flot/examples/ajax/data-eu-gdp-growth.json:
--------------------------------------------------------------------------------
1 | {
2 |     "label": "Europe (EU27)",
3 |     "data": [[1999, 3.0], [2000, 3.9], [2001, 2.0], [2002, 1.2], [2003, 1.3], [2004, 2.5], [2005, 2.0], [2006, 3.1], [2007, 2.9], [2008, 0.9]]
4 | }
5 | 


--------------------------------------------------------------------------------
/admin/vendors/flot/examples/ajax/data-japan-gdp-growth.json:
--------------------------------------------------------------------------------
1 | {
2 |     "label": "Japan",
3 |     "data": [[1999, -0.1], [2000, 2.9], [2001, 0.2], [2002, 0.3], [2003, 1.4], [2004, 2.7], [2005, 1.9], [2006, 2.0], [2007, 2.3], [2008, -0.7]]
4 | }
5 | 


--------------------------------------------------------------------------------
/admin/vendors/flot/examples/ajax/data-usa-gdp-growth.json:
--------------------------------------------------------------------------------
1 | {
2 |     "label": "USA",
3 |     "data": [[1999, 4.4], [2000, 3.7], [2001, 0.8], [2002, 1.6], [2003, 2.5], [2004, 3.6], [2005, 2.9], [2006, 2.8], [2007, 2.0], [2008, 1.1]]
4 | }
5 | 


--------------------------------------------------------------------------------
/admin/vendors/flot/examples/axes-time-zones/tz/factory:
--------------------------------------------------------------------------------
 1 | # <pre>
 2 | # This file is in the public domain, so clarified as of
 3 | # 2009-05-17 by Arthur David Olson.
 4 | 
 5 | # For companies who don't want to put time zone specification in
 6 | # their installation procedures.  When users run date, they'll get the message.
 7 | # Also useful for the "comp.sources" version.
 8 | 
 9 | # Zone	NAME	GMTOFF	RULES	FORMAT
10 | Zone	Factory	0	- "Local time zone must be set--see zic manual page"
11 | 


--------------------------------------------------------------------------------
/admin/vendors/flot/examples/axes-time-zones/tz/southamerica:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/flot/examples/axes-time-zones/tz/southamerica


--------------------------------------------------------------------------------
/admin/vendors/flot/examples/axes-time-zones/tz/yearistype.sh:
--------------------------------------------------------------------------------
 1 | #! /bin/sh
 2 | 
 3 | : 'This file is in the public domain, so clarified as of'
 4 | : '2006-07-17 by Arthur David Olson.'
 5 | 
 6 | case $#-$1 in
 7 | 	2-|2-0*|2-*[!0-9]*)
 8 | 		echo "$0: wild year - $1" >&2
 9 | 		exit 1 ;;
10 | esac
11 | 
12 | case $#-$2 in
13 | 	2-even)
14 | 		case $1 in
15 | 			*[24680])			exit 0 ;;
16 | 			*)				exit 1 ;;
17 | 		esac ;;
18 | 	2-nonpres|2-nonuspres)
19 | 		case $1 in
20 | 			*[02468][048]|*[13579][26])	exit 1 ;;
21 | 			*)				exit 0 ;;
22 | 		esac ;;
23 | 	2-odd)
24 | 		case $1 in
25 | 			*[13579])			exit 0 ;;
26 | 			*)				exit 1 ;;
27 | 		esac ;;
28 | 	2-uspres)
29 | 		case $1 in
30 | 			*[02468][048]|*[13579][26])	exit 0 ;;
31 | 			*)				exit 1 ;;
32 | 		esac ;;
33 | 	2-*)
34 | 		echo "$0: wild type - $2" >&2 ;;
35 | esac
36 | 
37 | echo "$0: usage is $0 year even|odd|uspres|nonpres|nonuspres" >&2
38 | exit 1
39 | 


--------------------------------------------------------------------------------
/admin/vendors/flot/examples/background.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/flot/examples/background.png


--------------------------------------------------------------------------------
/admin/vendors/flot/examples/image/hs-2004-27-a-large-web.jpg:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/flot/examples/image/hs-2004-27-a-large-web.jpg


--------------------------------------------------------------------------------
/admin/vendors/flot/examples/navigate/arrow-down.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/flot/examples/navigate/arrow-down.gif


--------------------------------------------------------------------------------
/admin/vendors/flot/examples/navigate/arrow-left.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/flot/examples/navigate/arrow-left.gif


--------------------------------------------------------------------------------
/admin/vendors/flot/examples/navigate/arrow-right.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/flot/examples/navigate/arrow-right.gif


--------------------------------------------------------------------------------
/admin/vendors/flot/examples/navigate/arrow-up.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/flot/examples/navigate/arrow-up.gif


--------------------------------------------------------------------------------
/admin/vendors/flot/flot.jquery.json:
--------------------------------------------------------------------------------
 1 | {
 2 | 	"name": "flot",
 3 | 	"version": "0.8.0-beta",
 4 | 	"title": "Flot",
 5 | 	"author": {
 6 | 		"name": "Ole Laursen",
 7 | 		"url": "https://github.com/OleLaursen"
 8 | 	},
 9 | 	"licenses": [{
10 | 		"type": "MIT",
11 | 		"url": "http://github.com/flot/flot/blob/master/LICENSE.txt"
12 | 	}],
13 | 	"dependencies": {
14 | 		"jquery": ">=1.2.6"
15 | 	},
16 | 	"description": "Flot is a pure JavaScript plotting library for jQuery, with a focus on simple usage, attractive looks and interactive features.",
17 | 	"keywords": ["plot", "chart", "graph", "visualization", "canvas", "graphics"],
18 | 	"homepage": "http://www.flotcharts.org",
19 | 	"docs": "http://github.com/flot/flot/blob/master/API.md",
20 | 	"demo": "http://www.flotcharts.org/flot/examples/",
21 | 	"bugs": "http://github.com/flot/flot/issues",
22 | 	"maintainers": [{
23 | 		"name": "David Schnur",
24 | 		"email": "dnschnur@gmail.com",
25 | 		"url": "http://github.com/dnschnur"
26 | 	}]
27 | }


--------------------------------------------------------------------------------
/admin/vendors/flot/package.json:
--------------------------------------------------------------------------------
 1 | {
 2 | 	"name": "Flot",
 3 | 	"version": "0.8.0-beta",
 4 | 	"main": "jquery.flot.js",
 5 | 	"scripts": {
 6 | 		"test": "make test"
 7 | 	},
 8 | 	"devDependencies": {
 9 | 		"jshint": "0.9.1"
10 | 	}
11 | }
12 | 


--------------------------------------------------------------------------------
/admin/vendors/jGrowl/.gitignore:
--------------------------------------------------------------------------------
1 | .DS_Store
2 | 


--------------------------------------------------------------------------------
/admin/vendors/jGrowl/LICENSE:
--------------------------------------------------------------------------------
1 | Copyright (c) 2012 Stan Lemon
2 | 
3 | Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
4 | 
5 | The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
6 | 
7 | THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
8 | 


--------------------------------------------------------------------------------
/admin/vendors/jGrowl/README.md:
--------------------------------------------------------------------------------
 1 | # jGrowl 
 2 | jGrowl is a jQuery plugin that raises unobtrusive messages within the browser, similar to the way that OS X's Growl Framework works. The idea is simple, deliver notifications to the end user in a noticeable way that doesn't obstruct the work flow and yet keeps the user informed.
 3 | 
 4 | ## Example usages
 5 | 	// Sample 1
 6 | 	$.jGrowl("Hello world!");
 7 | 	// Sample 2
 8 | 	$.jGrowl("Stick this!", { sticky: true });
 9 | 	// Sample 3
10 | 	$.jGrowl("A message with a header", { header: 'Important' });
11 | 	// Sample 4
12 | 	$.jGrowl("A message that will live a little longer.", { life: 10000 });
13 | 	// Sample 5
14 | 	$.jGrowl("A message with a beforeOpen callback and a different opening animation.", {
15 | 		beforeClose: function(e,m) {
16 | 			alert('About to close this notification!');
17 | 		},
18 | 		animateOpen: {
19 | 			height: 'show'
20 | 		}
21 | 	});
22 | 
23 | 


--------------------------------------------------------------------------------
/admin/vendors/jGrowl/examples/iphone.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/jGrowl/examples/iphone.png


--------------------------------------------------------------------------------
/admin/vendors/jGrowl/examples/multiple-containers.html:
--------------------------------------------------------------------------------
 1 | <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
 2 |      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 3 | <html>
 4 |   <head>
 5 | 	<script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
 6 |     <script src="../jquery.jgrowl.js"></script>
 7 |     <link rel="stylesheet" type="text/css" href="../jquery.jgrowl.css"/>
 8 |   </head>
 9 |   <body>
10 |     <div>
11 |       <input type="button" onclick="$.jGrowl('Default Positioning');" value="Default"/>
12 |       <input type="button" onclick="$('#one').jGrowl('Bottom Right Positioning');" value="Bottom Right"/>
13 |       <input type="button" onclick="$('#two').jGrowl('Bottom Left Positioning');" value="Bottom Left"/>
14 |     </div>
15 |     <div id="one" class="jGrowl bottom-right"></div>
16 |     <div id="two" class="jGrowl bottom-left"></div>
17 |   </body>
18 | </html>
19 | 


--------------------------------------------------------------------------------
/admin/vendors/jGrowl/examples/smoke.png:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/jGrowl/examples/smoke.png


--------------------------------------------------------------------------------
/admin/vendors/morris/morris.css:
--------------------------------------------------------------------------------
1 | .morris-hover{position:absolute;z-index:1000;}.morris-hover.morris-default-style{border-radius:10px;padding:6px;color:#666;background:rgba(255, 255, 255, 0.8);border:solid 2px rgba(230, 230, 230, 0.8);font-family:sans-serif;font-size:12px;text-align:center;}.morris-hover.morris-default-style .morris-hover-row-label{font-weight:bold;margin:0.25em 0;}
2 | .morris-hover.morris-default-style .morris-hover-point{white-space:nowrap;margin:0.1em 0;}
3 | 


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/langs/readme.md:
--------------------------------------------------------------------------------
1 | This is where language files should be placed.
2 | 
3 | Please DO NOT translate these directly use this service: https://www.transifex.com/projects/p/tinymce/
4 | 


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/plugins/anchor/plugin.min.js:
--------------------------------------------------------------------------------
1 | tinymce.PluginManager.add("anchor",function(e){function t(){var t=e.selection.getNode();e.windowManager.open({title:"Anchor",body:{type:"textbox",name:"name",size:40,label:"Name",value:t.name||t.id},onsubmit:function(t){e.execCommand("mceInsertContent",!1,e.dom.createHTML("a",{id:t.data.name}))}})}e.addButton("anchor",{icon:"anchor",tooltip:"Anchor",onclick:t,stateSelector:"a:not([href])"}),e.addMenuItem("anchor",{icon:"anchor",text:"Anchor",context:"insert",onclick:t})});


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/plugins/autoresize/plugin.min.js:
--------------------------------------------------------------------------------
1 | tinymce.PluginManager.add("autoresize",function(e){function t(a){var r,o,c=e.getDoc(),s=c.body,u=c.documentElement,l=tinymce.DOM,m=n.autoresize_min_height;"setcontent"==a.type&&a.initial||e.plugins.fullscreen&&e.plugins.fullscreen.isFullscreen()||(o=tinymce.Env.ie?s.scrollHeight:tinymce.Env.webkit&&0===s.clientHeight?0:s.offsetHeight,o>n.autoresize_min_height&&(m=o),n.autoresize_max_height&&o>n.autoresize_max_height?(m=n.autoresize_max_height,s.style.overflowY="auto",u.style.overflowY="auto"):(s.style.overflowY="hidden",u.style.overflowY="hidden",s.scrollTop=0),m!==i&&(r=m-i,l.setStyle(l.get(e.id+"_ifr"),"height",m+"px"),i=m,tinymce.isWebKit&&0>r&&t(a)))}var n=e.settings,i=0;e.settings.inline||(n.autoresize_min_height=parseInt(e.getParam("autoresize_min_height",e.getElement().offsetHeight),10),n.autoresize_max_height=parseInt(e.getParam("autoresize_max_height",0),10),e.on("init",function(){e.dom.setStyle(e.getBody(),"paddingBottom",e.getParam("autoresize_bottom_margin",50)+"px")}),e.on("change setcontent paste keyup",t),e.getParam("autoresize_on_init",!0)&&e.on("load",t),e.addCommand("mceAutoResize",t))});


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/plugins/code/plugin.min.js:
--------------------------------------------------------------------------------
1 | tinymce.PluginManager.add("code",function(e){function t(){e.windowManager.open({title:"Source code",body:{type:"textbox",name:"code",multiline:!0,minWidth:e.getParam("code_dialog_width",600),minHeight:e.getParam("code_dialog_height",500),value:e.getContent({source_view:!0}),spellcheck:!1},onSubmit:function(t){e.undoManager.transact(function(){e.setContent(t.data.code)}),e.nodeChanged()}})}e.addCommand("mceCodeEditor",t),e.addButton("code",{icon:"code",tooltip:"Source code",onclick:t}),e.addMenuItem("code",{icon:"code",text:"Source code",context:"tools",onclick:t})});


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/plugins/contextmenu/plugin.min.js:
--------------------------------------------------------------------------------
1 | tinymce.PluginManager.add("contextmenu",function(e){var t;e.on("contextmenu",function(n){var i;if(n.preventDefault(),i=e.settings.contextmenu||"link image inserttable | cell row column deletetable",t)t.show();else{var o=[];tinymce.each(i.split(/[ ,]/),function(t){var n=e.menuItems[t];"|"==t&&(n={text:t}),n&&(n.shortcut="",o.push(n))});for(var a=0;a<o.length;a++)"|"==o[a].text&&(0===a||a==o.length-1)&&o.splice(a,1);t=new tinymce.ui.Menu({items:o,context:"contextmenu"}),t.renderTo(document.body)}var r={x:n.pageX,y:n.pageY};e.inline||(r=tinymce.DOM.getPos(e.getContentAreaContainer()),r.x+=n.clientX,r.y+=n.clientY),t.moveTo(r.x,r.y),e.on("remove",function(){t.remove(),t=null})})});


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/plugins/directionality/plugin.min.js:
--------------------------------------------------------------------------------
1 | tinymce.PluginManager.add("directionality",function(e){function t(t){var n,i=e.dom,a=e.selection.getSelectedBlocks();a.length&&(n=i.getAttrib(a[0],"dir"),tinymce.each(a,function(e){i.getParent(e.parentNode,"*[dir='"+t+"']",i.getRoot())||(n!=t?i.setAttrib(e,"dir",t):i.setAttrib(e,"dir",null))}),e.nodeChanged())}function n(e){var t=[];return tinymce.each("h1 h2 h3 h4 h5 h6 div p".split(" "),function(n){t.push(n+"[dir="+e+"]")}),t.join(",")}e.addCommand("mceDirectionLTR",function(){t("ltr")}),e.addCommand("mceDirectionRTL",function(){t("rtl")}),e.addButton("ltr",{title:"Left to right",cmd:"mceDirectionLTR",stateSelector:n("ltr")}),e.addButton("rtl",{title:"Right to left",cmd:"mceDirectionRTL",stateSelector:n("rtl")})});


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/plugins/emoticons/img/smiley-cool.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/tinymce/js/tinymce/plugins/emoticons/img/smiley-cool.gif


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/plugins/emoticons/img/smiley-cry.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/tinymce/js/tinymce/plugins/emoticons/img/smiley-cry.gif


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/plugins/emoticons/img/smiley-embarassed.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/tinymce/js/tinymce/plugins/emoticons/img/smiley-embarassed.gif


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/plugins/emoticons/img/smiley-foot-in-mouth.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/tinymce/js/tinymce/plugins/emoticons/img/smiley-foot-in-mouth.gif


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/plugins/emoticons/img/smiley-frown.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/tinymce/js/tinymce/plugins/emoticons/img/smiley-frown.gif


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/plugins/emoticons/img/smiley-innocent.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/tinymce/js/tinymce/plugins/emoticons/img/smiley-innocent.gif


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/plugins/emoticons/img/smiley-kiss.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/tinymce/js/tinymce/plugins/emoticons/img/smiley-kiss.gif


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/plugins/emoticons/img/smiley-laughing.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/tinymce/js/tinymce/plugins/emoticons/img/smiley-laughing.gif


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/plugins/emoticons/img/smiley-money-mouth.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/tinymce/js/tinymce/plugins/emoticons/img/smiley-money-mouth.gif


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/plugins/emoticons/img/smiley-sealed.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/tinymce/js/tinymce/plugins/emoticons/img/smiley-sealed.gif


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/plugins/emoticons/img/smiley-smile.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/tinymce/js/tinymce/plugins/emoticons/img/smiley-smile.gif


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/plugins/emoticons/img/smiley-surprised.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/tinymce/js/tinymce/plugins/emoticons/img/smiley-surprised.gif


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/plugins/emoticons/img/smiley-tongue-out.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/tinymce/js/tinymce/plugins/emoticons/img/smiley-tongue-out.gif


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/plugins/emoticons/img/smiley-undecided.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/tinymce/js/tinymce/plugins/emoticons/img/smiley-undecided.gif


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/plugins/emoticons/img/smiley-wink.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/tinymce/js/tinymce/plugins/emoticons/img/smiley-wink.gif


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/plugins/emoticons/img/smiley-yell.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/tinymce/js/tinymce/plugins/emoticons/img/smiley-yell.gif


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/plugins/emoticons/plugin.min.js:
--------------------------------------------------------------------------------
1 | tinymce.PluginManager.add("emoticons",function(e,t){function n(){var e;return e='<table role="presentation" class="mce-grid">',tinymce.each(i,function(n){e+="<tr>",tinymce.each(n,function(n){var i=t+"/img/smiley-"+n+".gif";e+='<td><a href="#" data-mce-url="'+i+'" tabindex="-1"><img src="'+i+'" style="width: 18px; height: 18px"></a></td>'}),e+="</tr>"}),e+="</table>"}var i=[["cool","cry","embarassed","foot-in-mouth"],["frown","innocent","kiss","laughing"],["money-mouth","sealed","smile","surprised"],["tongue-out","undecided","wink","yell"]];e.addButton("emoticons",{type:"panelbutton",popoverAlign:"bc-tl",panel:{autohide:!0,html:n,onclick:function(t){var n=e.dom.getParent(t.target,"a");n&&(e.insertContent('<img src="'+n.getAttribute("data-mce-url")+'" />'),this.hide())}},tooltip:"Emoticons"})});


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/plugins/example/plugin.min.js:
--------------------------------------------------------------------------------
1 | tinymce.PluginManager.add("example",function(e){e.addButton("example",{text:"My button",icon:!1,onclick:function(){e.windowManager.open({title:"Example plugin",body:[{type:"textbox",name:"title",label:"Title"}],onsubmit:function(t){e.insertContent("Title: "+t.data.title)}})}}),e.addMenuItem("example",{text:"Example plugin",context:"tools",onclick:function(){e.windowManager.open({title:"TinyMCE site",url:"http://www.tinymce.com",width:800,height:600,buttons:[{text:"Close",onclick:"close"}]})}})});


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/plugins/example_dependency/plugin.min.js:
--------------------------------------------------------------------------------
1 | tinymce.PluginManager.add("example_dependency",function(){},["example"]);


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/plugins/hr/plugin.min.js:
--------------------------------------------------------------------------------
1 | tinymce.PluginManager.add("hr",function(e){e.addCommand("InsertHorizontalRule",function(){e.execCommand("mceInsertContent",!1,"<hr />")}),e.addButton("hr",{icon:"hr",tooltip:"Horizontal line",cmd:"InsertHorizontalRule"}),e.addMenuItem("hr",{icon:"hr",text:"Horizontal line",cmd:"InsertHorizontalRule",context:"insert"})});


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/plugins/importcss/plugin.min.js:
--------------------------------------------------------------------------------
1 | tinymce.PluginManager.add("importcss",function(e){function t(t){function n(e,t){(t||o[e.href])&&(i(e.imports,function(e){n(e,!0)}),i(e.cssRules||e.rules,function(e){e.styleSheet?n(e.styleSheet,!0):e.selectorText&&i(e.selectorText.split(","),function(e){a.push(tinymce.trim(e))})}))}var a=[],o={};i(e.contentCSS,function(e){o[e]=!0});try{i(t.styleSheets,n)}catch(r){}return a}function n(t){var n,i=/^(?:([a-z0-9\-_]+))?(\.[a-z0-9_\-\.]+)$/i.exec(t);if(i){var a=i[1],o=i[2].substr(1).split(".").join(" ");return i[1]?(n={title:t},e.schema.getTextBlockElements()[a]?n.block=a:e.schema.getBlockElements()[a]?n.selector=a:n.inline=a):i[2]&&(n={inline:"span",title:t.substr(1),classes:o}),e.settings.importcss_merge_classes!==!1?n.classes=o:n.attributes={"class":o},n}}var i=tinymce.each;e.settings.style_formats||e.on("renderFormatsMenu",function(a){var o=e.settings.importcss_selector_converter||n,r={};e.settings.importcss_append||a.control.items().remove(),i(t(e.getDoc()),function(t){if(-1===t.indexOf(".mce-")&&!r[t]){var n=o(t);if(n){var i=n.name||tinymce.DOM.uniqueId();e.formatter.register(i,n),a.control.append(tinymce.extend({},a.control.settings.itemDefaults,{text:n.title,format:i}))}r[t]=!0}})})});


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/plugins/media/moxieplayer.swf:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/tinymce/js/tinymce/plugins/media/moxieplayer.swf


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/plugins/nonbreaking/plugin.min.js:
--------------------------------------------------------------------------------
1 | tinymce.PluginManager.add("nonbreaking",function(e){var t=e.getParam("nonbreaking_force_tab");if(e.addCommand("mceNonBreaking",function(){e.insertContent(e.plugins.visualchars&&e.plugins.visualchars.state?'<span data-mce-bogus="1" class="mce-nbsp">&nbsp;</span>':"&nbsp;")}),e.addButton("nonbreaking",{title:"Insert nonbreaking space",cmd:"mceNonBreaking"}),e.addMenuItem("nonbreaking",{text:"Nonbreaking space",cmd:"mceNonBreaking",context:"insert"}),t){var n=+t>1?+t:3;e.on("keydown",function(t){if(9==t.keyCode){if(t.shiftKey)return;t.preventDefault();for(var i=0;n>i;i++)e.execCommand("mceNonBreaking")}})}});


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/plugins/pagebreak/plugin.min.js:
--------------------------------------------------------------------------------
1 | tinymce.PluginManager.add("pagebreak",function(e){var t,n="mce-pagebreak",i=e.getParam("pagebreak_separator","<!-- pagebreak -->"),a='<img src="'+tinymce.Env.transparentSrc+'" class="'+n+'" data-mce-resize="false" />';t=new RegExp(i.replace(/[\?\.\*\[\]\(\)\{\}\+\^\$\:]/g,function(e){return"\\"+e}),"gi"),e.addCommand("mcePageBreak",function(){e.execCommand("mceInsertContent",0,a)}),e.addButton("pagebreak",{title:"Page break",cmd:"mcePageBreak"}),e.addMenuItem("pagebreak",{text:"Page break",icon:"pagebreak",cmd:"mcePageBreak",context:"insert"}),e.on("ResolveName",function(t){"IMG"==t.target.nodeName&&e.dom.hasClass(t.target,n)&&(t.name="pagebreak")}),e.on("click",function(t){t=t.target,"IMG"===t.nodeName&&e.dom.hasClass(t,n)&&e.selection.select(t)}),e.on("BeforeSetContent",function(e){e.content=e.content.replace(t,a)}),e.on("PreInit",function(){e.serializer.addNodeFilter("img",function(e){for(var t,n,a=e.length;a--;)t=e[a],n=t.attr("class"),n&&-1!==n.indexOf("mce-pagebreak")&&(t.type=3,t.value=i,t.raw=!0)})})});


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/plugins/preview/plugin.min.js:
--------------------------------------------------------------------------------
1 | tinymce.PluginManager.add("preview",function(e){var t=e.settings;e.addCommand("mcePreview",function(){e.windowManager.open({title:"Preview",width:parseInt(e.getParam("plugin_preview_width","650"),10),height:parseInt(e.getParam("plugin_preview_height","500"),10),html:'<iframe src="javascript:\'\'" frameborder="0"></iframe>',buttons:{text:"Close",onclick:function(){this.parent().parent().close()}},onPostRender:function(){var n,i=this.getEl("body").firstChild.contentWindow.document,a="";tinymce.each(e.contentCSS,function(t){a+='<link type="text/css" rel="stylesheet" href="'+e.documentBaseURI.toAbsolute(t)+'">'});var r=t.body_id||"tinymce";-1!=r.indexOf("=")&&(r=e.getParam("body_id","","hash"),r=r[e.id]||r);var o=t.body_class||"";-1!=o.indexOf("=")&&(o=e.getParam("body_class","","hash"),o=o[e.id]||""),n="<!DOCTYPE html><html><head>"+a+"</head>"+'<body id="'+r+'" class="mce-content-body '+o+'">'+e.getContent()+"</body>"+"</html>",i.open(),i.write(n),i.close()}})}),e.addButton("preview",{title:"Preview",cmd:"mcePreview"}),e.addMenuItem("preview",{text:"Preview",cmd:"mcePreview",context:"view"})});


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/plugins/print/plugin.min.js:
--------------------------------------------------------------------------------
1 | tinymce.PluginManager.add("print",function(t){t.addCommand("mcePrint",function(){t.getWin().print()}),t.addButton("print",{title:"Print",cmd:"mcePrint"}),t.addShortcut("Ctrl+P","","mcePrint"),t.addMenuItem("print",{text:"Print",cmd:"mcePrint",icon:"print",shortcut:"Ctrl+P",context:"file"})});


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/plugins/save/plugin.min.js:
--------------------------------------------------------------------------------
1 | tinymce.PluginManager.add("save",function(e){function t(){var t,n;return t=tinymce.DOM.getParent(e.id,"form"),!e.getParam("save_enablewhendirty",!0)||e.isDirty()?(tinymce.triggerSave(),(n=e.getParam("save_onsavecallback"))?(e.execCallback("save_onsavecallback",e)&&(e.startContent=tinymce.trim(e.getContent({format:"raw"})),e.nodeChanged()),void 0):(t?(e.isNotDirty=!0,(!t.onsubmit||t.onsubmit())&&("function"==typeof t.submit?t.submit():e.windowManager.alert("Error: Form submit field collision.")),e.nodeChanged()):e.windowManager.alert("Error: No form element found."),void 0)):void 0}function n(){var t,n=tinymce.trim(e.startContent);return(t=e.getParam("save_oncancelcallback"))?(e.execCallback("save_oncancelcallback",e),void 0):(e.setContent(n),e.undoManager.clear(),e.nodeChanged(),void 0)}function i(){var t=this;e.on("nodeChange",function(){t.disabled(e.getParam("save_enablewhendirty",!0)&&!e.isDirty())})}e.addCommand("mceSave",t),e.addCommand("mceCancel",n),e.addButton("save",{icon:"save",text:"Save",cmd:"mceSave",disabled:!0,onPostRender:i}),e.addButton("cancel",{text:"Cancel",icon:!1,cmd:"mceCancel",disabled:!0,onPostRender:i}),e.addShortcut("ctrl+s","","mceSave")});


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/plugins/tabfocus/plugin.min.js:
--------------------------------------------------------------------------------
1 | tinymce.PluginManager.add("tabfocus",function(e){function n(e){9===e.keyCode&&e.preventDefault()}function t(n){function t(n){function t(e){return"BODY"===e.nodeName||"hidden"!=e.type&&"none"!=e.style.display&&"hidden"!=e.style.visibility&&t(e.parentNode)}function r(e){return e.tabIndex||"INPUT"==e.nodeName||"TEXTAREA"==e.nodeName}function a(e){return!r(e)&&"-1"!=e.getAttribute("tabindex")&&t(e)}if(d=i.select(":input:enabled,*[tabindex]:not(iframe)"),o(d,function(n,t){return n.id==e.id?(u=t,!1):void 0}),n>0){for(c=u+1;c<d.length;c++)if(a(d[c]))return d[c]}else for(c=u-1;c>=0;c--)if(a(d[c]))return d[c];return null}var u,d,a,c;if(9===n.keyCode&&(a=r(e.getParam("tab_focus",e.getParam("tabfocus_elements",":prev,:next"))),1==a.length&&(a[1]=a[0],a[0]=":prev"),d=n.shiftKey?":prev"==a[0]?t(-1):i.get(a[0]):":next"==a[1]?t(1):i.get(a[1]))){var f=tinymce.get(d.id||d.name);d.id&&f?f.focus():window.setTimeout(function(){tinymce.Env.webkit||window.focus(),d.focus()},10),n.preventDefault()}}var i=tinymce.DOM,o=tinymce.each,r=tinymce.explode;e.on("init",function(){e.inline&&tinymce.DOM.setAttrib(e.getBody(),"tabIndex",null)}),e.on("keyup",n),tinymce.Env.gecko?e.on("keypress keydown",t):e.on("keydown",t)});


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/plugins/visualblocks/plugin.min.js:
--------------------------------------------------------------------------------
1 | tinymce.PluginManager.add("visualblocks",function(e,t){function n(){var t=this;t.active(r),e.on("VisualBlocks",function(){t.active(e.dom.hasClass(e.getBody(),"mce-visualblocks"))})}var i,a,r;window.NodeList&&(e.addCommand("mceVisualBlocks",function(){var n,o=e.dom;i||(i=o.uniqueId(),n=o.create("link",{id:i,rel:"stylesheet",href:t+"/css/visualblocks.css"}),e.getDoc().getElementsByTagName("head")[0].appendChild(n)),e.on("PreviewFormats AfterPreviewFormats",function(t){r&&o.toggleClass(e.getBody(),"mce-visualblocks","afterpreviewformats"==t.type)}),o.toggleClass(e.getBody(),"mce-visualblocks"),r=e.dom.hasClass(e.getBody(),"mce-visualblocks"),a&&a.active(o.hasClass(e.getBody(),"mce-visualblocks")),e.fire("VisualBlocks")}),e.addButton("visualblocks",{title:"Show blocks",cmd:"mceVisualBlocks",onPostRender:n}),e.addMenuItem("visualblocks",{text:"Show blocks",cmd:"mceVisualBlocks",onPostRender:n,selectable:!0,context:"view",prependToContext:!0}),e.on("init",function(){e.settings.visualblocks_default_state&&e.execCommand("mceVisualBlocks",!1,null,{skip_focus:!0})}),e.on("remove",function(){e.dom.removeClass(e.getBody(),"mce-visualblocks")}))});


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/plugins/visualchars/plugin.min.js:
--------------------------------------------------------------------------------
1 | tinymce.PluginManager.add("visualchars",function(e){function t(t){var n,a,r,o,l,s,c=e.getBody(),d=e.selection;if(i=!i,e.fire("VisualChars",{state:i}),t&&(s=d.getBookmark()),i)for(a=[],tinymce.walk(c,function(e){3==e.nodeType&&e.nodeValue&&-1!=e.nodeValue.indexOf(" ")&&a.push(e)},"childNodes"),r=0;r<a.length;r++){for(o=a[r].nodeValue,o=o.replace(/(\u00a0)/g,'<span data-mce-bogus="1" class="mce-nbsp">$1</span>'),l=e.dom.create("div",null,o);n=l.lastChild;)e.dom.insertAfter(n,a[r]);e.dom.remove(a[r])}else for(a=e.dom.select("span.mce-nbsp",c),r=a.length-1;r>=0;r--)e.dom.remove(a[r],1);d.moveToBookmark(s)}function n(){var t=this;e.on("VisualChars",function(e){t.active(e.state)})}var i;e.addCommand("mceVisualChars",t),e.addButton("visualchars",{title:"Show invisible characters",cmd:"mceVisualChars",onPostRender:n}),e.addMenuItem("visualchars",{text:"Show invisible characters",cmd:"mceVisualChars",onPostRender:n,selectable:!0,context:"view",prependToContext:!0}),e.on("beforegetcontent",function(e){i&&"raw"!=e.format&&!e.draft&&(i=!0,t(!1))})});


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/plugins/wordcount/plugin.min.js:
--------------------------------------------------------------------------------
1 | tinymce.PluginManager.add("wordcount",function(e){function t(){e.theme.panel.find("#wordcount").text(["Words: {0}",a.getCount()])}var n,i,a=this;n=e.getParam("wordcount_countregex",/[\w\u2019\x27\-]+/g),i=e.getParam("wordcount_cleanregex",/[0-9.(),;:!?%#$?\x27\x22_+=\\\/\-]*/g),e.on("init",function(){var n=e.theme.panel&&e.theme.panel.find("#statusbar")[0];n&&window.setTimeout(function(){n.insert({type:"label",name:"wordcount",text:["Words: {0}",a.getCount()],classes:"wordcount"},0),e.on("setcontent beforeaddundo",t),e.on("keyup",function(e){32==e.keyCode&&t()})},0)}),a.getCount=function(){var t=e.getContent({format:"raw"}),a=0;if(t){t=t.replace(/\.\.\./g," "),t=t.replace(/<.[^<>]*?>/g," ").replace(/&nbsp;|&#160;/gi," "),t=t.replace(/(\w+)(&.+?;)+(\w+)/,"$1$3").replace(/&.+?;/g," "),t=t.replace(i,"");var o=t.match(n);o&&(a=o.length)}return a}});


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/skins/lightgray/content.inline.min.css:
--------------------------------------------------------------------------------
1 | .mce-object{border:1px dotted #3a3a3a;background:#d5d5d5 url(img/object.gif) no-repeat center}.mce-pagebreak{cursor:default;display:block;border:0;width:100%;height:5px;border:1px dashed #666;margin-top:15px}.mce-item-anchor{cursor:default;display:inline-block;-webkit-user-select:all;-webkit-user-modify:read-only;-moz-user-select:all;-moz-user-modify:read-only;user-select:all;user-modify:read-only;width:9px!important;height:9px!important;border:1px dotted #3a3a3a;background:#d5d5d5 url(img/anchor.gif) no-repeat center}.mce-nbsp{background:#AAA}hr{cursor:default}.mce-match-marker{background:green;color:#fff}.mce-spellchecker-word{background:url(img/wline.gif) repeat-x bottom left;cursor:default}.mce-item-table,.mce-item-table td,.mce-item-table th,.mce-item-table caption{border:1px dashed #BBB}td.mce-item-selected,th.mce-item-selected{background-color:#39f!important}.mce-edit-focus{outline:1px dotted #333}


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/skins/lightgray/fonts/icomoon-small.eot:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/tinymce/js/tinymce/skins/lightgray/fonts/icomoon-small.eot


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/skins/lightgray/fonts/icomoon-small.ttf:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/tinymce/js/tinymce/skins/lightgray/fonts/icomoon-small.ttf


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/skins/lightgray/fonts/icomoon-small.woff:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/tinymce/js/tinymce/skins/lightgray/fonts/icomoon-small.woff


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/skins/lightgray/fonts/icomoon.eot:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/tinymce/js/tinymce/skins/lightgray/fonts/icomoon.eot


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/skins/lightgray/fonts/icomoon.ttf:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/tinymce/js/tinymce/skins/lightgray/fonts/icomoon.ttf


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/skins/lightgray/fonts/icomoon.woff:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/tinymce/js/tinymce/skins/lightgray/fonts/icomoon.woff


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/skins/lightgray/fonts/readme.md:
--------------------------------------------------------------------------------
1 | Icons are generated and provided by the http://icomoon.io service.
2 | 


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/skins/lightgray/img/anchor.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/tinymce/js/tinymce/skins/lightgray/img/anchor.gif


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/skins/lightgray/img/loader.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/tinymce/js/tinymce/skins/lightgray/img/loader.gif


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/skins/lightgray/img/object.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/tinymce/js/tinymce/skins/lightgray/img/object.gif


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/skins/lightgray/img/trans.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/tinymce/js/tinymce/skins/lightgray/img/trans.gif


--------------------------------------------------------------------------------
/admin/vendors/tinymce/js/tinymce/skins/lightgray/img/wline.gif:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/admin/vendors/tinymce/js/tinymce/skins/lightgray/img/wline.gif


--------------------------------------------------------------------------------
/admin/vendors/wysiwyg/bootstrap-wysihtml5.css:
--------------------------------------------------------------------------------
 1 | ul.wysihtml5-toolbar {
 2 | 	margin: 0;
 3 | 	padding: 0;
 4 | 	display: block;
 5 | }
 6 | 
 7 | ul.wysihtml5-toolbar::after {
 8 | 	clear: both;
 9 | 	display: table;
10 | 	content: "";
11 | }
12 | 
13 | ul.wysihtml5-toolbar > li {
14 | 	float: left;
15 | 	display: list-item;
16 | 	list-style: none;
17 | 	margin: 0 5px 10px 0;
18 | }
19 | 
20 | ul.wysihtml5-toolbar a[data-wysihtml5-command=bold] {
21 | 	font-weight: bold;
22 | }
23 | 
24 | ul.wysihtml5-toolbar a[data-wysihtml5-command=italic] {
25 | 	font-style: italic;
26 | }
27 | 
28 | ul.wysihtml5-toolbar a[data-wysihtml5-command=underline] {
29 | 	text-decoration: underline;
30 | }
31 | 
32 | ul.wysihtml5-toolbar a.btn.wysihtml5-command-active {
33 | 	background-image: none;
34 | 	-webkit-box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.15),0 1px 2px rgba(0, 0, 0, 0.05);
35 | 	-moz-box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.15),0 1px 2px rgba(0, 0, 0, 0.05);
36 | 	box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.15),0 1px 2px rgba(0, 0, 0, 0.05);
37 | 	background-color: #E6E6E6;
38 | 	background-color: #D9D9D9 9;
39 | 	outline: 0;
40 | }
41 | 
42 | ul.wysihtml5-commands-disabled .dropdown-menu {
43 | 	display: none !important;
44 | }


--------------------------------------------------------------------------------
/avatar_modal.php:
--------------------------------------------------------------------------------
 1 | <!-- Modal -->
 2 | <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 3 | 	<div class="modal-header">
 4 | 		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
 5 | 		<h3 id="myModalLabel">Change Avatar</h3>
 6 | 	</div>
 7 | 		<div class="modal-body">
 8 | 					<form method="post" action="teacher_avatar.php" enctype="multipart/form-data">
 9 | 							<center>	
10 | 								<div class="control-group">
11 | 								<div class="controls">
12 | 									<input name="image" class="input-file uniform_on" id="fileInput" type="file" required>
13 | 								</div>
14 | 								</div>
15 | 							</center>			
16 | 					
17 | 		</div>
18 | 					<div class="modal-footer">
19 | 						<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Close</button>
20 | 						<button class="btn btn-info" name="change"><i class="icon-save icon-large"></i> Save</button>
21 | 					</div>
22 | 					</form>
23 | </div>
24 | <!-- end  Modal -->


--------------------------------------------------------------------------------
/avatar_modal_student.php:
--------------------------------------------------------------------------------
 1 | 		<!-- Modal -->
 2 | <div id="myModal_student" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 3 | 	<div class="modal-header">
 4 | 		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
 5 | 		<h3 id="myModalLabel">Change Avatar</h3>
 6 | 	</div>
 7 | 		<div class="modal-body">
 8 | 					<form method="post" action="student_avatar.php" enctype="multipart/form-data">
 9 | 							<center>	
10 | 								<div class="control-group">
11 | 								<div class="controls">
12 | 									<input name="image" class="input-file uniform_on" id="fileInput" type="file" required>
13 | 								</div>
14 | 								</div>
15 | 							</center>			
16 | 					
17 | 		</div>
18 | 	<div class="modal-footer">
19 | 		<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Close</button>
20 | 		<button class="btn btn-info" name="change"><i class="icon-save icon-large"></i> Save</button>
21 | 	</div>
22 | 					</form>
23 | </div>


--------------------------------------------------------------------------------
/calendar_script.php:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/calendar_script.php


--------------------------------------------------------------------------------
/campuses.php:
--------------------------------------------------------------------------------
 1 | 		<!-- Modal -->
 2 | <div id="campuses" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 3 | <div class="modal-body">
 4 | 										<?php
 5 | 											$mission_query = mysqli_query($conn,"select * from content where title  = 'Campuses' ")or die(mysqli_error());
 6 | 											$mission_row = mysqli_fetch_array($mission_query);
 7 | 											echo $mission_row['content'];
 8 | 										?>
 9 | </div>
10 | <div class="modal-footer">
11 | <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Close</button>
12 | 
13 | </div>
14 | </div>


--------------------------------------------------------------------------------
/change_password_sidebar_student.php:
--------------------------------------------------------------------------------
 1 | <div class="span3" id="sidebar">
 2 | 		<img id="avatar" class="img-circle" src="admin/<?php echo $row['location']; ?>">
 3 | 		<?php include('count.php'); ?>
 4 | 		<ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
 5 | 			<li class=""><a href="dashboard_student.php"><i class="icon-chevron-right"></i><i class="icon-group"></i>&nbsp;My Class</a></li>
 6 | 			<li class="">
 7 | 				<a href="student_notification.php"><i class="icon-chevron-right"></i><i class="icon-info-sign"></i>&nbsp;Notification
 8 | 				<?php if($not_read == '0'){
 9 | 				}else{ ?>
10 | 					<span class="badge badge-important"><?php echo $not_read; ?></span>
11 | 				<?php } ?>
12 | 				</a>
13 | 			</li>
14 | 			 <li class=""><a href="student_message.php"><i class="icon-chevron-right"></i><i class="icon-envelope-alt"></i>&nbsp;Message</a></li>
15 | 			 <li class=""><a href="backpack.php"><i class="icon-chevron-right"></i><i class="icon-suitcase"></i>&nbsp;Backpack</a></li>
16 | 		</ul>
17 | 		<?php/*  include('search_other_class.php'); */ ?>	
18 | </div>
19 | 
20 | 


--------------------------------------------------------------------------------
/copy_file_student.php:
--------------------------------------------------------------------------------
 1 | <?php
 2 | include('admin/dbcon.php');
 3 | include('session.php');
 4 | if (isset($_POST['delete_user'])){
 5 | $id=$_POST['selector'];
 6 | 
 7 | $N = count($id);
 8 | for($i=0; $i < $N; $i++)
 9 | {
10 | 	$result = mysqli_query($conn,"select * from files  where file_id = '$id[$i]' ")or die(mysqli_error());
11 | 	while($row = mysqli_fetch_array($result)){
12 | 	
13 | 	$fname = $row['fname'];
14 | 	$floc = $row['floc'];
15 | 	$fdesc = $row['fdesc'];
16 | 	$teacher_id = $row['teacher_id'];
17 | 	
18 | 	
19 | 	mysqli_query($conn,"insert into student_backpack (floc,fdatein,fdesc,student_id,fname) value('$floc',NOW(),'$fdesc','$session_id','$fname')")or die(mysqli_error());
20 | 	
21 | 	
22 | 	}
23 | }
24 | ?>
25 | <script>
26 | window.location = 'backpack.php';
27 | </script>
28 | <?php
29 | }
30 | ?>


--------------------------------------------------------------------------------
/copy_to_backpack_modal.php:
--------------------------------------------------------------------------------
 1 | 				<!-- user delete modal -->
 2 | 					<div id="user_delete" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 3 | 					<div class="modal-header">
 4 | 					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
 5 | 					<h3 id="myModalLabel">Copy File?</h3>
 6 | 					</div>
 7 | 					<div class="modal-body">
 8 | 				
 9 | 										<center>
10 | 										<div class="control-group">
11 | 											
12 |                                           <div class="controls">
13 | 										  	<input type="hidden" name="get_id" value="<?php echo $get_id; ?>">
14 |                                         
15 | 									
16 |                                           </div>
17 |                                         </div>
18 | 										</center>
19 | 										
20 | 
21 | 					</div>
22 | 					<div class="modal-footer">
23 | 					<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Close</button>
24 | 					<button name="delete_user" class="btn btn-danger"><i class="icon-check icon-large"></i> Yes</button>
25 | 					</div>
26 | 					</div>


--------------------------------------------------------------------------------
/dbcon.php:
--------------------------------------------------------------------------------
1 | <?php
2 | $conn = mysqli_connect('localhost','root','','capstone') or die(mysqli_error());
3 | ?>


--------------------------------------------------------------------------------
/delete_assigment_modal.php:
--------------------------------------------------------------------------------
 1 | 		<!-- Modal -->
 2 | <div id="<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 3 | 	<div class="modal-header">
 4 | 		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
 5 | 		<h3 id="myModalLabel">Delete Assignment</h3>
 6 | 	</div>
 7 | 		<div class="modal-body">
 8 | 		<div class="alert alert-danger">
 9 | 			Are you sure you want to delete this Assignment?
10 | 		</div>
11 | 		</div>
12 | 	<div class="modal-footer">
13 | 		<form method="post" action="delete_assignment.php">
14 | 		<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Close</button>
15 | 		<input type="hidden" name="id" value="<?php echo $id; ?>">
16 | 		<input type="hidden" name="get_id" value="<?php echo $get_id; ?>">
17 | 		<button class="btn btn-danger" name="change"><i class="icon-check icon-large"></i> Yes</button>
18 | 		</form>
19 | 	</div>
20 | </div>
21 | 				


--------------------------------------------------------------------------------
/delete_assignment.php:
--------------------------------------------------------------------------------
1 | <?php
2 | include('admin/dbcon.php');
3 | $id = $_POST['id'];
4 | $get_id = $_POST['get_id'];
5 | mysqli_query($conn,"delete from assignment where assignment_id = '$id' ")or die(mysqli_error());
6 | ?>
7 | <script>
8 | 	window.location = 'assignment.php<?php echo '?id='.$get_id; ?>'
9 | </script>


--------------------------------------------------------------------------------
/delete_backpack.php:
--------------------------------------------------------------------------------
 1 | <?php
 2 | include('dbcon.php');
 3 | if (isset($_POST['backup_delete'])){
 4 | $id=$_POST['selector'];
 5 | $N = count($id);
 6 | for($i=0; $i < $N; $i++)
 7 | {
 8 | 	$result = mysqli_query($conn,"DELETE FROM student_backpack where file_id='$id[$i]'");
 9 | }
10 | header("location: backpack.php");
11 | }
12 | ?>


--------------------------------------------------------------------------------
/delete_backpack_teacher.php:
--------------------------------------------------------------------------------
 1 | <?php
 2 | include('dbcon.php');
 3 | if (isset($_POST['backup_delete'])){
 4 | $id=$_POST['selector'];
 5 | $N = count($id);
 6 | for($i=0; $i < $N; $i++)
 7 | {
 8 | 	$result = mysqli_query($conn,"DELETE FROM teacher_backpack where file_id='$id[$i]'");
 9 | }
10 | header("location: teacher_backack.php");
11 | }
12 | ?>


--------------------------------------------------------------------------------
/delete_class.php:
--------------------------------------------------------------------------------
 1 | <?php
 2 | include('admin/dbcon.php');
 3 | $get_id = $_POST['id'];
 4 | mysqli_query($conn,"delete from teacher_class  where  teacher_class_id = '$get_id' ")or die(mysqli_error());
 5 | mysqli_query($conn,"delete from teacher_class_student  where  teacher_class_id = '$get_id' ")or die(mysqli_error());
 6 | mysqli_query($conn,"delete from teacher_class_announcements  where  teacher_class_id = '$get_id' ")or die(mysqli_error());
 7 | mysqli_query($conn,"delete from teacher_notification  where  teacher_class_id = '$get_id' ")or die(mysqli_error());
 8 | mysqli_query($conn,"delete from class_subject_overview where  teacher_class_id = '$get_id' ")or die(mysqli_error());
 9 | header('location:dasboard_teacher.php');
10 | ?>


--------------------------------------------------------------------------------
/delete_class_event.php:
--------------------------------------------------------------------------------
 1 | <?php
 2 | include('admin/dbcon.php');
 3 | if (isset($_POST['delete_event'])){
 4 | $get_id = $_POST['get_id'];
 5 | $id = $_POST['id'];
 6 | mysqli_query($conn,"delete from event where event_id = '$id'")or die(mysqli_error());
 7 | ?>
 8 | <script>
 9 | window.location = 'class_calendar.php<?php echo '?id='.$get_id; ?>';
10 | </script>
11 | <?php
12 | }
13 | ?>


--------------------------------------------------------------------------------
/delete_class_modal.php:
--------------------------------------------------------------------------------
 1 | 		<!-- Modal -->
 2 | <div id="<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 3 | 	<div class="modal-header">
 4 | 		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
 5 | 		<h3 id="myModalLabel">Remove Class</h3>
 6 | 	</div>
 7 | 		<div class="modal-body">
 8 | 		<div class="alert alert-danger">
 9 | 			Are you sure you want to Remove this class?
10 | 		</div>
11 | 		</div>
12 | 	<div class="modal-footer">
13 | 		<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Close</button>
14 | 		<button id="<?php echo $id; ?>" class="btn btn-danger remove" name="change"><i class="icon-check icon-large"></i> Yes</button>
15 | 	</div>
16 | </div>
17 | 				


--------------------------------------------------------------------------------
/delete_class_quiz.php:
--------------------------------------------------------------------------------
 1 | <?php
 2 | include('dbcon.php');
 3 | if (isset($_POST['backup_delete'])){
 4 | $get_id=$_GET['id'];
 5 | $id=$_POST['selector'];
 6 | $N = count($id);
 7 | for($i=0; $i < $N; $i++)
 8 | {
 9 | 	$result = mysqli_query($conn,"DELETE FROM class_quiz where class_quiz_id='$id[$i]'")or die(mysqli_error());
10 | }
11 | ?>
12 | <script>
13 | 	window.location = "class_quiz.php<?php echo '?id='.$get_id; ?>"
14 | </script>
15 | <?php
16 | }
17 | ?>


--------------------------------------------------------------------------------
/delete_download_modal.php:
--------------------------------------------------------------------------------
 1 | 		<!-- Modal -->
 2 | <div id="<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 3 | 	<div class="modal-header">
 4 | 		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
 5 | 		<h3 id="myModalLabel">Delete File</h3>
 6 | 	</div>
 7 | 		<div class="modal-body">
 8 | 		<div class="alert alert-danger">
 9 | 			Are you sure you want to delete this file?
10 | 		</div>
11 | 		</div>
12 | 	<div class="modal-footer">
13 | 		<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Close</button>
14 | 		<button   id="<?php echo $id; ?>" class="btn btn-danger remove" data-dismiss="modal" aria-hidden="true"><i class="icon-check icon-large"></i> Yes</button>
15 | 	</div>
16 | </div>
17 | 				


--------------------------------------------------------------------------------
/delete_file.php:
--------------------------------------------------------------------------------
1 | <?php
2 | include('admin/dbcon.php');
3 | $id = $_POST['id'];
4 | mysqli_query($conn,"delete from files where file_id = '$id' ")or die(mysqli_error());
5 | ?>
6 | 


--------------------------------------------------------------------------------
/delete_quiz.php:
--------------------------------------------------------------------------------
 1 | <?php
 2 | include('dbcon.php');
 3 | if (isset($_POST['backup_delete'])){
 4 | $id=$_POST['selector'];
 5 | $N = count($id);
 6 | for($i=0; $i < $N; $i++)
 7 | {
 8 | 	$result = mysqli_query($conn,"DELETE FROM quiz where quiz_id='$id[$i]'");
 9 | }
10 | header("location: teacher_quiz.php");
11 | }
12 | ?>


--------------------------------------------------------------------------------
/delete_quiz_question.php:
--------------------------------------------------------------------------------
 1 | <?php
 2 | include('dbcon.php');
 3 | if (isset($_POST['backup_delete'])){
 4 | $id=$_POST['selector'];
 5 | $get_id=$_POST['get_id'];
 6 | $N = count($id);
 7 | for($i=0; $i < $N; $i++)
 8 | {
 9 | 	$result = mysqli_query($conn,"DELETE FROM quiz_question where quiz_question_id='$id[$i]'");
10 | }
11 | ?>
12 | <script>
13 | 	window.location = 'quiz_question.php<?php echo '?id='.$get_id ?>';
14 | </script>
15 | <?php
16 | }
17 | ?>


--------------------------------------------------------------------------------
/delete_shared.php:
--------------------------------------------------------------------------------
 1 | <?php
 2 | include('admin/dbcon.php');
 3 | include('session.php');
 4 | if (isset($_POST['share'])){
 5 | $id=$_POST['selector'];
 6 | $class_id = $_POST['teacher_class_id'];
 7 | /*  $get_id=$_POST['get_id'];  */
 8 | $N = count($id);
 9 | for($i=0; $i < $N; $i++)
10 | {
11 | 	$result = mysqli_query($conn,"select * from teacher_shared  where teacher_shared_id = '$id[$i]' ")or die(mysqli_error());
12 | 	while($row = mysqli_fetch_array($result)){
13 | 	
14 | 	$fname = $row['fname'];
15 | 	$floc = $row['floc'];
16 | 	$fdesc = $row['fdesc'];
17 | /* 	$uploaded_by = $row['uploaded_by']; */
18 | 
19 | 	
20 | 	
21 | 	mysqli_query($conn,"insert into files (floc,fdatein,fdesc,class_id,fname,teacher_id) value('$floc',NOW(),'$fdesc','$class_id','$fname','$session_id')")or die(mysqli_error());
22 | 	
23 | 	
24 | 	}
25 | }
26 | ?>
27 | <script>
28 | window.location = 'downloadable.php<?php echo '?id='.$class_id; ?>';
29 | </script>
30 | <?php } ?>


--------------------------------------------------------------------------------
/directories.php:
--------------------------------------------------------------------------------
 1 | 		<!-- Modal -->
 2 | <div id="directories" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 3 | <div class="modal-body">
 4 | 										<?php
 5 | 											$mission_query = mysqli_query($conn,"select * from content where title  = 'Directories' ")or die(mysqli_error());
 6 | 											$mission_row = mysqli_fetch_array($mission_query);
 7 | 											echo $mission_row['content'];
 8 | 										?>
 9 | </div>
10 | <div class="modal-footer">
11 | <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> Close</button>
12 | 
13 | </div>
14 | </div>


--------------------------------------------------------------------------------
/footer.php:
--------------------------------------------------------------------------------
1 | <center>
2 | 		<footer>
3 | 		
4 | 		<p>E-Learning Management System</p>
5 | 			<!-- <p>Programmed by: John Kevin Lorayna BSIS 4-A</p> -->
6 | 		</footer>
7 | </center>
8 | 
9 | 


--------------------------------------------------------------------------------
/google0eaee4f9fabfdea8.html:
--------------------------------------------------------------------------------
1 | google-site-verification: google0eaee4f9fabfdea8.html


--------------------------------------------------------------------------------
/index.php:
--------------------------------------------------------------------------------
 1 | <?php include('header.php'); ?>
 2 | <style>
 3 | 	body#login::before {
 4 |     content: "";
 5 |     background: #00000036;
 6 |     position: absolute;
 7 |     top: 0;
 8 |     /* z-index: 1; */
 9 |     left: 0;
10 |     width: 100%;
11 |     height: 100%;
12 | }
13 | 	
14 | </style>
15 | <body id="login">
16 |     <div class="container" style="position: relative">
17 | 		<div class="row-fluid">
18 | 			<div class="span6"><div class="title_index"><?php include('title_index.php'); ?></div></div>
19 | 			<div class="span6"><div class="pull-right"><?php include('login_form.php'); ?></div></div>
20 | 		</div>
21 | 		<div class="row-fluid">
22 | 			<div class="span12"><div class="index-footer"><?php include('link.php'); ?></div></div>
23 | 		</div>
24 | 			<?php include('footer.php'); ?>
25 |     </div>
26 | <?php include('script.php'); ?>
27 | </body>
28 | </html>


--------------------------------------------------------------------------------
/link_about.php:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/link_about.php


--------------------------------------------------------------------------------
/login.php:
--------------------------------------------------------------------------------
 1 | <?php
 2 | 		include('admin/dbcon.php');
 3 | 		session_start();
 4 | 		$username = $_POST['username'];
 5 | 		$password = $_POST['password'];
 6 | 		/* student */
 7 | 			$query = "SELECT * FROM student WHERE username='$username' AND password='$password'";
 8 | 			$result = mysqli_query($conn,$query)or die(mysqli_error());
 9 | 			$row = mysqli_fetch_array($result);
10 | 			$num_row = mysqli_num_rows($result);
11 | 		/* teacher */
12 | 		$query_teacher = mysqli_query($conn,"SELECT * FROM teacher WHERE username='$username' AND password='$password'")or die(mysqli_error());
13 | 		$num_row_teacher = mysqli_num_rows($query_teacher);
14 | 		$row_teahcer = mysqli_fetch_array($query_teacher);
15 | 		if( $num_row > 0 ) { 
16 | 		$_SESSION['id']=$row['student_id'];
17 | 		echo 'true_student';	
18 | 		}else if ($num_row_teacher > 0){
19 | 		$_SESSION['id']=$row_teahcer['teacher_id'];
20 | 		echo 'true';
21 | 		
22 | 		 }else{ 
23 | 				echo 'false';
24 | 		}	
25 | 				
26 | 		?>


--------------------------------------------------------------------------------
/logout.php:
--------------------------------------------------------------------------------
1 | <?php
2 | session_start();
3 | session_destroy();
4 | header('location:index.php');
5 | ?>


--------------------------------------------------------------------------------
/modal_backpack_delete.php:
--------------------------------------------------------------------------------
 1 | 				<!-- user delete modal -->
 2 | 					<div id="backup_delete" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 3 | 					<div class="modal-header">
 4 | 					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
 5 | 					<h3 id="myModalLabel">Delete File?</h3>
 6 | 					</div>
 7 | 					<div class="modal-body">
 8 | 					<div class="alert alert-danger">
 9 | 					<p>Are you sure you want to delete the file you check?.</p>
10 | 					</div>
11 | 					</div>
12 | 					<div class="modal-footer">
13 | 					<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Close</button>
14 | 					<button name="backup_delete" class="btn btn-danger"><i class="icon-check icon-large"></i> Yes</button>
15 | 					</div>
16 | 					</div>


--------------------------------------------------------------------------------
/modal_delete_class_quiz.php:
--------------------------------------------------------------------------------
 1 | 				<!-- user delete modal -->
 2 | 					<div id="backup_delete" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 3 | 					<div class="modal-header">
 4 | 					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
 5 | 					<h3 id="myModalLabel">Delete Quiz?</h3>
 6 | 					</div>
 7 | 					<div class="modal-body">
 8 | 					<div class="alert alert-danger">
 9 | 					<p>Are you sure you want to delete the Quiz in this class that you check?.</p>
10 | 					</div>
11 | 					</div>
12 | 					<div class="modal-footer">
13 | 					<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Close</button>
14 | 					<button name="backup_delete" class="btn btn-danger"><i class="icon-check icon-large"></i> Yes</button>
15 | 					</div>
16 | 					</div>


--------------------------------------------------------------------------------
/modal_delete_quiz.php:
--------------------------------------------------------------------------------
 1 | 				<!-- user delete modal -->
 2 | 					<div id="backup_delete" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 3 | 					<div class="modal-header">
 4 | 					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
 5 | 					<h3 id="myModalLabel">Delete Quiz?</h3>
 6 | 					</div>
 7 | 					<div class="modal-body">
 8 | 					<div class="alert alert-danger">
 9 | 					<p>Are you sure you want to delete the Quiz you check?.</p>
10 | 					</div>
11 | 					</div>
12 | 					<div class="modal-footer">
13 | 					<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Close</button>
14 | 					<button name="backup_delete" class="btn btn-danger"><i class="icon-check icon-large"></i> Yes</button>
15 | 					</div>
16 | 					</div>


--------------------------------------------------------------------------------
/modal_delete_quiz_question.php:
--------------------------------------------------------------------------------
 1 | 				<!-- user delete modal -->
 2 | 	<div id="backup_delete" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 3 | 	<div class="modal-header">
 4 | 		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
 5 | 		<h3 id="myModalLabel">Delete Question?</h3>
 6 | 	</div>
 7 | 	<div class="modal-body">
 8 | 		<div class="alert alert-danger">
 9 | 		<p>Are you sure you want to delete the Question you check?.</p>
10 | 		</div>
11 | 	</div>
12 | 	<div class="modal-footer">
13 | 		<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Close</button>
14 | 		<button name="backup_delete" class="btn btn-danger"><i class="icon-check icon-large"></i> Yes</button>
15 | 	</div>
16 | 	</div>


--------------------------------------------------------------------------------
/my_students_breadcrums.php:
--------------------------------------------------------------------------------
 1 | 	 <!-- breadcrumb -->
 2 | 	<?php $class_query = mysqli_query($conn,"select * from teacher_class
 3 | 	LEFT JOIN class ON class.class_id = teacher_class.class_id
 4 | 	LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
 5 | 	where teacher_class_id = '$get_id'")or die(mysqli_error());
 6 | 	$class_row = mysqli_fetch_array($class_query);
 7 | 	?>
 8 | 				
 9 | 	<ul class="breadcrumb">
10 | 		<li><a href="#"><?php echo $class_row['class_name']; ?></a> <span class="divider">/</span></li>
11 | 		<li><a href="#"><?php echo $class_row['subject_code']; ?></a> <span class="divider">/</span></li>
12 | 		<li><a href="#">School Year: <?php echo $class_row['school_year']; ?></a> <span class="divider">/</span></li>
13 | 		<li><a href="#"><b>My Students</b></a></li>
14 | 	</ul>
15 | 	<!-- end breadcrumb -->


--------------------------------------------------------------------------------
/navbar_about.php:
--------------------------------------------------------------------------------
 1 | <div class="navbar navbar-fixed-top navbar-inverse">
 2 |            <div class="navbar-inner">
 3 |                <div class="container-fluid">
 4 | 					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
 5 | 						<span class="icon-bar"></span>
 6 | 						<span class="icon-bar"></span>
 7 | 					</a>
 8 |                    <a class="brand" href="#">Welcome to: Online Learning Management System</a>
 9 | 							<div class="nav-collapse collapse">
10 | 								<ul class="nav pull-right">
11 | 	
12 | 
13 | 								</ul>
14 | 							</div>
15 |                    <!--/.nav-collapse -->
16 |                </div>
17 |            </div>
18 | </div>
19 | 	


--------------------------------------------------------------------------------
/opener_db.php:
--------------------------------------------------------------------------------
1 | <?php
2 | include("dbConnector.php"); 
3 | $connector = new DbConnector();
4 | ?>


--------------------------------------------------------------------------------
/read.php:
--------------------------------------------------------------------------------
 1 | <?php
 2 | include('admin/dbcon.php');
 3 | include('session.php');
 4 | if (isset($_POST['read'])){
 5 | $id=$_POST['selector'];
 6 | $N = count($id);
 7 | for($i=0; $i < $N; $i++)
 8 | {
 9 | 
10 | 	mysqli_query($conn,"insert into notification_read (student_id,student_read,notification_id) values('$session_id','yes','$id[$i]')")or die(mysqli_error());
11 | 	
12 | 	
13 | 	
14 | }
15 | ?>
16 | <script>
17 | window.location = 'student_notification.php';
18 | </script>
19 | <?php
20 | }
21 | ?>


--------------------------------------------------------------------------------
/read_message.php:
--------------------------------------------------------------------------------
 1 | <?php
 2 | include('session.php');
 3 | include('dbcon.php');
 4 | if (isset($_POST['read'])){
 5 | $id=$_POST['selector'];
 6 | $N = count($id);
 7 | for($i=0; $i < $N; $i++)
 8 | {
 9 | 	$result = mysqli_query($conn,"update message set message_status = 'read' where message_id='$id[$i]'");
10 | }
11 | header("location: student_message.php");
12 | }
13 | ?>
14 | 
15 | <?php
16 | if (isset($_POST['reply'])){
17 | $sender_id = $_POST['sender_id'];
18 | $sender_name = $_POST['name_of_sender'];
19 | $my_name = $_POST['my_name'];
20 | $my_message = $_POST['my_message'];
21 | 
22 | mysqli_query($conn,"insert into message (reciever_id,content,date_sended,sender_id,reciever_name,sender_name) values('$sender_id','$my_message',NOW(),'$session_id','$sender_name','$my_name')")or die(mysqli_error());
23 | mysqli_query($conn,"insert into message_sent (reciever_id,content,date_sended,sender_id,reciever_name,sender_name) values('$sender_id','$my_message',NOW(),'$session_id','$sender_name','$my_name')")or die(mysqli_error());
24 | ?>
25 | <script>
26 | alert('Message Sent');
27 | window.location ="student_message.php";
28 | </script>
29 | <?php
30 | 
31 | }
32 | ?>
33 | 


--------------------------------------------------------------------------------
/read_teacher.php:
--------------------------------------------------------------------------------
 1 | <?php
 2 | include('admin/dbcon.php');
 3 | include('session.php');
 4 | if (isset($_POST['read'])){
 5 | $id=$_POST['selector'];
 6 | $N = count($id);
 7 | for($i=0; $i < $N; $i++)
 8 | {
 9 | 	mysqli_query($conn,"insert into notification_read_teacher (teacher_id,student_read,notification_id) values('$session_id','yes','$id[$i]')")or die(mysqli_error());	
10 | }
11 | ?>
12 | <script>
13 | window.location = 'notification_teacher.php';
14 | </script>
15 | <?php
16 | }
17 | ?>


--------------------------------------------------------------------------------
/remove_announcements.php:
--------------------------------------------------------------------------------
1 | <?php include('admin/dbcon.php'); ?>
2 | <?php
3 | $id = $_POST['id'];
4 | mysqli_query($conn,"delete from teacher_class_announcements where teacher_class_announcements_id = '$id'")or die(mysqli_error());
5 | mysqli_query($conn,"delete from teacher_class_announcements where teacher_class_announcements_id = '$id'")or die(mysqli_error());
6 | ?>
7 | 
8 | 


--------------------------------------------------------------------------------
/remove_announcements_modal.php:
--------------------------------------------------------------------------------
 1 | 		<!-- Modal -->
 2 | <div id="<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 3 | 	<div class="modal-header">
 4 | 		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
 5 | 		<h3 id="myModalLabel">Remove Annoucements</h3>
 6 | 	</div>
 7 | 		<div class="modal-body">
 8 | 		<div class="alert alert-danger">
 9 | 			Are you sure you want to Remove this announcements on your class?
10 | 		</div>
11 | 		</div>
12 | 	<div class="modal-footer">
13 | 	
14 | 		<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Close</button>
15 | 		
16 | 		<button   id="<?php echo $id; ?>" class="btn btn-danger remove" data-dismiss="modal" aria-hidden="true"><i class="icon-check icon-large"></i> Yes</button>
17 | 
18 | 	</div>
19 | </div>
20 | 				


--------------------------------------------------------------------------------
/remove_inbox_message.php:
--------------------------------------------------------------------------------
1 | <?php include('admin/dbcon.php'); ?>
2 | <?php
3 | $id = $_POST['id'];
4 | mysqli_query($conn,"delete from message where message_id = '$id'")or die(mysqli_error());
5 | ?>
6 | 
7 | 


--------------------------------------------------------------------------------
/remove_inbox_message_modal.php:
--------------------------------------------------------------------------------
 1 | 		<!-- Modal -->
 2 | <div id="<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 3 | 	<div class="modal-header">
 4 | 		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
 5 | 		<h3 id="myModalLabel">Remove Message</h3>
 6 | 	</div>
 7 | 		<div class="modal-body">
 8 | 		<div class="alert alert-danger">
 9 | 			Are you sure you want to Remove this  message?
10 | 		</div>
11 | 		</div>
12 | 	<div class="modal-footer">
13 | 		<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Close</button>
14 | 		<button   id="<?php echo $id; ?>" class="btn btn-danger remove" data-dismiss="modal" aria-hidden="true"><i class="icon-check icon-large"></i> Yes</button>
15 | 	</div>
16 | </div>
17 | 				


--------------------------------------------------------------------------------
/remove_sent_message.php:
--------------------------------------------------------------------------------
1 | <?php include('admin/dbcon.php'); ?>
2 | <?php
3 | $id = $_POST['id'];
4 | mysqli_query($conn,"delete from message_sent where message_sent_id = '$id'")or die(mysqli_error());
5 | ?>
6 | 
7 | 


--------------------------------------------------------------------------------
/remove_sent_message_modal.php:
--------------------------------------------------------------------------------
 1 | 		<!-- Modal -->
 2 | <div id="<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 3 | 	<div class="modal-header">
 4 | 		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
 5 | 		<h3 id="myModalLabel">Remove Sent Message</h3>
 6 | 	</div>
 7 | 		<div class="modal-body">
 8 | 		<div class="alert alert-danger">
 9 | 			Are you sure you want to Remove this sent message?
10 | 		</div>
11 | 		</div>
12 | 	<div class="modal-footer">
13 | 		<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Close</button>
14 | 		<button   id="<?php echo $id; ?>" class="btn btn-danger remove" data-dismiss="modal" aria-hidden="true"><i class="icon-check icon-large"></i> Yes</button>
15 | 	</div>
16 | </div>
17 | 				


--------------------------------------------------------------------------------
/remove_student.php:
--------------------------------------------------------------------------------
1 | <?php
2 | include('admin/dbcon.php');
3 | $id = $_POST['id'];
4 | mysqli_query($conn,"delete from teacher_class_student where teacher_class_student_id = '$id'")or die(mysqli_error());
5 | ?>
6 | 
7 | 


--------------------------------------------------------------------------------
/remove_student_modal.php:
--------------------------------------------------------------------------------
 1 | 		<!-- Modal -->
 2 | <div id="<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 3 | 	<div class="modal-header">
 4 | 		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
 5 | 		<h3 id="myModalLabel">Remove Student</h3>
 6 | 	</div>
 7 | 		<div class="modal-body">
 8 | 		<div class="alert alert-danger">
 9 | 			Are you sure you want to Remove this student on your class?
10 | 		</div>
11 | 		</div>
12 | 	<div class="modal-footer">
13 | 
14 | 		<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Close</button>
15 | 	
16 | 		<button name="remove" class="btn btn-danger remove" id="<?php echo $id; ?>" ><i class="icon-check icon-large"></i> Yes</button>
17 | 
18 | 	</div>
19 | </div>
20 | 				


--------------------------------------------------------------------------------
/reply.php:
--------------------------------------------------------------------------------
 1 | <?php
 2 | include('admin/dbcon.php');
 3 | include('session.php');
 4 | $sender_id = $_POST['sender_id'];
 5 | $sender_name = $_POST['name_of_sender'];
 6 | $my_name = $_POST['my_name'];
 7 | $my_message = $_POST['my_message'];
 8 | 
 9 | mysqli_query($conn,"insert into message (reciever_id,content,date_sended,sender_id,reciever_name,sender_name) values('$sender_id','$my_message',NOW(),'$session_id','$sender_name','$my_name')")or die(mysqli_error());
10 | mysqli_query($conn,"insert into message_sent (reciever_id,content,date_sended,sender_id,reciever_name,sender_name) values('$sender_id','$my_message',NOW(),'$session_id','$sender_name','$my_name')")or die(mysqli_error());
11 | ?>


--------------------------------------------------------------------------------
/save_grade.php:
--------------------------------------------------------------------------------
 1 | <?php
 2 | include('admin/dbcon.php');
 3 | 
 4 | $id = $_POST['id'];
 5 | $post_id = $_POST['post_id'];
 6 | $get_id = $_POST['get_id'];
 7 | $grade = $_POST['grade'];
 8 | mysqli_query($conn,"update student_assignment set grade = '$grade' where student_assignment_id = '$id'")or die(mysqli_error());
 9 | ?>
10 | <script>
11 |  window.location = 'view_submit_assignment.php<?php echo '?id='.$get_id.'&'.'post_id='.$post_id; ?>'; 
12 | </script>


--------------------------------------------------------------------------------
/send_message.php:
--------------------------------------------------------------------------------
 1 | <?php
 2 | include('admin/dbcon.php');
 3 | include('session.php');
 4 | $teacher_id = $_POST['teacher_id'];
 5 | $my_message = $_POST['my_message'];
 6 | 
 7 | 
 8 | $query = mysqli_query($conn,"select * from teacher where teacher_id = '$teacher_id'")or die(mysqli_error());
 9 | $row = mysqli_fetch_array($query);
10 | $name = $row['firstname']." ".$row['lastname'];
11 | 
12 | $query1 = mysqli_query($conn,"select * from teacher where teacher_id = '$session_id'")or die(mysqli_error());
13 | $row1 = mysqli_fetch_array($query1);
14 | $name1 = $row1['firstname']." ".$row1['lastname'];
15 | 
16 | 
17 | mysqli_query($conn,"insert into message (reciever_id,content,date_sended,sender_id,reciever_name,sender_name) values('$teacher_id','$my_message',NOW(),'$session_id','$name','$name1')")or die(mysqli_error());
18 | mysqli_query($conn,"insert into message_sent (reciever_id,content,date_sended,sender_id,reciever_name,sender_name) values('$teacher_id','$my_message',NOW(),'$session_id','$name','$name1')")or die(mysqli_error());
19 | ?>


--------------------------------------------------------------------------------
/send_message_student.php:
--------------------------------------------------------------------------------
 1 | <?php
 2 | include('admin/dbcon.php');
 3 | include('session.php');
 4 | $teacher_id = $_POST['teacher_id'];
 5 | $my_message = $_POST['my_message'];
 6 | 
 7 | 
 8 | $query = mysqli_query($conn,"select * from teacher where teacher_id = '$teacher_id'")or die(mysqli_error());
 9 | $row = mysqli_fetch_array($query);
10 | $name = $row['firstname']." ".$row['lastname'];
11 | 
12 | $query1 = mysqli_query($conn,"select * from student where student_id = '$session_id'")or die(mysqli_error());
13 | $row1 = mysqli_fetch_array($query1);
14 | $name1 = $row1['firstname']." ".$row1['lastname'];
15 | 
16 | 
17 | 
18 | mysqli_query($conn,"insert into message (reciever_id,content,date_sended,sender_id,reciever_name,sender_name) values('$teacher_id','$my_message',NOW(),'$session_id','$name','$name1')")or die(mysqli_error());
19 | mysqli_query($conn,"insert into message_sent (reciever_id,content,date_sended,sender_id,reciever_name,sender_name) values('$teacher_id','$my_message',NOW(),'$session_id','$name','$name1')")or die(mysqli_error());
20 | ?>


--------------------------------------------------------------------------------
/send_message_student_to_student.php:
--------------------------------------------------------------------------------
 1 | <?php
 2 | include('admin/dbcon.php');
 3 | include('session.php');
 4 | $student_id = $_POST['student_id'];
 5 | $my_message = $_POST['my_message'];
 6 | 
 7 | 
 8 | $query = mysqli_query($conn,"select * from student where student_id = '$student_id'")or die(mysqli_error());
 9 | $row = mysqli_fetch_array($query);
10 | $name = $row['firstname']." ".$row['lastname'];
11 | 
12 | $query1 = mysqli_query($conn,"select * from student where student_id = '$session_id'")or die(mysqli_error());
13 | $row1 = mysqli_fetch_array($query1);
14 | $name1 = $row1['firstname']." ".$row1['lastname'];
15 | 
16 | 
17 | mysqli_query($conn,"insert into message (reciever_id,content,date_sended,sender_id,reciever_name,sender_name) values('$student_id','$my_message',NOW(),'$session_id','$name','$name1')")or die(mysqli_error());
18 | mysqli_query($conn,"insert into message_sent (reciever_id,content,date_sended,sender_id,reciever_name,sender_name) values('$student_id','$my_message',NOW(),'$session_id','$name','$name1')")or die(mysqli_error());
19 | ?>


--------------------------------------------------------------------------------
/send_message_teacher_to_student.php:
--------------------------------------------------------------------------------
 1 | <?php
 2 | include('admin/dbcon.php');
 3 | include('session.php');
 4 | $student_id = $_POST['student_id'];
 5 | $my_message = $_POST['my_message'];
 6 | 
 7 | 
 8 | $query = mysqli_query($conn,"select * from student where student_id = '$student_id'")or die(mysqli_error());
 9 | $row = mysqli_fetch_array($query);
10 | $name = $row['firstname']." ".$row['lastname'];
11 | 
12 | $query1 = mysqli_query($conn,"select * from teacher where teacher_id = '$session_id'")or die(mysqli_error());
13 | $row1 = mysqli_fetch_array($query1);
14 | $name1 = $row1['firstname']." ".$row1['lastname'];
15 | 
16 | 
17 | mysqli_query($conn,"insert into message (reciever_id,content,date_sended,sender_id,reciever_name,sender_name) values('$student_id','$my_message',NOW(),'$session_id','$name','$name1')")or die(mysqli_error());
18 | mysqli_query($conn,"insert into message_sent (reciever_id,content,date_sended,sender_id,reciever_name,sender_name) values('$student_id','$my_message',NOW(),'$session_id','$name','$name1')")or die(mysqli_error());
19 | ?>


--------------------------------------------------------------------------------
/session.php:
--------------------------------------------------------------------------------
 1 | <?php
 2 | //Start session
 3 | session_start();
 4 | //Check whether the session variable SESS_MEMBER_ID is present or not
 5 | if (!isset($_SESSION['id']) || ($_SESSION['id'] == '')) {
 6 |     header("location: index.php");
 7 |     exit();
 8 | }
 9 | 
10 | $session_id=$_SESSION['id'];
11 | ?>


--------------------------------------------------------------------------------
/signup_student.php:
--------------------------------------------------------------------------------
 1 | <?php include('header.php'); ?>
 2 |   <body id="login">
 3 |     <div class="container">
 4 | 	<div class="row-fluid">
 5 | 	<div class="span6">
 6 | 		<div class="title_index">
 7 | 				<?php include('title_index.php'); ?>
 8 | 		</div>
 9 | 	</div>
10 | 	<div class="span6">
11 | 		<div class="pull-right">
12 | 				<?php include('student_signin_form.php'); ?>
13 | 		</div>
14 | 	</div>
15 |     </div>
16 | 	<div class="row-fluid">
17 | 		<div class="span12">
18 | 			<div class="index-footer">
19 | 				<?php include('link.php'); ?>
20 | 			</div>
21 | 		</div>
22 | 	</div>
23 | 		   <!-- /container -->
24 | 		<?php include('footer.php'); ?>
25 |     </div> <!-- /container -->
26 | <?php include('script.php'); ?>
27 |   </body>
28 | </html>


--------------------------------------------------------------------------------
/signup_teacher.php:
--------------------------------------------------------------------------------
 1 | <?php include('header.php'); ?>
 2 |   <body id="login">
 3 |     <div class="container">
 4 | 	<div class="row-fluid">
 5 | 	<div class="span6">
 6 | 		<div class="title_index">
 7 | 			<?php include('title_index.php'); ?>
 8 | 		</div>
 9 | 	</div>
10 | 	<div class="span6">
11 | 		<div class="pull-right">
12 | 				<?php include('signup_teacher_form.php'); ?>
13 | 		</div>
14 | 	</div>
15 |     </div>
16 | 	<div class="row-fluid">
17 | 		<div class="span12">
18 | 			<div class="index-footer">
19 | 				<?php include('link.php'); ?>
20 | 			</div>
21 | 		</div>
22 | 	</div>
23 | 		   <!-- /container -->
24 | 		<?php include('footer.php'); ?>
25 |     </div> <!-- /container -->
26 | <?php include('script.php'); ?>
27 |   </body>
28 | </html>


--------------------------------------------------------------------------------
/sitemap.xml:
--------------------------------------------------------------------------------
 1 | <?xml version="1.0" encoding="UTF-8"?>
 2 | <urlset
 3 |       xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
 4 |       xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
 5 |       xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
 6 |             http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
 7 | <!-- created with Free Online Sitemap Generator www.xml-sitemaps.com -->
 8 | 
 9 | <url>
10 |   <loc>http://chmsclms.comxa.com/</loc>
11 |   <lastmod>2013-11-18T14:23:43+00:00</lastmod>
12 |   <changefreq>weekly</changefreq>
13 | </url>
14 | </urlset>


--------------------------------------------------------------------------------
/student_avatar.php:
--------------------------------------------------------------------------------
 1 |  <?php
 2 |  include('admin/dbcon.php');
 3 |  include('session.php');
 4 |  
 5 |  
 6 |                             if (isset($_POST['change'])) {
 7 |                                
 8 | 
 9 |                                 $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
10 |                                 $image_name = addslashes($_FILES['image']['name']);
11 |                                 $image_size = getimagesize($_FILES['image']['tmp_name']);
12 | 
13 |                                 move_uploaded_file($_FILES["image"]["tmp_name"], "admin/uploads/" . $_FILES["image"]["name"]);
14 |                                 $location = "uploads/" . $_FILES["image"]["name"];
15 | 								
16 | 								mysqli_query($conn,"update  student set location = '$location' where student_id  = '$session_id' ")or die(mysqli_error());
17 | 								
18 | 								?>
19 |  
20 | 								<script>
21 | 								window.location = "dashboard_student.php";  
22 | 								</script>
23 | 
24 |                        <?php     }  ?>


--------------------------------------------------------------------------------
/student_signup.php:
--------------------------------------------------------------------------------
 1 | <?php
 2 | include('admin/dbcon.php');
 3 | session_start();
 4 | $username = $_POST['username'];
 5 | $password = $_POST['password'];
 6 | $firstname = $_POST['firstname'];
 7 | $lastname = $_POST['lastname'];
 8 | $class_id = $_POST['class_id'];
 9 | 
10 | $query = mysqli_query($conn,"select * from student where username='$username' and firstname='$firstname' and lastname='$lastname' and class_id = '$class_id'")or die(mysqli_error());
11 | $row = mysqli_fetch_array($query);
12 | $id = $row['student_id'];
13 | 
14 | $count = mysqli_num_rows($query);
15 | if ($count > 0){
16 | 	mysqli_query($conn,"update student set password = '$password', status = 'Registered' where student_id = '$id'")or die(mysqli_error());
17 | 	$_SESSION['id']=$id;
18 | 	echo 'true';
19 | }else{
20 | echo 'false';
21 | }
22 | ?>


--------------------------------------------------------------------------------
/submit_assignment_table.php:
--------------------------------------------------------------------------------
https://raw.githubusercontent.com/Soumya-Das-2006/Learning-Mangement-System/d16aa2a6ac554f1457f9fd022317af96af90b69d/submit_assignment_table.php


--------------------------------------------------------------------------------
/teacher_avatar.php:
--------------------------------------------------------------------------------
 1 |  <?php
 2 |  include('admin/dbcon.php');
 3 |  include('session.php');
 4 |  
 5 |  
 6 |                             if (isset($_POST['change'])) {
 7 |                                
 8 | 
 9 |                                 $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
10 |                                 $image_name = addslashes($_FILES['image']['name']);
11 |                                 $image_size = getimagesize($_FILES['image']['tmp_name']);
12 | 
13 |                                 move_uploaded_file($_FILES["image"]["tmp_name"], "admin/uploads/" . $_FILES["image"]["name"]);
14 |                                 $location = "uploads/" . $_FILES["image"]["name"];
15 | 								
16 | 								mysqli_query($conn,"update  teacher set location = '$location' where teacher_id  = '$session_id' ")or die(mysqli_error());
17 | 								
18 | 								?>
19 |  
20 | 								<script>
21 | 								window.location = "dasboard_teacher.php";  
22 | 								</script>
23 | 
24 |                        <?php     }  ?>


--------------------------------------------------------------------------------
/teacher_right_sidebar.php:
--------------------------------------------------------------------------------
1 | <div class="span3" id="">
2 | 	<div class="row-fluid">
3 | 		<?php include('add_class.php'); ?>	
4 | 	</div>
5 | </div>


--------------------------------------------------------------------------------
/teacher_signup.php:
--------------------------------------------------------------------------------
 1 | <?php
 2 | include('admin/dbcon.php');
 3 | session_start();
 4 | $username = $_POST['username'];
 5 | $password = $_POST['password'];
 6 | $firstname = $_POST['firstname'];
 7 | $lastname = $_POST['lastname'];
 8 | $department_id = $_POST['department_id'];
 9 | 
10 | $query = mysqli_query($conn,"select * from teacher where  firstname='$firstname' and lastname='$lastname' and department_id = '$department_id'")or die(mysqli_error());
11 | $row = mysqli_fetch_array($query);
12 | $id = $row['teacher_id'];
13 | 
14 | $count = mysqli_num_rows($query);
15 | if ($count > 0){
16 | 	mysqli_query($conn,"update teacher set username='$username',password = '$password', teacher_status = 'Registered' where teacher_id = '$id'")or die(mysqli_error());
17 | 	$_SESSION['id']=$id;
18 | 	echo 'true';
19 | }else{
20 | 	echo 'false';
21 | }
22 | ?>


--------------------------------------------------------------------------------
/timer.ajax.php:
--------------------------------------------------------------------------------
 1 | <?php
 2 | include('dbcon.php');
 3 | include('session.php');
 4 | 
 5 | $sql = mysqli_query($conn,"SELECT * FROM student_class_quiz WHERE student_id = '$session_id'")or die(mysqli_error());
 6 | $row = mysqli_fetch_array($sql);
 7 | $quiz_time = $row['student_quiz_time'];
 8 | 
 9 | $sqlp = mysqli_query($conn,"SELECT * FROM class_quiz")or die(mysqli_error());
10 | $rowp = mysqli_fetch_array($sqlp);
11 | if($quiz_time <= $rowp['quiz_time'] AND $quiz_time > 0){
12 | 	 mysqli_query($conn,"UPDATE student_class_quiz SET student_quiz_time = ".$row['student_quiz_time']." - 1 WHERE student_id = '$session_id'")or die(mysqli_error()); 
13 | 	/* $_SESSION['take_exam'] = 'continue'; */
14 | 
15 | 	$init = $quiz_time;
16 | 	$minutes = floor(($init / 60) % 60);
17 | 	$seconds = $init % 60;
18 | 	if($init > 59){		
19 | 		echo "$minutes minutes and $seconds seconds";
20 | 	} else {
21 | 		echo "$seconds seconds";
22 | 	}
23 | } /* else {
24 | 	$_SESSION['take_exam'] = 'denied';
25 | } */
26 | ?>


--------------------------------------------------------------------------------
/title_index.php:
--------------------------------------------------------------------------------
 1 | 				
 2 | 								<div class="row-fluid">
 3 | 
 4 | 						<div class="span12">
 5 | 						
 6 | 						</div>	
 7 | 													
 8 | 							</div>
 9 | 							<div class="row-fluid">
10 | 
11 | 						<div class="span4">
12 | 						<img class="index_logo" src="admin/images/Logo.png">
13 | 						</div>	
14 | 						<div class="span8">
15 | 						
16 | 								<div class="title">
17 | 							<p class="chmsc">Parul University E learning Manage Portal</p>
18 | 							<h3>
19 | 
20 | 							<p>E - Learning</p>
21 | 						
22 | 							</h3>		
23 | 						</div>
24 | 			
25 | 						</div>							
26 | 							</div>
27 | 				
28 | 				<div class="row-fluid">
29 | 
30 | 						<div class="span12">
31 | 						<br>
32 | 								<div class="motto">
33 | 									<p>Parul University E-Learning:</p><br>
34 | 									<p>Excellence in Knowledge, Innovation and Learning</p>
35 | 									<p>Empowering Education through Technology</p>
36 | 									<p>Competence, Creativity and Collaboration</p>
37 | 								</div>		
38 | 						</div>		
39 | 				</div>


--------------------------------------------------------------------------------
/update_password.php:
--------------------------------------------------------------------------------
1 |  <?php
2 |  include('dbcon.php');
3 |  include('session.php');
4 |  $new_password  = $_POST['new_password'];
5 |  mysqli_query($conn,"update teacher set password = '$new_password' where teacher_id = '$session_id'")or die(mysqli_error());
6 |  ?>


--------------------------------------------------------------------------------
/update_password_student.php:
--------------------------------------------------------------------------------
1 |  <?php
2 |  include('dbcon.php');
3 |  include('session.php');
4 |  $new_password  = $_POST['new_password'];
5 |  mysqli_query($conn,"update student set password = '$new_password' where student_id = '$session_id'")or die(mysqli_error());
6 |  ?>
