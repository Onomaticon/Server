<?php
$activeCV = null;
foreach ($GLOBALS["ontomasticon"]["CVs"] as $CV) {
  if ($CV["shortname"] == $GLOBALS["ontomasticon"]["pageInfo"]["active_page"]) {
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
global $db;
$terms = getTerms($db, $GLOBALS["ontomasticon"]["pageInfo"]["active_page"]);
$oe = 1;
foreach ($terms as $t) {
  $GLOBALS["ontomasticon"]["term"] = $t;
  $GLOBALS["ontomasticon"]["oddeven"] = oe($oe);
  template("term-fragment.php");
  $oe *= -1;
}
