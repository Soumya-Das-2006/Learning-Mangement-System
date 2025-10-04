<?php
<<<<<<< HEAD
 session_start(); 
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')) { ?>
<script>
window.location = "index.php";
</script>
<?php
}
$session_id=$_SESSION['id'];

$user_query = mysqli_query($conn,"select * from users where user_id = '$session_id'")or die(mysqli_error());
$user_row = mysqli_fetch_array($user_query);
$user_username = $user_row['username'];
=======
// Start session
session_start();
include('dbcon.php');

// Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['id']) || ($_SESSION['id'] == '')) {
    header("location: index.php");
    exit();
}

$session_id = $_SESSION['id'];

// Get user type and info if not already set
if (!isset($_SESSION['user_type'])) {
    // Determine user type based on which table the ID exists in
    $teacher_query = mysqli_query($conn, "SELECT * FROM teacher WHERE teacher_id = '$session_id'");
    $student_query = mysqli_query($conn, "SELECT * FROM student WHERE student_id = '$session_id'");
    $admin_query = mysqli_query($conn, "SELECT * FROM users WHERE user_id = '$session_id'");
    
    if (mysqli_num_rows($teacher_query) > 0) {
        $_SESSION['user_type'] = 'teacher';
        $user_row = mysqli_fetch_array($teacher_query);
        $_SESSION['username'] = $user_row['username'];
        $_SESSION['name'] = $user_row['firstname'] . ' ' . $user_row['lastname'];
        $_SESSION['full_name'] = $user_row['firstname'] . ' ' . $user_row['lastname'];
    } elseif (mysqli_num_rows($student_query) > 0) {
        $_SESSION['user_type'] = 'student';
        $user_row = mysqli_fetch_array($student_query);
        $_SESSION['username'] = $user_row['username'];
        $_SESSION['name'] = $user_row['firstname'] . ' ' . $user_row['lastname'];
        $_SESSION['full_name'] = $user_row['firstname'] . ' ' . $user_row['lastname'];
    } elseif (mysqli_num_rows($admin_query) > 0) {
        $_SESSION['user_type'] = 'admin';
        $user_row = mysqli_fetch_array($admin_query);
        $_SESSION['username'] = $user_row['username'];
        $_SESSION['name'] = $user_row['firstname'] . ' ' . $user_row['lastname'];
        $_SESSION['full_name'] = $user_row['firstname'] . ' ' . $user_row['lastname'];
    } else {
        // User not found in any table, logout
        session_destroy();
        header("location: index.php?error=User not found");
        exit();
    }
}

// Validate user type on each page load to prevent switching
if ($_SESSION['user_type'] == 'teacher') {
    $verify_query = mysqli_query($conn, "SELECT * FROM teacher WHERE teacher_id = '$session_id'");
    if (mysqli_num_rows($verify_query) == 0) {
        session_destroy();
        header("location: index.php?error=Invalid teacher session");
        exit();
    }
} elseif ($_SESSION['user_type'] == 'student') {
    $verify_query = mysqli_query($conn, "SELECT * FROM student WHERE student_id = '$session_id'");
    if (mysqli_num_rows($verify_query) == 0) {
        session_destroy();
        header("location: index.php?error=Invalid student session");
        exit();
    }
}

$user_type = $_SESSION['user_type'];
$user_username = $_SESSION['username'];
$user_name = $_SESSION['name'];
>>>>>>> 41343db (Added LMS project files)
?>