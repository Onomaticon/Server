<?php
switch ($GLOBALS["ontomasticon"]["pageInfo"]["active_page"]) {
  case "login":
     template("user-login.php");
     break;
  case "register":
     template("user-register.php");
     break;
}
