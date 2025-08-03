<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "lalitha";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$class = isset($_POST['class']) ? intval($_POST['class']) : 1;

if ($id > 0 && in_array($class, range(1, 10))) {
    $table_name = "class_" . $class;
    $stmt = $conn->prepare("DELETE FROM $table_name WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('Student deleted successfully'); window.location.href = 'view_students.php?class=$class';</script>";
    } else {
        echo "<script>alert('Failed to delete student'); window.history.back();</script>";
    }

    $stmt->close();
} else {
    echo "<script>alert('Invalid request'); window.history.back();</script>";
}

$conn->close();
?>
