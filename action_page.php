<!DOCTYPE html>
<html>
<head>
  <!-- 
  Login Page
  -->
  <title>Academic</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://bootswatch.com/5/lux/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<?php
  $servername = "localhost";
  $username = "root";
  $password = ""; // Update with your database password
  $dbname = "academic";

  // Admin credentials
  $admin_email = "admin@example.com";
  $admin_password = "adminpassword";

  session_start();

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['uname'];
    $pass = $_POST['psw'];
    $hashed_pass = md5($pass); 

    // Check if it's the admin
    if ($user == $admin_email && $pass == $admin_password) {
      $_SESSION["email"] = $user;
      $_SESSION["role"] = "admin";
      header("Location: admin.html");
      exit(); // Make sure to exit after redirection
    }

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // SQL queries for teacher and student
    $sql_teacher = "SELECT email, status FROM teacher WHERE email='$user' AND password='$hashed_pass'";
    $sql_student = "SELECT email, status FROM student WHERE email='$user' AND password='$hashed_pass'";

    $result_teacher = $conn->query($sql_teacher);
    $result_student = $conn->query($sql_student);

    if (!$result_teacher || !$result_student) {
      die("Error in SQL query: " . $conn->error);
    }

    // Check if there's a row returned in teacher table
    if ($result_teacher->num_rows > 0) {
      $_SESSION["email"] = $user;
      $_SESSION["role"] = "teacher";
      while($row = $result_teacher->fetch_assoc()) {
       if ($row["status"] == "active") {
      header("Location: teacher_content.php");}
       else {
        echo "<script>alert('Not active anymore!');</script>";
        echo "<script>window.location.href = 'login_form.html';</script>";}}
      exit(); // Make sure to exit after redirection
    } elseif ($result_student->num_rows > 0) { // Check if there's a row returned in student table
      $_SESSION["email"] = $user;
      $_SESSION["role"] = "student";
      while($row = $result_student->fetch_assoc()) {
       if ($row["status"] == "active") {
      header("Location: content.php");}
        else {
        echo "<script>alert('Not active anymore!');</script>";
        echo "<script>window.location.href = 'login_form.html';</script>";}}
      exit(); // Make sure to exit after redirection
    } else { // If not found in teacher or student table, show error
      echo "<script>alert('Invalid username or password');</script>";
      echo "<script>window.location.href = 'login_form.html';</script>";
      exit();
    }

    $conn->close();
  }
?>
</body>
</html>

