<div id="description"><?php print tu("description"); ?></div>
<?php
global $db;
if ($GLOBALS["ontomasticon"]["cv_count"] > 0) {
  printCVs(getCVs($db));
}
$terms = getTerms();
$oe = 1;
foreach ($terms as $term) {
  $GLOBALS["ontomasticon"]["term"] = $term;
  $GLOBALS["ontomasticon"]["oddeven"] = oe($oe);
  template("term-fragment.php");
  $oe *= -1;
}
