<?php

function printFooter($config) {
  $out  = "<p>Powered by ";
  $out .= l("Ontomasticon", "https://ontomasticon.github.io");
  $out .= " v".$config["version"];
  $out .= "</p>";
  print($out);
}
