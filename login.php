<!-- login.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  <style>
    body {
      background-image: url('group pic.jpg'); 
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      height: 100vh;
      margin: 0;
      font-family: Arial, sans-serif;
    }

    .header {
      display: flex;
      align-items: center;
      background-color: #ffe4b5;
      padding: 8px;
      width: 100%;
      box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
      border-bottom: 4px solid;
      justify-content: center;
    }

    .header img {
      height: 70px;
      margin-right: 10px;
    }

    .school-name {
      font-size: 28px;
      font-weight: bold;
      color: green;
    }

    .nav-container {
      width: 100%;
      background-color: #2a148a;
      text-align: center;
      padding: 12px 0;
      box-shadow: 0px 2px 10px 5px rgba(0, 0, 0, 0.2);
    }

    .nav-links a {
      text-decoration: none;
      font-size: 16px;
      color: white;
      margin: 0 15px;
      transition: 0.3s;
    }

    .nav-links a:hover {
      color: #ffcc00;
    }

    .login-container {
      opacity: 0.90;
      background: rgba(255, 255, 255, 0.9);
      padding: 30px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
      text-align: center;
      width: 300px;
      margin: 60px auto;
    }

    .login-container h2 {
      color: #333;
    }

    input[type="text"], input[type="password"] {
      width: 80%;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    button {
      width: 80px;
      padding: 10px;
      background: #26ff00;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    button:hover {
      background: #0056b3;
    }

    @media (max-width: 600px) {
      .header {
        flex-direction: column;
        text-align: center;
      }
      .nav-links {
        display: block;
        margin-top: 10px;
      }
      .nav-links a {
        display: block;
        margin: 5px 0;
      }
    }
  </style>
</head>
<body>

  <!-- Header -->
  <div class="header">
    <img src="logo.jpg" alt="School Logo"> <!-- Replace with your logo -->
	
	<div>
    <span class="school-name">THRISHARAN E/M SCHOOL</span><br>
      <span class="school">Vill: Gundaipet, Mdl: Koutala, Dist: Komuram Bheem(Asifabad)</span>
  </div>
  </div>

  <!-- Navigation -->
  <div class="nav-container">
    <div class="nav-links">
      <a href="web.html">Home</a>
      <a href="about.php">About Us</a>
      <a href="academics.php">Academics</a>
      <a href="admission_info.html">Admissions</a>
      <a href="events.php">Events</a>
      <a href="contact.php">Contact</a>
      <a href="login.php">Login</a>
    </div>
  </div>

  <!-- Login Box -->
  <div class="login-container">
    <h2>Admin Login</h2>
    <form action="verify.php" method="POST">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
    </form>
  </div>

</body>
</html>
