<?php
$conn = new mysqli("localhost", "root", "", "lalitha");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = intval($_POST['id']);
  $action = $_POST['action'];

  if ($action === 'approve') {
    $conn->query("UPDATE admissions SET status = 'approved' WHERE id = $id");
  } elseif ($action === 'reject') {
    $conn->query("UPDATE admissions SET status = 'rejected' WHERE id = $id");
  }
}

header("Location: new_admissions.php");
exit;
