<?php

if (!userAllow("administer")) {
    print t("You do not have permission to administer this site");
  } else {
    global $db;
    $updated = FALSE;
    if ((float) $GLOBALS["ontomasticon"]["config"]["version_db"] < 0.2) {
        $sql = "ALTER TABLE `terms` ADD COLUMN `reference` VARCHAR(500) NULL AFTER `broader`;";
        mysqli_query($db, $sql);

        $sql = "UPDATE `config` SET `value` = 0.2 WHERE `key` = 'version';";
        mysqli_query($db, $sql);
        $sql = "UPDATE `config` SET `value` = 0.2 WHERE `key` = 'version_db';";
        mysqli_query($db, $sql);
        
        $updated = TRUE;
        print t("Ontomasticon has been updated to version 0.2");
    }

    if ($updated) {
        $GLOBALS["ontomasticon"]["config"] = getConfig($db);
    } else {
      print t("No updates required.");
    }
}
