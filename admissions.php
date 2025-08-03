<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Thrisharan E/M School - Admission Form</title>
  <style>
    <style>
  body {
    font-family: 'Segoe UI', sans-serif;
    background: linear-gradient(to right, #b2fefa, #0ed2f7);
	
    margin: 0;
    padding: 0;
  }

  .form-container {
    background: aqua;
    max-width: 800px;
    margin: 40px auto;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
  }

  h2 {
    text-align: center;
    color: #004080;
  }

  form {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 25px 40px; /* vertical and horizontal gap between fields */
  }

  label {
    display: block;
    margin-bottom: 6px;
    color: #333;
    font-weight: bold;
  }

  input, select, textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 6px;
    box-sizing: border-box;
  }

  .full-width {
    grid-column: 1 / -1;
  }

  input[type="submit"] {
    background: #004080;
    color: white;
    border: none;
    cursor: pointer;
    transition: background 0.3s ease;
  }

  input[type="submit"]:hover {
    background: #0066cc;
  }

  .footer-note {
    text-align: center;
    margin-top: 20px;
    font-style: italic;
    color: #555;
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

  <div class="form-container">
  
    <h2>Admission Form - Thrisharan E/M School</h2>
    <form action="submit_admission.php" method="POST" enctype="multipart/form-data">

      <!-- Student Info -->
      <div class="full-width"><strong>Student Information:</strong></div>

      <div>
        <label>Student Full Name</label>
        <input type="text" name="student_name" required>
      </div>

      <div>
        <label>Date of Birth</label>
        <input type="date" name="dob" required>
      </div>

      <div>
        <label>Gender</label>
        <select name="gender" required>
          <option value="">--Select--</option>
          <option>Male</option>
          <option>Female</option>
          <option>Other</option>
        </select>
      </div>

     

      <div>
        <label>Nationality</label>
        <input type="text" name="nationality" value="Indian">
      </div>

      <div>
        <label>Mother Tongue</label>
        <input type="text" name="mother_tongue">
      </div>

      <div>
        <label>Aadhar Number</label>
        <input type="text" name="aadhar" maxlength="12" required>
      </div>

      

      <!-- Admission Details -->
      <div class="full-width"><strong>Admission Details:</strong></div>

      <div>
        <label>Class Applying For</label>
        <input type="text" name="class_applied" required>
      </div>

      <div>
        <label>Academic Year</label>
        <input type="text" name="academic_year" placeholder="e.g., 2025-26">
      </div>

      <div class="full-width">
        <label>Previous School Details (if any)</label>
        <textarea name="prev_school"></textarea>
      </div>

      <!-- Parent Info -->
      <div class="full-width"><strong>Parent/Guardian Information:</strong></div>

      <div>
        <label>Father's Name</label>
        <input type="text" name="father_name" required>
      </div>

      <div>
        <label>Mother's Name</label>
        <input type="text" name="mother_name" required>
      </div>

      <div>
        <label>Father's Occupation</label>
        <input type="text" name="father_occupation">
      </div>

      <div>
        <label>Mother's Occupation</label>
        <input type="text" name="mother_occupation">
      </div>

      <div>
        <label>Contact Number</label>
        <input type="text" name="contact" pattern="[0-9]{10}" title="Enter 10-digit number" required>
      </div>

      <div>
        <label>Email Address</label>
        <input type="email" name="email">
      </div>

      <div class="full-width">
        <label>Residential Address</label>
        <textarea name="address" required></textarea>
      </div>

      <!-- File Uploads -->
      <div class="full-width"><strong>Upload Required Documents:</strong></div>

      <div>
        <label>Upload Student Photo</label>
        <input type="file" name="photo" accept="image/*" required>
      </div>

      <div>
        <label>Upload Birth Certificate</label>
        <input type="file" name="birth_certificate" accept=".pdf,.jpg,.png" required>
      </div>

      <div>
        <label>Upload Aadhar Card</label>
        <input type="file" name="aadhar_card" accept=".pdf,.jpg,.png" required>
      </div>

      <div>
        <label>Transfer Certificate (if applicable)</label>
        <input type="file" name="tc" accept=".pdf,.jpg,.png">
      </div>

      <div class="full-width">
        <label>Declaration</label>
        <input type="checkbox" name="declaration" required> I confirm that all the above information is true and correct to the best of my knowledge.
      </div>

      <div class="full-width">
        <input type="submit" value="Submit Admission Form">
      </div>
    </form>

    <p class="footer-note">For any queries, contact the school office at +91-9876543210 or email: admin@school.com</p>
  </div>
  <a href="web.html" class="go-back-btn">← Go Back</a>

</body>
</html>
