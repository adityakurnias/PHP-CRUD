<?php
include("../konek.php");
session_start();
if (!isset($_SESSION['email']) && !isset($_SESSION['username'])) {
  header("location: ../action/login.php");
}

$query = "SELECT * FROM post ORDER BY datetime DESC";
$sql = mysqli_query($konek, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home - SocioPHP</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>

<body class="bg-gray-100 min-h-screen">
  
  <nav class="sticky top-0 w-full h-16 bg-white shadow-lg flex items-center justify-center z-10">
    <div class="w-full max-w-4xl flex items-center justify-between px-4 sm:px-6 lg:px-8">
      <h1 class="font-bold text-2xl text-blue-600">SocialNet.</h1>
      <div class="flex items-center space-x-4">
        <a href="account.php" class="flex items-center gap-2 p-2 rounded-full hover:bg-gray-100 transition duration-150">
          <div class="w-8 h-8 rounded-full bg-gradient-to-r from-cyan-500 to-blue-500 flex items-center justify-center text-white font-semibold text-sm">
            <?= strtoupper(substr($_SESSION['username'], 0, 1)); ?>
          </div>
          <div class="text-md font-semibold text-gray-700 hidden sm:block"><?= $_SESSION['username']; ?></div>
        </a>
        </div>
    </div>
  </nav>

  <div class="flex justify-center py-6">
    <div class="w-full max-w-xl space-y-5">
      
      <div class="bg-white p-4 rounded-xl shadow-md border border-gray-200">
        <div class="flex items-center">
          <div class="w-10 h-10 rounded-full bg-gray-300"></div> 
          <p class="ml-3 text-gray-500">What's on your mind, <span class="font-semibold"><?= $_SESSION['username']; ?></span>?</p>
          <a href="../action/forum.php" class="ml-auto bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full text-sm transition duration-300 shadow-md">
            Post
          </a>
        </div>
      </div>

      <?php
      while ($result = mysqli_fetch_assoc($sql)) {
      ?>
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
          
          <div class="flex justify-between items-center p-4 pb-3 border-b border-gray-100">
            <div class="flex items-center">
              <img class="h-10 w-10 rounded-full object-cover" src="../img/guest.png" alt="Profile Picture" />
              <div class="ml-3 text-sm leading-snug">
                <span class="text-gray-800 font-bold block"><?= strtoupper($result['uid']) ?></span>
                <span class="text-gray-500 text-xs"><?= $result['datetime']; ?></span>
              </div>
            </div>
            
            <?php
            // CHECKING: Only show if the logged-in user is the post owner
            if ($_SESSION['username'] == $result['uid']) {
            ?>
              <div class="flex space-x-3 text-gray-400">
                <a href="../action/forum.php?ubah=<?= $result['id']; ?>" class="hover:text-blue-500 transition duration-150" title="Edit Post">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                  </svg>
                </a>
                <a href="../action/process.php?hapus=<?= $result['id']; ?>" name="hapus" onclick="return confirm('Are you sure you want to delete this post?')" class="hover:text-red-500 transition duration-150" title="Delete Post">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.56 6.496m18.157 0c-.39-.148-1.57-.45-3.007-.45H8.783c-1.437 0-2.617.302-3.007.45L3 6.496l.75-2.25a.75.75 0 01.75-.562h15c.313 0 .584.218.723.515l.385.77A.75.75 0 0121 4.5h-.75" />
                  </svg>
                </a>
              </div>
            <?php
            } // End of conditional check
            ?>
          </div>

          <div class="py-4 px-4">
            <p class="text-gray-800 text-base whitespace-pre-wrap leading-relaxed">
              <?= htmlspecialchars($result['content']); ?>
            </p>
          </div>

          <div class="px-4 py-2 text-sm text-gray-500 font-medium border-t border-gray-100">
            <span><?= $result['laiks']; ?> Likes</span>
          </div>

          <div class="flex border-t border-gray-100 divide-x divide-gray-100">
            
            <a href="../action/process.php?laiks=<?= $result['id']; ?>" class="flex-1 flex items-center justify-center py-2 text-gray-600 hover:bg-gray-50 transition duration-150 group">
              <img class="w-5 h-5 mr-2 group-hover:opacity-80" src="../img/heart.png" alt="Like">
              <span class="font-semibold text-sm">Like</span>
            </a>
            
            <a href="https://youtu.be/uHgt8giw1LY?si=7wkOaRBMxjqtJN1S" target="_blank" class="flex-1 flex items-center justify-center py-2 text-gray-600 hover:bg-gray-50 transition duration-150 group">
              <img class="w-5 h-5 mr-2 group-hover:opacity-80" src="../img/comment.png" alt="Comment">
              <span class="font-semibold text-sm">Comment</span>
            </a>

          </div>
        </div>
      <?php
      } // End of while loop
      ?>
      
      <div class="text-center text-gray-500 py-6">
        <p>You've reached the end of the feed.</p>
      </div>

    </div>
  </div>
  
  </body>

</html>