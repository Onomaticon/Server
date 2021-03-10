<?php

//Check whether a user has permissions for an action.
function userAllow($task) {
  //TODO: read these from db
  if ($task == "administer") {return TRUE;}
  if ($task == "view-cv") {return TRUE;}
  if ($task == "create-user") {return TRUE;}
  return FALSE;
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
}

function createUser(){
    $firstName = $db->real_escape_string($_POST['first_name']);
    $surName   = $db->real_escape_string($_POST['surname']);
    $email     = $db->real_escape_string($_POST['email']);
    $password  = $db->real_escape_string($_POST['password']);

    $options = array("cost"=>4);
    $hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);

    $sql = "INSERT INTO `users` (first_name, last_name, email, password) value('".$firstName."', '".$surName."', '".$email."','".$hashPassword."')";
    $result = mysqli_query($db, $sql);
    if($result) {
      print t("User created");
    }
}
