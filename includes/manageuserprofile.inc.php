<?php

if (isset($_POST["update"]))
{
  $username = $_POST["username"];
  $pwd = $_POST["pwd"];
  $repeatPwd = $_POST["repeatPwd"];
  $email = $_POST["email"];
  $id = $_POST["id"];

  require_once "dbhandler.php";
  require_once "functions.php";

write_log('postid-'.$_POST["id"]);

  if(emptyInputSignup($username, $pwd, $repeatPwd, $email))
  {
    header("Location: ../manageuserprofile.php?Error=EmptyFields&username".$username);
    exit();
  }
  if(invalidUid($username))
  {
    header("location: ../manageuserprofile.php?Error=InvalidUid");
    exit();
  }
  if(pwdMatch($pwd, $repeatPwd))
  {
    header("location: ../manageuserprofile.php?Error=PasswordsDoNotMatch");
    exit();
  }
  if(!uidExists($conn, $username, $email))
  {
    header("location: ../manageuserprofile.php?Error=UsernameIsAlreadyTaken");
    exit();
  }

  // All error checking OK. Now create new user.
  updateUser($conn, $username, $pwd, $email,$id);

//----------------------

  $_SESSION['email']=$email;

  header("location: ../index.php?email='$email'");
  //header("location: ../index.php?email='$email'Message=UpdateUserRecordSuccessful");
  exit();

}

else
{
  //header("location: ../sign_up.php");
  header("Location: ../manageuserprofile.php?Message=RegisterUserSuccessful".$username);
  exit();
}
?>
