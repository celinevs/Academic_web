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
$e_id = $_POST["e_id"];
$asgn = $_POST["asgn"];
$test = $_POST["test"];
$final = $_POST["final"];

$sql = "UPDATE enrolment SET assignment = '$asgn', test = '$test', final = '$final' where e_id = '$e_id'";

if ($conn->query($sql) === TRUE) {
  header('Location: enrollment_list.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>