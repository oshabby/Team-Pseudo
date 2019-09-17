<?php
$warning="";
if(count($_POST)>0) {
	$info = json_decode(file_get_contents("info.json"));
	
	$email = $_POST["email"];
	$name = $_POST["name"];
	$password = $_POST["password"];
	$confirmpassword = $_POST["confirmpassword"];
	
	if(in_array($email ,array_column($info, 'email'))){
		$warning = "This email has been registered";
	}else if (empty($email) || empty($name)  || empty($password)  || empty($confirmpassword)){
		$warning = "No field should be empty";
	}else{
		if($_POST["password"] === $_POST["confirmpassword"]){
			array_push($info, [
				"email" => $email,
				"password" => $password,
				"name" => $name
			]);

			file_put_contents('info.json', json_encode($info));
			session_start();
			$_SESSION['user_login'] = $name;
			header("Location: success.php");
		}else{
			$warning = "Password mismatch";
		}
	}
	
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration page</title>
    <link rel="stylesheet" href="./CSS/style.css">
</head>
<body>

  <form name="frmUser" method="post" action="" method="POST" class="container">
    <h1>REGISTER</h1>
	<div class="message"><?php if($warning!="") { echo $warning; } ?></div>
    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="email" required>
    <input type="password" name="password" placeholder="password" required>
	<input type="password" name="confirmpassword" placeholder="confirm password" required>
    <input type="submit" name="submit" value="Sign Up">
    <p>Have an account? <a href="login.html">Login</a></p>

  </form>



</body>
</html>