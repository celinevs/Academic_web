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

$course_id = $_POST["course_id"];
$course_name = $_POST["cname"];
$teacher_id = $_POST["teacher"];
$academic_semester = $_POST["semester"];

$sql = "UPDATE course SET name = '$course_name', t_id = '$teacher_id', academic_semester = '$academic_semester' WHERE c_id = '$course_id'";

if ($conn->query($sql) === TRUE) {
  header('Location: course_list.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>