=====Evan New Student Roster Application=====
Thank you for your consideration. 
This is a Laravel 12 web application for managing a roster of students, including authentication and CRUD functionality.

==REQUIREMENTS==
-PHP 8.2+
-Composer
-Node.js 22.x or 20.19+ (for Vite)
-NPM
-SQLite (default)

==INSTALLATION/STARTUP==
1.Clone repository or extract the zip
2.Install PHP dependencies with Composer
3.Create .env file from example copy and generate app key
4.Create a new database using your preferred method (PHPMyAdmin, MySQL Workbench, command line, etc.).
5.Run migrations and seeders
6.Install node dependencies and start Vite
7.Serve the application
8.The application will be accessible at http://127.0.0.1:8000


==FEATURES==
-Login and authentication (only logged-in users can view/edit student roster).
-List, add, edit, and delete students from roster.
-Soft deletes for students.
-Server-side validation for student data.
-Seeders and factories for generating test data.

==DEFAULT USER==
Seeder creates default credentials:
EMAIL:admin@test.com
PW:admin