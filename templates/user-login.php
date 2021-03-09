<h2><?php print t("User login"); ?></h2>

<?php
global $db;
if(isset($_POST['submit'])){
  $email = $db->real_escape_string(trim($_POST['email']));
  $password = $db->real_escape_string(trim($_POST['password']));

  $sql = "SELECT * FROM `users` WHERE email = '".$email."'";
  $rs = $db->query($sql);
  $numRows = mysqli_num_rows($rs);
  if($numRows  == 1){
    $row = mysqli_fetch_assoc($rs);
    if(password_verify($password,$row['password'])){
      $_SESSION["user"] = $email;
    } else {
      print t("Wrong password");
    }
  } else {
    print t("No matching user found");
  }
}

if(isset($_POST['logout'])) {
  unset($_SESSION["user"]);
}

if (isset($_SESSION["user"])) {
  print t("Logged in as")." ".$_SESSION["user"];
  ?>
  <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <button type="submit" name="logout"><?php print t("Logout"); ?></button>
  </form>
 <?php
} else {
?>
  <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <input type="text" name="email" value="" placeholder="<?php print t("Email"); ?>">
    <input type="password" name="password" value="" placeholder="<?php print t("Password"); ?>">
    <button type="submit" name="submit"><?php print t("Login"); ?></button>
  </form>
<?php
}
