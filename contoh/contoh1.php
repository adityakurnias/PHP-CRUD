<?php
  include ("../konek.php");

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

    $query= "INSERT INTO `post`(`caption`) VALUES ('$caption')";
    $sql = mysqli_query($konek, $query);

    if($sql){
      header("location: contoh2.php");
    } else {
      echo "<script>alert('error')</script>";
    }




  }
  function edit(){

  }
  function delete(){

  }
  
// read


  

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
    <textarea name="cp" id="" cols="30" rows="10" placeholder="osas" required></textarea>
    <input type="file" accept=".jpg, .png, .jpeg" name="foto"> 
    <br>
    <input type="submit" name="submit" value="add">
  </form>

  <!-- read -->

</body>
</html>
