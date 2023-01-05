<?php
switch($GLOBALS["ontomasticon"]["pageInfo"]["active_page"]) {
    case "":
        template("core.php");
        break;
    case "term":
        template("api-term.php");
        break;
};
