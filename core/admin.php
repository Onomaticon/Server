<?php

function saveConfig() {
  global $db;
  $vals = array();
  $vals["site_name"] = $db->real_escape_string(trim($_POST['site_name']));
  $vals["author"] = $db->real_escape_string(trim($_POST['author']));
  $vals["default_lang"] = $db->real_escape_string(trim($_POST['default_lang']));
  $vals["base_url"] = $db->real_escape_string(trim($_POST['base_url']));
  $vals["description"] = $db->real_escape_string(trim($_POST['description']));

  foreach ($vals as $key => $val) {
    $sql = "UPDATE `config` SET `value` = '".$val."' WHERE `key` = '".$key."';";
    $res = $db->query($sql);
  }
  $GLOBALS["ontomasticon"]["config"] = getConfig($db);
}
