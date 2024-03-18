<?php
    include("../konek.php");
    session_start();
  if(isset($_POST['submit'])) {
    $Pass = $_POST["password"];
    $email = $_POST["email"];
    // $hash_password = hash("sha256", $Pass);

    $sql = "SELECT * FROM users WHERE Email='$email' AND Password='$Pass'";
    $result = $konek->query($sql);

    if ($result->num_rows > 0) {
      header("Location: ../index.php");
    } else {
      echo "goblok";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[url('./img/BgTestt.jpg')] bg-cover bg-no-repeat bg-center ">
<div class="hidden md:flex bg-zinc-100/50 h-screen w-96  items-center justify-center">
      <div class="bg-zinc-100 px-4 w-3/4 h-auto rounded-lg drop-shadow-md justify-center">
      
        <h1 class="text-3xl my-3 text-center font-semibold tracking-wides text-[#322653] hover:bg-gradient-to-r from-[#9288F8] from-40 to-[#322653] to-90% bg-clip-text hover:text-transparent">
          Masuk ke Akun</h1>
      
        <form class="flex flex-col my-4" action="login.php" method="POST">
          <input class="mb-2 rounded-[8px] p-2 focus:ring ring-[#9288F8] outline-none duration-100" name="email" type="text" placeholder="Masukan Email" required>
          <input class="mb-6 rounded-[8px] p-2 focus:ring ring-[#9288F8] outline-none duration-100" name="password" type="password" placeholder="Masukan Password" required>
          <input class="mb-2 bg-[#9288F8] rounded-[8px] h-9 text-xl font-semibold tracking-wides text-[#322653] hover:scale-[1.02] ease-in-out duration-75" name="submit" type="submit" value="Login">
        </form>
        <p class="text-sm my-2">Tidak Punya Akun? <a href="regis.php" class="text-indigo-500 text-sm hover:underline">Daftar Disini</a></p>
      </div>
    </div>
  </div>
</body>
</html>
