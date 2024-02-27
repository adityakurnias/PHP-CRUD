<?php
    include("../konek.php");
  if(isset($_POST['submit'])) {
    $Name = $_POST["nama"];
    $Pass = $_POST["password"];
    $Mail = $_POST["email"];
    $hash_password = hash("sha256", $Pass);

    $sql = "SELECT * FROM users WHERE Nama='$Name' AND Password='$hash_password' AND Email='$Mail' ";
    $result = $konek->query($sql);

    if ($result) {
      echo "<script>alert('login oke')</script>";
      header("Location: kocak.php");
    }
  }
?>
<h1>Login</h1>
<form action="login.php" method="post">
    <input type="text" name="nama" placeholder="Nama" required>
    <input type="password" name="password" placeholder="Password" required> 
    <input type="text" name="email" placeholder="Email" required>
    <input type="submit" name="submit" value="Login">
</form>
