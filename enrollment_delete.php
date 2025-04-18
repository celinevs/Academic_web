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
$e_id = $_GET["id"];

$sql = "DELETE FROM enrolment WHERE e_id= $e_id";

if ($conn->query($sql) === TRUE) {
  header('Location: enrollment_list.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>