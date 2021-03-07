<?php

function activePage() {
  $ret = array();
  $parts = explode('/', explode('?',$_SERVER['REQUEST_URI'])[0]);
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

function printFooter() {
  $out  = "<p>".t("Powered by")." ";
  $out .= l("Ontomasticon", "https://ontomasticon.github.io")." ";
  $out .= t("version")." ".$GLOBALS["ontomasticon"]["config"]["version"];
  $out .= "</p>";
  print($out);
}
