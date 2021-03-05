<?php

$activeCV = null;
foreach ($CVs as $CV) {
  if ($CV["shortname"] == $pageInfo["active_page"]) {
    $activeCV = $CV;
  }
}

if ($activeCV == null) {
  print "No matching controlled vocabulary found for ".$pageInfo["active_page"];
} else {
  ?>
  <h2><?php print t("Controlled vocabulary: ").$activeCV["name"]; ?></h2>
  <div id="description"><?php print $activeCV["description"]; ?></div>
<?php
}

$terms = getTerms($db, $pageInfo["active_page"]);
$oe = 1;
foreach ($terms as $term) {
  $oddeven = oe($oe);
  include("templates/term-fragment.php");
  $oe *= -1;
}
