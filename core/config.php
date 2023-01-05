<?php

function getConfig($db) {
  $config = array();
  $sql = "SELECT * FROM `config`;";
  $result = $db->query($sql);
  if ($result) {
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
      $config[$row["key"]] = $row["value"];
      if ($row["key"] == "base_url") {
        if (substr($row["value"], -1) != "/") {
          $config[$row["key"]] .= "/";
        }
      }
    }
    $result->close();
  }
  global $version;
  $config["version"] = $version;
  return(checkConfig($config));
}

function checkConfig($config) {
  if ((float)$config['version_db'] < (float)$config["version"]) {
    if (userAllow("administer")) {
      $out  = "<div class='error'>";
      $out .= "<p>You need to run the database update script.</p>";
      $out .= "</div>";
      print $out;
    }
  }
  if ((float)$config['version_db'] > (float)$config["version"]) {
    if (userAllow("administer")) {
      $out  = "<div class='error'>";
      $out .= "<p>The database is running a more recent version than the code base. Please upgrade.</p>";
      $out .= "</div>";
      print $out;
    }
  }
  if ($config["mode"] == "debug") {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
  }
  return($config);
}
