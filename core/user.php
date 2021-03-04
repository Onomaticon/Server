<?php

//Check whether a user has permissions for an action.
function userAllow($task) {
  //TODO: read these from db
  if ($task == "administer") {return TRUE;}
  if ($task == "view-cv") {return TRUE;}
  return FALSE;
}
