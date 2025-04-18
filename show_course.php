<?php
    // Connect to MySQL
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "academic";

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $k = $_POST['id'];

  session_start();
  if (!isset($_SESSION["email"]))
    header('Location:login_form.html');
  else
    $email = $_SESSION["email"];

  $sql = "SELECT s_id FROM student WHERE email = '$email'";
  $s_id = $conn->query($sql);

// Fetch the actual value from the result set
  $s_id_row = $s_id->fetch_assoc();
  $s_id_value = $s_id_row['s_id'];

// Use the fetched value in your query
  $query = "SELECT e.*, c.name, t.full_name 
             FROM enrolment e 
             INNER JOIN course c ON e.c_id = c.c_id 
  	     INNER JOIN teacher t ON c.t_id = t.t_id
             WHERE e.academic_semester='{$k}' AND e.s_id='$s_id_value'";
  $res = $conn->query($query);

  while($row = mysqli_fetch_array($res)){
?>
  <tr>
    <td> <?php echo $row['name']; ?> </td>
    <td> <?php echo $row['full_name']; ?> </td>
    <td> <?php echo $row['assignment']; ?> </td>
    <td> <?php echo $row['test']; ?> </td>
    <td> <?php echo $row['final']; ?> </td>
  </tr>
<?php
  }
  echo $sql;
?>