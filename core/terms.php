<?php

function getTerm($sn) {
  global $db;

  $sql = "SELECT * FROM `terms` WHERE `shortname` = '".$sn."';";
  $result = $db->query($sql);
  if ($result) {
    $ret = $result->fetch_all(MYSQLI_ASSOC);
    $result->close();
    return($ret[0]);
  } else {
    return(null);
  }
}

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
    }
    $sql = "SELECT * FROM `terms` WHERE `broader` = ".$row["id"]." AND `invalid_reason` IS NULL;";
    $result = $db->query($sql);
    if ($result) {
      $row["narrower"] = $result->fetch_all(MYSQLI_ASSOC);
      $result->close();
    }
    $sql = "SELECT * FROM `terms` WHERE `id` = ".$row["broader"]." AND `invalid_reason` IS NULL;";
    $result = $db->query($sql);
    if ($result) {
      $row["broader"] = $result->fetch_all(MYSQLI_ASSOC);
      $result->close();
    }
  $out[] = $row;
  }
  return($out);
}

function term2URI($term, $link=FALSE) {
  $out  = $GLOBALS["ontomasticon"]["config"]["base_url"];
  if ($term['cv'] == null) {
    if ($term["opaque"] == 0) {
      $out .= $term["shortname"];
    } else {
      $out .= $term["id"];
    }
  } else {
    if ($term["opaque"] == 0 ) {
      $out .= "cv/".$term["cv"]."#".$term["shortname"];
    } else {
      $out .= "cv/".$term["cv"]."#".$term["id"];
    }
  }
  if ($link) {
    return(l($out, $out));
  } else {
    return($out);
  }
}

function editTerm() {
  global $db;
  $shortname = $GLOBALS["ontomasticon"]["pageInfo"]["active_subsubpage"];
  $name = $db->real_escape_string(trim($_POST['name']));
  $description = $db->real_escape_string(trim($_POST['description']));
  $language = $db->real_escape_string(trim($_POST['language']));
  $opaque = (isset($_POST["opaque"]) ? 1 : 0);
  $invalid = ((!isset($_POST["invalid"]) || $_POST["invalid"]=="none") ? "" : $db->real_escape_string(trim($_POST['invalid'])));
  $parent = $db->real_escape_string(trim($_POST['parent']));
  $broader = $db->real_escape_string(trim($_POST['broader']));

  $sql  = "UPDATE `terms` SET ";
  $sql .= "`name` = '".$name."', ";
  $sql .= "`description` = '".$description."', ";
  $sql .= "`language` = '".$language."', ";
  $sql .= "`opaque` = '".$opaque."', ";
  if ($invalid == "") {
    $sql .= "`invalid_reason` = NULL, ";
  } else {
    $sql .= "`invalid_reason` = '".$invalid."', ";
  }
  if ($_POST["parent"] != "") {
    $sql .= "`parent` = ".$parent.", ";
  }
  if ($_POST["broader"] != "") {
    $sql .= "`broader` = ".$broader." ";
  }
  $sql .= "WHERE `shortname` = '".$shortname."';";
  $res = $db->query($sql);
}

function termEditLink($sn) {
  if (userAllow("administer")) {
    $ret = "[".l("edit", "/admin/term/edit/".$sn)."]";
    return($ret);
  }
}
