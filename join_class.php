<?php
// Start session and include necessary files at the very beginning
session_start();
include('dbcon.php');
include('session.php');

if (!isset($_GET['class_id'])) {
    // Redirect based on user type
    if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'teacher') {
        header('Location: my_classes.php');
    } else {
        header('Location: student_online.php');
    }
    exit();
}

$class_id = mysqli_real_escape_string($conn, $_GET['class_id']);
$query = mysqli_query($conn, 
    "SELECT oc.*, t.firstname, t.lastname, s.subject_title, s.subject_code
     FROM online_classes oc
     INNER JOIN teacher t ON oc.teacher_id = t.teacher_id
     INNER JOIN subject s ON oc.subject_code = s.subject_code
     WHERE oc.class_id = '$class_id'");
$class = mysqli_fetch_assoc($query);

if (!$class) {
    // Redirect based on user type
    if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'teacher') {
        header('Location: my_classes.php?error=Class not found');
    } else {
        header('Location: student_online.php?error=Class not found');
    }
    exit();
}

// Check access for students
if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'student') {
    $session_id = $_SESSION['id'];
    $access_query = mysqli_query($conn, 
    "SELECT * FROM teacher_class_student tcs
     INNER JOIN teacher_class tc ON tcs.teacher_class_id = tc.teacher_class_id
     INNER JOIN subject s ON tc.subject_id = s.subject_id
     WHERE tcs.student_id = '$session_id' 
       AND s.subject_code = '{$class['subject_code']}'");
    
    if (mysqli_num_rows($access_query) == 0) {
        header('Location: student_online.php?error=Access denied');
        exit();
    }
    
    // Log attendance (only if not already logged)
    $check_attendance = mysqli_query($conn, 
        "SELECT * FROM class_attendance 
         WHERE class_id = '$class_id' AND student_id = '$session_id'");
    
    if (mysqli_num_rows($check_attendance) == 0) {
        mysqli_query($conn, 
            "INSERT INTO class_attendance (class_id, student_id, join_time) 
             VALUES ('$class_id', '$session_id', NOW())");
    }
}

// Update class status to ongoing if it's the teacher
if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'teacher' && isset($_SESSION['id']) && $class['teacher_id'] == $_SESSION['id'] && $class['status'] == 'scheduled') {
    mysqli_query($conn, "UPDATE online_classes SET status = 'ongoing' WHERE class_id = '$class_id'");
}

// Get user display name
if (isset($_SESSION['user_type']) && isset($_SESSION['id'])) {
    $session_id = $_SESSION['id'];
    if ($_SESSION['user_type'] == 'teacher') {
        $user_query = mysqli_query($conn, "SELECT firstname, lastname FROM teacher WHERE teacher_id = '$session_id'");
        $user = mysqli_fetch_assoc($user_query);
        $display_name = $user['firstname'] . ' ' . $user['lastname'] . ' (Teacher)';
    } else {
        $user_query = mysqli_query($conn, "SELECT firstname, lastname FROM student WHERE student_id = '$session_id'");
        $user = mysqli_fetch_assoc($user_query);
        $display_name = $user['firstname'] . ' ' . $user['lastname'] . ' (Student)';
    }
} else {
    $display_name = 'Guest User';
    $session_id = 0;
}

// Include header after all processing
include('header_dashboard.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Class - <?php echo htmlspecialchars($class['class_name']); ?></title>
    <link rel="stylesheet" href="css/online_classes.css">
    <script src="https://meet.jit.si/external_api.js"></script>
    <style>
        .classroom-container {
            display: flex;
            flex-direction: column;
            height: 100vh;
        }
        
        .main-content {
            display: flex;
            flex: 1;
            overflow: hidden;
        }
        
        .video-container {
            flex: 3;
            padding: 10px;
            position: relative;
        }
        
        .sidebar {
            flex: 1;
            display: flex;
            flex-direction: column;
            min-width: 300px;
            max-width: 400px;
            border-left: 1px solid #ddd;
        }
        
        .tools-panel {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        
        .chat-panel {
            flex: 1;
            display: flex;
            flex-direction: column;
            padding: 10px;
        }
        
        .chat-messages {
            flex: 1;
            overflow-y: auto;
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
            background: #f9f9f9;
            max-height: 300px;
        }
        
        .chat-input-container {
            display: flex;
        }
        
        .chat-input {
            flex: 1;
            padding: 8px;
        }
        
        .poll-container {
            background: #f0f8ff;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            display: none;
        }
        
        .poll-option {
            margin: 5px 0;
        }
        
        .attendance-list {
            max-height: 150px;
            overflow-y: auto;
            margin-bottom: 10px;
        }
        
        .recording-notice {
            background: #ffebee;
            color: #c62828;
            padding: 8px;
            border-radius: 4px;
            margin: 10px 0;
            display: none;
        }
        
        .tool-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
            margin: 10px 0;
        }
        
        .tool-buttons button {
            flex: 1;
            min-width: 120px;
        }
        
        .chat-message {
            margin-bottom: 8px;
            padding: 5px;
            border-bottom: 1px solid #eee;
        }
        
        .chat-message strong {
            color: #337ab7;
        }
        
        .chat-message .text-muted {
            font-size: 0.8em;
            color: #999;
        }
        
        .student-tools {
            background: #e8f5e8;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
        }
        
        .raise-hand {
            background: #ff9800;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 20px;
            cursor: pointer;
            margin-bottom: 10px;
        }
        
        .raise-hand.raised {
            background: #f44336;
            animation: pulse 1.5s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        .whiteboard-container {
            display: none;
            position: absolute;
            top: 10px;
            right: 10px;
            background: white;
            border: 2px solid #333;
            border-radius: 5px;
            padding: 10px;
            z-index: 1000;
        }
        
        .whiteboard-tools {
            margin-bottom: 10px;
        }
        
        #whiteboard {
            border: 1px solid #ccc;
            cursor: crosshair;
        }
        
        .fullscreen-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 100;
        }
        
        .raised-hands-panel {
            background: #fff3cd;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            max-height: 150px;
            overflow-y: auto;
        }
        
        .raised-hand-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px;
            border-bottom: 1px solid #ffeaa7;
        }
        
        .raised-hand-item:last-child {
            border-bottom: none;
        }
        
        .control-panel {
            background: #e3f2fd;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
        }
        
        .control-item {
            margin: 5px 0;
        }
        
        .class-info {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        
        .attendance-panel ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        
        .attendance-panel li {
            padding: 5px 0;
            border-bottom: 1px solid #eee;
        }
        
        .badge {
            padding: 2px 6px;
            border-radius: 3px;
            font-size: 0.8em;
        }
        
        .badge-success {
            background: #5cb85c;
            color: white;
        }
        
        .badge-warning {
            background: #f0ad4e;
            color: white;
        }
    </style>
</head>
<body class="<?php echo (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'student') ? 'student-view' : 'teacher-view'; ?>">
    <?php 
    if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'teacher') {
        include('navbar_teacher.php');
    } else {
        include('navbar_student.php');
    }
    ?>
    
    <div class="container-fluid classroom-container">
        <div class="row-fluid">
            <?php 
            if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'teacher') {
                include('teacher_online_sidebar.php');
            } else {
                include('student_online_sidebar.php');
            }
            ?>
            
            <div class="span9" id="content">
                <div class="row-fluid">
                    <ul class="breadcrumb">
                        <li><a href="#"><b>My Class</b></a><span class="divider">/</span></li>
                        <li><a href="<?php echo (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'teacher') ? 'my_classes.php' : 'student_online.php'; ?>"><b>Online Classes</b></a><span class="divider">/</span></li>
                        <li><a href="#"><b>Join Class: <?php echo htmlspecialchars($class['class_name']); ?></b></a></li>
                    </ul>
                    
                    <div class="class-info">
                        <h4><?php echo htmlspecialchars($class['class_name']); ?></h4>
                        <p>
                            <strong>Subject:</strong> <?php echo htmlspecialchars($class['subject_code'] . ' - ' . $class['subject_title']); ?> | 
                            <strong>Teacher:</strong> <?php echo htmlspecialchars($class['firstname'] . ' ' . $class['lastname']); ?> | 
                            <strong>Started:</strong> <?php echo date('M j, Y g:i A', strtotime($class['start_time'])); ?>
                        </p>
                    </div>
                    
                    <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'student' && $class['allow_recording']): ?>
                    <div id="recording-notice" class="recording-notice">
                        <i class="icon-facetime-video"></i>
                        <span id="recording-message">Recording in progress due to poor network conditions</span>
                    </div>
                    <?php endif; ?>
                    
                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">Live Classroom</div>
                            <button class="btn btn-small btn-info fullscreen-btn" id="fullscreen-btn">
                                <i class="icon-fullscreen"></i> Fullscreen
                            </button>
                        </div>
                        <div class="block-content collapse in">
                            <div class="main-content">
                                <div class="video-container">
                                    <div id="meet"></div>
                                    
                                    <!-- Whiteboard -->
                                    <div id="whiteboard-container" class="whiteboard-container">
                                        <div class="whiteboard-tools">
                                            <button class="btn btn-small" id="whiteboard-pen">Pen</button>
                                            <button class="btn btn-small" id="whiteboard-eraser">Eraser</button>
                                            <input type="color" id="whiteboard-color" value="#000000">
                                            <input type="range" id="whiteboard-size" min="1" max="10" value="2">
                                            <button class="btn btn-small btn-danger" id="whiteboard-clear">Clear</button>
                                            <button class="btn btn-small" id="whiteboard-close">Close</button>
                                        </div>
                                        <canvas id="whiteboard" width="800" height="400"></canvas>
                                    </div>
                                </div>
                                
                                <div class="sidebar">
                                    <div class="tools-panel">
                                        <h4>Class Tools</h4>
                                        
                                        <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'teacher'): ?>
                                        <!-- Teacher Tools -->
                                        <div class="tool-buttons">
                                            <button class="btn btn-info" id="create-poll">
                                                <i class="icon-bar-chart"></i> Create Poll
                                            </button>
                                            <button class="btn btn-warning" id="share-screen">
                                                <i class="icon-desktop"></i> Share Screen
                                            </button>
                                            <button class="btn btn-success" id="start-recording">
                                                <i class="icon-facetime-video"></i> Start Recording
                                            </button>
                                            <button class="btn btn-danger" id="stop-recording" style="display: none;">
                                                <i class="icon-stop"></i> Stop Recording
                                            </button>
                                            <button class="btn btn-primary" id="whiteboard-toggle">
                                                <i class="icon-pencil"></i> Whiteboard
                                            </button>
                                            <button class="btn btn-danger" id="end-class">
                                                <i class="icon-off"></i> End Class
                                            </button>
                                        </div>
                                        
                                        <!-- Student Controls -->
                                        <div class="control-panel">
                                            <h5>Student Controls</h5>
                                            <div class="control-item">
                                                <label class="checkbox">
                                                    <input type="checkbox" id="enable-chat" checked> Enable Chat
                                                </label>
                                            </div>
                                            <div class="control-item">
                                                <label class="checkbox">
                                                    <input type="checkbox" id="enable-polls" checked> Enable Polls
                                                </label>
                                            </div>
                                            <div class="control-item">
                                                <label class="checkbox">
                                                    <input type="checkbox" id="enable-raise-hand" checked> Enable Raise Hand
                                                </label>
                                            </div>
                                            <div class="control-item">
                                                <label class="checkbox">
                                                    <input type="checkbox" id="enable-whiteboard" checked> Enable Whiteboard
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <!-- Raised Hands Panel -->
                                        <div class="raised-hands-panel">
                                            <h5>Raised Hands ✋</h5>
                                            <div id="raised-hands-list">
                                                <p>No hands raised</p>
                                            </div>
                                        </div>
                                        
                                        <!-- Attendance Panel -->
                                        <div class="attendance-panel">
                                            <h5>Attendance</h5>
                                            <div id="attendance-list" class="attendance-list">
                                                <p>Loading attendance...</p>
                                            </div>
                                            <button class="btn btn-small btn-success" id="export-attendance">
                                                <i class="icon-download"></i> Export Attendance
                                            </button>
                                        </div>
                                        
                                        <?php else: ?>
                                        <!-- Student Tools -->
                                        <div class="student-tools">
                                            <button class="raise-hand" id="raise-hand">
                                                <i class="icon-hand-up"></i> Raise Hand
                                            </button>
                                            <button class="btn btn-small btn-primary" id="student-whiteboard">
                                                <i class="icon-pencil"></i> Whiteboard
                                            </button>
                                            
                                            <div id="poll-container" class="poll-container">
                                                <h5 id="poll-question"></h5>
                                                <div id="poll-options"></div>
                                                <button class="btn btn-small btn-success" id="vote-poll">Vote</button>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <div class="chat-panel">
                                        <h4>Class Chat</h4>
                                        <div id="chat-messages" class="chat-messages"></div>
                                        <div class="chat-input-container">
                                            <input type="text" id="chat-input" class="chat-input" placeholder="Type your message...">
                                            <button class="btn btn-primary" id="send-message">Send</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Poll Creation Modal (for teachers) -->
    <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'teacher'): ?>
    <div id="pollModal" class="modal hide fade" tabindex="-1" role="dialog">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3>Create Poll</h3>
        </div>
        <div class="modal-body">
            <form id="poll-form">
                <div class="control-group">
                    <label class="control-label" for="poll-question-input">Question:</label>
                    <div class="controls">
                        <input type="text" id="poll-question-input" class="input-block-level" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="poll-options-input">Options (one per line):</label>
                    <div class="controls">
                        <textarea id="poll-options-input" class="input-block-level" rows="4" required></textarea>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal">Cancel</button>
            <button class="btn btn-primary" id="create-poll-submit">Create Poll</button>
        </div>
    </div>
    <?php endif; ?>
    
    <?php include('footer.php'); ?>
    <?php include('script.php'); ?>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script>
    // Global variables
    let mediaRecorder = null;
    let recordedChunks = [];
    let isRecording = false;
    let isHandRaised = false;
    let whiteboardActive = false;
    let currentPollId = null;
    let studentControls = {
        chat: true,
        polls: true,
        raiseHand: true,
        whiteboard: true
    };

    const classId = "<?php echo $class_id; ?>";
    const userId = "<?php echo $session_id; ?>";
    const userType = "<?php echo isset($_SESSION['user_type']) ? $_SESSION['user_type'] : ''; ?>";
    const displayName = "<?php echo $display_name; ?>";

    // Initialize Jitsi Meet API
    const domain = 'meet.jit.si';
    const options = {
        roomName: "<?php echo $class['room_name']; ?>",
        width: "100%",
        height: 500,
        parentNode: document.querySelector('#meet'),
        configOverwrite: { 
            prejoinPageEnabled: false,
            disableModeratorIndicator: false,
            startAudioOnly: false,
            enableEmailInStats: false,
            enableWelcomePage: false,
            enableClosePage: false,
            disableInviteFunctions: true,
            startWithAudioMuted: false,
            startWithVideoMuted: false,
            enableNoisyMicDetection: false,
            resolution: 720,
            constraints: {
                video: {
                    height: { ideal: 720, max: 1080, min: 240 }
                }
            }
        },
        interfaceConfigOverwrite: {
            TOOLBAR_BUTTONS: [
                'microphone', 'camera', 'closedcaptions', 'desktop', 'fullscreen',
                'fodeviceselection', 'hangup', 'profile', 'chat', 'recording',
                'livestreaming', 'etherpad', 'sharedvideo', 'settings', 'raisehand',
                'videoquality', 'filmstrip', 'invite', 'feedback', 'stats', 'shortcuts',
                'tileview', 'videobackgroundblur', 'download', 'help', 'mute-everyone',
                'security'
            ],
            SETTINGS_SECTIONS: ['devices', 'language', 'moderator', 'profile', 'calendar'],
            SHOW_JITSI_WATERMARK: false,
            SHOW_WATERMARK_FOR_GUESTS: false,
            SHOW_BRAND_WATERMARK: false,
            BRAND_WATERMARK_LINK: '',
            SHOW_POWERED_BY: false,
            DISABLE_VIDEO_BACKGROUND: false,
            DISABLE_FOCUS_INDICATOR: false,
            DISABLE_DOMINANT_SPEAKER_INDICATOR: false
        },
        userInfo: {
            displayName: displayName,
            email: ''
        }
    };

    const api = new JitsiMeetExternalAPI(domain, options);

    // Event Handlers
    api.addEventListener('videoConferenceJoined', (response) => {
        console.log('Conference joined:', response);
        
        // For teachers, set them as moderators
        <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'teacher'): ?>
        api.executeCommand('password', 'moderator123');
        <?php endif; ?>
    });

    api.addEventListener('videoConferenceLeft', () => {
        console.log('Conference left');
        logAttendanceExit();
        
        // Lower hand if raised
        if (isHandRaised) {
            lowerHand();
        }
    });

    api.addEventListener('participantJoined', (participant) => {
        console.log('Participant joined:', participant);
        updateAttendanceList();
    });

    api.addEventListener('participantLeft', (participant) => {
        console.log('Participant left:', participant);
        updateAttendanceList();
    });

    api.addEventListener('videoConferenceError', (error) => {
        console.error('Conference error:', error);
        alert('Error joining conference: ' + error);
    });

    // Fullscreen functionality
    document.getElementById('fullscreen-btn').addEventListener('click', () => {
        const elem = document.getElementById('meet');
        if (!document.fullscreenElement) {
            if (elem.requestFullscreen) {
                elem.requestFullscreen();
            } else if (elem.webkitRequestFullscreen) {
                elem.webkitRequestFullscreen();
            } else if (elem.msRequestFullscreen) {
                elem.msRequestFullscreen();
            }
        } else {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.webkitExitFullscreen) {
                document.webkitExitFullscreen();
            } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
            }
        }
    });

    // Chat Functionality
    const chatInput = document.getElementById('chat-input');
    const sendMessageBtn = document.getElementById('send-message');
    const chatMessages = document.getElementById('chat-messages');

    sendMessageBtn.addEventListener('click', sendChatMessage);
    chatInput.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') {
            sendChatMessage();
        }
    });

    function sendChatMessage() {
        const message = chatInput.value.trim();
        if (message && studentControls.chat) {
            fetch('api/chat_operations.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    action: 'send',
                    class_id: classId,
                    user_id: userId,
                    user_type: userType,
                    message: message
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    chatInput.value = '';
                    addChatMessage(displayName, message, new Date());
                } else {
                    console.error('Error sending message:', data.error);
                    alert('Error sending message: ' + data.error);
                }
            })
            .catch(error => {
                console.error('Error sending message:', error);
                alert('Network error while sending message');
            });
        }
    }

    function addChatMessage(sender, message, timestamp) {
        const messageDiv = document.createElement('div');
        messageDiv.className = 'chat-message';
        messageDiv.innerHTML = `
            <strong>${sender}:</strong> ${message}
            <small class="text-muted">${timestamp.toLocaleTimeString()}</small>
        `;
        chatMessages.appendChild(messageDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    // Poll for new chat messages
    function fetchChatMessages() {
        if (!studentControls.chat) return;
        
        fetch('api/chat_operations.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                action: 'fetch',
                class_id: classId,
                last_message_id: 0
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success && data.messages.length > 0) {
                chatMessages.innerHTML = '';
                data.messages.forEach(msg => {
                    addChatMessage(msg.user_name, msg.message, new Date(msg.sent_at));
                });
            }
        })
        .catch(error => {
            console.error('Error fetching messages:', error);
        });
    }

    setInterval(fetchChatMessages, 2000);

    // Recording Functionality
    <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'teacher'): ?>
    document.getElementById('start-recording').addEventListener('click', startRecording);
    document.getElementById('stop-recording').addEventListener('click', stopRecording);
    
    async function startRecording() {
        try {
            // Get display media (screen + audio)
            const stream = await navigator.mediaDevices.getDisplayMedia({
                video: true,
                audio: true
            });

            // Setup MediaRecorder
            mediaRecorder = new MediaRecorder(stream, { 
                mimeType: 'video/webm; codecs=vp9,opus' 
            });

            recordedChunks = [];

            mediaRecorder.ondataavailable = (e) => {
                if (e.data.size > 0) {
                    recordedChunks.push(e.data);
                }
            };

            mediaRecorder.onstop = () => {
                const blob = new Blob(recordedChunks, { type: 'video/webm' });
                
                // Upload to server
                uploadRecording(blob);
                
                // Stop all tracks
                stream.getTracks().forEach(track => track.stop());
            };

            mediaRecorder.start();
            isRecording = true;
            
            // Update UI
            document.getElementById('start-recording').style.display = 'none';
            document.getElementById('stop-recording').style.display = 'inline-block';
            
            console.log("Recording started...");
        } catch (err) {
            console.error("Error starting recording:", err);
            alert("Error starting recording: " + err.message);
        }
    }

    function stopRecording() {
        if (mediaRecorder && isRecording) {
            mediaRecorder.stop();
            isRecording = false;
            
            // Update UI
            document.getElementById('start-recording').style.display = 'inline-block';
            document.getElementById('stop-recording').style.display = 'none';
            
            console.log("Recording stopped");
        }
    }

    function uploadRecording(blob) {
        const formData = new FormData();
        formData.append("recording", blob, `class_recording_${classId}_${Date.now()}.webm`);
        formData.append("class_id", classId);
        formData.append("teacher_id", userId);

        fetch("save_recording.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            console.log("Server response:", data);
            alert("Recording saved successfully!");
        })
        .catch(err => {
            console.error("Upload failed:", err);
            alert("Error uploading recording");
        });
    }
    <?php endif; ?>

    // Screen Sharing
    <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'teacher'): ?>
    document.getElementById('share-screen').addEventListener('click', () => {
        api.executeCommand('toggleShareScreen');
    });
    <?php endif; ?>

    // Poll Functionality
    <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'teacher'): ?>
    document.getElementById('create-poll').addEventListener('click', () => {
        $('#pollModal').modal('show');
    });

    document.getElementById('create-poll-submit').addEventListener('click', createPoll);
    
    function createPoll() {
        const question = document.getElementById('poll-question-input').value.trim();
        const optionsText = document.getElementById('poll-options-input').value.trim();
        
        if (!question || !optionsText) {
            alert('Please fill in both question and options');
            return;
        }
        
        const options = optionsText.split('\n').filter(opt => opt.trim() !== '');
        
        if (options.length < 2) {
            alert('Please provide at least 2 options');
            return;
        }

        fetch('api/poll_operations.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                action: 'create',
                class_id: classId,
                teacher_id: userId,
                question: question,
                options: options
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                $('#pollModal').modal('hide');
                document.getElementById('poll-question-input').value = '';
                document.getElementById('poll-options-input').value = '';
                alert('Poll created successfully!');
            } else {
                alert('Error creating poll: ' + data.error);
            }
        })
        .catch(error => {
            console.error('Error creating poll:', error);
            alert('Network error while creating poll');
        });
    }
    <?php else: ?>
    // Student poll handling
    function checkForPolls() {
        if (!studentControls.polls) return;
        
        fetch('api/poll_operations.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                action: 'get_active',
                class_id: classId
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success && data.poll) {
                currentPollId = data.poll.poll_id;
                const pollContainer = document.getElementById('poll-container');
                pollContainer.style.display = 'block';
                document.getElementById('poll-question').textContent = data.poll.question;
                
                const optionsContainer = document.getElementById('poll-options');
                optionsContainer.innerHTML = '';
                
                data.poll.options.forEach((option, index) => {
                    const optionDiv = document.createElement('div');
                    optionDiv.className = 'poll-option';
                    optionDiv.innerHTML = `
                        <input type="radio" name="poll_option" value="${index}" id="option_${index}">
                        <label for="option_${index}">${option}</label>
                    `;
                    optionsContainer.appendChild(optionDiv);
                });
            } else {
                document.getElementById('poll-container').style.display = 'none';
            }
        });
    }

    document.getElementById('vote-poll').addEventListener('click', () => {
        const selectedOption = document.querySelector('input[name="poll_option"]:checked');
        if (selectedOption) {
            fetch('api/poll_operations.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    },
                body: JSON.stringify({
                    action: 'vote',
                    class_id: classId,
                    poll_id: currentPollId,
                    student_id: userId,
                    option_index: selectedOption.value
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Vote submitted successfully');
                    document.getElementById('poll-container').style.display = 'none';
                } else {
                    alert('Error submitting vote: ' + data.error);
                }
            })
            .catch(error => {
                console.error('Error submitting vote:', error);
                alert('Network error while submitting vote');
            });
        } else {
            alert('Please select an option');
        }
    });
    
    // Check for polls every 3 seconds
    setInterval(checkForPolls, 3000);
    <?php endif; ?>

    // Raise Hand Functionality
    <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'student'): ?>
    document.getElementById('raise-hand').addEventListener('click', toggleRaiseHand);
    
    function toggleRaiseHand() {
        if (!studentControls.raiseHand) {
            alert('Raise hand feature is disabled by teacher');
            return;
        }
        
        if (!isHandRaised) {
            raiseHand();
        } else {
            lowerHand();
        }
    }
    
    function raiseHand() {
        fetch('api/hand_raise_operations.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                action: 'raise_hand',
                class_id: classId,
                student_id: userId,
                student_name: displayName
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                isHandRaised = true;
                const raiseHandBtn = document.getElementById('raise-hand');
                raiseHandBtn.classList.add('raised');
                raiseHandBtn.innerHTML = '<i class="icon-hand-down"></i> Lower Hand';
                api.executeCommand('raiseHand');
            }
        })
        .catch(error => {
            console.error('Error raising hand:', error);
        });
    }
    
    function lowerHand() {
        fetch('api/hand_raise_operations.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                action: 'lower_hand',
                class_id: classId,
                student_id: userId
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                isHandRaised = false;
                const raiseHandBtn = document.getElementById('raise-hand');
                raiseHandBtn.classList.remove('raised');
                raiseHandBtn.innerHTML = '<i class="icon-hand-up"></i> Raise Hand';
            }
        })
        .catch(error => {
            console.error('Error lowering hand:', error);
        });
    }
    <?php else: ?>
    // Teacher: Get raised hands
    function getRaisedHands() {
        fetch('api/hand_raise_operations.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                action: 'get_raised_hands',
                class_id: classId
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                updateRaisedHandsList(data.raised_hands);
            }
        })
        .catch(error => {
            console.error('Error getting raised hands:', error);
        });
    }
    
    function updateRaisedHandsList(raisedHands) {
        const handsList = document.getElementById('raised-hands-list');
        
        if (raisedHands.length === 0) {
            handsList.innerHTML = '<p>No hands raised</p>';
            return;
        }
        
        handsList.innerHTML = '';
        raisedHands.forEach(hand => {
            const handItem = document.createElement('div');
            handItem.className = 'raised-hand-item';
            handItem.innerHTML = `
                <span>${hand.student_name}</span>
                <small class="text-muted">${new Date(hand.raised_at).toLocaleTimeString()}</small>
                <button class="btn btn-mini btn-success clear-hand" data-event-id="${hand.event_id}">
                    <i class="icon-ok"></i> Clear
                </button>
            `;
            handsList.appendChild(handItem);
        });
        
        // Add event listeners to clear buttons
        document.querySelectorAll('.clear-hand').forEach(button => {
            button.addEventListener('click', function() {
                const eventId = this.getAttribute('data-event-id');
                clearRaisedHand(eventId);
            });
        });
    }
    
    function clearRaisedHand(eventId) {
        fetch('api/hand_raise_operations.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                action: 'clear_hand',
                class_id: classId,
                event_id: eventId
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                getRaisedHands(); // Refresh the list
            }
        })
        .catch(error => {
            console.error('Error clearing hand:', error);
        });
    }
    
    // Check for raised hands every 2 seconds
    setInterval(getRaisedHands, 2000);
    <?php endif; ?>

    // Student Controls (Teacher only)
    <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'teacher'): ?>
    function setupStudentControls() {
        const controls = ['chat', 'polls', 'raise_hand', 'whiteboard'];
        
        controls.forEach(control => {
            const checkbox = document.getElementById(`enable-${control}`);
            if (checkbox) {
                checkbox.addEventListener('change', function() {
                    updateControl(control, this.checked);
                });
            }
        });
    }

    function updateControl(control, enabled) {
        studentControls[control.replace('_', '')] = enabled;
        
        fetch('api/class_controls.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                action: 'update_controls',
                class_id: classId,
                teacher_id: userId,
                [`enable_${control}`]: enabled ? 1 : 0
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log(`Control ${control} updated to: ${enabled}`);
            }
        })
        .catch(error => {
            console.error('Error updating control:', error);
        });
    }
    <?php endif; ?>

    // Whiteboard Functionality
    function initWhiteboard() {
        const canvas = document.getElementById('whiteboard');
        const ctx = canvas.getContext('2d');
        let isDrawing = false;
        let lastX = 0;
        let lastY = 0;
        let currentTool = 'pen';
        let currentColor = '#000000';
        let currentSize = 2;

        // Set white background
        ctx.fillStyle = 'white';
        ctx.fillRect(0, 0, canvas.width, canvas.height);

        // Drawing functions
        function startDrawing(e) {
            isDrawing = true;
            [lastX, lastY] = [e.offsetX, e.offsetY];
        }

        function draw(e) {
            if (!isDrawing) return;
            
            ctx.beginPath();
            ctx.moveTo(lastX, lastY);
            ctx.lineTo(e.offsetX, e.offsetY);
            ctx.strokeStyle = currentTool === 'eraser' ? 'white' : currentColor;
            ctx.lineWidth = currentSize * (currentTool === 'eraser' ? 5 : 1);
            ctx.lineCap = 'round';
            ctx.stroke();
            
            [lastX, lastY] = [e.offsetX, e.offsetY];
        }

        function stopDrawing() {
            isDrawing = false;
        }

        // Event listeners
        canvas.addEventListener('mousedown', startDrawing);
        canvas.addEventListener('mousemove', draw);
        canvas.addEventListener('mouseup', stopDrawing);
        canvas.addEventListener('mouseout', stopDrawing);

        // Tool buttons
        document.getElementById('whiteboard-pen').addEventListener('click', () => {
            currentTool = 'pen';
        });

        document.getElementById('whiteboard-eraser').addEventListener('click', () => {
            currentTool = 'eraser';
        });

        document.getElementById('whiteboard-color').addEventListener('change', (e) => {
            currentColor = e.target.value;
        });

        document.getElementById('whiteboard-size').addEventListener('change', (e) => {
            currentSize = parseInt(e.target.value);
        });

        document.getElementById('whiteboard-clear').addEventListener('click', () => {
            ctx.fillStyle = 'white';
            ctx.fillRect(0, 0, canvas.width, canvas.height);
        });

        document.getElementById('whiteboard-close').addEventListener('click', () => {
            document.getElementById('whiteboard-container').style.display = 'none';
            whiteboardActive = false;
        });
    }

    // Toggle whiteboard
    <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'teacher'): ?>
    document.getElementById('whiteboard-toggle').addEventListener('click', () => {
        const whiteboard = document.getElementById('whiteboard-container');
        whiteboard.style.display = whiteboard.style.display === 'none' ? 'block' : 'none';
        whiteboardActive = !whiteboardActive;
        
        if (whiteboardActive) {
            initWhiteboard();
        }
    });
    <?php else: ?>
    document.getElementById('student-whiteboard').addEventListener('click', () => {
        if (!studentControls.whiteboard) {
            alert('Whiteboard is disabled by teacher');
            return;
        }
        const whiteboard = document.getElementById('whiteboard-container');
        whiteboard.style.display = whiteboard.style.display === 'none' ? 'block' : 'none';
        whiteboardActive = !whiteboardActive;
        
        if (whiteboardActive) {
            initWhiteboard();
        }
    });
    <?php endif; ?>

    // Class Management
    <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'teacher'): ?>
    document.getElementById('end-class').addEventListener('click', () => {
        if (confirm('Are you sure you want to end this class?')) {
            fetch('api/class_operations.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    action: 'end_class',
                    class_id: classId
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Class ended successfully');
                    window.location.href = 'my_classes.php';
                } else {
                    alert('Error ending class: ' + data.error);
                }
            })
            .catch(error => {
                console.error('Error ending class:', error);
                alert('Network error while ending class');
            });
        }
    });

    // Export attendance
    document.getElementById('export-attendance').addEventListener('click', () => {
        window.open(`api/attendance_operation.php?action=export_attendance&class_id=${classId}`, '_blank');
    });
    <?php endif; ?>

    // Attendance Management
    function updateAttendanceList() {
        fetch('api/attendance_operation.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                action: 'get_attendance',
                class_id: classId
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const attendanceList = document.getElementById('attendance-list');
                attendanceList.innerHTML = '';
                
                if (data.attendance.length > 0) {
                    const list = document.createElement('ul');
                    list.className = 'unstyled';
                    
                    data.attendance.forEach(attendee => {
                        const item = document.createElement('li');
                        item.innerHTML = `
                            <i class="icon-user"></i> ${attendee.name} 
                            (${attendee.enrollment_no})
                            <small class="text-muted">- ${attendee.join_time}</small>
                            <span class="badge ${attendee.status === 'Online' ? 'badge-success' : 'badge-warning'}">
                                ${attendee.status}
                            </span>
                        `;
                        list.appendChild(item);
                    });
                    
                    attendanceList.appendChild(list);
                } else {
                    attendanceList.innerHTML = '<p>No attendees yet</p>';
                }
            }
        });
    }

    function logAttendanceExit() {
        fetch('api/attendance_operation.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                action: 'log_exit',
                class_id: classId,
                user_id: userId,
                user_type: userType
            })
        })
        .catch(error => {
            console.error('Error logging exit:', error);
        });
    }

    // Load student controls on page load
    function loadStudentControls() {
        fetch('api/class_controls.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                action: 'get_controls',
                class_id: classId
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                studentControls = {
                    chat: data.controls.enable_chat == 1,
                    polls: data.controls.enable_polls == 1,
                    raiseHand: data.controls.enable_raise_hand == 1,
                    whiteboard: data.controls.enable_whiteboard == 1
                };
                updateUIForControls();
            }
        })
        .catch(error => {
            console.error('Error loading controls:', error);
        });
    }

    function updateUIForControls() {
        // Update UI based on controls
        if (userType === 'student') {
            document.getElementById('chat-input').disabled = !studentControls.chat;
            document.getElementById('send-message').disabled = !studentControls.chat;
            
            if (!studentControls.raiseHand) {
                document.getElementById('raise-hand').style.display = 'none';
            }
            if (!studentControls.whiteboard) {
                document.getElementById('student-whiteboard').style.display = 'none';
            }
        }
    }

    // Initialize everything when page loads
    document.addEventListener('DOMContentLoaded', function() {
        loadStudentControls();
        updateAttendanceList();
        
        <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'teacher'): ?>
        setupStudentControls();
        setInterval(updateAttendanceList, 10000); // Update every 10 seconds
        <?php endif; ?>
        
        // Handle page unload
        window.addEventListener('beforeunload', () => {
            logAttendanceExit();
        });
    });

    // Network monitoring for students
    <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'student'): ?>
    api.addListener('endpointStatsReceived', (stats) => {
        // Log network stats
        fetch('api/log_network.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                class_id: classId,
                student_id: userId,
                bitrate: stats.bitrate || 0,
                packet_loss: stats.packetLoss || 0
            })
        });
    });
    <?php endif; ?>
    </script>
</body>
</html>