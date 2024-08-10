# PHP User Authentication System

This is a simple PHP-based web application that handles user authentication, including registration, login, password reset with OTP (One-Time Password), and access control. The application includes both frontend and backend validation to ensure data integrity and security.

## Features

- **User Registration**: Allows users to register with a username, email, and password.
- **User Login**: Authenticates users using email and password, with session management.
- **Password Storage**: Securely stores passwords using hashing (bcrypt).
- **Password Reset**: Allows users to reset their password via email-based OTP (One-Time Password).
- **OTP Validation**: Validates the OTP and its expiry time before allowing password reset.
- **Access Control**: Restricts access to certain pages or features for authenticated users only.
- **Form Validation**: Ensures data integrity with both frontend and backend validation. Username can include spaces but no special characters.

## Technologies Used

- **PHP**: Server-side scripting language.
- **MySQL**: Database for storing user information.
- **HTML/CSS**: Frontend structure and styling.
- **JavaScript**: Client-side validation.

## Installation

**Clone the repository**:
`bash
    git clone https://github.com/ajantait08/Innovins_Task.git
    `

**Navigate to the project directory**:
`bash
    cd Innovins_Task
    `

**Set up the database**: - Create a new MySQL database. - Import the `database_Innovins_task.sql` file (included in the repository) to set up the necessary tables. - Update the database connection settings in `db.php` with your MySQL credentials.

**Configure your web server**: - Ensure your server supports PHP and has MySQL installed. - Place the project files in the server's web root (e.g., `htdocs` for XAMPP, `www` for WAMP).

**Run the application**: - Open a web browser and navigate to your local server (e.g., `http://localhost/Innovins_Task/Task_2`).

## Project Structure

- `index.php`: The login page of the application.
- `register.php`: The registration page.
- `reset_password.php`: The password-reset page where users enter their OTP and new password.
- `forgot_password.php` : The forgot-password page where users enter their registered email ID , so that the reset password details and the link can be sent to the registered email ID.
- `db.php`: Database connection file.
- `logout.php`: Logs out the user and destroys the session.
- `auth_check.php` : Provides access to certain page of the application only to the authenticated users and session management is used to maintain the user's login state.
- `dashboard.php` : The protected page which can only be accessed by authenticated users.

## Screenshots

The screenshot of the working mail functionality has also been attached , in the `Task_2 working folder`

## Usage

### 1. User Registration

- Navigate to the registration page (`register.php`).
- Enter your username, email, and password.
- The form will validate your inputs before submission.

### 2. User Login

- Navigate to the login page (`index.php`).
- Enter your registered email and password.
- If the credentials are correct, you will be logged in and redirected to the homepage.

### 3. Password Reset

- If you forget your password, click on the "Forgot Password" link on the login page.
- Enter your registered email to receive an OTP.
- Enter the OTP and your new password on the reset password page (`reset_password.php`).

### 4. Access Control

- Certain pages require authentication. If you try to access these pages without logging in, you will be redirected to the login page.

## Validation Logic

### Frontend (JavaScript)

- **Email**: Validates format using a regular expression.
- **OTP**: Ensures it is exactly 4 digits long and numeric.
- **Username**: Allows letters, numbers, and spaces (no special characters).
- **Password**: Must be at least 8 characters long.

### Backend (PHP)

- **Email**: Checks format and whether the email is registered.
- **OTP**: Validates length and matches it against the stored OTP in the database.
- **Username**: Ensures it contains only letters, numbers, and spaces.
- **Password**: Validates length and hashes the password before storing it.

## Security Considerations

- Passwords are hashed using `password_hash()` (bcrypt) before being stored in the database.
- OTPs are stored with an expiry time to prevent reuse.
- Sessions are used to manage user authentication status.

## Contact

For any inquiries, please contact [ajanta.ghosh08@gmail.com].
