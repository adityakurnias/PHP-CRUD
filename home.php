<?php
include("konek.php");
session_start();
if (!isset($_SESSION['email']) && !isset($_SESSION['username'])) {
  header("location: action/login.php");
}
$query = "SELECT * FROM post ORDER BY datetime DESC";
$sql = mysqli_query($konek, $query);


$querya = "SELECT * FROM `users` ";
$sqla = mysqli_query($konek, $querya);
$hasil = mysqli_fetch_assoc($sqla);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-mono overflow-x-hidden h-screen bg-slate-100">
  <nav class="sticky top-0 w-screen h-auto bg-slate-200/10 shadow-md flex flex-col justify-center z-10 backdrop-blur">
    <div class="flex items-center justify-around border-b-[1px] border-slate-50">
      <h1 class="font-bold text-xl">Apalah</h1>
      <a class="text-md pt-1" href="account.php"><?= strtoupper($_SESSION['username']); ?></a>
    </div>
    <div class="flex items-center justify-evenly h-6">
      <a class="text-lg" href="">NEW</a>
      <a class="text-lg" href="">HOT</a>
    </div>
  </nav>

  <div class="mx-auto h-screen flex justify-center">
    <div class="flex flex-col ">
      <!-- main feed -->
      <?php
      while ($result = mysqli_fetch_assoc($sql)) {
      ?>
        <div class="items-center p-2">
          <div class="bg-white border-gray-200 p-4 rounded-xl w-2xl h-auto border min-w-64 max-w-2xl flex flex-col ">
            <div class="flex justify-between">
              <div class="flex items-center">
                <img class="h-11 w-11 rounded-full" src="img/guest.png" />
                <div class="ml-1.5 text-sm leading-tight">
                  <span class="text-black font-bold block "><?= strtoupper($result['uid']) ?></span>
                  <span class="text-gray-500 font-normal block"></span>
                </div>
              </div>
              <!-- edit -->
              <a href="forum.php?ubah=<?= $result['id']; ?>" class="">🖊</a></span>
            </div>
            <div class="text-wrap">
              <p class="text-black block text-xl leading-snug mt-3 break-all"><?= $result['content']; ?></p>
            </div>
            <p class="text-gray-500 text-base py-1 my-0.5"><?= $result['datetime']; ?></p>
            <div class="border-gray-200 border border-b-0 my-1"></div>
            <div class="text-gray-500 flex mt-3">
              <div class="flex items-center mr-6">
                <a href="action/process.php?laiks=<?= $result['id']; ?>"><img class="w-[25px] hover:w-7 duration-100" src="./img/heart.png"></a>
                <span class="ml-3"><?= $result['laiks']; ?></span>
              </div>
              <div class="flex items-center ">
                <a class="w-6" href="https://youtu.be/uHgt8giw1LY?si=7wkOaRBMxjqtJN1S" target="_blank"><img src="./img/comment.png" alt=""></a>
                <span class="ml-8">
                  <!-- delete -->
                  <a href="action/process.php?hapus=<?= $result['id']; ?>" name="hapus" onclick="return confirm('Yakin dek?')"><img class="w-4 hover:w-5 duration-100" src="./img/trash-bin.png"></a></span>
              </div>
            </div>
          </div>
        </div>
      <?php
      }
      ?>
    </div>

    <!-- buat trigger post -->
    <div class="fixed bg-slate-100/40 z-10 mb-16 rounded-full flex justify-center items-center hover:translate-y-[-5px] duration-100 backdrop-blur-sm shadow-lg p-2 self-end mx-auto">
      <p><a href="forum.php" name="mantap"><img id="addPopup" class="" src="./img/add.png" width="40px" value="osas"></a></p>
    </div>
  </div>

  <script src="./js/addPopup.js"></script>
</body>

</html>