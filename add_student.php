<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "lalitha";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $class = $_POST["class"];  // Class selection (1 to 10)
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];
    $contact = $_POST["contact"];

    // Validate class input
    if (!in_array($class, range(1, 10))) {
        die("Invalid class selection!");
    }

    // Table name based on selected class
    $table_name = "class_" . $class;

    // Insert student into the respective class table
    $sql = "INSERT INTO $table_name (first_name, last_name, dob, gender, address, contact) 
            VALUES ('$first_name', '$last_name', '$dob', '$gender', '$address', '$contact')";

    if ($conn->query($sql) === TRUE) {
        // Success alert and redirect to admin dashboard
        echo "<script>alert('Student added successfully!'); window.location='admin_dashboard.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        /* Form Container */
        .container {
            background: white;
            padding: 30px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
            width: 350px;
        }

        h2 {
            color: #333;
        }

        /* Container for styling */
.form-group {
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
}

/* Styling inputs and select dropdown */
input, select {
    width: 95%;  /* Ensure both input and select have the same width */
    max-width: 400px; /* Set a maximum width */
    padding: 12px;
    margin: 8px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    box-sizing: border-box; /* Prevents padding from affecting width */
    display: block;
}

/* Button Styling */
button {
    width: 100%;
    max-width: 400px;
    padding: 12px;
    background: #26a69a;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

/* Hover Effect */
button:hover {
    background: #00796b;
}

/* Responsive: Adjust for small screens */
@media (max-width: 600px) {
    input, select, button {
        width: 100%;
        max-width: none;
    }
}

    </style>
</head>
<body>

    <div class="container">
        <h2>Add Student</h2>
        <form method="POST">
            <input type="text" name="first_name" placeholder="First Name" required><br>
            <input type="text" name="last_name" placeholder="Last Name" required><br>
            <select name="class" required>
                <option value="">Select Class</option>
                <?php for ($i = 1; $i <= 10; $i++) echo "<option value='$i'>Class $i</option>"; ?>
            </select><br>
            <input type="date" name="dob" required><br>
            <select name="gender" required>
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select><br>
            <input type="text" name="address" placeholder="Address" required><br>
            <input type="text" name="contact" placeholder="Contact" required 
       pattern="[0-9]{10}" maxlength="10" minlength="10"><br>
            <button type="submit">Add Student</button>
        </form>
    </div>

</body>
</html>
