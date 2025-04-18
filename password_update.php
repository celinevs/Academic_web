<!DOCTYPE html>
<html lang="en">
<head>
  <title>Password Update</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://bootswatch.com/5/lux/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background-color: #f8f9fa;
    }

    .form-container {
      background-color: white;
      padding: 2rem;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      max-width: 600px;
      margin: 0 auto;
    }

    .form-title {
      margin-bottom: 2rem;
      text-align: center;
      font-size: 24px;
    }

    .form-control:focus {
      box-shadow: none;
      border-color: #007bff;
    }

    .btn-primary {
      background-color: #495057;
      border-color: #495057;
      width: 100%;
      padding: 14px 20px;
    }

    .btn-primary:hover {
      background-color: #343a40;
      border-color: #343a40;
    }

    .clearbtn {
      background-color: #f44336;
      border-color: #f44336;
      color: white;
      width: 100%;
      padding: 14px 20px;
    }

    .clearbtn:hover {
      background-color: #d32f2f;
      border-color: #d32f2f;
    }

    .d-grid {
      display: grid;
      gap: 8px;
    }

    .modal-content {
      padding: 16px;
    }

    @media screen and (max-width: 300px) {
      .clearbtn, .btn-primary {
        width: 100%;
      }
    }
  </style>
</head>
<body>

<form class="form-container modal-content" action="password_checker.php" method="post">
  <h2 class="form-title">Password Update</h2>
  <div class="container">
    <div class="mb-3">
      <label for="old" class="form-label"><b>Old Password</b></label>
      <input type="password" class="form-control" id="old" placeholder="Enter Your Last Password" name="old" required>
      <input type="checkbox" onclick="showPass('old')"> Show Password
    </div>
    <div class="mb-3">
      <label for="new" class="form-label"><b>New Password</b></label>
      <input type="password" class="form-control" id="new" placeholder="Enter Your New Password" name="new" required>
      <input type="checkbox" onclick="showPass('new')"> Show Password
    </div>
  </div>

  <div class="container d-grid" style="background-color:#f1f1f1">
    <button type="button" onclick="clearFields();" class="btn btn-primary clearbtn">Clear</button>
    <button type="submit" class="btn btn-primary">Update Password</button>
  </div>
</form>

<script>
  function showPass(fieldId) {
    var x = document.getElementById(fieldId);
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }

  function clearFields() {
    document.getElementById("old").value = "";
    document.getElementById("new").value = "";
  }
</script>

</body>
</html>
