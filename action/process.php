<?php
session_start();
include("../konek.php");

if (isset($_POST['add'])) {
  add();
} else if (isset($_POST['edit'])) {
  edit();
} else if (isset($_GET['hapus'])) {
  delete();
} elseif(isset($_GET['laiks'])){
  laiks();
}



function add()
{
  global $konek;
  //ambil uname
  $email = $_SESSION['email'];
  $ambilname = "SELECT username FROM users WHERE email = '$email'";
  $res = $konek->query($ambilname);
  $uid = $res->fetch_assoc()['username'];

  $caption = $_POST['cp'];
  $query = "INSERT INTO `post`(`uid`, `content`, `laiks`) VALUES ('$uid','$caption', 0)";
  $sql = mysqli_query($konek, $query);

  if ($sql) {
    header("location: ../home.php");
  } else {
    header("location: ../home.php");
  }
}
function edit()
{
  global $konek;    //global $konek; buat nyambungin include dari ataske function

  $id = $_POST['id-form'];
  $caption = $_POST['cp'];

  $query = "UPDATE `post` SET `content`='$caption' WHERE id='$id'";
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


function laiks() {
  global $konek;

  $id = $_GET['laiks'];

  $laiksquery = "SELECT laiks FROM post WHERE id= '$id'";
  $res = $konek->query($laiksquery);
  $resslaik = $res->fetch_assoc()['laiks'];


  if($resslaik){
   echo $resslaik;
  }



}