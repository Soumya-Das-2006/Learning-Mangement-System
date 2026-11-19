<?php
include('admin/dbcon.php');
include('session.php');
<<<<<<< HEAD
if (isset($_POST['delete_user'])){
$id=$_POST['selector'];

$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysqli_query($conn,"select * from files  where file_id = '$id[$i]' ")or die(mysqli_error());
	while($row = mysqli_fetch_array($result)){
	
	$fname = $row['fname'];
	$floc = $row['floc'];
	$fdesc = $row['fdesc'];
	$teacher_id = $row['teacher_id'];
	
	
	mysqli_query($conn,"insert into student_backpack (floc,fdatein,fdesc,student_id,fname) value('$floc',NOW(),'$fdesc','$session_id','$fname')")or die(mysqli_error());
	
	
	}
}
?>
<script>
window.location = 'backpack.php';
</script>
<?php
}
?>
=======

if (isset($_POST['delete_user'])) {

    // ✅ Make sure 'selector' exists and is an array
    if (isset($_POST['selector']) && is_array($_POST['selector']) && count($_POST['selector']) > 0) {

        $id = $_POST['selector'];
        $N = count($id);

        for ($i = 0; $i < $N; $i++) {
            $file_id = mysqli_real_escape_string($conn, $id[$i]);

            // ✅ Select file details
            $result = mysqli_query($conn, "SELECT * FROM files WHERE file_id = '$file_id'") or die(mysqli_error($conn));

            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $fname = mysqli_real_escape_string($conn, $row['fname']);
                $floc  = mysqli_real_escape_string($conn, $row['floc']);
                $fdesc = mysqli_real_escape_string($conn, $row['fdesc']);
                $teacher_id = mysqli_real_escape_string($conn, $row['teacher_id']);

                // ✅ Insert into student_backpack
                mysqli_query(
                    $conn,
                    "INSERT INTO student_backpack (floc, fdatein, fdesc, student_id, fname) 
                     VALUES ('$floc', NOW(), '$fdesc', '$session_id', '$fname')"
                ) or die(mysqli_error($conn));
            }
        }

        // ✅ Redirect back after success
        echo "<script>window.location = 'backpack.php';</script>";

    } else {
        // ✅ No file selected — show alert and redirect safely
        echo "<script>alert('No files selected!'); window.location = 'backpack.php';</script>";
    }
}
?>
>>>>>>> 41343db (Added LMS project files)
