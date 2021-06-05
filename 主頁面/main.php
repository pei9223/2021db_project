<!doctype html>
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
<html>
    <head>
        <meta charset = "UTF-8"> 
        <title>主頁面</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        
        <?php
            //connect to data base
            $servername = "localhost";
            $username = "pcsettingroot";
            $dbpassword = "0816131";
            $dbname = "2021_project";

            $con = new mysqli($servername, $username, $dbpassword, $dbname);
            if ($con->connect_error){
                die ("資料庫連線失敗" .$con->connect_error);
            }
        ?>
        <!--上方連結列-->
        <center>
        <div class="btn">
            <h2><a href="alter_info.php" style="color:white;">修改資料</a>&nbsp&nbsp&nbsp
            <a href="search2.php" style="color:white;">推薦餐點</a>&nbsp&nbsp&nbsp
            <a href="insert_choose.php" style="color:white;">紀錄飲食</a>&nbsp&nbsp&nbsp
            <a href="run.php" style="color:white;">運動身體好</a><br></h2>
        </div>

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
            <!--抓出名字-->
            <?php 
                $id_t=$_SESSION['id'];
                $sql="select * from user_info where 帳號= '$id_t';";
                $stmt = mysqli_query($con, $sql);
                if($stmt) {
                    $result = mysqli_fetch_object($stmt);
                }
            ?>

            <!-- logged in user information -->
            <?php  if (isset($_SESSION['id'])) : ?>
            
                <p><h3>歡迎進入交大餐廳營養系統 <strong>
                    <?php echo $result->名字;?></h3></strong></p>
                <p> <a href="index.php?logout='1'" style="color: red;">登出帳號<br></a> </p>
            <?php endif ?>

        <p><h2><br>您一天建議攝取的熱量: <?php echo $result->體重*30?>大卡</p>
        <p><h2><br>您今天已攝取的熱量: 
            <?php 
            $id=$_SESSION['id'];
            $sql = "SELECT sum(熱量) as total FROM user_eat WHERE id = $id and 日期=CURDATE()";
            $stmt = mysqli_query($con, $sql);
            if($stmt) {
                $calo = mysqli_fetch_object($stmt);               
            }
            if($calo) echo $calo->total;
            else echo '0';?>大卡</p>

        <p>        
        <div class="header">
  	        <h4>查詢您一天攝取的熱量吧！</h4>
        </div>
        

        <form action = "<?php echo $_SERVER['PHP_SELF'];?>" method = "post">
            查詢日期(YYYY-MM-DD)：<input type = "text" name = "date"><br>
            <div class="input-group">
  		        <button type="submit" class="btn" name="search">查詢</button>
  	        </div>
        </form>

        <?php
        

        $id = $_SESSION['id'];
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
                    $sql = "SELECT 日期, sum(熱量) as total FROM user_eat WHERE id = $id GROUP BY 日期";
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
        $id = $_SESSION['id'];
        echo "<h2>以下是您目前的紀錄：<br></h2>";
        $sql1 = "SELECT * FROM user_eat WHERE id = $id ORDER BY 日期 desc";
        $result1 = $con->query($sql1);
        while ($row = $result1->fetch_assoc()){
            echo $row["日期"]. "吃了" .$row["餐廳"]. "的" .$row["品項"]. "，花了$" .$row["金額"]. "，熱量為" .$row["熱量"]. "大卡<br>";
        }

        $con->close();
        ?>
        </center>
    </body>
</html>