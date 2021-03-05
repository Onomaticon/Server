<html lang="<?php print t($config["default_lang"]); ?>">
<head>
<meta charset = "UTF-8">
<title><?php print t($config["site_name"]); ?></title>
<meta name="Generator" content="Ontomasticon (https://ontomasticon.github.io/)"/>
<meta name="author" content="<?php print($config["author"]); ?>">
<meta name="description" content="<?php print($config["description"]); ?>">
<link rel="stylesheet" type="text/css" href="https://vocab.audioblast.org/css/default.css" />
</head>

<body>
<h1><?php print l($config["site_name"], "/"); ?></h1>

<?php

switch($pageInfo["page_type"]) {
  case "cv":
    require("templates/cv.php");
    break;
  case "home":
    require("templates/home.php");
    break;
  case "user":
    require("templates/user.php");
    break;
  case "admin":
    require("templates/admin.php");
    break;
}
?>

<div id="footer">
<?php printFooter($config); ?>
</div>

</body>

</html>
