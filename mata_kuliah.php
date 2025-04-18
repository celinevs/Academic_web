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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <style>
    body {
        background-color: #f8f9fa;
    }
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        flex-direction: column;
    }
    .profile-heading {
        text-align: center;
        margin-bottom: 20px;
    }
    .profile-card {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 1000px;
        width: 100%;
        margin-bottom: 20px;
    }
    .profile-card h3 {
        margin-bottom: 20px;
    }
    .profile-card p {
        margin: 5px 0;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid #dee2e6;
        padding: 10px;
        text-align: center;
    }
    th {
        background-color: #343a40;
        color: #fff;
    }
    tr:hover {
        background-color: #e9ecef;
    }
    select {
        margin-bottom: 20px;
        padding: 5px;
    }
    .fixed-width {
        width: 20%;
    }
    .small-width {
        width: 13.33%;
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
          <a class="nav-link" href="teacher_content.php">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="mata_kuliah.php">Mata Kuliah
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
      </ul>
      <form class="d-flex">
        <a href="login_form.html" class="btn btn-secondary my-2 my-sm-0">Logout</a>
      </form>
    </div>
  </div>
</nav>

<div class="container">
  <div class="profile-card">
    <h3 class="text-center">Select Course Name</h3>
    <!-- PHP code to fetch and display profile -->
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
      } else {
        $email = $_SESSION["email"];
      }
      $sql = "SELECT t_id FROM teacher WHERE email = '$email'";
      $t_id = $conn->query($sql);
      $t_id_row = $t_id->fetch_assoc();
      $t_id_value = $t_id_row['t_id'];
      $query = "SELECT c_id, name FROM course WHERE t_id = '$t_id_value'";
      $res = $conn->query($query);
    ?>

    <select id="semester" class="form-select" onchange="selectSemester()">
          <option disabled selected> Select Course </option>
      <?php
        if ($res && $res->num_rows > 0) {
          while ($row = $res->fetch_assoc()) {
            echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
          }
        } else {
          echo "<option>No data available</option>";
        }
      ?>
    </select>

<div class="table-responsive">
    <table class="table table-hover">
      <thead class="thead-dark">
        <tr>
       <!--   <th class="fixed-width">Course Name</th> -->
          <th class="fixed-width">Student Name</th>
          <th class="small-width">Assignment</th>
          <th class="small-width">Test</th>
          <th class="small-width">Final</th>
        </tr>
      </thead>
      <tbody id="ans">
      </tbody>
    </table>
</div>
  </div>
</div>

<script>
function selectSemester(){
  var x = document.getElementById("semester").value;
  $.ajax({
    url: "show_course_teacher.php",
    method: "POST",
    data: { id: x },
    success: function(data){
      $("#ans").html(data);
    }
  });
}
</script>

</body>
</html>
