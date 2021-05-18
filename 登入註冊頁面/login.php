<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>交大餐廳營養分析表登入系統</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>登入帳號</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>帳號</label>
  		<input type="text" name="id" >
  	</div>
  	<div class="input-group">
  		<label>密碼</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">登入</button>
  	</div>
  	<p>
  		新朋友還沒註冊過嗎? <a href="register.php">註冊帳號</a>
  	</p>
  </form>
</body>
</html>