<?php 
  session_start(); 

  if (!isset($_SESSION['id'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	//session_destroy();
  	//unset($_SESSION['id']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>主頁面</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
	<h2>主頁面</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['id'])) : ?>
    	<p>歡迎進入交大餐廳營養系統 <strong><?php echo $_SESSION['id']; ?></strong></p>
    	<p> <a href="index.php?logout='1'" style="color: red;">登出帳號</a> </p>
    <?php endif ?>
</div>
		
</body>
</html>