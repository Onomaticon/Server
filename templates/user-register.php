<h1><?php print t("Create user"); ?></h1>

<?php
if (!userAllow("create-user")) {
  print t("You do not have permission to create users");
} else {
  global $db;
  if(isset($_POST['submit'])){
    $firstName = $db->real_escape_string($_POST['first_name']);
    $surName   = $db->real_escape_string($_POST['surname']);
    $email     = $db->real_escape_string($_POST['email']);
    $password  = $db->real_escape_string($_POST['password']);

    $options = array("cost"=>4);
    $hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);

    $sql = "INSERT INTO `users` (first_name, last_name, email, password) value('".$firstName."', '".$surName."', '".$email."','".$hashPassword."')";
    $result = mysqli_query($db, $sql);
    if($result) {
      print t("User created");
    }
  }
  ?>
  <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <input type="text" name="first_name" value="" placeholder="<?php print t("First name"); ?>">
    <input type="text" name="surname" value="" placeholder="<?php print t("Surname"); ?>">
    <input type="text" name="email" value="" placeholder="<?php print t("Email"); ?>">
    <input type="password" name="password" value="" placeholder="<?php print t("Password"); ?>">
    <button type="submit" name="submit"><?php print t("Create user"); ?></button>
  </form>
  <?php
}
