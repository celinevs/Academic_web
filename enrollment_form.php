<!DOCTYPE html>
<html lang="en">
<head>
  <title>New Enrollment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://bootswatch.com/5/lux/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      background-color: #f8f9fa;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .form-container {
      background-color: white;
      padding: 2rem;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      max-width: 600px;
      width: 100%;
    }
    .form-title {
      margin-bottom: 2rem;
      text-align: center;
      font-size: 24px;
    }
    .form-control:focus {
      box-shadow: none;
      border-color: #007bff;
    }
    .btn-primary {
      background-color: #495057;
      border-color: #495057;
      padding: 14px 20px;
      width: 100%;
    }
    .btn-primary:hover {
      background-color: #343a40;
      border-color: #343a40;
    }
    .btn-clear {
      background-color: #f44336;
      border-color: #f44336;
      color: white;
      width: 100%;
      padding: 14px 20px;
    }
    .btn-clear:hover {
      background-color: #d32f2f;
      border-color: #d32f2f;
    }
    .d-grid {
      display: grid;
      gap: 8px;
    }
  </style>
</head>
<body>

<div class="form-container">
  <h2 class="form-title">New Enrollment</h2>
  <form action="enrollment_add.php" method="post">
    <div class="mb-3">
      <label for="s_id" class="form-label">Student ID:</label>
      <select class="form-select" id="s_id" name="s_id">
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

        $sql = "SELECT * FROM student WHERE status = 'active'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<option value='" . $row["s_id"] . "'>" . $row["s_id"] .  " - " . $row["full_name"] . "</option>";
            }
        } else {
            echo "<option disabled>No active students found</option>";
        }

        $conn->close();
        ?>
      </select>
    </div>
    <div class="mb-3">
      <label for="c_id" class="form-label">Course ID:</label>
      <select class="form-select" id="c_id" name="c_id">
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

        $sql = "SELECT * FROM course WHERE status = 'active'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<option value='" . $row["c_id"] . "'>" . $row["c_id"] .  " - " . $row["name"] . "</option>";
            }
        } else {
            echo "<option disabled>No active courses found</option>";
        }

        $conn->close();
        ?>
      </select>
    </div>
    <div class="mb-3">
      <label for="sems" class="form-label">Semester:</label>
      <input type="text" class="form-control" id="sems" name="sems" placeholder="Enter Semester">
    </div>

    <div class="d-grid">
      <button type="button" class="btn btn-clear" onclick="clearFields();">Clear</button>
      <button type="submit" class="btn btn-primary">Add Data</button>
    </div>
  </form>
</div>

<script>
  // Function to clear input fields only
  function clearFields() {
    document.getElementById("s_id").value = "";
    document.getElementById("c_id").value = "";
    document.getElementById("sems").value = "";
  }
</script>

</body>
</html>
