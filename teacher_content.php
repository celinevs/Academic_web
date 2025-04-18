<!DOCTYPE html>
<html lang="en">
<head>
  <!-- 
  Profile Page
  -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Academic - Profile</title>
  <link href="https://bootswatch.com/5/lux/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }
    .profile-card {
      background-color: #ffffff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 500px;
    }
    .profile-heading {
      text-align: center;
      margin-bottom: 30px;
    }
    .profile-info {
      margin-bottom: 20px;
    }
    .profile-info h3 {
      margin-bottom: 10px;
    }
    .profile-info p {
      margin: 5px 0;
      font-size: 16px;
    }
    .update-password-btn {
      display: block;
      text-align: center;
      margin-top: 20px;
    }
    .navbar {
      border-radius: 0;
    }
    .navbar-brand {
      font-size: 1.5rem;
    }
    .navbar-toggler {
      border-color: #007bff;
    }

  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Teacher</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="teacher_content.php">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="mata_kuliah.php">Mata Kuliah</a>
        </li>
      </ul>
      <form class="d-flex">
        <a href="login_form.html" class="btn btn-secondary my-2 my-sm-0">Logout</a>
      </form>
    </div>
  </div>
</nav>

<!-- Profile Display -->
<div class="container">
  <div class="profile-card">
    <div class="profile-heading">
      <h2>Profile</h2>
    </div>
    <?php
    // Connect to MySQL
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "academic";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    session_start();
    if (!isset($_SESSION["email"])) {
      header('Location:login_form.html');
      exit();
    }
    $email = $_SESSION["email"];

    // Query to retrieve teacher data based on email
    $sql = "SELECT * FROM teacher WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // Output data of the teacher
      while($row = $result->fetch_assoc()) {
        echo "<div class='profile-info'>";
        echo "<h3>" . $row['full_name'] . "</h3>";
        echo "<p><strong>Teacher ID:</strong> " . $row['t_id'] . "</p>";
        echo "<p><strong>Date of Birth:</strong> " . $row['date_of_birth'] . "</p>";
        echo "<p><strong>Email:</strong> " . $row['email'] . "</p>";
        echo "<p><strong>Department:</strong> " . $row['department'] . "</p>";
        echo "</div>";
        echo '<a class="btn btn-primary update-password-btn" href="password_update.php?id=' . $row["email"] . '">Update Password</a>';
      }
    } else {
      echo "<p>No results found.</p>";
    }
    $conn->close();
    ?>
  </div>
</div>
</body>
</html>

