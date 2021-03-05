<div class="term <?php print $oddeven; ?>" id ="<?php print $term["shortname"]; ?>">
  <h3><?php print $term["name"]; ?></h3>
  <p><?php print term2URI($term, TRUE); ?></p>
  <p><?php print $term["description"]; ?></p>

  <?php
  if (count($term["children"]) > 0) {
    ?>
    <h4>Related terms</h4>
    <table>
    <?php
    foreach ($term["children"] as $child) {
      print "<tr><td class='invalid_reason'>".$child["invalid_reason"]."</td><td>".$child["name"]."</td></tr>";
    }
    ?>
    </table>
  <?php
  }
  ?>
</div>
