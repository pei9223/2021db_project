<!DOCTYPE HTML> 
<html>
	<head>
		<title>你想吃啥</title>
    <link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<?php
			$servername = "localhost";
      $username = "pcsettingroot";
      $password = "0816131";
      $dbname = "2021_project";
                        
      // Create connection
      $conn = mysqli_connect($servername, $username, $password, $dbname);
      // Check connection
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }

      /*if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["odr"])) {
          echo "請選擇一種排序方式";
        } else {
          $gender = $_POST["gender"];
        }
      }*/
                        
		?>
    <center>
    <div class="btn">
      <h2><a href="main.php" style="color:white;">回首頁</a>&nbsp&nbsp&nbsp<br></h2>
    </div>
      
    <div class="header">  	  
      <h2>不知道吃什麼嗎?</h2>
    </div>
    <form action="result.php" method="post">
      你想吃哪間學餐: <input type="radio" name="rest" value="girl2" />女二
      <input type="radio" name="rest" value="invest3" />研三
      <input type="radio" name="rest" value="sec_rest" />二餐<br /><br />
      你想吃哪種類型: <input type="radio" name="food_type" value="meal" />正餐
      <input type="radio" name="food_type" value="drink" />飲料/點心
      <input type="radio" name="food_type" value="breakfast" />早餐<br /><br />
      排序依據: <input type="radio" name="odr" value="售價" /> 價錢低到高
      <input type="radio" name="odr" value="熱量" /> 熱量低到高<br />
      <input type="radio" name="odr" value="熱門" /> 依熱門程度<br /><br />
      <div class="input-group">
        <center>
  		  <button type="submit" class="btn" name="login_user">送出</button>
  	  </div>
      
      
    </form>
    
    

	</body>

</html>