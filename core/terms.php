<?php

function getTerms($db, $cv=null) {
  if ($cv != null) {
    $sql  = "SELECT * FROM `terms` WHERE `cv` = '";
    $sql .= $db->real_escape_string($cv);
    $sql .= "' AND `invalid_reason` IS NULL;";
  }  else {
    $sql  = "SELECT * FROM `terms` WHERE `cv` IS NULL AND `invalid_reason` IS NULL;";
  }

  $result = $db->query($sql);
  if ($result) {
    $ret = $result->fetch_all(MYSQLI_ASSOC);
    $result->close();
  }

  //Need to add child terms
  $out = array();
  foreach ($ret as $row) {
    $sql = "SELECT * FROM `terms` WHERE `parent` = ".$row["id"]." ORDER BY `invalid_reason`;";
    $result = $db->query($sql);
    if ($result) {
      $row["children"] = $result->fetch_all(MYSQLI_ASSOC);
      $result->close();
      $out[] = $row;
    }
  }
  return($out);
}

function term2URI($term, $link=FALSE) {
  $out  = $GLOBALS["ontomasticon"]["config"]["base_url"];
  if ($term['cv'] == null) {
    $out .= $term["shortname"];
  } else {
    $out .= "cv/".$term["cv"]."#".$term["shortname"];
  }
  if ($link) {
    return(l($out, $out));
  } else {
    return($out);
  }
}
