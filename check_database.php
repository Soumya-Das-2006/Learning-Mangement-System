<?php
include('admin/dbcon.php');
include('session.php');

echo "<h2>Database Structure Verification</h2>";

// Check if required tables exist
$tables = ['online_classes', 'class_recordings', 'online_attendance', 'network_logs', 'teacher_class'];
$missing_tables = [];

foreach ($tables as $table) {
    $result = mysqli_query($conn, "SHOW TABLES LIKE '$table'");
    if (mysqli_num_rows($result) == 0) {
        $missing_tables[] = $table;
    }
}

if (count($missing_tables) > 0) {
    echo "<div class='alert alert-danger'>Missing tables: " . implode(', ', $missing_tables) . "</div>";
    echo "<p>Please run the database schema fix script.</p>";
} else {
    echo "<div class='alert alert-success'>All required tables exist.</div>";
}

// Check if teacher_class has subject_code column
$result = mysqli_query($conn, "SHOW COLUMNS FROM teacher_class LIKE 'subject_code'");
if (mysqli_num_rows($result) == 0) {
    echo "<div class='alert alert-danger'>teacher_class table is missing subject_code column.</div>";
    echo "<p>Please run: ALTER TABLE teacher_class ADD COLUMN subject_code VARCHAR(50);</p>";
} else {
    echo "<div class='alert alert-success'>teacher_class table has subject_code column.</div>";
}

// Check if online_classes has subject_code column
$result = mysqli_query($conn, "SHOW COLUMNS FROM online_classes LIKE 'subject_code'");
if (mysqli_num_rows($result) == 0) {
    echo "<div class='alert alert-danger'>online_classes table is missing subject_code column.</div>";
    echo "<p>Please run: ALTER TABLE online_classes ADD COLUMN subject_code VARCHAR(50);</p>";
} else {
    echo "<div class='alert alert-success'>online_classes table has subject_code column.</div>";
}

// Check sample data
echo "<h3>Sample Data Check</h3>";
$result = mysqli_query($conn, "SELECT COUNT(*) as count FROM online_classes");
$row = mysqli_fetch_assoc($result);
echo "<p>Online classes: " . $row['count'] . "</p>";

$result = mysqli_query($conn, "SELECT COUNT(*) as count FROM teacher_class");
$row = mysqli_fetch_assoc($result);
echo "<p>Teacher classes: " . $row['count'] . "</p>";

$result = mysqli_query($conn, "SELECT teacher_id, subject_code FROM teacher_class LIMIT 5");
echo "<p>Sample teacher_class records:</p>";
echo "<ul>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<li>Teacher ID: " . $row['teacher_id'] . " - Subject: " . $row['subject_code'] . "</li>";
}
echo "</ul>";

echo "<h3>Database Connection Test</h3>";
if ($conn) {
    echo "<div class='alert alert-success'>Database connection successful.</div>";
} else {
    echo "<div class='alert alert-danger'>Database connection failed: " . mysqli_connect_error() . "</div>";
}
?>