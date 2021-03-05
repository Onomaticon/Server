<?php
//Codebase version
$version = 0.1;

//Check we can connect to the database
if (file_exists("settings/db.php")) {
  include("settings/db.php");
} else {
  print("settings/db.php does not exist!");
  exit;
}

require("core/core.php");

$GLOBALS["ontomasticon"]["config"] = getConfig($db);
$GLOBALS["ontomasticon"]["cv_count"] = CVcount($db);
$GLOBALS["ontomasticon"]["CVs"] = getCVs($db);
$GLOBALS["ontomasticon"]["pageInfo"] = activePage();

template("core.php");
