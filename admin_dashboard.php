<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <style>
    body {
      background-image: url('BR-Ambedkar.jpe');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      height: 100vh;
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      text-align: center;
    }

    .header {
      background-color: #2a148a;
      color: white;
      padding: 15px 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      position: relative;
    }

    .header h2 {
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
      margin: 0;
    }

    .logout-btn {
      background: #f44336;
      color: white;
      text-decoration: none;
      padding: 10px 15px;
      border-radius: 5px;
      font-weight: bold;
      transition: background 0.3s;
    }

    .logout-btn:hover {
      background: #d32f2f;
    }

    .nav-links a,
    .class-links a,
    .new-app-btn {
      display: inline-block;
      margin: 10px;
      padding: 10px 15px;
      text-decoration: none;
      color: white;
      border-radius: 5px;
      transition: 0.3s;
    }

    .nav-links a {
      background: #26ff00;
    }

    .class-links a {
      background: #ff5733;
    }

    .new-app-btn {
      background: #0099ff;
    }

    .nav-links a:hover,
    .class-links a:hover,
    .new-app-btn:hover {
      opacity: 0.8;
    }

    h3 {
      color: black;
      margin-top: 40px;
    }
  </style>
</head>
<body>

  <div class="header">
    <div></div>
    <h2>Welcome, Admin</h2>
    <a href="logout.php" class="logout-btn">Logout</a>
  </div>

  <div class="nav-links">
    <a href="add_student.php">Add Student</a>
    <a href="new_admissions.php" class="new-app-btn">View New Applications</a>
  </div>

  <h3>View Students by Class</h3>
  <div class="class-links">
    <?php for ($i = 1; $i <= 10; $i++): ?>
      <a href="view_students.php?class=<?= $i ?>">Class <?= $i ?></a>
    <?php endfor; ?>
  </div>

</body>
</html>
