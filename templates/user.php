<div id="sub-menu">
  <?php if (isset($_SESSION["user"])) {
          print l("Add user", "/user/register"); 
        } else { 
          print l("Login", "/user/login");
        } ?>
</div>
<?php
switch ($GLOBALS["ontomasticon"]["pageInfo"]["active_page"]) {
  case "login":
     template("user-login.php");
     break;
  case "register":
     template("user-register.php");
     break;
}
