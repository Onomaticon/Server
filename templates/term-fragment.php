<div class="term <?php print $GLOBALS["ontomasticon"]["oddeven"]; ?>" id ="<?php print $GLOBALS["ontomasticon"]["term"]["shortname"]; ?>">
  <h3><?php print $GLOBALS["ontomasticon"]["term"]["name"]; ?></h3>
  <p><?php print term2URI($GLOBALS["ontomasticon"]["term"], TRUE); ?></p>
  <p><?php print $GLOBALS["ontomasticon"]["term"]["description"]; ?></p>

  <?php
  if (count($GLOBALS["ontomasticon"]["term"]["children"]) > 0) {
    ?>
    <h4>Related terms</h4>
    <table>
    <?php
    foreach ($GLOBALS["ontomasticon"]["term"]["children"] as $child) {
      print "<tr><td class='invalid_reason'>".$child["invalid_reason"]."</td><td>".$child["name"]."</td></tr>";
    }
    ?>
    </table>
  <?php
  }
  ?>
</div>
