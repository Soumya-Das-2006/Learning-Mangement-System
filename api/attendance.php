<?php
include('../dbcon.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
    exit();
}

// Get JSON input
$input = json_decode(file_get_contents('php://input'), true);

if (!isset($input['class_id'])) {
    echo json_encode(['success' => false, 'error' => 'Missing class_id']);
    exit();
}

$class_id = mysqli_real_escape_string($conn, $input['class_id']);

// Get attendance data
$query = "SELECT ca.*, s.firstname, s.lastname, 
                 CASE 
                     WHEN ca.leave_time IS NULL THEN 'Online'
                     ELSE 'Left'
                 END as status
          FROM class_attendance ca
          INNER JOIN student s ON ca.student_id = s.student_id
          WHERE ca.class_id = '$class_id'
          ORDER BY ca.join_time DESC";

$result = mysqli_query($conn, $query);

if ($result) {
    $attendance = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $attendance[] = [
            'name' => $row['firstname'] . ' ' . $row['lastname'],
            'status' => $row['status'],
            'join_time' => $row['join_time'],
            'duration' => $row['duration']
        ];
    }
    echo json_encode(['success' => true, 'attendance' => $attendance]);
} else {
    echo json_encode(['success' => false, 'error' => mysqli_error($conn)]);
}
?>