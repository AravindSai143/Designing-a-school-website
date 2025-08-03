<?php
session_start();
$conn = new mysqli("localhost", "root", "", "lalitha");

// Check for new unseen admissions
$result = $conn->query("SELECT * FROM admissions WHERE is_seen = 0");
$new_count = $result->num_rows;

// Mark all as seen when admin views
$conn->query("UPDATE admissions SET is_seen = 1 WHERE is_seen = 0");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body { font-family: Arial; padding: 20px; background: #f0f8ff; }
        .notification { background: #c1f0c1; padding: 10px; border: 1px solid green; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 10px; border: 1px solid #ccc; }
        th { background: #e0e0e0; }
    </style>
</head>
<body>
    <h2>Welcome Admin</h2>

    <?php if ($new_count > 0): ?>
        <div class="notification">
            You have <strong><?= $new_count ?></strong> new admission(s)!
        </div>
    <?php endif; ?>

    <h3>All Admissions</h3>
    <table>
        <tr>
            <th>ID</th><th>Name</th><th>Class</th><th>DOB</th><th>Contact</th>
        </tr>
        <?php
        $all = $conn->query("SELECT id, student_name, class_applied, dob, contact FROM admissions ORDER BY id DESC");
        while ($row = $all->fetch_assoc()):
        ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['student_name'] ?></td>
                <td><?= $row['class_applied'] ?></td>
                <td><?= $row['dob'] ?></td>
                <td><?= $row['contact'] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
