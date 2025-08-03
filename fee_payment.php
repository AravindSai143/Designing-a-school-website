<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "lalitha";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$student_id = isset($_GET['student_id']) ? intval($_GET['student_id']) : 0;
$class = isset($_GET['class']) ? intval($_GET['class']) : 0;

if ($student_id == 0 || $class == 0) {
    die("Invalid student or class information.");
}

// If the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $amount = $_POST["amount"];
    $payment_date = $_POST["payment_date"];

    // Updated column name from 'class' to 'class_applied'
    $insert = "INSERT INTO fees (student_id, class_applied, amount, payment_date) 
               VALUES ($student_id, $class, '$amount', '$payment_date')";
    if ($conn->query($insert) === TRUE) {
        echo "<script>alert('Fee payment recorded successfully!'); window.location.href='fee_payment.php?student_id=$student_id&class=$class';</script>";
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}

// Get student info
$student_table = "class_" . $class;
$student_result = $conn->query("SELECT * FROM $student_table WHERE id = $student_id");
$student = $student_result && $student_result->num_rows > 0 ? $student_result->fetch_assoc() : null;

// Updated query to match correct column name
$fee_result = $conn->query("SELECT * FROM fees WHERE student_id = $student_id AND class_applied = $class");

$total_fee = 10000; // Set the full fee amount (can also come from DB if needed)
$paid_amount = 0;
$payments = [];

if ($fee_result && $fee_result->num_rows > 0) {
    while ($row = $fee_result->fetch_assoc()) {
        $payments[] = $row;
        $paid_amount += $row['amount'];
    }
}
$balance = $total_fee - $paid_amount;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Fee Payment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f8f8f8;
        }

        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }

        input, label {
            display: block;
            margin: 10px 0;
            width: 100%;
        }

        input[type="submit"], .back a, .print-btn {
            background-color: #2a148a;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
            cursor: pointer;
        }

        .back {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 8px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #26ff00;
        }
    </style>
</head>
<body>
<div class="container">
    <?php if (!$student): ?>
        <h2>Student not found.</h2>
    <?php else: ?>
        <h2>Fee Payment for <?= $student["first_name"] ?> <?= $student["last_name"] ?> (Class <?= $class ?>)</h2>

        <p><strong>Total Fee:</strong> ₹<?= $total_fee ?></p>
        <p><strong>Paid Amount:</strong> ₹<?= $paid_amount ?></p>
        <p><strong>Balance:</strong> ₹<?= $balance ?></p>

        <?php if (!empty($payments)): ?>
            <h3>Payment History</h3>
            <table>
                <tr>
                    <th>Amount</th>
                    <th>Payment Date</th>
                </tr>
                <?php foreach ($payments as $payment): ?>
                    <tr>
                        <td>₹<?= $payment['amount'] ?></td>
                        <td><?= $payment['payment_date'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <button class="print-btn" onclick="window.print()">🖨️ Print Receipt</button>
        <?php endif; ?>

        <?php if ($balance > 0): ?>
            <form method="POST">
                <label>Amount:</label>
                <input type="number" name="amount" max="<?= $balance ?>" required>

                <label>Payment Date:</label>
                <input type="date" name="payment_date" required>

                <input type="submit" value="Record Payment">
            </form>
        <?php endif; ?>

        <div class="back">
            <a href="view_students.php?class=<?= $class ?>">← Back to Students</a>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
