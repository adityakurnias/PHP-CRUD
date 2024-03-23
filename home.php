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

    


    <!-- main feed -->
    

    <!-- buat trigger post -->
    <div class="fixed bg-slate-100/40 z-10 mb-10 self-end rounded-full flex justify-center items-center hover:translate-y-[-5px] duration-100 backdrop-blur-sm shadow-lg p-2">
      <p><a href="forum.php" name="mantap"><img id="addPopup" class="" src="./img/add.png" width="40px" value="osas" ></a></p>
    </div>

  </div>

  <script src="./js/addPopup.js"></script>
</body>

</html>