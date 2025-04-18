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

$student_id = $_POST["student_id"];
$full_name = $_POST["name"];
$date_of_birth = $_POST["date"];
$email = $_POST["email"];
$department = $_POST["dept"];
$GPA = $_POST["gpa"];

$sql = "UPDATE student SET full_name = '$full_name', date_of_birth = '$date_of_birth', email = '$email', department = '$department', GPA = '$GPA' WHERE s_id = '$student_id'";

if ($conn->query($sql) === TRUE) {
  header('Location: student_list.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>