<?php

session_start();

if (isset($_POST['uname']) && !isset($_SESSION['uname'])) {
  $uname = ["sjltf" => "41521"];

  if (isset($uname[$_POST['uname']])) {
    if ($uname[$_POST['uname']] == $_POST['password']) {
      $_SESSION['uname'] = $_POST['uname'];
    }
  }

  if (!isset($_SESSION['uname'])) { 
    header("Location: admin_login.php?error=Incorrect Credentials");
	    exit(); 
  }
}

if (isset($_SESSION['uname'])) {
  header("Location: admin.php");
  exit();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="../css/style(login_reg).css">
</head>

<body>

     <form action="" method="post">
		 
     	<h1>ADMIN LOGIN</h1>

       <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	
     	<label>User Name</label>
     	<input type="text" name="uname" placeholder="User Name"><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>

     	<button type="submit">Login</button>
        <a href="home.php" class="ba">Back</a>

     </form>

</body>
</html>