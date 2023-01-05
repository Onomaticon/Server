<?php
//Codebase version
$version = 0.1;


    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

//Check we can connect to the database
if (file_exists("settings/db.php")) {
  include("settings/db.php");
} else {
  print("<p>settings/db.php does not exist!</p>");
  print("<p>Refer to <a href='https://ontomasticon.github.io/installation.html'>Installation instructions.</a></p>");
  exit;
}

require("core/core.php");

$GLOBALS["ontomasticon"]["config"] = getConfig($db);
$GLOBALS["ontomasticon"]["language"] = detectLanguage();
$GLOBALS["ontomasticon"]["cv_count"] = CVcount($db);
$GLOBALS["ontomasticon"]["CVs"] = getCVs($db);
$GLOBALS["ontomasticon"]["pageInfo"] = activePage();
print_r($GLOBALS["ontomasticon"]["pageInfo"]);
if ($GLOBALS["ontomasticon"]["pageInfo"]["page_type"] == "api") {
  require("core/api.php");
} else {
  template("core.php");
}
