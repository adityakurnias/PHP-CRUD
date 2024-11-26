<?php
    include("../konek.php");
    session_start();
  if(isset($_POST['submit'])) {
    $Pass = $_POST["password"];
    $email = $_POST["email"];
   
    $hash_password = sha1($Pass);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$hash_password'";
    $result = $konek->query($sql);
    $adudu= mysqli_fetch_assoc($result);
   
    if ($result->num_rows > 0) {
      $_SESSION['username']= $adudu['username'];
      $_SESSION['email'] = $email;
      header("location: ../page/index.php");
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
<body class="bg-[url('../img/tesbg.jpg')] bg-cover bg-no-repeat bg-center ">
<div class="flex bg-zinc-100/20 h-screen items-center justify-center backdrop-blur-sm border-2 border-slate-500 w-screen">
      <div class="bg-zinc-100 px-4 w-3/4 max-w-80 h-auto rounded-lg drop-shadow-md justify-center">
      
        <h1 class="text-3xl my-3 text-center font-semibold tracking-wides text-slate-700">
          Masuk ke Akun</h1>
      
        <form class="flex flex-col my-4" action="login.php" method="POST">
          <input class="mb-2 rounded-[8px] p-2 focus:ring ring-slate-500 outline-none duration-100" name="email" type="text" placeholder="Masukan Email" required>
          <input class="mb-6 rounded-[8px] p-2 focus:ring ring-slate-500 outline-none duration-100" name="password" type="password" placeholder="Masukan Password" required>
          <input class="mb-2 bg-slate-600 rounded-[8px] h-9 text-xl font-semibold tracking-wides text-slate-50 hover:scale-[1.02] ease-in-out duration-75" name="submit" type="submit" value="Login">
        </form>
        <p class="text-sm my-2">Tidak Punya Akun? <a href="regis.php" class="text-slate-600 font-bold text-sm hover:underline">Daftar Disini</a></p>
      </div>
    </div>
  </div>
</body>
</html>
