<?php
include("../konek.php");
session_start();
if (isset($_POST['submit'])) {
    $Pass = $_POST["password"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $hash_password = sha1($Pass);

    $cek = "SELECT * FROM users WHERE email='$email'";
    $hasilcek = $konek->query($cek);

    if ($hasilcek->num_rows > 0) {
        echo "<script>alert('Username atau Email sudah digunakan')</script>";
    } else {
        $sql = "INSERT INTO `users` (`username`, `email`, `password`) VALUES ('$username', '$email', '$hash_password')";
        $result = $konek->query($sql);
        if ($result) {
          header("Location: login.php");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body  class="bg-[url('../img/tesbg.jpg')] bg-cover bg-no-repeat bg-center ">
<div class="flex bg-zinc-100/20 h-screen w-1/4  items-center justify-center backdrop-blur-sm border-2 border-slate-500">
      <div class="bg-zinc-100 px-4 w-3/4 max-w-80 h-auto rounded-lg drop-shadow-md justify-center">
      
        <h1 class="text-3xl my-3 text-center font-semibold tracking-wides text-[#322653] hover:bg-gradient-to-r from-[#9288F8] from-40 to-[#322653] to-90% bg-clip-text hover:text-transparent">
          Daftar</h1>
      
        <form class="flex flex-col my-4" action="regis.php" method="POST">
          <input class="mb-3 rounded-[8px] p-2 focus:ring ring-[#9288F8] outline-none duration-100" name="username" type="text" placeholder="Masukan Username" required>
          <input class="mb-3 rounded-[8px] p-2 focus:ring ring-[#9288F8] outline-none duration-100" name="email" type="text" placeholder="Masukan Email" required>
          <input class="mb-6 rounded-[8px] p-2 focus:ring ring-[#9288F8] outline-none duration-100" name="password" type="password" placeholder="Masukan Password" required>
          <input class="mb-2 bg-[#9288F8] rounded-[8px] h-9 text-xl font-semibold tracking-wides text-[#322653] hover:scale-[1.02] ease-in-out duration-75" name="submit" type="submit" value="Daftar">
          
        </form>
      </div>
    </div>
  </div>
</body>
</html>