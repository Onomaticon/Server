<div id="sub-menu">
  <?php print l("Configure site", "/admin/configure"); ?> |
  <?php print l("Controlled vocabuaries", "/admin/cv"); ?>
</div>

<?php
switch ($GLOBALS["ontomasticon"]["pageInfo"]["active_page"]) {
  case "cv":
    template("admin-cv-view.php");
    break;
  case "config":
  default:
     template("admin-config.php");
     break;
}
