<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>交大餐廳營養分析表註冊系統</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>註冊帳號</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>帳號(學號)</label>
  	  <input type="text" name="id" value="<?php echo $id; ?>">
  	</div>
    <div class="input-group">
  	  <label>密碼</label>
  	  <input type="text" name="password" value="<?php echo $password; ?>">
  	</div>
    <div class="input-group">
  	  <label>名字</label>
  	  <input type="text" name="name" value="<?php echo $name; ?>">
  	</div>
  	<div class="input-group">
  	  <label>身高</label>
  	  <input type="text" name="height" value="<?php echo $height; ?>">
  	</div>
  	<div class="input-group">
  	  <label>體重</label>
  	  <input type="text" name="weight" value="<?php echo $weight; ?>">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">註冊</button>
  	</div>
  	<p>
  		已經辦過帳號了嗎? <a href="login.php">登入</a>
  	</p>
  </form>
</body>
</html>