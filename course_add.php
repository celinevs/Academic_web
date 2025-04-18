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

$course_name = $_POST["cname"];
$teacher_id = $_POST["teacher"];
$academic_semester = $_POST["semester"];

$sql = "INSERT INTO course (name, t_id, academic_semester, status)
        VALUES ('$course_name', '$teacher_id', '$academic_semester', 'active')";

if ($conn->query($sql) === TRUE) {
  header('Location: course_list.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>