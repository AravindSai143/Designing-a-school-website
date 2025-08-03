<?php
$conn = new mysqli("localhost", "root", "", "lalitha");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM admissions WHERE is_seen = 0 OR status = 'pending'");
$conn->query("UPDATE admissions SET is_seen = 1 WHERE is_seen = 0");
?>

<!DOCTYPE html>
<html>
<head>
  <title>New Applications</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(to right, #e0f7fa, #f1f8e9);
      padding: 40px;
    }

    h2 {
      text-align: center;
      color: #00695c;
      font-size: 32px;
      margin-bottom: 40px;
      text-shadow: 1px 1px #ccc;
    }

    .application {
      background: white;
      padding: 25px;
      margin: 30px auto;
      max-width: 900px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      transition: transform 0.2s ease-in-out;
    }

    .application:hover {
      transform: scale(1.01);
    }

    .field {
      margin-bottom: 12px;
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
    }

    .label {
      font-weight: 600;
      color: #333;
      flex: 1;
      min-width: 160px;
    }

    .value {
      flex: 2;
      color: #444;
    }

    .link-view {
      text-decoration: none;
      color: #0d47a1;
      font-weight: 500;
    }

    .link-view:hover {
      text-decoration: underline;
    }

    .action-btn {
      padding: 10px 20px;
      border: none;
      border-radius: 6px;
      color: white;
      cursor: pointer;
      font-size: 14px;
      margin-right: 10px;
      transition: background-color 0.3s;
    }

    .approve-btn {
      background-color: #4caf50;
    }

    .approve-btn:hover {
      background-color: #388e3c;
    }

    .reject-btn {
      background-color: #f44336;
    }

    .reject-btn:hover {
      background-color: #d32f2f;
    }

    .status {
      font-weight: bold;
      padding: 5px 10px;
      border-radius: 5px;
      display: inline-block;
    }

    .status.pending {
      background-color: #fff3cd;
      color: #856404;
    }

    .status.approved {
      background-color: #d4edda;
      color: #155724;
    }

    .status.rejected {
      background-color: #f8d7da;
      color: #721c24;
    }

    form {
      margin-top: 15px;
    }
	.go-back-btn {
  display: inline-block;
  margin-bottom: 20px;
  font-size: 16px;
  background-color: #0288d1;
  color: white;
  padding: 10px 18px;
  border-radius: 6px;
  text-decoration: none;
  transition: background-color 0.3s;
  font-weight: bold;
}

.go-back-btn:hover {
  background-color: #0277bd;
}

  </style>
</head>
<body>

  <h2>New Admission Applications</h2>

  <?php if ($result->num_rows > 0): ?>
    <?php while ($row = $result->fetch_assoc()): ?>
      <div class="application">
        <div class="field"><span class="label">Application ID:</span> <span class="value"><?= $row['id'] ?></span></div>
        <div class="field"><span class="label">Student Name:</span> <span class="value"><?= $row['student_name'] ?></span></div>
        <div class="field"><span class="label">Date of Birth:</span> <span class="value"><?= $row['dob'] ?></span></div>
        <div class="field"><span class="label">Gender:</span> <span class="value"><?= $row['gender'] ?></span></div>
        <div class="field"><span class="label">Nationality:</span> <span class="value"><?= $row['nationality'] ?></span></div>
        <div class="field"><span class="label">Mother Tongue:</span> <span class="value"><?= $row['mother_tongue'] ?></span></div>
        <div class="field"><span class="label">Aadhar Number:</span> <span class="value"><?= $row['aadhar'] ?></span></div>
        <div class="field"><span class="label">Class Applied:</span> <span class="value"><?= $row['class_applied'] ?></span></div>
        <div class="field"><span class="label">Academic Year:</span> <span class="value"><?= $row['academic_year'] ?></span></div>
        <div class="field"><span class="label">Previous School:</span> <span class="value"><?= $row['prev_school'] ?></span></div>
        <div class="field"><span class="label">Father's Name:</span> <span class="value"><?= $row['father_name'] ?></span></div>
        <div class="field"><span class="label">Mother's Name:</span> <span class="value"><?= $row['mother_name'] ?></span></div>
        <div class="field"><span class="label">Father's Occupation:</span> <span class="value"><?= $row['father_occupation'] ?></span></div>
        <div class="field"><span class="label">Mother's Occupation:</span> <span class="value"><?= $row['mother_occupation'] ?></span></div>
        <div class="field"><span class="label">Contact:</span> <span class="value"><?= $row['contact'] ?></span></div>
        <div class="field"><span class="label">Email:</span> <span class="value"><?= $row['email'] ?></span></div>
        <div class="field"><span class="label">Address:</span> <span class="value"><?= $row['address'] ?></span></div>

        <div class="field"><span class="label">Photo:</span> <span class="value"><a class="link-view" href="<?= $row['photo_path'] ?>" target="_blank">View</a></span></div>
        <div class="field"><span class="label">Birth Certificate:</span> <span class="value"><a class="link-view" href="<?= $row['birth_cert_path'] ?>" target="_blank">View</a></span></div>
        <div class="field"><span class="label">Aadhar Card:</span> <span class="value"><a class="link-view" href="<?= $row['aadhar_card_path'] ?>" target="_blank">View</a></span></div>
        <?php if (!empty($row['tc_path'])): ?>
          <div class="field"><span class="label">Transfer Certificate:</span> <span class="value"><a class="link-view" href="<?= $row['tc_path'] ?>" target="_blank">View</a></span></div>
        <?php endif; ?>

        <div class="field">
          <span class="label">Status:</span>
          <span class="value status <?= $row['status'] ?>"><?= ucfirst($row['status']) ?></span>
        </div>

        <?php if ($row['status'] === 'pending'): ?>
          <form method="POST" action="process_admission.php">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <button type="submit" name="action" value="approve" class="action-btn approve-btn">Approve</button>
            <button type="submit" name="action" value="reject" class="action-btn reject-btn">Reject</button>
          </form>
        <?php endif; ?>
      </div>
    <?php endwhile; ?>
  <?php else: ?>
    <p style="text-align:center; font-size: 18px;">No new admission applications.</p>
  <?php endif; ?>
  <a href="admin_dashboard.php" class="go-back-btn">← Go Back</a>

</body>
</html>
