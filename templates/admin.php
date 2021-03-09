
<div id="sub-menu">
  <?php print l("Configure site", "/admin/configure"); ?>
</div><?php
switch ($GLOBALS["ontomasticon"]["pageInfo"]["active_page"]) {
  case "config":
  default:
     template("admin-config.php");
     break;
}
