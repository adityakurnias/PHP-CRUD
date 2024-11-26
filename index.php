<?php
include("../konek.php");
session_start();
if (!isset($_SESSION['email']) && !isset($_SESSION['username'])) {
  header("location: ./action/login.php");
} else {
    header("location: ./page/index.php");
}
?>