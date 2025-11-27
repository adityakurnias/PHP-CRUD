<?php
include("../konek.php");
session_start();

if (!isset($_SESSION['email']) && !isset($_SESSION['username'])) {
    header("location: ../action/login.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Settings - SocioPHP</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col items-center pt-10">

    <div class="w-full max-w-sm sm:max-w-md mb-6 flex justify-between items-center px-4 sm:px-0">
        <a href="index.php" class="text-blue-600 hover:text-blue-800 font-medium flex items-center transition duration-150">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 mr-1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
            </svg>
            Back to Feed
        </a>
        <h1 class="text-2xl font-bold text-gray-800">Your Account</h1>
    </div>

    <div class="w-full max-w-sm sm:max-w-md bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
        
        <div class="p-6 border-b border-gray-100 flex flex-col items-center">
            <div class="w-20 h-20 rounded-full bg-gradient-to-r from-cyan-500 to-blue-500 flex items-center justify-center text-white font-bold text-3xl mb-3 shadow-md">
                <?= strtoupper(substr($_SESSION['username'], 0, 1)); ?>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 mb-1"><?= $_SESSION['username'] ?></h2>
            <p class="text-gray-500 text-sm"><?= $_SESSION['email'] ?></p>
        </div>

        <div class="py-2">
            
            <div class="block px-6 py-3 text-sm text-gray-700">
                <span class="font-medium">Profile Status:</span> Active
            </div>
            <div class="block px-6 py-3 text-sm text-gray-700 hover:bg-gray-50 cursor-pointer transition duration-150 border-t border-gray-100">
                Manage Profile (Future Feature)
            </div>
            <div class="block px-6 py-3 text-sm text-gray-700 hover:bg-gray-50 cursor-pointer transition duration-150 border-t border-gray-100">
                Change Password
            </div>

            <form action="../action/logout.php" method="POST" class="border-t border-gray-100 mt-2">
                <button type="submit" class="w-full text-left px-6 py-3 text-sm font-semibold text-red-600 hover:bg-red-50 hover:text-red-700 transition duration-150">
                    Log out
                </button>
            </form>
        </div>
    </div>

</body>

</html>