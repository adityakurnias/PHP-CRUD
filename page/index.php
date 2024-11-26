<?php
include("../konek.php");
session_start();
if (!isset($_SESSION['email']) && !isset($_SESSION['username'])) {
  header("location: ../action/login.php");
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

<body class="font-mono overflow-x-hidden h-screen bg-slate-100 box-border">
  <nav class="sticky top-0 w-screen h-20 bg-slate-200/10 shadow-md flex flex-col justify-center z-10 backdrop-blur">
    <div class="flex items-center justify-around border-b-[0.1  `px] border-slate-50">
      <h1 class="font-bold text-xl">PHP CRUD.</h1>
      <a href="account.php" class="flex items-center gap-1">
        <div class="w-9 h-9 rounded-full bg-gradient-to-r from-cyan-500 to-blue-500"></div>
        <div class="text-md pt-1"><?= strtoupper($_SESSION['username']); ?></div>
      </a>
    </div>
  </nav>

  <div class="mx-auto h-screen flex justify-center">
    <div class="flex flex-col ">
      <!-- main feed -->
      <?php
      while ($result = mysqli_fetch_assoc($sql)) {
      ?>
        <div class="items-center p-2">
          <div class="border p-4 rounded-xl h-auto min-w-96 max-w-2xl flex flex-col ">
            <div class="flex justify-between">
              <div class="flex items-center">
                <img class="h-11 w-11 rounded-full" src="../img/guest.png" />
                <div class="ml-1.5 text-sm leading-tight">
                  <span class="text-black font-bold block "><?= strtoupper($result['uid']) ?></span>
                  <span class="text-gray-500 font-normal block"></span>
                </div>
              </div>
              <!-- edit -->
              <a href="../action/forum.php?ubah=<?= $result['id']; ?>" class="">🖊</a></span>
            </div>
            <div class="text-wrap break-words">
              <p class="text-black block text-xl leading-snug mt-3 break-all"><?= $result['content']; ?></p>
            </div>
            <p class="text-gray-500 text-base py-1 my-0.5"><?= $result['datetime']; ?></p>
            <div class="border-gray-200 border border-b-0 my-1"></div>
            <div class="text-gray-500 flex mt-3">
              <div class="flex items-center mr-6">
                <a href="../action/process.php?laiks=<?= $result['id']; ?>"><img class="w-[25px] hover:w-7 duration-100" src="../img/heart.png"></a>
                <span class="ml-3"><?= $result['laiks']; ?></span>
              </div>
              <div class="flex items-center ">
                <a class="w-6" href="https://youtu.be/uHgt8giw1LY?si=7wkOaRBMxjqtJN1S" target="_blank"><img src="../img/comment.png" alt=""></a>
                <span class="ml-8">
                  <!-- delete -->
                  <a href="../action/process.php?hapus=<?= $result['id']; ?>" name="hapus" onclick="return confirm('Hapus?')"><img class="w-4 hover:w-5 duration-100" src="../img/trash-bin.png"></a></span>
              </div>
            </div>
          </div>
        </div>
      <?php
      }
      ?>
    </div>

    <div class="group fixed bottom-0 right-0 p-2  flex items-end justify-end w-24 h-24 ">
      <!-- main -->
      <div class="text-white shadow-xl flex items-center justify-center p-3 rounded-full bg-gradient-to-r from-cyan-500 to-blue-500 z-50 absolute  ">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 group-hover:rotate-90 transition-all duration-[0.6s]">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
          <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
      </div>
      <!-- sub left -->
      <div class="absolute rounded-full transition-all duration-[0.2s] ease-out scale-y-0 group-hover:scale-y-100 group-hover:-translate-x-16   flex  p-2 hover:p-3 bg-green-300 scale-100 hover:bg-green-400 text-white">
        <a href="account.php"><img src="../img/settings.png" width="30px"></a>
      </div>
      <!-- sub top -->
      <div class="absolute rounded-full transition-all duration-[0.2s] ease-out scale-x-0 group-hover:scale-x-100 group-hover:-translate-y-16  flex  p-2 hover:p-3 bg-blue-300 hover:bg-blue-400  text-white">
        <a href="../action/forum.php" name="mantap"><img id="addPopup" class="" src="../img/plus.png" width="30px" value="osas"></a>
      </div>
      <!-- sub middle -->
      <div class="absolute rounded-full transition-all duration-[0.2s] ease-out scale-x-0 group-hover:scale-x-100 group-hover:-translate-y-14 group-hover:-translate-x-14   flex  p-2 hover:p-3 bg-yellow-300 hover:bg-yellow-400 text-white">
        <a href="about.php">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
          </svg></a>
      </div>
    </div>
  </div>
  <script src="./js/addPopup.js"></script>
</body>

</html>