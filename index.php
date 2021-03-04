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

$config = getConfig($db);
$cv_count = CVcount($db);
$CVs = getCVs($db);

require("templates/core.php");
