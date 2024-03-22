<?php
  include ("konek.php");

  if(isset($_POST['submit'])){
    if($_POST['submit'] == "add"){
      add();
    } else if ($_POST['submit'] == "edit"){
      edit();
    } else {
      delete();
    }
  }

  function add(){
    global $konek;

    $caption = $_POST['cp'];
    $img = "botak.jpg";

    $query= "INSERT INTO `post`(`caption`, `image`) VALUES ('$caption','$img')";
    $sql = mysqli_query($konek, $query);

    if($sql){
      echo "<script>alert('osas')</script>";
    } else {
      echo "<script>alert('error')</script>";
    }

  }
  function edit(){

  }
  function delete(){

  }
  
// read

  $query = "SELECT * FROM `post` ";
  $sql = mysqli_query($konek, $query);

  if($sql){
      header("location: contoh.php");
  } else {
      echo $query;
  }
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <form action="" method="post" enctype="multipart/form-data">
    <textarea name="cp" id="" cols="30" rows="10" placeholder="osas"></textarea> <br>
    <input type="file" accept=".jpg, .png, .jpeg" name="image">
    <input type="submit" name="submit" value="add">
  </form>

  <!-- read -->
  <div class="bg-stone-600">
  <?php while($result= mysqli_fetch_assoc($sql))
  { ?>
        <img src="<?= $result ?>" alt="">
        <p><?= $result ?></p>

        <?php } ?>
</body>
</html>
