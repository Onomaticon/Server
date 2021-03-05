<html lang="<?php print t($GLOBALS["ontomasticon"]["config"]["default_lang"]); ?>">
<head>
<meta charset = "UTF-8">
<title><?php print t($GLOBALS["ontomasticon"]["config"]["site_name"]); ?></title>
<meta name="Generator" content="Ontomasticon (https://ontomasticon.github.io/)"/>
<meta name="author" content="<?php print($GLOBALS["ontomasticon"]["config"]["author"]); ?>">
<meta name="description" content="<?php print($GLOBALS["ontomasticon"]["config"]["description"]); ?>">
<link rel="stylesheet" type="text/css" href="<?php print $GLOBALS["ontomasticon"]["config"]["base_url"]; ?>css/default.css" />
<?php
if (file_exists("settings/user.css")) {
  ?>
  <link rel="stylesheet" type="text/css" href="<?php print $GLOBALS["ontomasticon"]["config"]["base_url"]; ?>settings/user.css" />
  <?php
}
?>

<body>
<h1><?php print l($GLOBALS["ontomasticon"]["config"]["site_name"], "/"); ?></h1>

<?php
switch($GLOBALS["ontomasticon"]["pageInfo"]["page_type"]) {
  case "cv":
    template("cv.php");
    break;
  case "home":
    template("home.php");
    break;
  case "user":
    template("user.php");
    break;
  case "admin":
    template("admin.php");
    break;
}
?>

<div id="footer">
<?php printFooter(); ?>
</div>

</body>

</html>
