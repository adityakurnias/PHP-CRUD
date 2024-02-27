<?php
include("../konek.php");

    
    if(isset($_POST['submit'])){
    $Name = $_POST["nama"];
    $Pass = $_POST["password"];
    $Mail = $_POST["email"];
    $hash_password = hash("sha256", $Pass);

    $sql = "INSERT INTO `users` (`id`, `Nama`, `Password`, `Email`) VALUES (NULL, '$Name', '$hash_password', '$Mail')";
    $result = $konek->query($sql);
    if($result){
        echo "<script>alert('Registrasi Berhasil Dek')</script>";
        header("Location: login.php");
    } 
} 
?>

<form action="regis.php" method="post">
    <input type="text" name="nama" placeholder="Nama" required>
    <input type="password" name="password" placeholder="Password" required> 
    <input type="text" name="email" placeholder="Email" required>
    <input type="submit" name="submit">
</form>