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
$student_name = $_POST["name"];
$birth_date = $_POST["date"];
$email = $_POST["email"];
$department = $_POST["dept"];
$gpa = $_POST["gpa"];
$password = md5('calvin'); 

$sql = "INSERT INTO student (full_name, date_of_birth, email, department, GPA, password, status)
        VALUES ('$student_name', '$birth_date', '$email', '$department', '$gpa', '$password', 'active')";

if ($conn->query($sql) === TRUE) {
  header('Location: student_list.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
