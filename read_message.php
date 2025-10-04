<?php
include('session.php');
include('dbcon.php');
<<<<<<< HEAD
if (isset($_POST['read'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysqli_query($conn,"update message set message_status = 'read' where message_id='$id[$i]'");
}
header("location: student_message.php");
}
?>

<?php
if (isset($_POST['reply'])){
$sender_id = $_POST['sender_id'];
$sender_name = $_POST['name_of_sender'];
$my_name = $_POST['my_name'];
$my_message = $_POST['my_message'];

mysqli_query($conn,"insert into message (reciever_id,content,date_sended,sender_id,reciever_name,sender_name) values('$sender_id','$my_message',NOW(),'$session_id','$sender_name','$my_name')")or die(mysqli_error());
mysqli_query($conn,"insert into message_sent (reciever_id,content,date_sended,sender_id,reciever_name,sender_name) values('$sender_id','$my_message',NOW(),'$session_id','$sender_name','$my_name')")or die(mysqli_error());
?>
<script>
alert('Message Sent');
window.location ="student_message.php";
</script>
<?php

=======

// ✅ Mark messages as read
if (isset($_POST['read'])) {
    if (!empty($_POST['selector']) && is_array($_POST['selector'])) {
        $ids = $_POST['selector'];

        // Use prepared statement for safety
        $stmt = $conn->prepare("UPDATE message SET message_status = 'read' WHERE message_id = ?");
        foreach ($ids as $id) {
            $message_id = intval($id);
            $stmt->bind_param("i", $message_id);
            $stmt->execute();
        }
        $stmt->close();
    }

    header("Location: student_message.php");
    exit();
}

// ✅ Send a reply
if (isset($_POST['reply'])) {
    $sender_id   = $_POST['sender_id'] ?? '';
    $sender_name = $_POST['name_of_sender'] ?? '';
    $my_name     = $_POST['my_name'] ?? '';
    $my_message  = $_POST['my_message'] ?? '';

    // Insert into `message`
    $stmt1 = $conn->prepare("INSERT INTO message (reciever_id, content, date_sended, sender_id, reciever_name, sender_name) 
                             VALUES (?, ?, NOW(), ?, ?, ?)");
    $stmt1->bind_param("isiss", $sender_id, $my_message, $session_id, $sender_name, $my_name);
    $stmt1->execute();
    $stmt1->close();

    // Insert into `message_sent`
    $stmt2 = $conn->prepare("INSERT INTO message_sent (reciever_id, content, date_sended, sender_id, reciever_name, sender_name) 
                             VALUES (?, ?, NOW(), ?, ?, ?)");
    $stmt2->bind_param("isiss", $sender_id, $my_message, $session_id, $sender_name, $my_name);
    $stmt2->execute();
    $stmt2->close();
    ?>
    <script>
        alert('Message Sent');
        window.location = "student_message.php";
    </script>
    <?php
>>>>>>> 41343db (Added LMS project files)
}
?>
