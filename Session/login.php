<?php
    include("../konek.php");
  if(isset($_POST['submit'])) {
    $Name = $_POST["nama"];
    $Pass = $_POST["password"];
    $Mail = $_POST["email"];
    // $hash_password = hash("sha256", $Pass);

    $sql = "SELECT * FROM users WHERE Nama='$Name' AND Email='$Mail' AND Password='$Pass'";
    $result = $konek->query($sql);

    if ($result->num_rows > 0) {
      header("Location: ../index.php");
    } else {
      echo "gagal ajur!!!";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>
<h1>Login</h1>
  <form action="login.php" method="post">
      <input type="text" name="nama" placeholder="Nama" required>
      <input type="password" name="password" placeholder="Password" required> 
      <input type="text" name="email" placeholder="Email" required>
      <input type="submit" name="submit" value="Login">
  </form>
</body>
</html>
