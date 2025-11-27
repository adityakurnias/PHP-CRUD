<?php
include("../konek.php");
session_start();
if (!isset($_SESSION['email'])) {
  header("location: login.php");
}
$idok = '';
$caption = '';

// Check if we are in EDIT mode
if (isset($_GET['ubah'])) {
  $id = $_GET['ubah'];

  // Fetch the existing post content
  $query = "SELECT * FROM post WHERE id = '$id'";
  $sql = mysqli_query($konek, $query);

  $result = mysqli_fetch_assoc($sql);

  $idok = $result['id'];
  $caption = $result['content'];
}

// Determine form title and primary button text
$is_edit_mode = isset($_GET['ubah']);
$form_title = $is_edit_mode ? 'Edit Your Post' : 'Create New Post';
$button_text = $is_edit_mode ? 'Save Changes' : 'Post';
$button_name = $is_edit_mode ? 'edit' : 'add';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $form_title ?> - SocioPHP</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col items-center justify-center p-4">

  <div class="w-full max-w-lg bg-white rounded-xl shadow-xl p-6 sm:p-8">
    
    <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center"><?= $form_title ?></h1>

    <form action="process.php" method="POST">
      <input type="hidden" name="id-form" value="<?= $idok ?>">
      
      <label for="post-content" class="block mb-2 text-sm font-semibold text-gray-700">Content:</label>
      
      <textarea 
        id="post-content" 
        rows="6" 
        name="cp" 
        class="block p-4 w-full text-base text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 placeholder-gray-400 resize-none transition duration-150" 
        placeholder="What's on your mind? Share your thoughts here..." 
        required
      ><?= htmlspecialchars($caption) ?></textarea>
      
      <div class="mt-8 flex justify-end space-x-4">

        <a href="../page/index.php" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-200 transition duration-150">
          Cancel
        </a>

        <button 
          type="submit" 
          name="<?= $button_name ?>" 
          class="inline-flex items-center justify-center px-6 py-2 text-sm font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700 shadow-md focus:outline-none focus:ring-4 focus:ring-blue-300 transition duration-150"
        >
          <?= $button_text ?>
        </button>

      </div>
    </form>
  </div>
  
  </body>

</html>