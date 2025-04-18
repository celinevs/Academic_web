<!DOCTYPE html>
<html>
<head>
  <title>Academic - Student List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://bootswatch.com/5/lux/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
          <a class="nav-link active" href="student_list.php">Student List<span class="visually-hidden">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="teacher_list.php">Teacher List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="course_list.php">Course List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="enrollment_list.php">Enrollment list</a>
        </li>
      </ul>
      <form class="d-flex">
        <a href="login_form.html" class="btn btn-secondary my-2 my-sm-0">Logout</a>
      </form>
    </div>
  </div>
</nav>

<div class="container mt-3">
  <h2>Student List</h2>
  <div class="table-responsive">
  <table class="table table-striped table-hover">
    <thead class="table-dark">
      <tr>
        <th>Student ID</th>
        <th>Student Name</th>
        <th>DOB</th>
        <th>Email</th>
        <th>Department</th>
        <th>GPA</th>
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

$sql = "SELECT * FROM student";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if ($row["status"] == "active") {
            echo "<tr>";
            echo "<td>" . $row["s_id"] . "</td>";
            echo "<td>" . $row["full_name"]. "</td>";
            echo "<td>" . $row["date_of_birth"]. "</td>";
            echo "<td>" . $row["email"]. "</td>";
            echo "<td>" . $row["department"]. "</td>";
            echo "<td>" . $row["GPA"] . "</td>";
            echo '<td>
                    <a class="btn btn-danger me-1" href="student_delete.php?id=' . $row["s_id"] . '">Delete</a>
                    <a class="btn btn-success" href="student_update.html?id=' . $row["s_id"] . '">Update</a>
                  </td>';
            echo "</tr>";
        } else {
            echo "<tr class='table-danger'>";
            echo "<td>" . $row["s_id"] . "</td>";
            echo "<td>" . $row["full_name"]. "</td>";
            echo "<td>" . $row["date_of_birth"]. "</td>";
            echo "<td>" . $row["email"]. "</td>";
            echo "<td>" . $row["department"]. "</td>";
            echo "<td>" . $row["GPA"] . "</td>";
            echo '<td>
                    <a class="btn btn-info me-1" href="student_undo.php?id=' . $row["s_id"] . '">Undo</a>
                    <a class="btn btn-success disabled" href="student_update.html?id=' . $row["s_id"] . '">Update</a>
                  </td>';
            echo "</tr>";
        }
    }
} else {
    echo "<tr><td colspan='7'>0 results</td></tr>";
}

$conn->close();
?>
</tbody>
 </table>
</div>
 <a class="btn btn-success mt-3 mb-3" href="student_form.html">Add New Student</a>
</div>
</body>
</html>
