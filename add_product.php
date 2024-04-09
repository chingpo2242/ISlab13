<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <style>
        /* Body styles */
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://cdn.wallpapersafari.com/93/26/Stkyof.gif');
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Header styles */
        h2 {
            color: #000; /* Changed color to black */
            text-align: center;
            margin-top: 20px; /* Adjusted margin */
            margin-bottom: 20px; /* Added margin */
        }

        /* Form styles */
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #343a40;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Back button styles */
        .back-btn {
            position: absolute; /* Added positioning */
            top: 20px; /* Adjusted top position */
            left: 20px; /* Adjusted left position */
        }

        .back-btn a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .back-btn a:hover {
            background-color: #495057;
        }

        /* Error message style */
        .error-message {
            text-align: center;
            color: black; /* Set the font color to black */
        }
    </style>
</head>
<body>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <h2>Add Product</h2>
        <label for="product_name">Product Name:</label>
        <input type="text" id="product_name" name="product_name" required><br><br>

        <label for="product_price">Price:</label>
        <input type="number" id="product_price" name="product_price" step="0.01" min="0" required><br><br>

        <input type="submit" value="Add Product">
    </form>
    <div class="back-btn">
        <a href="admin_dashboard.php">Back to Dashboard</a>
    </div>
    <?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Establish database connection
        include('db_connection.php');

        // Get form data
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];

        // Prepare and execute SQL query to insert data into the database
        $sql = "INSERT INTO products (name, price) VALUES ('$product_name', '$product_price')";

        if ($conn->query($sql) === TRUE) {
            echo "<p style='text-align:center;'>Product added successfully!</p>";
        } else {
            echo "<p style='text-align:center;'>Error adding product: " . $conn->error . "</p>";
        }

        $conn->close();
    }
    ?>
</body>
</html>