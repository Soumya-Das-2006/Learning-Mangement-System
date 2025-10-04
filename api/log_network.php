<?php
include('../dbcon.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
    exit();
}

// Get JSON input
$input = json_decode(file_get_contents('php://input'), true);

if (!isset($input['class_id']) || !isset($input['student_id']) || !isset($input['bitrate']) || !isset($input['packet_loss'])) {
    echo json_encode(['success' => false, 'error' => 'Missing parameters']);
    exit();
}

$class_id = mysqli_real_escape_string($conn, $input['class_id']);
$student_id = mysqli_real_escape_string($conn, $input['student_id']);
$bitrate = mysqli_real_escape_string($conn, $input['bitrate']);
$packet_loss = mysqli_real_escape_string($conn, $input['packet_loss']);

// Insert network log
$query = "INSERT INTO network_logs (class_id, student_id, bitrate, packet_loss) 
          VALUES ('$class_id', '$student_id', '$bitrate', '$packet_loss')";

if (mysqli_query($conn, $query)) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => mysqli_error($conn)]);
}