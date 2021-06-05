<!doctype html>
<html>
    <head>
        <meta charset="UTF-8"> 
        <title>更改資料</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <center>
        <div class="btn">
            <h2><a href="main.php" style="color:white;">回首頁</a>&nbsp&nbsp&nbsp<br></h2>
        </div>
        <div class="header">
  	        <h2>修改資料</h2>
        </div>
        <form action = "<?php echo $_SERVER['PHP_SELF'];?>" method = "post">
            <div class="input-group">
  		        <label>您的帳號：</label>
  		        <input type="text" name="id" >
  	        </div>
            <div class="input-group">
  		        <label>新密碼：</label>
  		        <input type="text" name="new_password" >
  	        </div>
            <div class="input-group">
  		        <label>新名字：</label>
  		        <input type="text" name="new_name" >
  	        </div>
            <div class="input-group">
  		        <label>新身高：</label>
  		        <input type="text" name="new_height" >
  	        </div>
            <div class="input-group">
  		        <label>新體重：</label>
  		        <input type="text" name="new_weight" >
  	        </div>
            <div class="input-group">
  		        <button type="submit" class="btn" name="alter">修改資料</button>
  	        </div>
        </form>

        <?php
        $servername = "localhost";
        $username = "pcsettingroot";
        $password = "0816131";
        $dbname = "2021_project";

        $con = new mysqli($servername, $username, $password, $dbname);
        if ($con->connect_error){
            die ("資料庫連線失敗" .$con->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $id = htmlspecialchars($_REQUEST['id']);
            $new_password = htmlspecialchars($_REQUEST['new_password']);
            $new_name = htmlspecialchars($_REQUEST['new_name']);
            $new_height = htmlspecialchars($_REQUEST['new_height']);
            $new_weight = htmlspecialchars($_REQUEST['new_weight']);

            if (empty($id)){
                ?>
                <script type = "text/javascript"> 
                    alert("請輸入您的帳號"); 
                </script> 
                <?php
            } else {
                $sql = "SELECT 帳號, 密碼, 名字, 身高, 體重 FROM user_info";
                $result = $con->query($sql);
                $found = false;
                while ($row = $result->fetch_assoc()){
                    if ($row["帳號"] == $id){
                        $found = true;
                        if ($new_password != $row["密碼"] && !empty($new_password)){
                            $sql1 = "UPDATE user_info SET 密碼 = '{$new_password}' WHERE 帳號 = '{$id}'";
                            $result1 = $con->query($sql1);
                        }
                        if ($new_name != $row["名字"] && !empty($new_name)){
                            $sql2 = "UPDATE user_info SET 名字 = '{$new_name}' WHERE 帳號 = '{$id}'";
                            $result2 = $con->query($sql2);
                        }
                        if ($new_height != $row["身高"] && !empty($new_height) && $new_height > 0){
                            $sql3 = "UPDATE user_info SET 身高 = '{$new_height}' WHERE 帳號 = '{$id}'";
                            $result3 = $con->query($sql3);
                        }
                        if ($new_weight != $row["體重"] && !empty($new_weight) && $new_weight > 0){
                            $sql4 = "UPDATE user_info SET 體重 = '{$new_weight}' WHERE 帳號 = '{$id}'";
                            $result4 = $con->query($sql4);
                        }
                    }
                }
                $error = false;
                if ($found == false){
                    $error = true;
                    ?>
                    <script type = "text/javascript"> 
                        alert("此帳號不存在"); 
                    </script> 
                    <?php
                } else {
                    if (empty($new_password) && empty($new_name) && empty($new_height) && empty($new_weight)){
                        $error = true;
                        ?>
                        <script type = "text/javascript">
                            alert("請輸入您想修改的項目");
                        </script> 
                        <?php
                    } else {
                        if (!empty($new_height) && (!is_numeric($new_height) || $new_height <= 0)){
                            $error = true;
                            if (!empty($new_weight) && (!is_numeric($new_weight) || $new_weight <= 0)){
                                $error = true;
                                ?>
                                <script type = "text/javascript">
                                    alert("身高及體重格式錯誤");
                                </script> 
                                <?php
                            } else {
                                $error = true;
                                ?>
                                <script type = "text/javascript">
                                    alert("身高格式錯誤");
                                </script> 
                                <?php
                            }
                        } else {
                            if (!empty($new_weight) && (!is_numeric($new_weight) || $new_weight <= 0)){
                                $error = true;
                                ?>
                                <script type = "text/javascript">
                                    alert("體重格式錯誤");
                                </script> 
                                <?php
                            }
                        }
                    }
                } 
                if ($error == false){
                    ?>
                    <script type = "text/javascript">
                        alert("資料修改成功！");
                    </script> 
                    <?php
                }   
            }
        }
        $con->close();
        ?>
        </center>
    </body>
</html>