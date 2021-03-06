<!DOCTYPE HTML> 
<html>
<head>
	<title>result</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <center>
    <div class="btn">
      <h2><a href="main.php" style="color:white;">回首頁</a>&nbsp&nbsp&nbsp<br></h2>
    </div>
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
      
      //如果使用者有選項沒選，顯示錯誤並提供返回上一頁
      $input_err=false;

      if (empty($_POST["rest"])) {
        echo "請選擇一間學餐<br>";
        $input_err=true;
      } else {
        $rest = $_POST["rest"];
      }
      if (empty($_POST["food_type"])) {
        echo "請選擇一種種類<br>";
        $input_err=true;
      } else {
        $food_type = $_POST["food_type"];
      }
      if (empty($_POST["odr"])) {
        echo "請選擇一種排序方式<br>";
        $input_err=true;
      } else {
        $odr = $_POST["odr"];
      }

      # 設定時區
      date_default_timezone_set('Asia/Taipei');
      //check if open or not function
      function check_open($conn,$shop) {
        $day=date("l");
        $cur=date("H:i:s");
        $sql="select * from 營業時間 where day= '$day' and 
            (start_time <= curtime() and end_time>= curtime());";
        $stmt = mysqli_query($conn, $sql);
        if($stmt) {
          $result = mysqli_fetch_object($stmt);
          if($result->$shop=="t") return true;
          else return false;
        }
        return false;
      }

      //show table function
      function show_table($conn, $sql) {
        $have_result=false;
        if($stmt = mysqli_query($conn, $sql)) {
            echo '<table>';
            echo '<tr><th width="150">店家</th><th width="200">商品</th><th width="100">售價</th><th width="100">熱量</th></tr>'; 
            while($result = mysqli_fetch_object($stmt)) {
                //check open or not
                if(check_open($conn,$result->店家)==false) continue;

                echo '<tr>';
                echo '<td width="150">' . $result->店家 . '</td>';
                echo '<td width="200">' . $result->品項名稱 . '</td>';
                echo '<td width="100">' . $result->售價 . '</td>';
                echo '<td width="100">' . round($result->熱量,2) . '</td>';
                echo '</tr>';
                $have_result=true;
            }
            echo '</table>';
        }

        if($have_result==false) {
          echo '</br><h2>抱歉，目前時間沒有可提供的餐點</h2>';
        }
      }

      //show result function
      function show_result($rest, $food_type, $order, $conn) {
        //女二正餐
        if($rest=="girl2" && $food_type=="meal") {
            $sql = "select * from 
                (select * from 品嘉日式料理 
                union 
                select * from 天晟燒臘 
                union 
                select * from 極麵道) as t
            order by $order asc;";
            show_table($conn, $sql);
        }
        //女二飲料
        else if($rest=="girl2" && $food_type=="drink") {
            $sql = "select * from 
                (select * from coco 
                union 
                select * from 郁百分水果行) as t
            order by $order asc;";
            show_table($conn, $sql);
        }
        //女二早餐
        else if($rest=="girl2" && $food_type=="breakfast") {
            $sql = "select * from 比司多_女二 order by $order asc;";
            show_table($conn, $sql);
        }
        //研三正餐
        if($rest=="invest3" && $food_type=="meal") {
            $sql = "select * from 
                (select * from 四海遊龍 
                union 
                select * from 李記小館 
                union 
                select * from 漢堡王) as t
            order by $order asc;";
            show_table($conn, $sql);
        }
        //研三早餐       
        else if($rest=="invest3" && $food_type=="breakfast") {
            $sql = "select * from 比司多_研三 order by $order asc;";
            show_table($conn, $sql);
        }
        //二餐正餐
        if($rest=="sec_rest" && $food_type=="meal") {
            $sql = "select * from 
                (select * from subway 
                union 
                select * from 二弄堂 
                union 
                select * from 姊妹飯桶
                union 
                select * from 樂軒食堂
                union 
                select * from 火山丼
                union 
                select * from 隆太郎金牌燒臘) as t
            order by $order asc;";
            show_table($conn, $sql);
        }
        //二餐飲料
        else if($rest=="sec_rest" && $food_type=="drink") {
            $sql = "select * from 
            (select * from 85度c 
                union 
                select * from 茶壇
                union 
                select * from 鑫源冰果店) as t
            order by $order asc;";
            show_table($conn, $sql);
        }
        //二餐早餐
        else if($rest=="sec_rest" && $food_type=="breakfast") {
            $sql = "select * from 拉亞漢堡 order by $order asc;";
            show_table($conn, $sql);
        }

      }

      //show result order by popularity
      function show_result_pop($rest, $food_type, $conn) {
        //女二正餐
        if($rest=="girl2" && $food_type=="meal") {
          $sql = "select 店家, 品項名稱, 售價, r.熱量, count(*) as cnt
            from user_eat,
            (select * from 品嘉日式料理 
                union 
                select * from 天晟燒臘 
                union 
                select * from 極麵道) as r
            where user_eat.品項=r.品項名稱
            group by 品項
            order by cnt desc;";
          show_table($conn, $sql);
        }
        //女二飲料
        else if($rest=="girl2" && $food_type=="drink") {
            $sql = "select 店家, 品項名稱, 售價, r.熱量, count(*) as cnt
            from user_eat,
            (select * from coco 
                union 
                select * from 郁百分水果行) as r
            where user_eat.品項=r.品項名稱
            group by 品項
            order by cnt desc;";
            show_table($conn, $sql);
        }
        //女二早餐
        else if($rest=="girl2" && $food_type=="breakfast") {
          $sql = "select 店家, 品項名稱, 售價, r.熱量, count(*) as cnt
          from user_eat,
          (select * from 比司多_女二) as r
          where user_eat.品項=r.品項名稱
          group by 品項
          order by cnt desc;";
            show_table($conn, $sql);
        }
        //研三正餐
        if($rest=="invest3" && $food_type=="meal") {
          $sql = "select 店家, 品項名稱, 售價, r.熱量, count(*) as cnt
          from user_eat,
          (select * from 四海遊龍 
                union 
                select * from 李記小館 
                union 
                select * from 漢堡王) as r
          where user_eat.品項=r.品項名稱
          group by 品項
          order by cnt desc;";
            show_table($conn, $sql);
        }
        //研三早餐       
        else if($rest=="invest3" && $food_type=="breakfast") {
          $sql = "select 店家, 品項名稱, 售價, r.熱量, count(*) as cnt
          from user_eat,
          (select * from 比司多_研三) as r
          where user_eat.品項=r.品項名稱
          group by 品項
          order by cnt desc;";
            show_table($conn, $sql);
        }
        //二餐正餐
        if($rest=="sec_rest" && $food_type=="meal") {
          $sql = "select 店家, 品項名稱, 售價, r.熱量, count(*) as cnt
          from user_eat,
          (select * from subway 
                union 
                select * from 二弄堂 
                union 
                select * from 姊妹飯桶
                union 
                select * from 樂軒食堂
                union 
                select * from 火山丼
                union 
                select * from 隆太郎金牌燒臘) as r
          where user_eat.品項=r.品項名稱
          group by 品項
          order by cnt desc;";
            show_table($conn, $sql);
        }
        //二餐飲料
        else if($rest=="sec_rest" && $food_type=="drink") {
            $sql = "select 店家, 品項名稱, 售價, r.熱量, count(*) as cnt
            from user_eat,
            (select * from 85度c 
                union 
                select * from 茶壇
                union 
                select * from 鑫源冰果店) as r
            where user_eat.品項=r.品項名稱
            group by 品項
            order by cnt desc;";
            show_table($conn, $sql);
        }
        //二餐早餐
        else if($rest=="sec_rest" && $food_type=="breakfast") {
          $sql = "select 店家, 品項名稱, 售價, r.熱量, count(*) as cnt
          from user_eat,
          (select * from 拉亞漢堡) as r
          where user_eat.品項=r.品項名稱
          group by 品項
          order by cnt desc;";
            show_table($conn, $sql);
        }
      }
      

      if($input_err==true) {
        echo '<br><a href="search2.php">重新查詢</a><br>';
      }
      else{
        echo "<center> <h2>為您推薦:</h2>";

        if($odr=='售價' or $odr=='熱量') {
          show_result($rest, $food_type, $odr, $conn);
        }
        else if($odr=='熱門') {
          show_result_pop($rest, $food_type, $conn);
        }
        
      }
      
      
	?>
    

    

</body>

</html>