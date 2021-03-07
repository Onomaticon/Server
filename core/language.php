<?php

function detectLanguage(){
  $lang = "en-GB";

  if (isset($_GET["lang"])) {
    $lang = $_GET["lang"];
  }
  return($lang);
}

//Translation function
function t($text, $lang="", $type="string") {
  if ($lang == "") {
    $lang = detectLanguage();
  }
  if ($lang == "en-GB") {
    return $text;
  }
  if (file_exists("lang/".$lang.".php")) {
    if (!isset($GLOBALS["ontomasticon"]["language_data"])) {
      include("lang/".$lang.".php");
      $GLOBALS["ontomasticon"]["language_data"] = call_user_func("lang_".$lang);
    }
    if (isset($GLOBALS["ontomasticon"]["language_data"][$text])) {
      return($GLOBALS["ontomasticon"]["language_data"][$text]);
    } else {
      return($text);
    }
  }
}
