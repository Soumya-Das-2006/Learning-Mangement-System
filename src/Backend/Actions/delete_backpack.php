<?php
include('dbcon.php');
<<<<<<< HEAD
if (isset($_POST['backup_delete'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysqli_query($conn,"DELETE FROM student_backpack where file_id='$id[$i]'");
}
header("location: backpack.php");
}
?>
=======

if (isset($_POST['backup_delete'])) {
    if (!empty($_POST['selector'])) {
        $id = $_POST['selector'];
        $N = count($id);
        for ($i = 0; $i < $N; $i++) {
            $file_id = mysqli_real_escape_string($conn, $id[$i]);
            $result = mysqli_query($conn, "DELETE FROM student_backpack WHERE file_id='$file_id'");
        }
    }
    header("Location: backpack.php");
    exit;
}
?>
>>>>>>> 41343db (Added LMS project files)
