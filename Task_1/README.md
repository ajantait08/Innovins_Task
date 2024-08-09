# PHP MySQL User Management Script

## Description

This script demonstrates basic user management operations using PHP and MySQL. The script provides functionalities to insert, retrieve, update, and delete user records in a MySQL database. It includes error handling for database connection and queries.

## Prerequisites

- PHP 5.6 or higher
- MySQL database
- A web server (e.g., Apache)

## Installation

Clone the Repository :

```bash
  Clone or download the repository to your local machine.
```

Database Configuration :

- Open the database.php file and configure your database connection settings :

```bash
   $host = 'your_database_host';
   $username = 'your_database_username';
   $password = 'your_database_password';
   $dbname = 'your_database_name';
```

Create MySQL Database and Table :

- Create a MySQL database and a users table if they don't already exist. You can use the following SQL to create the table:

```bash
   CREATE TABLE `users` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```

Run the Script :

- Place the script in your web server's document root or any accessible directory.
- Access the script via your browser or command line.

## Usage/Examples

The script provides the following functions :

    1. insertUser($conn, $name, $email):
       Inserts a new user record into the database.
        $conn: The database connection instance.
        $name: The name of the user.
        $email: The email of the user.

    2. getUsers($conn):
       Retrieves and displays all user records from the database.

    3. updateUser($conn, $id, $name, $email):
       Updates an existing user's information based on their ID.
        $conn: The database connection instance.
        $id: The ID of the user to update.
        $name: The new name of the user.
        $email: The new email of the user.

    4. deleteUser($conn, $id):
       Deletes a user record from the database based on their ID.
        $conn: The database connection instance.
        $id: The ID of the user to delete.

## Example Output

- Insert Users: The script inserts three dummy users into the database
- Retrieve Users: Displays the list of all users.
- Update User: Updates the first user's name and email.
- Delete User: Deletes the first user.
- Retrieve Users: Displays the updated list of users.

## Authors

- AJANTA GHOSH
