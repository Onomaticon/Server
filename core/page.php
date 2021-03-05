<?php

function activePage() {
  $ret = array();
  $parts = explode('/', $_SERVER['REQUEST_URI']);
  switch ($parts[1]) {
    case "cv":
      $ret["page_type"] = "cv";
      $ret["active_page"] = $parts[2];
      break;
    case "user":
      $ret["page_type"] = "user";
      $ret["active_page"] = $parts[2];
      break;
    case "admin":
      $ret["page_type"] = "cv";
      $ret["active_page"] = $parts[2];
      break;
    default:
      $ret["page_type"] = "home";
  }
  return($ret);
}

function printFooter($config) {
  $out  = "<p>Powered by ";
  $out .= l("Ontomasticon", "https://ontomasticon.github.io");
  $out .= " v".$config["version"];
  $out .= "</p>";
  print($out);
}
