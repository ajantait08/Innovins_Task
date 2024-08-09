<?php
require('database.php');

// Create a new mysqli instance and connect to the database
$conn = new mysqli($host, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to insert a new user record
function insertUser($conn,$name, $email) {
    $name = $conn->real_escape_string($name);
    $email = $conn->real_escape_string($email);

    $query = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

    if ($conn->query($query)) {
        echo "New user inserted successfully.\n";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Function to retrieve and display all users
function getUsers($conn) {

    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $user = $result->fetch_all(MYSQLI_ASSOC);
        foreach ($user as $value){
            echo "ID:". $value['id'] . " | Name: " . $value['name'] . " | Email: " . $value['email'];
            echo "<br>";
        }
        //exit;
    } else {
        echo "No users found.\n";
    }
}

// Function to update an existing user's information
function updateUser($conn,$id, $name, $email) {
    $id = intval($id);
    $name = $conn->real_escape_string($name);
    $email = $conn->real_escape_string($email);
    $sql = "UPDATE users SET name = '$name', email = '$email' WHERE id = $id";
    $result = $conn->query($sql);
    echo "User updated successfully.\n";
}

// Function to delete a user record
function deleteUser($conn, $id) {
    $id = intval($id);
    $sql = "DELETE FROM users WHERE id = $id";
    $result = $conn->query($sql);
    echo "User deleted successfully.\n";
}

// Example usage
insertUser($conn,'Dummy User1', 'dummy@test.com');
insertUser($conn,'Dummy User2', 'dummy@test2.com');
insertUser($conn,'Dummy User3', 'dummy@test3.com');
getUsers($conn);
updateUser($conn,1, 'Dummy UserTest One', 'dummyone@test.com');
getUsers($conn);
deleteUser($conn,1);
getUsers($conn);

// Close the database connection
$conn->close();
?>