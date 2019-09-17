<?php
session_start();
if(!isset($_SESSION['user_login'])){
  header("Location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login success</title>
</head>

<body>
    <div id="container">
    <h2 style="text-align:center; color:Green; padding-top:100px;">Dear <strong style="color:blue"><?php echo $_SESSION['user_login']?></strong>, You are in!</h2>
  </div>

   <div >
  <a href="logout.php"><button style="text-transform:none;text-align:right; color:blue;vertical-align:center;">Logout</button></a>
  </div>
</body>

</html>
