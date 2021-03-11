<?php

function CVcount($db) {
  $sql = "SELECT COUNT(*) AS `count` FROM `cv`;";
  $result = $db->query($sql);
  if ($result) {
    $result = $db->query($sql);
    if ($result) {
      $row = $result->fetch_array(MYSQLI_ASSOC);
      $cv_count = $row["count"];
      $result->close();
    }
  } else {
    $cv_count = 0;
  }
  return($cv_count);
}

function getCVs($db) {
  $ret = array();
  $sql = "SELECT * FROM `cv`;";
  $result = $db->query($sql);
  if ($result) {
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
      $ret[$row["shortname"]] = $row;
    }
    $result->close();
  }
  return($ret);
}

function printCVs($CVs) {
  if (!userAllow("view-cv")) {return;}
  $out  = "<h2>".t("Controlled Vocabularies")."</h2>";
  $out .= "<table>";
  $out .= "<tr><th>".t("Short name")."</th><th>".t("Name")."</th></tr>";
  foreach ($CVs as $CV) {
    $out .= "<tr><td>".l($CV["shortname"], "/cv/".$CV["shortname"])."</td><td>".$CV["name"]."</td></tr>";
  }
  $out .= "</table>";
  print($out);
}

function editCV() {
  global $db;
  $CV = $GLOBALS["ontomasticon"]["pageInfo"]["active_subsubpage"];

  $name = $db->real_escape_string(trim($_POST['name']));
  $description = $db->real_escape_string(trim($_POST['description']));
  $reference = $db->real_escape_string(trim($_POST['reference']));

  $sql = "UPDATE `cv` SET `name` = '".$name."', `description` = '".$description."', `reference` = '".$reference."' WHERE `shortname` = '".$CV."';";
  $res = $db->query($sql);

  $GLOBALS["ontomasticon"]["CVs"] = getCVs($db);
}

function addCV() {
  global $db;
  $shortname = $db->real_escape_string(trim($_POST['shortname']));
  $name = $db->real_escape_string(trim($_POST['name']));
  $description = $db->real_escape_string(trim($_POST['description']));
  $reference = $db->real_escape_string(trim($_POST['reference']));

  $sql = "INSERT INTO `cv` (`shortname`, `name`, `description`, `reference`) VALUES ('".$shortname."', '".$name."', '".$description."', '".$reference."');";
  $res = $db->query($sql);

  $GLOBALS["ontomasticon"]["CVs"] = getCVs($db);
}

function deleteCV() {
  global $db;
  $CV = $GLOBALS["ontomasticon"]["pageInfo"]["active_subsubpage"];

  $sql = "DELETE FROM `terms` WHERE `cv` = '".$CV."';";
  $res1 = $db->query($sql);

  $sql = "DELETE FROM `cv` WHERE `shortname` = '".$CV."';";
  $res2 = $db->query($sql);
}
