<?php
include('../dbcon.php');
session_start();

// Handle CSV export
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['action']) && $_GET['action'] == 'export_attendance') {
    $class_id = mysqli_real_escape_string($conn, $_GET['class_id']);
    
    // Get unique attendance with latest entry for each student
    $query = "SELECT s.firstname, s.lastname, s.username as enrollment_no, 
                     ca.join_time, ca.leave_time, ca.duration,
                     CASE 
                         WHEN ca.leave_time IS NULL THEN 'Online'
                         ELSE 'Left'
                     END as status
              FROM class_attendance ca
              INNER JOIN student s ON ca.student_id = s.student_id
              WHERE ca.class_id = '$class_id'
              AND ca.attendance_id IN (
                  SELECT MAX(attendance_id) 
                  FROM class_attendance 
                  WHERE class_id = '$class_id' 
                  GROUP BY student_id
              )
              ORDER BY ca.join_time DESC";
    
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="attendance_' . $class_id . '_' . date('Y-m-d') . '.csv"');
        
        $output = fopen('php://output', 'w');
        fputcsv($output, ['Name', 'Enrollment No', 'Join Time', 'Leave Time', 'Duration (seconds)', 'Status']);
        
        while ($row = mysqli_fetch_assoc($result)) {
            fputcsv($output, [
                $row['firstname'] . ' ' . $row['lastname'],
                $row['enrollment_no'],
                $row['join_time'],
                $row['leave_time'] ? $row['leave_time'] : 'Still Online',
                $row['duration'] ? $row['duration'] : 'N/A',
                $row['status']
            ]);
        }
        fclose($output);
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
    exit();
}

$input = json_decode(file_get_contents('php://input'), true);

if (!isset($input['action'])) {
    echo json_encode(['success' => false, 'error' => 'Missing action']);
    exit();
}

$action = mysqli_real_escape_string($conn, $input['action']);
$class_id = mysqli_real_escape_string($conn, $input['class_id']);

if ($action === 'get_attendance') {
    // Get unique attendance (only latest entry per student)
    $query = "SELECT ca.*, s.firstname, s.lastname, s.username as enrollment_no,
                     CASE 
                         WHEN ca.leave_time IS NULL THEN 'Online'
                         ELSE 'Left'
                     END as status
              FROM class_attendance ca
              INNER JOIN student s ON ca.student_id = s.student_id
              WHERE ca.class_id = '$class_id'
              AND ca.attendance_id IN (
                  SELECT MAX(attendance_id) 
                  FROM class_attendance 
                  WHERE class_id = '$class_id' 
                  GROUP BY student_id
              )
              ORDER BY ca.join_time DESC";
    
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        $attendance = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $attendance[] = [
                'name' => $row['firstname'] . ' ' . $row['lastname'],
                'enrollment_no' => $row['enrollment_no'],
                'status' => $row['status'],
                'join_time' => $row['join_time'],
                'duration' => $row['duration']
            ];
        }
        echo json_encode(['success' => true, 'attendance' => $attendance]);
    } else {
        echo json_encode(['success' => false, 'error' => mysqli_error($conn)]);
    }
    
} elseif ($action === 'log_exit') {
    if (!isset($input['user_id']) || !isset($input['user_type'])) {
        echo json_encode(['success' => false, 'error' => 'Missing parameters']);
        exit();
    }
    
    $user_id = mysqli_real_escape_string($conn, $input['user_id']);
    $user_type = mysqli_real_escape_string($conn, $input['user_type']);
    
    // Update only the latest attendance record for this student
    $query = "UPDATE class_attendance 
              SET leave_time = NOW(), 
                  duration = TIMESTAMPDIFF(SECOND, join_time, NOW()) 
              WHERE class_id = '$class_id' 
              AND student_id = '$user_id' 
              AND leave_time IS NULL
              ORDER BY join_time DESC 
              LIMIT 1";
    
    if (mysqli_query($conn, $query)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => mysqli_error($conn)]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid action']);
}
?>