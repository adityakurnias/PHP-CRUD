<?php
include("../konek.php");
if(isset($_POST['submit'])){
    $Name = $_POST["nama"];
    $Pass = $_POST["password"];
    $Mail = $_POST["email"];
    // $hash_password = hash("sha256", $Pass);

    $cek = "SELECT * FROM users WHERE Nama='$Name' AND Email='$Mail' AND Password='$Pass'";
    $hasilcek = $konek->query($cek);
    
    if ($hasilcek->num_rows > 0) {
        echo "masukan nama lain";
    } else {
    $sql = "INSERT INTO `users` (`id`, `Nama`, `Password`, `Email`) VALUES (NULL, '$Name', '$Pass', '$Mail')";
    $result = $konek->query($sql);
    if($result){
        echo "<script>alert('Registrasi Berhasil Dek')</script>";
        header("Location: login.php");
    } 
}}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
</head>
<body>
    <form action="regis.php" method="post">
        <input type="text" name="nama" placeholder="Nama" required>
        <input type="password" name="password" placeholder="Password" required> 
        <input type="text" name="email" placeholder="Email" required>
        <input type="submit" name="submit">
    </form>
</body>
</html>