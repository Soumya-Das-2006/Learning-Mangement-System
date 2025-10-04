<?php
include('dbcon.php');

// This script should be run as a background process after class ends
// or triggered manually by the teacher

if (php_sapi_name() !== 'cli' && !isset($_GET['key']) || $_GET['key'] !== 'your_secure_key') {
    die('Access denied');
}

// Get all completed classes that need chunk merging
$query = mysqli_query($conn, 
    "SELECT oc.class_id, oc.teacher_id, cr.recording_id, cr.student_id 
     FROM online_classes oc
     INNER JOIN class_recordings cr ON oc.class_id = cr.class_id
     WHERE oc.status = 'completed' 
     AND cr.recording_type = 'student_auto' 
     AND cr.file_path LIKE '%chunk_%' 
     GROUP BY cr.recording_id");

while ($recording = mysqli_fetch_assoc($query)) {
    $recording_id = $recording['recording_id'];
    $class_id = $recording['class_id'];
    $student_id = $recording['student_id'];
    
    // Get all chunks for this recording
    $chunks_query = mysqli_query($conn, 
        "SELECT chunk_index, file_path 
         FROM recording_chunks 
         WHERE recording_id = '$recording_id' 
         ORDER BY chunk_index");
    
    $chunk_files = [];
    while ($chunk = mysqli_fetch_assoc($chunks_query)) {
        $chunk_files[] = $chunk['file_path'];
    }
    
    if (count($chunk_files) > 0) {
        // Create final recordings directory
        $final_dir = "recordings/final/{$class_id}/";
        if (!file_exists($final_dir)) {
            mkdir($final_dir, 0777, true);
        }
        
        $output_file = $final_dir . "student_{$student_id}_" . time() . ".mp4";
        
        // Create file list for FFmpeg concatenation
        $list_file = $final_dir . "filelist.txt";
        $list_content = "";
        foreach ($chunk_files as $chunk_file) {
            if (file_exists($chunk_file)) {
                $list_content .= "file '" . realpath($chunk_file) . "'\n";
            }
        }
        file_put_contents($list_file, $list_content);
        
        // Use FFmpeg to merge chunks
        $ffmpeg_cmd = "ffmpeg -f concat -safe 0 -i \"{$list_file}\" -c copy \"{$output_file}\" 2>&1";
        exec($ffmpeg_cmd, $output, $return_code);
        
        if ($return_code === 0 && file_exists($output_file)) {
            // Update recording with final file path
            $file_size = filesize($output_file);
            
            // Get duration using FFprobe
            $ffprobe_cmd = "ffprobe -v error -show_entries format=duration -of default=noprint_wrappers=1:nokey=1 \"{$output_file}\"";
            $duration = exec($ffprobe_cmd);
            
            mysqli_query($conn, 
                "UPDATE class_recordings 
                 SET file_path = '$output_file', duration = '$duration', file_size = '$file_size' 
                 WHERE recording_id = '$recording_id'");
            
            // Clean up temporary chunks
            foreach ($chunk_files as $chunk_file) {
                if (file_exists($chunk_file)) {
                    unlink($chunk_file);
                }
            }
            
            // Remove the directory if empty
            $chunk_dir = dirname($chunk_files[0]);
            if (is_dir($chunk_dir)) {
                rmdir($chunk_dir);
            }
            
            unlink($list_file);
            
            echo "Merged recording {$recording_id} successfully\n";
        } else {
            echo "Failed to merge recording {$recording_id}: " . implode("\n", $output) . "\n";
        }
    }
}

echo "Chunk merging process completed\n";