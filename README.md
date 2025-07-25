# 📝 Blog Application

This is a simple Blog Application built using **PHP** and **MySQL**, with features like user registration, login, content management, and CRUD operations. The UI uses Bootstrap for styling, ensuring a clean and responsive layout.

---

## 🚀 Features

- 🔐 **User Authentication**
  - Register and Login system
  - Secure password hashing using `password_hash()`

- 📄 **Dashboard**
  - View and manage blog posts or product entries
  - Add, Edit, Delete functionality

- 📤 **Image Upload**
  - Upload images with each post (stored in `uploads/`)

- 🗂️ **Database Integration**
  - MySQL backend for storing user and post data
  - `db.php` handles database connectivity

---
1. **Clone the Repository**
   ```bash
   git clone https://github.com/saniyaph/Blog_application.git
   cd Blog_application

2. Set Up the Database

Create a MySQL database (e.g., blog_app)

Import the SQL file (if available) into phpMyAdmin or via terminal

Open db.php and update your DB credentials:
$conn = new mysqli("localhost", "root", "", "blog_app");

3. Run the Application    

Move the folder to your htdocs/ directory (XAMPP)

Start Apache & MySQL from XAMPP Control Panel

Access the app at:
http://localhost/Blog_application/login.php
