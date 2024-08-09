# PHP REST API Example

This PHP script implements a simple REST API to interact with a MySQL database. It allows for basic CRUD (Create, Read, Update, Delete) operations on a `products_task3` table within the database.

## Prerequisites

- PHP : Ensure that PHP is installed on your server.
- MySQL : Ensure that MySQL is installed and a database is set up.
- Apache/Nginx : A web server to serve the PHP file.

## Setup

Create MySQL Database and Table :

- Create a MySQL database named `innovins`.
- Create a table named `products_task3` using the following SQL:

```bash
   CREATE TABLE products_task3 (
      id INT AUTO_INCREMENT PRIMARY KEY,
      name VARCHAR(255) NOT NULL,
      description TEXT NOT NULL,
      price DECIMAL(10, 2) NOT NULL
  );
```

Database Configuration :

- The script uses the following default database configuration :
  - Host : `localhost`
  - Database : `innovins`
  - Username : `root`
  - Password : ` `(empty)
- If your setup differs, update the variables `$host`, `$db`, `$user`, and `$pass` in the PHP script accordingly.

## How to Use

The API supports the following HTTP methods:

## 1. GET :

- Description: Retrieve product details.
- Endpoints:
  - `/api.php`: Retrieves all products.
  - `/api.php?id={id}`: Retrieves a product by its id.
- Response:

  - Success: JSON array of products or product details.
  - Failure: JSON message indicating no product details were found.

## 2. POST :

- Description: Add a new product.
- Endpoint: /api.php
- Request Body (JSON):

```bash
     {
        "name": "Product Name",
        "description": "Product Description",
        "price": 99.99
      }
```

- Response :
  - Success: JSON object with the id of the newly created product.
  - Failure: JSON message indicating the product could not be inserted.

## 3. PUT :

- Description: Update an existing product.
- Endpoint: /api.php
- Request Body (JSON)

```bash
    {
        "id": 1,
        "name": "Updated Product Name",
        "description": "Updated Description",
        "price": 79.99
    }
```

- Response:
  - Success: JSON message indicating the product was updated successfully.
  - Failure: JSON message indicating an error occurred during the update.

## 4. DELETE

- Description: Delete a product.
- Endpoint: /api.php
- Request Body (JSON)

```bash
{
  "id": 1
}
```

- Response:
  - Success: JSON message indicating the product was deleted successfully.
  - Failure: JSON message indicating an error occurred during deletion.

## 5.Error Handling

- If an unsupported HTTP method is used, the API responds with a JSON message`{"message": "Method not allowed"}`.

## Closing the Connection

The MySQL connection is closed automatically at the end of the script execution.

## Notes

- Ensure that the MySQL root user has the necessary permissions to access the database.
- Always validate and sanitize inputs to prevent SQL injection and other security vulnerabilities.
