<?php
session_start();
if (!isset($_SESSION['mySession']))
{
  //header("location: login.php");
  echo "<script>alert('Please login!'); window.location.href='admin_login.php';</script>";
}
else {
}
?>