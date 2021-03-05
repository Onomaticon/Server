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

function oe($n) {
  if ($n == 1)  { return("odd");}
  if ($n == -1) { return("even");}
  return("neither");
}
