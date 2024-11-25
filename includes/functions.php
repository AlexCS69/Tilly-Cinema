<?php
//sign up functions
function matchPassword($pwd,$cfmpwd){
   return $pwd == $cfmpwd;
}

function emptyInputSignup($username, $pwd, $repeatPwd, $email)
{
   //print_r('username-'.$username);die;

   return empty($username) or (empty($pwd)) or (empty($repeatPwd)) or (empty($email)); }

function invalidUid($username)
{ return !preg_match("/^[a-zA-Z0-9]*$/", $username); }

function pwdMatch($pwd, $repeatPwd)
{ return $pwd !== $repeatPwd; }

//-----------------------------------------
function uidExists($conn, $username, $email)
{
  $sql = "SELECT * FROM members where username = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql))
  {
    header("location: ../manageuserprofile.php?Error=SQLStatementFailed");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "s", $username);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  if($row = mysqli_fetch_assoc($resultData))
    return $row;
  else
  {
    $result = false;
    return $result;
  }

  mysqli_stmt_close($stmt);
}

function getEmail($conn, $username)
{
  $sql = "SELECT * FROM members where username = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql))
  {
    header("location: ../manageuserprofile.php?Error=GetEmailIDFailed");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "s", $username);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  if($row = mysqli_fetch_assoc($resultData))
    return $row;
  else
  {
    $result = false;
    return $result;
  }

  mysqli_stmt_close($stmt);
}

function createUser($conn, $username, $pwd, $email)
{
  $sql = "INSERT INTO members (username, password, email) VALUES (?, ?, ?);";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql))
  {
    header("location: ../manageuserprofile.php?Error=SQLStatementFailed");
    exit();
  }

  $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

  mysqli_stmt_bind_param($stmt, "sss", $username, $hashedPwd, $email);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location: ../manageuserprofile.php?Message=CreateUserRecordSuccessful");
  exit();
}

//Function name: updateUser - Update user record.
function updateUser($conn, $username, $pwd, $email,$id)
{
  //$sql = "update members set password=$pwd, email=$email where username=$username;";
  //$sql = "update members set password=?, email=? where username=?;";
  $sql = "update members set password=?, email=? where id=?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql))
  {
    header("location: ../manageuserprofile.php?Error=SQLStatementFailed");
    exit();
  }

  $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

  mysqli_stmt_bind_param($stmt, "sss", $hashedPwd, $email, $id);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  session_start();
  $_SESSION["username"] = $username;
  $_SESSION["email"] = $email;

  header("location: ../index.php?Message=UpdateUserRecordSuccessful");
  exit();
}


//login functions
function emptyInputLogin($username, $pwd) {
   return empty($username) or empty($pwd); }

//----------------------------------------
function loginUser($conn, $username, $pwd)
{
   $uidExists = uidExists($conn, $username, $email);

   if (!$uidExists) {
      header("location: ../login.php?error=UserDoesNotExist");
      exit();
   }

  $pwdHashed = $uidExists["password"];
  $checkPwd = password_verify($pwd, $pwdHashed);

  if(!$checkPwd)
  {
    header("location: ../login.php?error=PasswordsDoNotMatch");
    exit();
  } else
  {


    session_start();

    $_SESSION["ID"] = $uidExists["ID"];
    $_SESSION["priviledge_level"] = $uidExists["priviledge_level"];
    $_SESSION["username"] = $username;
    $_SESSION["email"] =$uidExists["email"];
    $priviledge_level = $uidExists["priviledge_level"];
    $email=$uidExists["email"];

    header("location: ../index.php?email='$email'");
    //header("location: ../index.php");
    exit();
  }
}

//---------------------
function console_log($data){
  echo '<script>';
  echo 'console.log('. json_encode($data).')';
  echo '</script>';
}

function header_log($data){
  $bt = debug_backtrace();
  $caller = array_shift($bt);
  $line = $caller['line'];
  $file = array_pop(explode('/', $caller['file']));
  header('log_'.$file.'_'.$caller['line'].': '.json_encode($data));
}
function write_log($log_msg)
{
    $log_filename = "logs";
    if (!file_exists($log_filename))
    {
        mkdir($log_filename, 0777, true);
    }
    $log_file_data = $log_filename.'/debug.log';
  file_put_contents($log_file_data, $log_msg . "\n", FILE_APPEND);
}
