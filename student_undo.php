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
$s_id = $_GET["id"];

$sql = "UPDATE student SET status ='active' WHERE s_id = $s_id";

if ($conn->query($sql) === TRUE) {
  header('Location: student_list.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>