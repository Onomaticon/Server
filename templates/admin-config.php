<h2><?php print t("Configure site"); ?></h2>

<?php
if (!userAllow("administer")) {
  print t("You do not have permission to administer this site");
} else {
  global $db;
  if(isset($_POST['submit'])){
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
  ?>
  <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <label for="site_name"><?php print t("Site name"); ?></label><br/>
    <input type="text" id="site_name" name="site_name"
           value="<?php print $GLOBALS["ontomasticon"]["config"]["site_name"];?>"
           placeholder="">
           <br/><br/>
    <label for="author"><?php print t("Author"); ?></label><br/>
    <input type="text" id="author" name="author"
           value="<?php print $GLOBALS["ontomasticon"]["config"]["author"];?>"
           placeholder=""><br/><br/>
    <label for="default_lang"><?php print t("Default language"); ?></label><br/>
    <input type="text" id="default_lang" name="default_lang"
           value="<?php print $GLOBALS["ontomasticon"]["config"]["default_lang"];?>"
           placeholder=""><br/><br/>
    <label for="base_url"><?php print t("Base URL"); ?></label><br/>
    <input type="text" id="base_url" name="base_url"
           value="<?php print $GLOBALS["ontomasticon"]["config"]["base_url"];?>"
           placeholder=""><br/><br/>
    <label for="description"><?php print t("Description"); ?></label><br/>
    <textarea id="description" name="description" rows="4" cols="50"><?php print $GLOBALS["ontomasticon"]["config"]["description"];?></textarea><br/><br/>
    <button type="submit" name="submit"><?php print t("Save"); ?></button>
  </form>
<?php
}
