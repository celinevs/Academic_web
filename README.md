# 🎓 Academic Management Website
This is a web-based academic management system that supports three types of user roles: Admin, Teacher, and Student. All academic and user data are stored in a SQL database based on the relational schema provided.

# 🔐 User Roles & Features
1. Admin
As an Admin, you can:

🔹 Add and manage Teachers

🔹 Add and manage Students

🔹 Create and edit Courses

🔹 Manage Enrollments (register students into courses)

2. Teacher
As a Teacher, you can:

👤 View your profile

📘 View the list of courses you are teaching

3. Student
As a Student, you can:

👤 View your profile

📝 View your academic transcript (grades for assignments, tests, and final exams in enrolled courses)

# 🗃️ Database Structure
All data is stored in a SQL database with the following main tables and relationships:

📦 Tables:
Student: Stores student information (s_id as Primary Key)

Teacher: Stores teacher information (t_id as Primary Key)

Course: Represents courses taught by teachers (linked to Teacher)

Enrolment: Connects students to the courses they take, including their grades (assignment, test, final)

# 🔄 Key Relationships:
Course.t_id → references Teacher.t_id

Enrolment.s_id → references Student.s_id

Enrolment.c_id → references Course.c_id

# 🚪 Login & Access
🌐 Login page with role selection:

Admin

Teacher

Student

Each role is redirected to their respective dashboard with role-based access.
