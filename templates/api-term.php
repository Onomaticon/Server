<?php
header('Content-Type: application/json; charset=utf-8');
global $db;
$config = getConfig($db);
if (isset($_GET["term"])) {
    $parts = explode("/", $_GET["term"]);
    if ($parts[3] == "cv") {
      $term = getTerm(explode("#",$parts[4])[1]);
    }
} else if (isset($_GET["shortname"])) {
   $term = getTerm($_GET["shortname"]);
}

$url = "https://".$config["base_url"];
if ($term["cv"] != "") {
    $url .= "cv/".$term["cv"]."/";
}
//ToDo: change if opaque
$url .= $term["shortname"];

$term["url"] = $url;

print(($term == null) ? "null" : json_encode($term));
exit;