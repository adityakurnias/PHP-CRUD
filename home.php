<?php

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
  <nav class="sticky top-0 w-screen h-9 bg-slate-200/10 p-2 px-96 shadow-md flex  justify-between items-center z-10 backdrop-blur">
    <h1 class="font-bold text-xl">Apalah</h1>
    <a href="">Account</a>
  </nav>
  <div class="w-screen h-screen px-96 flex justify-center">

    
  <!-- form post -->
    <div class=" hidden fixed flex flex-col justify-center items-center bg-slate-200/40 w-1/2 h-1/2 self-center rounded-lg backdrop-blur">
      <form class="flex flex-col justify-center items-center" action="./action/upload.php" method="post">       
        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Caption</label>
        <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
        <input class="mb-6" type="file" accept=".jpg, .png, .jpeg, .webp">
        <input type="submit" value="Upload">
      </form>
    </div>

    <!-- main feed -->


    <!-- buat trigger post -->
    <div class="fixed bg-slate-100/40 z-10 mb-10 self-end rounded-full flex justify-center items-center hover:translate-y-[-5px] duration-100 backdrop-blur-sm shadow-lg p-2">
      <p><a href="home.php?new=" name="mantap"><img onclick="addPopup()" class="" src="./img/add.png" width="40px" value="osas" ></a></p>
    </div>

  </div>

  <script src="./js/addPopup.js"></script>
</body>

</html>