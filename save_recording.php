<?php
// Directory where recordings will be stored
$targetDir = __DIR__ . "/recordings/";

// Create folder if it doesn't exist
if (!is_dir($targetDir)) {
    mkdir($targetDir, 0777, true);
}

// Handle uploaded file
if (isset($_FILES['recording'])) {
    $fileName = "recording_" . date("Ymd_His") . ".webm"; // unique filename
    $targetFile = $targetDir . $fileName;

    if (move_uploaded_file($_FILES['recording']['tmp_name'], $targetFile)) {
        echo "Recording saved as: " . $fileName;
    } else {
        echo "Error saving recording!";
    }
} else {
    echo "No file uploaded!";
}
?>
