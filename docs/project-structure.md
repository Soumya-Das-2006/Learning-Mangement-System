# Project Structure and Migration Sequence

The source files are now organized into the structure below. Root-level PHP
names remain as compatibility symlinks so existing browser URLs, form actions,
redirects, and relative includes continue to work during the migration.

## Current Runtime Layout

The current folders already represent active parts of the application. Keep these paths stable until PHP includes, browser URLs, upload paths, and deployment configuration are migrated together.

| Current path | Responsibility | Target location |
| --- | --- | --- |
| `admin/` | Admin screens, handlers, templates, uploads, Bootstrap and vendor libraries | `src/Backend/Admin/` and `public/assets/vendor/` |
| `api/` | AJAX/API endpoints | `src/Backend/Api/` |
| `assets/css/`, `assets/js/` | Application styles and scripts | `public/assets/css/`, `public/assets/js/` |
| `db/` symlink | Compatibility path for SQL dumps | `database/migrations/` |
| `recordings/` symlink | Compatibility path for generated class recordings | `storage/recordings/` |
| repository-root PHP symlinks | Compatibility entry points for the reorganized PHP source | `src/Frontend/` and `src/Backend/` (see inventory below) |

## Implemented Layout

```text
.
├── public/                         # Web document root and browser-served assets
│   ├── index.php                   # Front controller / public entry point
│   └── assets/
│       ├── css/
│       ├── js/
│       ├── images/
│       └── vendor/
├── src/
│   ├── Frontend/
│   │   ├── Pages/
│   │   │   ├── Public/
│   │   │   ├── Student/
│   │   │   ├── Teacher/
│   │   │   └── Classes/
│   │   └── Views/
│   │       ├── Layout/
│   │       ├── Navigation/
│   │       ├── Sidebar/
│   │       ├── Modals/
│   │       └── Fragments/
│   └── Backend/
│       ├── Admin/
│       ├── Api/
│       ├── Actions/
│       ├── Services/
│       └── Config/
├── database/
│   ├── migrations/
│   └── seeds/
├── storage/
│   ├── uploads/
│   └── recordings/
├── docs/
├── tests/
└── root PHP symlinks              # Backward-compatible legacy entry points
```

The layout separates browser-facing pages from state-changing handlers, shared
view fragments, application assets, and private/generated data. The existing
`admin/`, `api/`, and `assets/` directories remain in place because current
runtime paths depend on them. They can be moved into `public/` in a later
compatibility-aware deployment change.

## Root PHP File Placement Map

This map records where the PHP files now live. Their original root names are
symlinks for compatibility. Files that are included by other pages should
continue to be referenced through the compatibility names until include paths
are deliberately modernized.

### Frontend pages

`src/Frontend/Pages/Public/`: `about.php`, `campuses.php`, `developers.php`, `index.php`, `login.php`, `signup_student.php`, `signup_teacher.php`, `student_signup.php`, `teacher_signup.php`.

`src/Frontend/Pages/Student/`: `announcements_student.php`, `assignment_student.php`, `backpack.php`, `change_password_student.php`, `class_calendar_student.php`, `dashboard_student.php`, `downloadable_student.php`, `my_classmates.php`, `student_message.php`, `student_message_student.php`, `student_notification.php`, `student_online.php`, `student_quiz_list.php`, `subject_overview_student.php`.

`src/Frontend/Pages/Teacher/`: `add_announcement.php`, `add_assignment.php`, `add_class.php`, `add_downloadable.php`, `add_previous_class.php`, `add_student.php`, `add_subject_overview.php`, `announcements.php`, `assignment.php`, `calendar_of_events.php`, `change_password_teacher.php`, `create_class.php`, `dasboard_teacher.php`, `downloadable.php`, `manage_recordings.php`, `my_classes.php`, `my_students.php`, `notification_teacher.php`, `profile_teacher.php`, `teacher_class.php`, `teacher_message.php`, `teacher_message_teacher.php`, `teacher_online.php`, `teacher_quiz.php`, `teacher_share.php`.

`src/Frontend/Pages/Classes/`: `class_attendance.php`, `class_calendar.php`, `class_quiz.php`, `class_recordings.php`, `edit_class.php`, `edit_question.php`, `edit_quiz.php`, `edit_subject_overview.php`, `my_classmates_link.php`, `previous_class.php`, `progress.php`, `quiz_question.php`, `search_class.php`, `subject_overview.php`, `view_submit_assignment.php`.

### Frontend shared views

`src/Frontend/Views/Layout/`: `footer.php`, `header.php`, `header_dashboard.php`, `script.php`, `title_index.php`.

`src/Frontend/Views/Navigation/`: `link.php`, `link_about.php`, `navbar_about.php`, `navbar_student.php`, `navbar_teacher.php`.

`src/Frontend/Views/Sidebar/`: `assignment_sidebar.php`, `backpack_sidebar.php`, `backpack_sidebar_teacher.php`, `calendar_sidebar.php`, `calendar_student_sidebar.php`, `change_password_sidebar.php`, `change_password_sidebar_student.php`, `class_sidebar.php`, `classes_teacher_slidebar.php`, `downloadable_sidebar.php`, `downloadable_sidebar_student.php`, `my_students_breadcrums.php`, `online_teacher_slidebar.php`, `quiz_sidebar_teacher.php`, `share_sidebar_teacher.php`, `student_message_sidebar.php`, `student_notification_sidebar.php`, `student_online_sidebar.php`, `student_sidebar.php`, `submit_assignment_sidebar.php`, `teacher_add_announcement_sidebar.php`, `teacher_add_assignment_sidebar.php`, `teacher_add_downloadable_sidebar.php`, `teacher_message_sidebar.php`, `teacher_notification_sidebar.php`, `teacher_online_sidebar.php`, `teacher_right_sidebar.php`, `teacher_sidebar.php`.

`src/Frontend/Views/Modals/`: `avatar_modal.php`, `avatar_modal_student.php`, `copy_to_backpack_modal.php`, `delete_assigment_modal.php`, `delete_class_modal.php`, `delete_download_modal.php`, `modal_backpack_delete.php`, `modal_delete_class_quiz.php`, `modal_delete_quiz.php`, `modal_delete_quiz_question.php`, `modal_share_delete.php`, `remove_announcements_modal.php`, `remove_inbox_message_modal.php`, `remove_sent_message_modal.php`, `remove_student_modal.php`, `reply_inbox_message_modal.php`, `reply_inbox_message_modal_student.php`.

### Backend handlers and shared runtime

`src/Backend/Actions/` (group into `Assignments/`, `Classes/`, `Files/`, `Messaging/`, `Quizzes/`, `Students/`, and `Users/` during migration): `add_announcement_save.php`, `add_assignment_save.php`, `add_class_action.php`, `add_class_event.php`, `add_downloadable_save.php`, `add_question.php`, `add_quiz.php`, `add_quiz_to_class.php`, `add_student_action.php`, `assign_save.php`, `copy_file.php`, `copy_file_student.php`, `create_class_save.php`, `create_message.php`, `create_message_student.php`, `create_message_teacher.php`, `delete_assignment.php`, `delete_backpack.php`, `delete_backpack_teacher.php`, `delete_class.php`, `delete_class_event.php`, `delete_class_quiz.php`, `delete_file.php`, `delete_quiz.php`, `delete_quiz_question.php`, `delete_recordings.php`, `delete_shared.php`, `download_recording.php`, `edit_post.php`, `join_class.php`, `logout.php`, `merge_chunks.php`, `move_to_school_year.php`, `play_recording.php`, `read.php`, `read_message.php`, `read_teacher.php`, `remove_announcements.php`, `remove_inbox_message.php`, `remove_sent_message.php`, `remove_student.php`, `reply.php`, `save_grade.php`, `save_recording.php`, `send_message.php`, `send_message_student.php`, `send_message_student_to_student.php`, `send_message_teacher_to_student.php`, `submit_assignment.php`, `take_test.php`, `update_class.php`, `update_password.php`, `update_password_student.php`, `upload_assignment.php`, `upload_chunk.php`, `upload_save.php`, `upload_save_student.php`.

`src/Backend/Services/`: `calendar_script.php`, `class_calendar_script.php`, `count.php`, `history.php`, `notification_system.php`, `opener_db.php`, `timer.ajax.php`, `web_control.php`.

`src/Backend/Config/`: `dbConnector.php`, `dbcon.php`, `session.php`. `src/Backend/Actions/`: `check_database.php`.

### Feature fragments and files to classify by call site

These are content/link fragments, recorder UI, form fragments, or files whose role needs call-site inspection before assigning a final destination: `annoucement_link.php`, `annoucement_link_student.php`, `assignment_link.php`, `assignment_link_student.php`, `create_message_student_student.php`, `directories.php`, `downloadable_link.php`, `downloadable_link_student.php`, `login_form.php`, `my_students_breadcrums.php`, `print_student.php`, `progress_link_student.php`, `quiz_link.php`, `recordings.php`, `search_other_class.php`, `sent_message.php`, `sent_message_student.php`, `student_avatar.php`, `student_message_sidebar.php`, `student_quiz_link.php`, `student_signin_form.php`, `subject_overview_link.php`, `subject_overview_link_student.php`, `submit_assignment_table.php`, `teacher_avatar.php`, `teacher_backack.php`, `teacher_count.php`, `student_signup.php`, `signup_teacher_form.php`.

## Follow-up Migration Sequence

1. **Stabilize the current app.** Resolve existing merge conflicts and verify the database connection, login flow, page includes, uploads, and recording playback.
2. **Add a compatibility bootstrap.** Centralize configuration and define stable URL and filesystem roots before removing the compatibility symlinks.
3. **Separate shared views from handlers.** Move one feature at a time, update its `include`/`require`, form `action`, redirect, and asset paths, and test student and teacher flows after each feature.
4. **Move assets and admin code.** Update browser paths, upload destinations, and vendor references as a single change per area.
5. **Move generated data last.** Change recording/upload storage only after download and playback paths have been migrated; keep generated/private files outside the public document root where deployment allows.
6. **Remove compatibility files only after verification.** Search for old paths and test all routes before deleting any old entry point.

## Migration Safety Notes

- PHP files currently refer to each other using relative paths, and browser links commonly assume the repository root is the web root.
- Preserve existing misspelled filenames and route names during the first migration; fix naming separately so path changes remain reviewable.
- `dbcon.php` and `directories.php` currently contain unresolved merge-conflict markers. Resolve these before linting or migrating the affected database-dependent code.
- `admin/vendors/` is third-party code; do not reorganize its internal files as part of the application migration.