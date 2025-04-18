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
session_start();
$email = $_SESSION['email'];
$old_pass = $_POST["old"];
$new_pass = $_POST["new"];

// Retrieve the current password from the database for the given email
$sql_student = "SELECT password FROM student WHERE email = '$email'";
$sql_teacher = "SELECT password FROM teacher WHERE email = '$email'";
$result_s = $conn->query($sql_student);
$result_t = $conn->query($sql_teacher);

if ($result_s->num_rows > 0) {
    $row = $result_s->fetch_assoc();
    $stored_password = $row["password"];

    if (md5($old_pass) === $stored_password) {

        $update_sql = "UPDATE student SET password = md5('$new_pass') WHERE email = '$email'";

        if ($conn->query($update_sql) === TRUE) {
            header('Location: content.php');
        } else {
            echo "Error updating password: " . $conn->error;
        }
    } else {
        echo "The old password is incorrect.";
    }
  }
elseif ($result_t->num_rows > 0) {

$row = $result_t->fetch_assoc();
    $stored_password = $row["password"];

    if (md5($old_pass) === $stored_password) {

        $update_sql = "UPDATE teacher SET password = md5('$new_pass') WHERE email = '$email'";

        if ($conn->query($update_sql) === TRUE) {
            header('Location: teacher_content.php');
        } else {
            echo "Error updating password: " . $conn->error;
        }
    } else {
        echo "The old password is incorrect.";
    }
  }

else {
    echo "Email not found.";
}

$conn->close();
?>