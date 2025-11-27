<?php
include("../konek.php");
session_start();

$error_message = '';

if (isset($_POST['submit'])) {
    $Pass = $_POST["password"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    
    // PENTING: sha1() TIDAK AMAN untuk password. Harap gunakan password_hash() (Bcrypt) di aplikasi nyata.
    $hash_password = sha1($Pass);

    // Cek apakah username atau email sudah digunakan
    $cek = "SELECT * FROM users WHERE email='$email' OR username='$username'";
    $hasilcek = $konek->query($cek);

    if ($hasilcek->num_rows > 0) {
        $error_message = 'Username atau Email sudah digunakan. Silakan pilih yang lain.';
    } else {
        $sql = "INSERT INTO `users` (`username`, `email`, `password`) VALUES ('$username', '$email', '$hash_password')";
        $result = $konek->query($sql);
        
        if ($result) {
            // Berhasil daftar, arahkan ke halaman login
            header("Location: login.php");
            exit();
        } else {
            $error_message = 'Terjadi kesalahan saat pendaftaran. Silakan coba lagi.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - SocioPHP</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">

    <div class="bg-white px-8 py-10 w-full max-w-sm rounded-xl shadow-xl border border-gray-200">
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-blue-600 mb-1">SocialNet.</h1>
            <p class="text-gray-600">Buat Akun Baru</p>
        </div>

        <?php if ($error_message): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline"><?= $error_message ?></span>
            </div>
        <?php endif; ?>

        <form class="flex flex-col space-y-4" action="regis.php" method="POST">
            
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                <input 
                    id="username"
                    class="w-full rounded-lg p-3 border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-150" 
                    name="username" 
                    type="text" 
                    placeholder="Pilih Username Anda" 
                    required
                    value="<?= isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '' ?>"
                >
            </div>
            
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input 
                    id="email"
                    class="w-full rounded-lg p-3 border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-150" 
                    name="email" 
                    type="email" 
                    placeholder="email@example.com" 
                    required
                    value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>"
                >
            </div>
            
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input 
                    id="password"
                    class="w-full rounded-lg p-3 border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-150" 
                    name="password" 
                    type="password" 
                    placeholder="Buat Password" 
                    required
                >
            </div>

            <button 
                type="submit"
                name="submit" 
                class="mt-4 w-full bg-blue-600 rounded-lg h-11 text-lg font-semibold text-white hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 transition duration-150 shadow-md" 
                value="Daftar"
            >
                Daftar
            </button>
        </form>
        
        <p class="text-center text-sm mt-6 text-gray-600">
            Sudah Punya Akun? 
            <a href="login.php" class="text-blue-600 font-bold hover:underline">Masuk Disini</a>
        </p>
    </div>
</body>

</html>