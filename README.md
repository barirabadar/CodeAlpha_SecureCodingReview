# Secure Coding Review

## Project Overview
This project demonstrates common web application security vulnerabilities and their prevention using PHP and MySQL.

## Features
- Demonstration of SQL Injection vulnerabilities.
- Secure login using prepared statements.
- Password hashing and verification.
- Secure session management.
- Protection against Cross-Site Scripting (XSS).

## Technologies Used
- PHP
- MySQL
- HTML
- XAMPP
- phpMyAdmin

## Installation and Setup
1. Install and open XAMPP.
2. Start Apache and MySQL.
3. Copy the project folder into the htdocs directory.
4. Open phpMyAdmin.
5. Import schema.sql.
6. Generate a password hash using generate_password.php.
7. Insert a test user into the users table.
8. Open the secure login page in your browser.

## Test Credentials
Username: demo_user

Password: ChangeThisDemoPassword!

## Project Files
- secure_login.php
- vulnerable_login.php
- generate_password.php
- schema.sql
- SECURE_CODING_REVIEW_REPORT.md

## Security Note
The vulnerable login file is for educational demonstration only. Never deploy vulnerable code on a public server.

## Conclusion
This project demonstrates how secure coding practices can protect web applications and user data.
