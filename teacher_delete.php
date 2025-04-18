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
$t_id = $_GET["id"];

$sql = "UPDATE teacher SET status ='nan' WHERE t_id = $t_id";

if ($conn->query($sql) === TRUE) {
  header('Location: teacher_list.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>