<div id="description"><?php print($config["description"]); ?></div>
<?php
if ($cv_count > 0) {
  printCVs(getCVs($db));
}

$terms = getTerms($db, '');
$oe = 1;
foreach ($terms as $term) {
  $oddeven = oe($oe);
  include("templates/term-fragment.php");
  $oe *= -1;
}
