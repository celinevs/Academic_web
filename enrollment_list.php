<!DOCTYPE html>
<html>
<head>
  <title>Academic - Enrollment List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://bootswatch.com/5/lux/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    .table td,
    .table th {
      padding: 1rem; /* Adjust padding to make cells larger */
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="admin.html">Admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="student_list.php">Student List
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="teacher_list.php">Teacher List
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="course_list.php">Course List
          <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="enrollment_list.php">Enrollment list</a>
          <span class="visually-hidden">(current)</span>
        </li>
      </ul>
      <form class="d-flex">
        <a href="login_form.html" class="btn btn-secondary my-2 my-sm-0">Logout</a>
      </form>
    </div>
  </div>
</nav>

<div class="container mt-3">
  <h2>Enrollment List</h2>
  <div class="table-responsive">         
  <table class="table table-striped table-hover">
    <thead class="table-dark">
      <tr>
        <th>Enrollment ID</th>
        <th>Student ID</th>
        <th>Course ID</th>
        <th>Academic Semester</th>
        <th>Assignment</th>
        <th>Test</th>
        <th>Final</th>
        <th>Average</th>
        <th>Update/Delete</th>
      </tr>
    </thead>
    <tbody>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "academic";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM enrolment";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $average = ($row["assignment"]+$row["test"]+$row["final"])/3;
        echo "<tr>";
        echo "<td>" . $row["e_id"] . "</td>";
        echo "<td>" . $row["s_id"] . "</td>";
        echo "<td>" . $row["c_id"] . "</td>";
        echo "<td>" . $row["academic_semester"]. "</td>";
        echo "<td>" . $row["assignment"]. "</td>";
        echo "<td>" . $row["test"]. "</td>";
        echo "<td>" . $row["final"]. "</td>";
        echo "<td>" . number_format($average, 2). "</td>";
        echo '<td colspan="2">
                <a class="btn btn-danger btn-sm me-1" href="enrollment_delete.php?id=' . $row["e_id"] . '">Delete</a>
                <a class="btn btn-success btn-sm" href="enrollment_update.html?id=' . $row["e_id"] . '">Update</a>
              </td>';
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='9'>0 results</td></tr>";
}

$conn->close();
?>
</tbody>
 </table>
</div>
 <a class="btn btn-success mt-3 mb-3" href="enrollment_form.php">Add New Enrollment</a>
</div>
</body>
</html>
