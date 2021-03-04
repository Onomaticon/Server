<?php

//Translation function
function t($text, $lang="en", $type="string") {
  return $text;
}

//Hyperlinking function
function l($text, $url) {
  $ret  = "<a href='".$url."'>";
  $ret .= t($text);
  $ret .= "</a>";

  return($ret);
}
