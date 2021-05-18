<!DOCTYPE HTML> 
<html>
	<head>
		<title>你想吃啥</title>
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
    <form action="result.php" method="post">
      你想吃哪間學餐:<input type="radio" name="rest" value="girl2" />女二
      <input type="radio" name="rest" value="invest3" />研三
      <input type="radio" name="rest" value="sec_rest" />二餐<br />
      你想吃哪種類型:<input type="radio" name="food_type" value="meal" />正餐
      <input type="radio" name="food_type" value="drink" />飲料/點心
      <input type="radio" name="food_type" value="breakfast" />早餐<br />
      排序依據:<input type="radio" name="odr" value="售價" /> 價錢低到高
      <input type="radio" name="odr" value="熱量" /> 熱量低到高<br />
      
      <input type ="submit" value="送出">
    </form>

    

	</body>

</html>