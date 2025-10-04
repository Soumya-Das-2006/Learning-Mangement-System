<?php
include('../dbcon.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
    exit();
}

// Get JSON input
$input = json_decode(file_get_contents('php://input'), true);

if (!isset($input['action'])) {
    echo json_encode(['success' => false, 'error' => 'Missing action']);
    exit();
}

$action = mysqli_real_escape_string($conn, $input['action']);
$class_id = isset($input['class_id']) ? mysqli_real_escape_string($conn, $input['class_id']) : null;

if ($action === 'create') {
    // Create a new poll
    if (!isset($input['teacher_id']) || !isset($input['question']) || !isset($input['options'])) {
        echo json_encode(['success' => false, 'error' => 'Missing parameters for create action']);
        exit();
    }
    
    $teacher_id = mysqli_real_escape_string($conn, $input['teacher_id']);
    $question = mysqli_real_escape_string($conn, $input['question']);
    $options = json_encode($input['options']);
    
    // Deactivate any existing active polls
    mysqli_query($conn, "UPDATE class_polls SET is_active = 0 WHERE class_id = '$class_id'");
    
    $query = "INSERT INTO class_polls (class_id, teacher_id, question, options, is_active) 
              VALUES ('$class_id', '$teacher_id', '$question', '$options', 1)";
    
    if (mysqli_query($conn, $query)) {
        echo json_encode(['success' => true, 'poll_id' => mysqli_insert_id($conn)]);
    } else {
        echo json_encode(['success' => false, 'error' => mysqli_error($conn)]);
    }
    
} elseif ($action === 'get_active') {
    // Get active poll for the class
    $query = "SELECT * FROM class_polls 
              WHERE class_id = '$class_id' AND is_active = 1 
              ORDER BY created_at DESC LIMIT 1";
    
    $result = mysqli_query($conn, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $poll = mysqli_fetch_assoc($result);
        $poll['options'] = json_decode($poll['options'], true);
        echo json_encode(['success' => true, 'poll' => $poll]);
    } else {
        echo json_encode(['success' => true, 'poll' => null]);
    }
    
} elseif ($action === 'vote') {
    // Vote on a poll
    if (!isset($input['poll_id']) || !isset($input['student_id']) || !isset($input['option_index'])) {
        echo json_encode(['success' => false, 'error' => 'Missing parameters for vote action']);
        exit();
    }
    
    $poll_id = mysqli_real_escape_string($conn, $input['poll_id']);
    $student_id = mysqli_real_escape_string($conn, $input['student_id']);
    $option_index = mysqli_real_escape_string($conn, $input['option_index']);
    
    // Check if student already voted
    $check_query = mysqli_query($conn, 
        "SELECT * FROM poll_votes WHERE poll_id = '$poll_id' AND student_id = '$student_id'");
    
    if (mysqli_num_rows($check_query) > 0) {
        // Update existing vote
        $query = "UPDATE poll_votes SET option_index = '$option_index', voted_at = NOW() 
                  WHERE poll_id = '$poll_id' AND student_id = '$student_id'";
    } else {
        // Insert new vote
        $query = "INSERT INTO poll_votes (poll_id, student_id, option_index) 
                  VALUES ('$poll_id', '$student_id', '$option_index')";
    }
    
    if (mysqli_query($conn, $query)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => mysqli_error($conn)]);
    }
    
} elseif ($action === 'results') {
    // Get poll results
    if (!isset($input['poll_id'])) {
        echo json_encode(['success' => false, 'error' => 'Missing poll_id']);
        exit();
    }
    
    $poll_id = mysqli_real_escape_string($conn, $input['poll_id']);
    
    // Get poll question and options
    $poll_query = mysqli_query($conn, 
        "SELECT question, options FROM class_polls WHERE poll_id = '$poll_id'");
    $poll = mysqli_fetch_assoc($poll_query);
    
    if (!$poll) {
        echo json_encode(['success' => false, 'error' => 'Poll not found']);
        exit();
    }
    
    // Get vote counts
    $results_query = mysqli_query($conn, 
        "SELECT option_index, COUNT(*) as vote_count 
         FROM poll_votes 
         WHERE poll_id = '$poll_id' 
         GROUP BY option_index");
    
    $results = [];
    while ($row = mysqli_fetch_assoc($results_query)) {
        $results[$row['option_index']] = $row['vote_count'];
    }
    
    echo json_encode([
        'success' => true, 
        'question' => $poll['question'],
        'options' => json_decode($poll['options'], true),
        'results' => $results
    ]);
    
} elseif ($action === 'end') {
    // End active poll
    if (!isset($input['poll_id'])) {
        echo json_encode(['success' => false, 'error' => 'Missing poll_id']);
        exit();
    }
    
    $poll_id = mysqli_real_escape_string($conn, $input['poll_id']);
    $query = "UPDATE class_polls SET is_active = 0 WHERE poll_id = '$poll_id'";
    
    if (mysqli_query($conn, $query)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => mysqli_error($conn)]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid action']);
}
?>