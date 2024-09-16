<?php

if (isset($_POST["submit"]))
{
  $username = $_POST["username"];
  $pwd = $_POST["pwd"];
//print_r('username-'.$username.' '.$pwd);die;


  require_once "dbhandler.php";
  require_once "functions.php";

  if(emptyInputLogin($username, $pwd))
  {
    header("location: ../login.php?error=emptyinput");
    exit();
  }

  loginUser($conn, $username, $pwd);


} else
{


  header("location: ../login.php");
  exit();
}
