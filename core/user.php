<?php

//Check whether a user has permissions for an action.
function userAllow($task) {
  if (isset($_SESSION["user"])) {
    global $db;
    $sql = "SELECT * FROM `users` WHERE `email` = '".$_SESSION["user"]."';";
    $rs = $db->query($sql);
    $numrows = mysqli_num_rows($rs);
    if ($numrows == 1) {
      $user = mysqli_fetch_assoc($rs);
      if ($user["id"] == 1 || $user["role"] == "administer") {
        return TRUE;
      } else {
        return FALSE;
      }
    } else {
      return FALSE;
    }
  } else {
    return FALSE;
  }
}

function login(){
  global $db;
  $email = $db->real_escape_string(trim($_POST['email']));
  $password = $db->real_escape_string(trim($_POST['password']));

  $sql = "SELECT * FROM `users` WHERE email = '".$email."'";
  $rs = $db->query($sql);
  $numRows = mysqli_num_rows($rs);
  if($numRows  == 1){
    $row = mysqli_fetch_assoc($rs);
    if(password_verify($password,$row['password'])){
      $_SESSION["user"] = $email;
    } else {
      print t("Wrong password");
    }
  } else {
    print t("No matching user found");
  }
}

function logout(){
  global $db;
  unset($_SESSION["user"]);
  print "Logged out.";
}

function loadUser($email) {
  global $db;
  $email = $db->real_escape_string($email);
  $sql = "SELECT * FROM `users` WHERE `email` = '".$email."';";
  $result = $db->query($sql);
  if ($result) {
    $ret = $result->fetch_assoc();
    unset($ret["password"]);
    return($ret);
  }
  return(null);
}

function createUser(){
  $firstName = $db->real_escape_string($_POST['first_name']);
  $surName   = $db->real_escape_string($_POST['surname']);
  $email     = $db->real_escape_string($_POST['email']);
  $password  = $db->real_escape_string($_POST['password']);

  $options = array("cost"=>4);
  $hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);

  global $db;
  $sql = "INSERT INTO `users` (first_name, last_name, email, password) value('".$firstName."', '".$surName."', '".$email."','".$hashPassword."')";
  $result = $db->query($sql);
  if($result) {
    print t("User created");
  }
}

function editUser() {
  $error = "";
  global $db;

  $first_name  = $db->real_escape_string($_POST['first_name']);
  $last_name   = $db->real_escape_string($_POST['last_name']);
  $o_password  = $db->real_escape_string($_POST['old_password']);
  $n_password1 = $db->real_escape_string($_POST['new_password1']);
  $n_password2 = $db->real_escape_string($_POST['new_password2']);

  if (!($o_password == "" && $n_password1 == "" && $n_password2 == "")) {
    if ($o_password == "") {
      $error .= "<p>Current password must be provided.</p>";
    }
    if ($n_password1 == "" || $n_password2 == "") {
      $error .= "<p>You must repeat the new password.</p>";
    }
    if (!($n_password1 == $n_password2)) {
      $error .= "<p>New password and repeat password must match.</p>";
    }
  }

  if ($error != "") {
    $out  = "<div class='error'>";
    $out .= $error;
    $out .= "</div>";
    print $out;
  } else {
    $options = array("cost"=>4);
    if ($n_password1 == "") {
      $hashPassword = null;
    } else {
      $hashPassword = password_hash($n_password1,PASSWORD_BCRYPT,$options);
    }

    $sql  = "UPDATE `users` SET ";
    $sql .= "`first_name` = '".$first_name."', ";
    $sql .= "`last_name` = '".$last_name."'";
    $sql .= ($hashPassword == null) ? "" : ", `password` = '".$hashPassword."'";
    $sql .= " WHERE `email` = '".$_SESSION["user"]."';";
    $db->query($sql);
    $_SESSION["user"] = "email";
  }
}
