<div id="sub-menu">
  <?php print l("Configure site", "/admin/configure"); ?> |
  <?php print l("Controlled vocabuaries", "/admin/cv"); ?>
</div>

<?php
switch ($GLOBALS["ontomasticon"]["pageInfo"]["active_page"]) {
  case "cv":
    if ($GLOBALS["ontomasticon"]["pageInfo"]["active_subpage"] == null) {
      template("admin-cv-view.php");
    } else {
      template("admin-cv-edit.php");
    }
    break;
  case "config":
  default:
     template("admin-config.php");
     break;
}
