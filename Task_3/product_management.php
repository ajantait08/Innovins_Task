<?php
header('Content-Type: application/json');

$host = 'localhost';
$db   = 'innovins';
$user = 'root'; // Replace with your database username
$pass = '';     // Replace with your database password

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $result = $conn->query("SELECT * FROM products_task3 WHERE id = $id");
            $product = $result->fetch_assoc();
            if (!empty($products)) {
                echo json_encode($products);
            }
            else {
                echo json_encode(['message' => 'No Product Details were found']);
            }
        } else {
            $result = $conn->query('SELECT * FROM products_task3');
            $products = $result->fetch_all(MYSQLI_ASSOC);
            if (!empty($products)) {
                echo json_encode($products);
            }
            else {
                echo json_encode(['message' => 'No Product Details were found']);
            }
        }
        break;

    case 'POST':
        $input = json_decode(file_get_contents('php://input'), true);
        $name = $conn->real_escape_string($input['name']);
        $description = $conn->real_escape_string($input['description']);
        $price = floatval($input['price']);
        if($conn->query("INSERT INTO products_task3 (name, description, price) VALUES ('$name', '$description', $price)")){
            echo json_encode(['id' => $conn->insert_id]);
        }
        else{
            echo json_encode(['message' => "Unable to insert product"]);
        }
        break;

    case 'PUT':
        $input = json_decode(file_get_contents('php://input'), true);
        $id = intval($input['id']);
        $name = $conn->real_escape_string($input['name']);
        $description = $conn->real_escape_string($input['description']);
        $price = floatval($input['price']);
        $conn->query("UPDATE products_task3 SET name = '$name', description = '$description', price = $price WHERE id = $id");
        echo json_encode(['message' => 'Product updated successfully']);
        break;

    case 'DELETE':
        $input = json_decode(file_get_contents('php://input'), true);
        $id = intval($input['id']);
        $conn->query("DELETE FROM products_task3 WHERE id = $id");
        echo json_encode(['message' => 'Product deleted successfully']);
        break;

    default:
        echo json_encode(['message' => 'Method not allowed']);
        break;
}

$conn->close();
?>
