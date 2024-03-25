<?php
session_start();
include("../konek.php");

if (isset($_POST['add'])) {
  add();
} else if (isset($_POST['edit'])) {
  edit();
} else if (isset($_GET['hapus'])) {
  delete();
}


function add()
{
  global $konek;
  //ambil id
  $email = $_SESSION['email'];
  $ambilname = "SELECT username FROM users WHERE email = '$email'";
  $res = $konek->query($ambilname);
  $uid = $res->fetch_assoc()['username'];

  $caption = $_POST['cp'];
  $query = "INSERT INTO `post`(`uid`, `content`) VALUES ('$uid','$caption')";
  $sql = mysqli_query($konek, $query);

  if ($sql) {
    header("location: ../home.php");
  } else {
    echo "<script>alert('error')</script>";
  }
}
function edit()
{
  global $konek;    //global $konek; buat nyambungin include dari ataske function

  $id = $_POST['id-form'];
  $caption = $_POST['cp'];

  $query = "UPDATE `post` SET `caption`='$caption' WHERE id='$id'";
  $sql = mysqli_query($konek, $query);

  if ($sql) {
    header("location: ../home.php");
  } else {
    echo "$query";
  }
}



function delete()
{
  global $konek;

  $id = $_GET['hapus'];

  $query = "DELETE FROM `post` WHERE id='$id'";
  $sql = mysqli_query($konek, $query);

  if ($sql) {
    header("location: ../home.php");
  } else {
    echo $query;
  }
}
