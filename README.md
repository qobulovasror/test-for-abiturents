# Test app

This is a simple test app application built using PHP and MySQL. It allows users to create, read, update, and delete quiz

## Features

1. User Authentication: Users can sign up for an account and log in to create, edit, or delete their quiz.
2. CRUD Operations: Full CRUD (Create, Read, Update, Delete) functionality for quiz.
3. Responsive Design: The application is designed to be responsive and accessible across various devices.
4. Security: User authentication and input validation to ensure security.
5. Search Functionality: Users can search for specific quiz based on keywords or categories.
6. Categories: Ability to categorize blog posts for better organization and navigation.

## Requirements

- PHP 7.x or higher
- MySQL
- Web server (e.g., Apache, Nginx)
- Modern web browser

## Installation

1. Clone this repository to your local machine:
   ```bash
    git clone https://github.com/qobulovasror/test-for-abiturents.git
   ```  
2. Import the included SQL file (database.sql) into your MySQL database to set up the necessary tables.
3. Configure the database connection in script/main.php:
```php
    <?php
    	// Connecttion server
    	$servername="localhost";
    	$username="your_database_username";
    	$password="your_database_username";
    	$dbname="your_database_name";
    	$link=mysqli_connect($servername,$username,$password,$dbname);
    
    	if($connect -> conncet_error){
    		die("Bo'glanishda xatolik: ".conncet_error);
    	}
    ?>
   ```
4. Start your web server.
5. Access the application through your web browser.


__Thank you for using our test App! Happy Coding! 🚀__
   
