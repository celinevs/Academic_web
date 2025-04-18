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
$name = $_POST["name"];
$birth_date = $_POST["date"];
$email = $_POST["email"];
$department = $_POST["dept"];
$password = md5('calvin');

$sql = "INSERT INTO teacher (full_name, date_of_birth, email, department, password, status)
        VALUES ('$name', '$birth_date', '$email', '$department', '$password', 'active')";

if ($conn->query($sql) === TRUE) {
  header('Location: teacher_list.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
