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
$c_id = $_POST["c_id"];
$s_id = $_POST["s_id"];
$sems = $_POST["sems"];

$sql = "INSERT INTO enrolment (c_id, s_id, academic_semester, assignment, test, final)
        VALUES ('$c_id', '$s_id', '$sems', '0', '0', '0')";

if ($conn->query($sql) === TRUE) {
  header('Location: enrollment_list.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
