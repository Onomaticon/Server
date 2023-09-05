<?php
// Ontomasticon
//
// A simple, lightweight, PHP-based ontology browser.
//
// Department of Information Retrieval

//Codebase version
$version = 0.1;

//Check database has been configured
if (file_exists("settings/db.php")) {
  include("settings/db.php");
} else {
  print("<p>settings/db.php does not exist!</p>");
  print("<p>Refer to <a href='https://ontomasticon.github.io/installation.html'>Installation instructions.</a></p>");
  exit;
}

// Load core functions
require("core/core.php");

// Load configuration
$GLOBALS["ontomasticon"]["config"] = getConfig($db);
$GLOBALS["ontomasticon"]["language"] = detectLanguage();
$GLOBALS["ontomasticon"]["cv_count"] = CVcount($db);
$GLOBALS["ontomasticon"]["CVs"] = getCVs($db);
$GLOBALS["ontomasticon"]["pageInfo"] = activePage();

// Load correct page template
switch($GLOBALS["ontomasticon"]["pageInfo"]["page_type"]) {
  case "API":
    template("api.php");
    break;
  case "ping":
    print "pong";
    exit;
  default:
    template("core.php");
}
