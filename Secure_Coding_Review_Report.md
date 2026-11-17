# Secure Coding Review Report

## Project Overview
This project demonstrates the difference between vulnerable and secure PHP login systems using MySQL.

## Security Vulnerabilities Identified

1. **SQL Injection:** Direct SQL queries can allow attackers to manipulate database queries.
2. **Insecure Password Storage:** Storing plain-text passwords exposes user credentials.
3. **Session Security:** Weak session handling can lead to session hijacking or fixation.
4. **Error Disclosure:** Detailed database errors may reveal sensitive information.
5. **Cross-Site Scripting (XSS):** Unescaped user input can execute malicious scripts.

## Security Improvements

- Used prepared statements to prevent SQL injection.
- Used password_hash() and password_verify() for password security.
- Regenerated session IDs after successful login.
- Used generic error messages.
- Used htmlspecialchars() to prevent XSS.

## Technologies Used
- PHP
- MySQL
- HTML
- XAMPP
- phpMyAdmin

## Conclusion
This project demonstrates how secure coding practices help protect web applications and user information.
