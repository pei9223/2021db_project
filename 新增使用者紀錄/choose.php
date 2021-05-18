<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>新增紀錄</title>
	</head>
	<body>
        <?php
			include("connect.php");               
		?>
        

        <form action="all.php" method="post">
            你的id: <input type="test" name="YourName"><br>
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
            <br><input type ="submit" value="送出">
        </form>

        </body>
</html>