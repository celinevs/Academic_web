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
$c_id = $_GET["id"];

$sql = "UPDATE course SET status ='active' WHERE c_id = $c_id";

if ($conn->query($sql) === TRUE) {
  header('Location: course_list.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>