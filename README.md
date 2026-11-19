#  Learning Management System (LMS)

A web-based **College Learning Management System** designed to simplify academic management, online learning, communication, and collaboration between students and teachers.

The platform provides dedicated dashboards and tools for managing classes, assignments, quizzes, attendance, announcements, learning materials, and academic activities.

##  Key Features

###  Student Portal
- Student registration and login.
- Personalized student dashboard.
- View enrolled classes and subjects.
- Access assignments and submit coursework.
- Participate in online quizzes.
- View announcements and notifications.
- Access downloadable study materials.
- View class schedules and attendance.
- Communicate with teachers and classmates.
- Access previous class recordings.

###  Teacher Portal
- Teacher registration and login.
- Dedicated teacher dashboard.
- Create and manage online classes.
- Add and manage students.
- Upload assignments and learning resources.
- Create quizzes and questions.
- Manage class announcements.
- Schedule academic events.
- Monitor student attendance.
- Review submissions and save grades.
- Manage class recordings.
- Communicate with students.

###  Administration
- Administrative management interface.
- Manage platform-related academic operations.
- Access administrative tools and resources.

###  Learning & Collaboration
- Assignment management.
- Online quiz management.
- Class calendar and scheduling.
- Digital resource sharing.
- Messaging and notifications.
- Class recording management.
- Student progress tracking.

##  Technologies Used

| Technology | Purpose |
|---|---|
| PHP | Backend development |
| MySQL | Database management |
| HTML5 | Page structure |
| CSS3 | Styling |
| JavaScript | Frontend interactivity |
| Bootstrap | Responsive UI components |
| AJAX | Asynchronous requests |
| Apache | Local web server |

##  Project Structure

```text
Learning-Mangement-System/
│
├── admin/                  # Administration module
├── api/                    # API and AJAX endpoints
├── assets/
│   ├── css/                # Stylesheets
│   ├── js/                 # JavaScript files
│   └── images/             # Images and resources
│
├── public/                 # Public application entry
├── src/
│   ├── Frontend/
│   │   ├── Pages/
│   │   │   ├── Public/
│   │   │   ├── Student/
│   │   │   ├── Teacher/
│   │   │   └── Classes/
│   │   └── Views/
│   │
│   └── Backend/
│       ├── Admin/
│       ├── Api/
│       ├── Actions/
│       ├── Services/
│       └── Config/
│
├── database/
│   ├── migrations/
│   └── seeds/
│
├── db/                     # Database compatibility path
├── recordings/             # Class recordings
├── storage/                # Application storage
├── docs/                   # Project documentation
├── tests/                  # Test directory
│
└── README.md
```

##  Installation & Setup

### Prerequisites

- PHP 8.x (or compatible version)
- MySQL
- Apache Server
- XAMPP
- Web Browser
- Git

### 1. Clone the Repository

```bash
git clone https://github.com/jagyanseni318/Learning-Mangement-System.git
```

### 2. Move into the Project

```bash
cd Learning-Mangement-System
```

### 3. Configure the Database

1. Start Apache and MySQL using XAMPP.
2. Open phpMyAdmin.
3. Create the required database.
4. Import the SQL database dump provided with the project.
5. Configure database connection settings in the application's database configuration files.

### 4. Configure the Project

Check the database configuration:

```text
src/Backend/Config/
```

Update the database host, username, password, and database name according to your local environment.

### 5. Run the Application

Place the project inside your XAMPP `htdocs` directory.

Open:

```text
http://localhost/Learning-Mangement-System/
```

**Note:** Configure Apache's document root and project paths according to the repository's current PHP entry points. Database setup requires the project's actual SQL schema.

##  Project Objectives

- Digitize traditional college learning activities.
- Improve communication between students and teachers.
- Simplify assignment and examination management.
- Provide centralized access to educational resources.
- Support organized online classroom management.
- Improve accessibility to academic information.

##  Future Enhancements

- AI-powered personalized learning recommendations.
- Automated assignment evaluation.
- Advanced student performance analytics.
- Live video conferencing integration.
- Mobile application support.
- AI-powered educational chatbot.
- Advanced role-based access control.

##  Contributors

Developed as an academic web development project.

##  License

This project is available for educational and learning purposes. Please check the repository's licensing terms before redistribution or commercial use.

---

 **If you find this project useful, consider giving it a star!**

**Repository:** https://github.com/jagyanseni318/Learning-Mangement-System
