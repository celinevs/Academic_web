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

$teacher_id = $_POST["teacher_id"];
$full_name = $_POST["name"];
$date_of_birth = $_POST["date"];
$email = $_POST["email"];
$department = $_POST["dept"];

$sql = "UPDATE teacher SET full_name = '$full_name', date_of_birth = '$date_of_birth', email = '$email', department = '$department' WHERE t_id = '$teacher_id'";

if ($conn->query($sql) === TRUE) {
  header('Location: teacher_list.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>