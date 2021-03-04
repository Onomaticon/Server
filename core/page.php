<?php

function printFooter($config) {
  $out  = "<p>Powered by ";
  $out .= l("Onomaticon", "https://onomaticon.github.io");
  $out .= " v".$config["version"];
  $out .= "</p>";
  print($out);
}
