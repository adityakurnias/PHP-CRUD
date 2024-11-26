<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex flex-col justify-center items-center h-screen bg-slate-900/10">
    <?php
    include("../konek.php");
    session_start();

    if (!isset($_SESSION['email']) && !isset($_SESSION['username'])) {
        header("location: ../action/login.php");
    }

    $query = "SELECT * FROM users";
    $sql = mysqli_query($konek, $query);

    ?>
    <h1 class="-mt-40 font-semibold">Your Account</h1>
    <div id="userDropdown" class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-10 bg-white divide-y divide-gray-100 rounded-lg shadow-xl w-auto dark:bg-gray-700 dark:divide-gray-600">
        <div class="px-4 py-3 text-sm text-gray-900 dark:text-white flex flex-col">
            <div class="flex items-center">
                <img class="h-7 w-7 rounded-full mr-2" src="../img/guest.png" />
                <span class="text-xl pb-1.5"><?= $_SESSION['username'] ?></span>
            </div>
            <div class=""><?= $_SESSION['email'] ?></div>
        </div>
        <form action="../action/logout.php" method="POST">
            <div class="py-1">
                <button type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Log out</button>
            </div>
        </form>
    </div>

</body>

</html>