<div id="sub-menu">
  <?php print l("Login", "/user/login"); ?> | <?php print l("Add user", "/user/register"); ?>
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
