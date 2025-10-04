<?php
include('admin/dbcon.php');
include('session.php');
<<<<<<< HEAD
if (isset($_POST['share'])){
$id=$_POST['selector'];
$class_id = $_POST['teacher_class_id'];
/*  $get_id=$_POST['get_id'];  */
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysqli_query($conn,"select * from teacher_shared  where teacher_shared_id = '$id[$i]' ")or die(mysqli_error());
	while($row = mysqli_fetch_array($result)){
	
	$fname = $row['fname'];
	$floc = $row['floc'];
	$fdesc = $row['fdesc'];
/* 	$uploaded_by = $row['uploaded_by']; */

	
	
	mysqli_query($conn,"insert into files (floc,fdatein,fdesc,class_id,fname,teacher_id) value('$floc',NOW(),'$fdesc','$class_id','$fname','$session_id')")or die(mysqli_error());
	
	
	}
}
?>
<script>
window.location = 'downloadable.php<?php echo '?id='.$class_id; ?>';
</script>
<?php } ?>
=======

if (isset($_POST['share'])) {

    // ✅ Require class id
    if (empty($_POST['teacher_class_id'])) {
        echo "<script>alert('Missing class ID.'); window.location='downloadable.php';</script>";
        exit;
    }

    // Sanitize class id
    $class_id = mysqli_real_escape_string($conn, $_POST['teacher_class_id']);

    // ✅ Ensure we actually got an array of selected ids
    if (isset($_POST['selector']) && is_array($_POST['selector']) && count($_POST['selector']) > 0) {

        // Sanitize and build an IN() list
        $ids = array_filter($_POST['selector'], static function($v) { return $v !== '' && $v !== null; });
        $ids = array_map(function($v) use ($conn) {
            return "'" . mysqli_real_escape_string($conn, $v) . "'";
        }, $ids);

        if (count($ids) > 0) {
            $idList = implode(',', $ids);

            // Fetch selected shared files in one query
            $result = mysqli_query(
                $conn,
                "SELECT fname, floc, fdesc 
                 FROM teacher_shared 
                 WHERE teacher_shared_id IN ($idList)"
            ) or die(mysqli_error($conn));

            // Copy each into files
            while ($row = mysqli_fetch_assoc($result)) {
                $fname = mysqli_real_escape_string($conn, $row['fname']);
                $floc  = mysqli_real_escape_string($conn, $row['floc']);
                $fdesc = mysqli_real_escape_string($conn, $row['fdesc']);

                mysqli_query(
                    $conn,
                    "INSERT INTO files (floc, fdatein, fdesc, class_id, fname, teacher_id)
                     VALUES ('$floc', NOW(), '$fdesc', '$class_id', '$fname', '$session_id')"
                ) or die(mysqli_error($conn));
            }
        }

        // ✅ Redirect back to class downloadable page
        echo "<script>window.location = 'downloadable.php?id={$class_id}';</script>";
        exit;

    } else {
        // ✅ Nothing selected
        echo "<script>alert('No shared files selected.'); window.location = 'downloadable.php?id={$class_id}';</script>";
        exit;
    }
}

// If accessed directly without POST
echo "<script>window.location = 'downloadable.php';</script>";
exit;
>>>>>>> 41343db (Added LMS project files)
