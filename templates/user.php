<div id="sub-menu">
  <?php if (isset($_SESSION["user"])) {
          print l("Login", "/user/login");
        } else { 
          print l("Add user", "/user/register"); 
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
