<div id="sub-menu">
  <?php print l("Configure site", "/admin/configure"); ?> |
  <?php print l("Manage controlled vocabuaries", "/admin/cv"); ?> |
  <?php print l("Add controlled vocabulary","/admin/cv/add"); ?> |
  <?php print l("Add term", "/admin/term/add"); ?>
</div>

<?php
switch ($GLOBALS["ontomasticon"]["pageInfo"]["active_page"]) {
  case "cv":
    switch ($GLOBALS["ontomasticon"]["pageInfo"]["active_subpage"]) {
      case "add":
        template("admin-cv-add.php");
        break;
      case "edit":
        template("admin-cv-edit.php");
        break;
      default:
        template("admin-cv-view.php");
    }
    break;
  case "term":
    switch ($GLOBALS["ontomasticon"]["pageInfo"]["active_subpage"]) {
      case "add":
        template("admin-term-add.php");
        break;
      case "edit":
        template("admin-term-edit.php");
        break;
    }
    break;
  case "config":
  default:
     template("admin-config.php");
     break;
}
