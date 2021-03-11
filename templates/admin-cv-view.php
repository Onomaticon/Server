<h2><?php print t("Controlled vocabularies"); ?></h2>

<?php
if (!userAllow("administer")) {
  print t("You do not have permission to administer this site");
} else {
  ?>
  <table>
    <tr>
      <th><?php print t("shortname"); ?></th>
      <th><?php print t("Details"); ?></th>
    </tr>
    <?php
      $oe = 1;
      foreach ($GLOBALS["ontomasticon"]["CVs"] as $CV) {
      print "<tr class='".oe($oe)."'>";
      print "<td>".$CV["shortname"]."<br/>";
      print l("edit", "/admin/cv/edit/".$CV["shortname"]);
      print "</td>";
      print "<td><b>".$CV["name"]."</b><br/>".$CV["description"]."<br/><br/>".$CV["reference"]."</td>";
      print "</tr>";
    } ?>
    </table>
  <?php
}
