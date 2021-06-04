<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>新增查詢</title>
        <link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
        <center>
        <div class="btn">
            <h2><a href="main.php" style="color:white;">回首頁</a>&nbsp&nbsp&nbsp<br></h2>
        </div>
        <?php
			$servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "2021_project";
                              
            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
            if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
            }          
		?>
        
         <div class="header">
  	        <h2>挑選要新增的紀錄</h2>
        </div>
        <form action="insert_do.php" method="post">
            
            選擇餐廳:<select name="favorite" id="country" required>
                <optgroup label="女二"> 
                    <option value="coco" selected>coco</option>
                    <option value="pin" >品嘉日式料理</option>
                    <option value="bis1" >比司多</option>
                    <option value="fruit" >郁百分水果行</option>
                    <option value="tien" >天晟燒臘</option>
                    <option value="noodle">極麵道</option>
                </optgroup>
                <optgroup label="研三"> 
                    <option value="four">四海遊龍</option>
                    <option value="bis2">比司多</option>
                    <option value="lee">李記小館</option>
                    <option value="king" >漢堡王</option>
                </optgroup>
                <optgroup label="二餐"> 
                    <option value="fire">火山丼</option>
                    <option value="tea">茶壇</option>
                    <option value="85c">85度c</option>
                    <option value="subway">subway</option>
                    <option value="two">二弄堂</option>
                    <option value="sister">姊妹飯桶</option>
                    <option value="laya">拉亞漢堡</option>
                    <option value="leshuan">樂軒食堂</option>
                    <option value="shin">鑫源冰果店</option>
                    <option value="lon">隆太郎金牌燒臘</option>
                </optgroup>
            </select>
            <div class="input-group">
  		        <button type="submit" class="btn" name="search">送出</button>
  	        </div>
        </form>

        </body>
</html>