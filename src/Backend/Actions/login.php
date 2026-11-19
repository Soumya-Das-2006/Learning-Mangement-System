<?php
<<<<<<< HEAD
		include('admin/dbcon.php');
		session_start();
		$username = $_POST['username'];
		$password = $_POST['password'];
		/* student */
			$query = "SELECT * FROM student WHERE username='$username' AND password='$password'";
			$result = mysqli_query($conn,$query)or die(mysqli_error());
			$row = mysqli_fetch_array($result);
			$num_row = mysqli_num_rows($result);
		/* teacher */
		$query_teacher = mysqli_query($conn,"SELECT * FROM teacher WHERE username='$username' AND password='$password'")or die(mysqli_error());
		$num_row_teacher = mysqli_num_rows($query_teacher);
		$row_teahcer = mysqli_fetch_array($query_teacher);
		if( $num_row > 0 ) { 
		$_SESSION['id']=$row['student_id'];
		echo 'true_student';	
		}else if ($num_row_teacher > 0){
		$_SESSION['id']=$row_teahcer['teacher_id'];
		echo 'true';
		
		 }else{ 
				echo 'false';
		}	
				
		?>
=======
include('admin/dbcon.php');
session_start();

// Only proceed if username & password exist
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    /* --- Check Student --- */
    $query = mysqli_query($conn, "SELECT * FROM student WHERE username='$username' AND password='$password'") 
        or die(mysqli_error($conn));
    $num_row = mysqli_num_rows($query);
    $row = mysqli_fetch_array($query);

    /* --- Check Teacher --- */
    $query_teacher = mysqli_query($conn, "SELECT * FROM teacher WHERE username='$username' AND password='$password'") 
        or die(mysqli_error($conn));
    $num_row_teacher = mysqli_num_rows($query_teacher);
    $row_teacher = mysqli_fetch_array($query_teacher);

    if ($num_row > 0) {
        $_SESSION['id'] = $row['student_id'];
        $_SESSION['user_type'] = 'student'; // ✅ set user type
        $_SESSION['username'] = $row['username'];
        $_SESSION['name'] = $row['firstname'] . ' ' . $row['lastname'];
        echo 'true_student';
    } elseif ($num_row_teacher > 0) {
        $_SESSION['id'] = $row_teacher['teacher_id'];
        $_SESSION['user_type'] = 'teacher'; // ✅ set user type
        $_SESSION['username'] = $row_teacher['username'];
        $_SESSION['name'] = $row_teacher['firstname'] . ' ' . $row_teacher['lastname'];
        echo 'true';
    } else {
        echo 'false';
    }
} else {
    echo 'false';
}
?>
>>>>>>> 41343db (Added LMS project files)
