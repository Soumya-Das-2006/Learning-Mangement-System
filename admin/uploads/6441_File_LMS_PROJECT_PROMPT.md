# 📚 Learning Management System (LMS) – Full Stack Project

## 🏆 Objective

Build a robust, feature-rich Learning Management System (LMS) for schools, colleges, or training centers, supporting:

- **Physics Wallah–style Online Classes with Recordings**
- Batch-wise access control for materials and sessions
- Role-based dashboards (Admin, Teacher, Student)
- Real-time in-app notifications and email alerts
- Full security and session management

---

## 💡 Core Features

### 1. **User Roles & Dashboard**
- **Admin**: Manage users, batches, classes, sessions, attendance, logs, all materials and recordings.
- **Teacher**: Assign batches, schedule/start live classes, upload materials, view attendance and recordings, interact via chat/polls/quizzes.
- **Student**: See own batch/classes, join live sessions, view/download batch-restricted recordings and materials, receive real-time notifications.

### 2. **Online Classes (Jitsi Meet Integration + Recording)**
- Teachers start a live class for a batch; unique Jitsi Meet room created.
- Students join via dashboard link at scheduled time.
- **Auto-recording**: If student’s network is slow (bitrate < 200kbps or packet loss > 10%), browser starts MediaRecorder (screen+mic), uploading 10–15s chunks via AJAX.
- Server merges chunks to mp4 using FFmpeg, stores under `/recordings/`, updates DB.

### 3. **Batch/Class Restricted Materials**
- Upload, view, and download study files and recordings restricted by batch/class.

### 4. **Real-Time Notifications**
- When a class starts, all students of the batch receive an in-app notification (and/or email) with subject, batch, teacher name, and a join link.
- Notification area in dashboard (bell icon/modal/area), using polling or push.

### 5. **Attendance, Chat, Polls, Q&A, Quizzes**
- AJAX endpoints for attendance log (join/leave), live chat, polls, Q&A, and quizzes—all batch/class-restricted.

### 6. **Security & Access**
- Session-based authentication for all endpoints.
- Strict role separation for admin/teacher/student.
- File upload/download validation and access control.

---

## 📂 Directory Structure (Follow Repo Conventions)

- `/admin/` — Admin features (e.g. `admin/online_class.php`)
- `/uploads/materials/` — Uploaded files
- `/recordings/` — Final mp4s
- `/recordings/tmp/` — MediaRecorder chunks
- Root-level: Teacher/student features (`teacher_online_class.php`, `live_class.php`, `view_recordings.php`, etc.)

All pages use includes:  
`include('header.php')`, `include('session.php')`, `include('dbcon.php')`, `include('navbar.php')`, `include('footer.php')`

---

## 🗄️ Database Schema (Key Tables)

- `online_class_session` (`id`, `class_id`, `teacher_id`, `batch`, `room_name`, `start_time`, `end_time`)
- `recordings` (`id`, `session_id`, `user_id`, `file_path`, `created_at`)
- `attendance` (`id`, `session_id`, `user_id`, `joined_at`, `left_at`)
- `notifications` (`id`, `user_id`, `message`, `link`, `created_at`, `is_read`)
- `chat`, `polls`, `poll_votes`, `questions`, `materials`, `quizzes` (as described in full integration spec)
- Use existing `class` and `users` tables for batch/role mapping

---

## 📝 Example Files

- `admin/online_class.php`: Admin: manage sessions, recordings, attendance.
- `teacher_online_class.php`: Teacher: schedule/start class for batch.
- `live_class.php`: Jitsi embed, auto-record, join logic for students/teachers.
- `recording_upload.php`, `recording_merge.php`: Recording upload & merging.
- `view_recordings.php`, `recording_playback.php`: Batch/class-restricted access.
- `attendance_log.php`: AJAX attendance logging.
- `chat_send.php`, `chat_fetch.php`: Live chat.
- `poll_create.php`, `poll_vote.php`, `poll_results.php`: Poll endpoints.
- `upload_materials.php`, `view_materials.php`: Materials endpoints.
- `notifications.php`: Student in-app notifications area.
- `includes/notify_class_start.php`: Notification logic for class start.

---

## 🛡️ Security

- All endpoints require session and role validation.
- File access restricted by batch/class.
- All AJAX endpoints check authentication and permissions.

---

## 🚀 Stretch Goals

- Push notifications using WebSockets.
- Analytics dashboards for attendance, engagement.
- Mobile-friendly responsive UI.

---

**Start by setting up the database, user authentication, and batch/class mapping.  
Integrate online class and notification features as described.  
Follow the repo’s includes and Bootstrap/jQuery UI conventions.**
