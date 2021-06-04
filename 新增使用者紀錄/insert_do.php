<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>新增紀錄</title>
        <link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
        <center>
        <div class="btn">
            <h2><a href="main.php" style="color:white;">回首頁</a>&nbsp&nbsp&nbsp<br></h2>
        </div>
        <?php

        session_start();

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "2021_project";
                                
        // Create connection
        $db = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$db) {
            die("Connection failed: " . mysqli_connect_error());
        }

        if(isset($_POST['favorite']))
        {

            $YourName = $_SESSION['id'];
            echo '你的id: '.$YourName;
            $_SESSION['name'] = $_SESSION['id'];//keep your id for two page  
            
            
            echo "<p>你吃了甚麼呢?<p>";
        }

      
        if(isset($_POST['favorite']))
        {
            $_SESSION['rest'] = $_POST['favorite'];//keep your choose for student restaurant

            /*must check table name!!!!!!!!!!!!!!!!!!!!*/
            
            if($_POST['favorite'] == 'four')
            {
                $ta = '四海遊龍';
            }
            else if($_POST['favorite'] == 'tien')
            {
                $ta = '天晟燒臘';
            }
            else if($_POST['favorite'] == 'bis1')//女二
            {
                $ta = '比司多_女二';
            }
            else if($_POST['favorite'] == 'fruit')
            {
                $ta = '郁百分水果行';
            }
            else if($_POST['favorite'] == 'noodle')
            {
                $ta = '極麵道';
            }
            else if($_POST['favorite'] == 'bis2')//研三
            {
                $ta = '比司多_研三';///比斯多
            }
            else if($_POST['favorite'] == 'lee')
            {
                $ta = '李記小館';
            }
            else if($_POST['favorite'] == 'king')
            {
                $ta = '漢堡王';
            }
            else if($_POST['favorite'] == 'fire')
            {
                $ta = '火山丼';
            }
            else if($_POST['favorite'] == 'tea')
            {
                $ta = '茶壇';
            }
            else if($_POST['favorite'] == '85c')
            {
                $ta = '85度c';
            }
            else if($_POST['favorite'] == 'subway')
            {
                $ta = 'subway';
            }
            else if($_POST['favorite'] == 'two')
            {
                $ta = '二弄堂';
            }
            else if($_POST['favorite'] == 'sister')
            {
                $ta = '姊妹飯桶';
            }
            else if($_POST['favorite'] == 'laya')
            {
                $ta = '拉亞漢堡';
            }
            else if($_POST['favorite'] == 'leshuan')
            {
                $ta = '樂軒食堂';
            }
            else if($_POST['favorite'] == 'shin')
            {
                $ta = '鑫源冰果店';
            }
            else if($_POST['favorite'] == 'lon')
            {
                $ta = '隆太郎金牌燒臘';
            }
            else if($_POST['favorite'] == 'coco')
            {
                $ta = 'coco';
            }
            else if($_POST['favorite'] == 'pin')
            {
                $ta = '品嘉日式料理';
            }
            //add rest

            $id =!empty($_GET["id"]) ? $_GET["id"]:"";

            if($id == "")
            {
                
                $sql = "select * from $ta";
                $stmt = $db->query($sql);
                $i = 1;
                    while($result = mysqli_fetch_row($stmt))
                    {
                        
                        $food = $result[2];
                        $price = $result[3];
                        $cal = $result[8];
                        echo '<p>商品:'.$food;
                        echo ', 售價:'.$price;
                        echo ', 熱量:'.$cal;
                        echo "<form>";
                        echo "<input type = 'submit' name = 'submit1' value = '新增'/>
                            <input type='hidden' name = 'submit' value = '$i'/>
                            <input type='hidden' name = 'id' value = '$id'/>";
                        echo "</form>";
                        $i ++;
            
                    }
            }
        }

        else
            {
                echo '你的id:'.$_SESSION['id'].'<br>';
                $na = $_SESSION['id'];
                $m = '';
                $submit =!empty($_GET["submit"]) ? $_GET["submit"] : null;

                if($_SESSION['rest'] == 'four')
                {
                    $table = '四海遊龍';
                }
                else if($_SESSION['rest'] == 'tien')
                {
                    $table = '天晟燒臘';
                }
                else if($_SESSION['rest'] == 'bis1')//女二
                {
                    $table = '比司多_女二';
                }
                else if($_SESSION['rest'] == 'fruit')
                {
                    $table = '郁百分水果行';
                }
                else if($_SESSION['rest'] == 'noodle')
                {
                    $table = '極麵道';
                }
                else if($_SESSION['rest'] == 'bis2')//研三
                {
                    $table = '比司多_研三';///
                }
                else if($_SESSION['rest'] == 'lee')
                {
                    $table = '李記小館';
                }
                else if($_SESSION['rest'] == 'king')
                {
                    $table = '漢堡王';
                }
                else if($_SESSION['rest'] == 'fire')
                {
                    $table = '火山丼';
                }
                else if($_SESSION['rest'] == 'tea')
                {
                    $table = '茶壇';
                }
                else if($_SESSION['rest'] == '85c')
                {
                    $table = '85度c';
                }
                else if($_SESSION['rest'] == 'subway')
                {
                    $table = 'subway';
                }
                else if($_SESSION['rest'] == 'two')
                {
                    $table = '二弄堂';
                }
                else if($_SESSION['rest'] == 'sister')
                {
                    $table = '姊妹飯桶';
                }
                else if($_SESSION['rest'] == 'laya')
                {
                    $table = '拉亞漢堡';
                }
                else if($_SESSION['rest'] == 'leshuan')
                {
                    $table = '樂軒食堂';
                }
                else if($_SESSION['rest'] == 'shin')
                {
                    $table = '鑫源冰果店';
                }
                else if($_SESSION['rest'] == 'lon')
                {
                    $table = '隆太郎金牌燒臘';
                }
                else if($_SESSION['rest'] == 'coco')
                {
                    $table = 'coco';
                }
                else if($_SESSION['rest'] == 'pin')
                {
                    $table = '品嘉日式料理';
                }
                //add rest

                $n = 1;
                    
                $sql = "select * from $table";
                if($stmt = $db->query($sql))
                {
                    while($result = mysqli_fetch_object($stmt))
                    {
                        if($n == $submit)
                        {
                            $date = date("Y-m-d");

                            $mydb = new mysqli($servername, $username, $password, $dbname);
                            //$s = "INSERT INTO user2 (id, 日期, 品項名稱, 售價, 熱量) VALUES ($na, '$date', '$result->品項名稱','$result->售價','$result->熱量')";
                            $s = "INSERT INTO user_eat (id, 日期, 餐廳, 品項, 金額, 熱量) VALUES ($na, '$date', '$table',  '$result->品項名稱','$result->售價','$result->熱量')";
                            $mydb->query($s);
                            if($table == '比司多_研三')
                            {
                                echo '成功新增比司多的餐點';
                            }
                            else if($table == '比司多_女二')
                            {
                                echo '成功新增比司多的餐點';
                            }
                            else
                            {
                                echo '成功新增'.$table.'的餐點';
                            }
                            
            
                            break;
                        }
                        $n ++;
                    }
                }
            }
        ?>



</body>
</html>