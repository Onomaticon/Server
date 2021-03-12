<?php

//Hyperlinking function
function l($text, $url) {
  if (substr($url, 0, 1) == '/') {
    if (isset($_GET["lang"])) {
      $url .= "?lang=".$_GET["lang"];
    }
  }

  $ret  = "<a href='".$url."'>";
  $ret .= t($text);
  $ret .= "</a>";

  return($ret);
}

//Templating function
function template($t) {
  if (file_exists("settings/".$t)) {
    include("settings/".$t);
  } else {
    include("templates/".$t);
  }
}

//Odd-even striping helper
function oe($n) {
  if ($n == 1)  { return("odd");}
  if ($n == -1) { return("even");}
  return("neither");
}

//Check for updates
function checkUpdate() {
  $url = "https://raw.githubusercontent.com/ontomasticon/ontomasticon/master/index.php";
  $h = fopen($url, "r");

  if ($h) {
    while (($line = fgets($h)) !== FALSE) {
      if (strpos($line, '$version') === 0) {
        return(substr($line, 11, strpos($line, ';')-11));
      }
    }
  }
  fclose($h);
  return(null);
}

function bool2check($bool) {
  if ($bool == 1) {
    return "checked";
  } else {
    return "";
  }
}
