# Recipe Project 🍽️

A simple, dynamic recipe web application built using **PHP**, **MySQL**, **HTML**, and **CSS**. Users can explore a variety of recipes, view ingredients, and follow step-by-step instructions to cook delicious meals.

---

## 🌟 Features

- 🗂️ Recipe categories
- 📋 Detailed ingredients & steps
- 🔍 Search recipes by name or category
- ➕ Add and manage recipes (admin only)
- 🎨 Clean and responsive UI

---

## 🛠️ Tech Stack

- **Frontend**: HTML, CSS
- **Backend**: PHP
- **Database**: MySQL
- **Server**: XAMPP (Apache + MySQL)

---

## 🚀 Setup Instructions

1. **Clone the repository**  
   ```bash
   git clone https://github.com/anikket7/receipe_project.git
   cd receipe_project
   ## 🚀 Setup Instructions

2. **Start XAMPP**
   - Open **XAMPP Control Panel**
   - Click **Start** for:
     - Apache
     - MySQL

3. **Import the database**
   - Open your browser and go to:  
     `http://localhost/phpmyadmin`
   - Create a new database (e.g., `recipe_db`)
   - Import the `.sql` file from the project folder

4. **Configure the database**
   - Open the project folder
   - Edit `db.php` (or your config file) and update the following:
     - **Database name**
     - **Username** (usually `root`)
     - **Password** (often blank in XAMPP)

5. **Run the application**
   - Move the project folder to:  
     `C:\xampp\htdocs`
   - In your browser, go to:  
     `http://localhost/receipe_project/`
