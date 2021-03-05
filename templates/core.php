<html lang="<?php print t($config["default_lang"]); ?>">
<head>
<meta charset = "UTF-8">
<title><?php print t($config["site_name"]); ?></title>
<meta name="Generator" content="Onomaticon (https://onomaticon.github.io/)"/>
<meta name="author" content="<?php print($config["author"]); ?>">
<meta name="description" content="<?php print($config["description"]); ?>">
<link rel="stylesheet" type="text/css" href="css/default.css" />
</head>

<body>
<h1><?php print l($config["site_name"], "/"); ?></h1>
<div id="description"><?php print($config["description"]); ?></div>

<?php
if ($cv_count > 0) {
  printCVs(getCVs($db));
}
?>

<div id="footer">
<?php printFooter($config); ?>
</div>

</body>

</html>
