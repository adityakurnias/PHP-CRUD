<?php
   include ("konek.php");
   session_start();
   if(!isset($_SESSION['email'])){
    header("location: action/login.php");
   }
   $idok = '';
   $caption = '';  //dikasih variabel value kosong buat di kondisi add captionnya ga ke trigger

 if(isset($_GET['ubah'])){
   $id = $_GET['ubah'];

// dibawah ini cara buat read buat edit, jadi pas edit ada bekas inputkita di add cuy #bangsat
  $query= "SELECT * FROM post WHERE id = '$id';";
  $sql = mysqli_query($konek, $query);

  $result = mysqli_fetch_assoc($sql);

   $idok= $result['id'];
   $caption = $result['caption'];
 }

?>

  <!-- form post -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.4/dist/flowbite.min.css" />

<!-- This is an example component -->
<div class="max-w-2xl mx-auto mt-8">
    <form action="action/process.php" method="POST">
      <!-- dibawah ini, input buat cek doang udh sesuai belum idnya :v + cek di proses -->
    <input type="hidden" name="id-form" value="<?= $idok ?>">
	<label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Your Post:</label>
  <textarea id="message" rows="4" name="cp" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Example:Adit kayang di rooftop" required><?= $caption ?></textarea>
  <div class="mt-8 flex justify-center">

  <!-- kondisi -->
   <?php
      if(isset($_GET['ubah'])){
    ?>
    <button type="submit" name="edit" class="middle none center mr-4 rounded-lg bg-blue-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
  data-ripple-light="true">Save</button>
  <a href="home.php"  class="middle none center mr-4 rounded-lg bg-red-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-red-500/20 transition-all hover:shadow-lg hover:shadow-red-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
  data-ripple-light="true">Cancel</a>

  <?php
   } else {
  ?>

  <button type="submit" name="add"  class="middle none center mr-4 rounded-lg bg-blue-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
  data-ripple-light="true">Submit</button>
  <a href="home.php"  class="middle none center mr-4 rounded-lg bg-red-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-red-500/20 transition-all hover:shadow-lg hover:shadow-red-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
  data-ripple-light="true">Cancel</a>

  <?php
   } 
   echo $_SESSION['username'];?>

</div>
    <!-- component juga -->
    <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
</div>
</form>
</body>
</html>



