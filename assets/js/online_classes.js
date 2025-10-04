// Online Classes JavaScript functionality

// Network monitoring and recording functions
class NetworkMonitor {
    constructor() {
        this.bitrateThreshold = 200000; // 200 kbps
        this.packetLossThreshold = 0.1; // 10%
        this.isMonitoring = false;
        this.recordingInterval = null;
    }
    
    startMonitoring(classId, userId) {
        if (this.isMonitoring) return;
        
        this.isMonitoring = true;
        console.log('Network monitoring started for class:', classId);
        
        // Simulate network monitoring (in real implementation, this would use WebRTC stats)
        this.recordingInterval = setInterval(() => {
            this.checkNetworkStatus(classId, userId);
        }, 5000); // Check every 5 seconds
    }
    
    stopMonitoring() {
        if (!this.isMonitoring) return;
        
        this.isMonitoring = false;
        clearInterval(this.recordingInterval);
        console.log('Network monitoring stopped');
    }
    
    checkNetworkStatus(classId, userId) {
        // Simulate network conditions (in real implementation, use actual WebRTC stats)
        const bitrate = Math.random() * 500000; // Random bitrate between 0-500 kbps
        const packetLoss = Math.random() * 0.2; // Random packet loss between 0-20%
        
        // Update UI
        this.updateNetworkIndicator(bitrate, packetLoss);
        
        // Log to server
        this.logNetworkStatus(classId, userId, bitrate, packetLoss);
        
        // Check if recording should start
        if (bitrate < this.bitrateThreshold || packetLoss > this.packetLossThreshold) {
            this.triggerRecording(classId, userId, 'poor_network');
        }
    }
    
    updateNetworkIndicator(bitrate, packetLoss) {
        let indicator = document.getElementById('network-indicator');
        if (!indicator) {
            indicator = document.createElement('div');
            indicator.id = 'network-indicator';
            indicator.className = 'network-indicator';
            document.body.appendChild(indicator);
        }
        
        const status = bitrate < this.bitrateThreshold || packetLoss > this.packetLossThreshold ? 'poor' : 'good';
        indicator.textContent = `Network: ${status} (${Math.round(bitrate/1000)}kbps, ${Math.round(packetLoss*100)}% loss)`;
        indicator.className = `network-indicator ${status}`;
    }
    
    logNetworkStatus(classId, userId, bitrate, packetLoss) {
        // Send network status to server
        fetch('api/log_network.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                class_id: classId,
                student_id: userId,
                bitrate: bitrate,
                packet_loss: packetLoss
            })
        }).catch(error => {
            console.error('Error logging network status:', error);
        });
    }
    
    triggerRecording(classId, userId, reason) {
        console.log(`Recording triggered due to: ${reason}`);
        
        // Show recording notice
        const notice = document.getElementById('recording-notice');
        if (notice) {
            notice.style.display = 'block';
        }
        
        // In a real implementation, this would start media recording
        // For now, we'll just simulate it
        this.simulateRecording(classId, userId);
    }
    
    simulateRecording(classId, userId) {
        console.log('Simulating recording for class:', classId);
        
        // In a real implementation, this would:
        // 1. Get media stream from user
        // 2. Create MediaRecorder instance
        // 3. Record chunks and upload them
    }
}

// Initialize when document is ready
document.addEventListener('DOMContentLoaded', function() {
    // Check if we're on a class page
    const urlParams = new URLSearchParams(window.location.search);
    const classId = urlParams.get('class_id');
    
    if (classId && typeof JitsiMeetExternalAPI !== 'undefined') {
        // Get user ID from session
        const userId = document.body.classList.contains('student-view') ? '<?php echo $session_id; ?>' : null;
        
        // Initialize network monitor for students
        if (userId) {
            const monitor = new NetworkMonitor();
            monitor.startMonitoring(classId, userId);
            
            // Clean up when leaving the page
            window.addEventListener('beforeunload', function() {
                monitor.stopMonitoring();
                
                // Log attendance departure for students
                fetch('api/log_attendance.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        class_id: classId,
                        student_id: userId,
                        action: 'leave'
                    })
                });
            });
        }
    }
    
    // Recording player functionality
    const videoPlayers = document.querySelectorAll('video');
    videoPlayers.forEach(player => {
        player.addEventListener('play', function() {
            console.log('Recording playback started');
        });
        
        player.addEventListener('pause', function() {
            console.log('Recording playback paused');
        });
        
        player.addEventListener('ended', function() {
            console.log('Recording playback completed');
        });
    });
    
    // Class management functionality
    const classForms = document.querySelectorAll('form.class-form');
    classForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const action = this.getAttribute('action');
            
            fetch(action, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show success message
                    showNotification('Operation completed successfully', 'success');
                    
                    // Redirect or reload if needed
                    if (data.redirect) {
                        window.location.href = data.redirect;
                    } else if (data.reload) {
                        window.location.reload();
                    }
                } else {
                    // Show error message
                    showNotification(data.error || 'An error occurred', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showNotification('Network error occurred', 'error');
            });
        });
    });
    
    // Poll functionality
    const pollOptions = document.querySelectorAll('.poll-option');
    pollOptions.forEach(option => {
        option.addEventListener('click', function() {
            // Remove selected class from all options
            pollOptions.forEach(opt => opt.classList.remove('selected'));
            
            // Add selected class to clicked option
            this.classList.add('selected');
        });
    });
    
    // Vote button functionality
    const voteButton = document.getElementById('vote-poll');
    if (voteButton) {
        voteButton.addEventListener('click', function() {
            const selectedOption = document.querySelector('.poll-option.selected');
            if (!selectedOption) {
                showNotification('Please select an option', 'error');
                return;
            }
            
            const optionIndex = selectedOption.getAttribute('data-index');
            const pollId = selectedOption.getAttribute('data-poll-id');
            
            fetch('api/poll_vote.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    poll_id: pollId,
                    option_index: optionIndex,
                    student_id: '<?php echo $session_id; ?>'
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showNotification('Vote submitted successfully', 'success');
                    // Disable voting after successful submission
                    pollOptions.forEach(opt => {
                        opt.style.pointerEvents = 'none';
                    });
                    voteButton.disabled = true;
                } else {
                    showNotification(data.error || 'Error submitting vote', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showNotification('Network error occurred', 'error');
            });
        });
    }
});

// Utility function to show notifications
function showNotification(message, type = 'info') {
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `alert alert-${type} notification`;
    notification.innerHTML = `<span>${message}</span>`;

    // Append notification to body
    document.body.appendChild(notification);

    // Remove notification after 3 seconds
    setTimeout(() => {
        notification.remove();
    }, 3000);
}