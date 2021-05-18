<!doctype html>
<html>
    <head>
        <meta charset = "UTF-8"> 
        <title>主頁面</title>
    </head>
    <body>
        <center>
        <p>
        <?php 
        echo "<h2>查詢您一天攝取的熱量吧！</h2>";
        ?>

        <form action = "<?php echo $_SERVER['PHP_SELF'];?>" method = "post">
            查詢日期(YYYY-MM-DD)：<input type = "text" name = "date"><br>
            <input type = "submit">
        </form>

        <?php
        $con = new mysqli("localhost", "Stella", "hjnstella900604","Stella");
        if ($con->connect_error){
            die ("資料庫連線失敗" .$con->connect_error);
        }

        $id = 1;
        echo "<br>";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $date = htmlspecialchars($_REQUEST['date']); 
            if (empty($date)) {
                ?>
                <script type = "text/javascript"> 
                    alert("請填寫日期"); 
                </script> 
                <?php
            } else {
                $string = "/\d{4}\-\d{2}\-\d{2}/";
                if (!preg_match($string, $date)){
                    ?>
                    <script type = "text/javascript"> 
                        alert("日期格式錯誤"); 
                    </script> 
                    <?php
                } else {
                    $sql = "SELECT 日期, sum(熱量) as total FROM user WHERE id = $id GROUP BY 日期";
                    $result = $con->query($sql);
                    $found = false;
                    while ($row = $result->fetch_assoc()){
                        if ($row["日期"] == $date){
                            echo $row["日期"]. "總共攝取了" .$row["total"]. "大卡～<br>";
                            $found = true;
                        }
                    }
                    if ($found == false){
                        ?>
                        <script type = "text/javascript"> 
                            alert("沒有資料，請輸入其他日期"); 
                        </script> 
                        <?php
                    }
                }
            }
        }
        ?>
        </p>

        <?php
        $id = 1;
        echo "<h2>以下是您目前的紀錄：<br></h2>";
        $sql1 = "SELECT * FROM user_eat WHERE id = $id ORDER BY 日期";
        $result1 = $con->query($sql1);
        while ($row = $result1->fetch_assoc()){
            echo $row["日期"]. "吃了" .$row["餐廳"]. "的" .$row["品項"]. "，花了$" .$row["金額"]. "，熱量為" .$row["熱量"]. "大卡<br>";
        }

        $con->close();
        ?>
        </center>
    </body>
</html>