
<?php
include('dbconnection.php'); // Add semicolon at the end

if (isset($_POST['submit'])) {
    // Get input values
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    // Prepare the SQL statement
    $stmt = $con->prepare("INSERT INTO crudoperation (name, email, address) VALUES (?, ? , ?)");
    if ($stmt === false) {
        die("Error preparing statement: " . $con->error); // Error handling
    }

    // Bind parameters (s for string)
    $stmt->bind_param("sss", $name, $email, $address);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "<script>alert('Data inserted successfully')</script>"; // Correct quotes
    } else {
        echo "<script>alert('There is a problem')</script>"; // Correct quotes
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$con->close();
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Insertion</title>
    <style>
        /* Basic reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #6a11cb, #2575fc); /* Gradient background */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            width: 320px;
            text-align: center;
            transition: all 0.3s ease-in-out; /* Smooth transition */
        }

        .form-container:hover {
            transform: translateY(-10px); /* Hover effect */
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
            font-size: 24px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            color: #333;
            background-color: #f9f9f9;
            transition: all 0.3s ease; /* Smooth transition */
        }

        input[type="text"]:focus {
            border-color: #4CAF50;
            background-color: #f1f1f1;
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s ease; /* Smooth transition */
        }

        button:hover {
            background-color: black;
        }

        button:focus {
            outline: none;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.7); /* Focus effect for button */
        }

        /* Responsive Design */
        @media (max-width: 400px) {
            .form-container {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <div style="margin: 5px auto">
        <form method="POST">
            <input type="text" name="name" placeholder="Enter Name"/>
            <br/><br/>
            <input type="text" name="email" placeholder="Enter Email"/>
            <br/><br/>
            <input type="text" name="address" placeholder="Enter Address"/>
            <br/><br/>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>