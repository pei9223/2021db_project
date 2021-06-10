<?php
session_start();

//
$id = "";
$name = "";
$height = "";
$weight = "";
$password = "";
$errors = array(); 

// 連線到資料庫
$servername = "localhost";
$username = "pcsettingroot";
$password = "0816131";
$dbname = "2021_project";
                        
// Create connection
$db = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // 每個欄位都要有輸入直
  $id = mysqli_real_escape_string($db, $_POST['id']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $height = mysqli_real_escape_string($db, $_POST['height']);
  $weight = mysqli_real_escape_string($db, $_POST['weight']);


  // 每個欄位都要有輸入直
  if (empty($id)) { array_push($errors, "帳號不可為空"); }
  if (empty($password)) { array_push($errors, "密碼不可為空"); }
  if (empty($name)) { array_push($errors, "你的名字是啥呢"); }
  if (empty($height)) { array_push($errors, "矮又怎樣還是要輸入阿"); }
  if (empty($weight)) { array_push($errors, "體重是秘密嗎哈哈哈"); }
  //防呆
  if($height < 0 && !empty($height)) { array_push($errors, "身高大於0啦小矮子"); }
  if($weight < 0 && !empty($weight)) { array_push($errors, "體重有負的嗎= ="); }



  // 確認id沒被使用過
  $user_check_query = "SELECT * FROM user_info WHERE 帳號='$id' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  if($result){
    $user = mysqli_fetch_assoc($result);
  }
  
  if ($user) { // id已被使用
    if ($user['帳號'] === $id) {
      array_push($errors, "此帳號已存在QQ");
    }

  }

  // 這個註冊是可行的
  if (count($errors) == 0) {
  	$query = "INSERT INTO user_info (帳號, 密碼, 名字, 身高, 體重 ) 
    VALUES('$id', '$password', '$name', '$height', '$weight')";
    
  	mysqli_query($db, $query);
  	$_SESSION['id'] = $id;
  	$_SESSION['success'] = "恭喜成功註冊!";
  	header('location: main.php');
  }
}
if (isset($_POST['login_user'])) {
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $password = mysqli_real_escape_string($db, $_POST['password']);


    if (empty($id)) {
        array_push($errors, "帳號不可為空");
    }
    if (empty($password)) {
        array_push($errors, "密碼不可為空");
    }

    

  
    if (count($errors) == 0) {
        
        $query = "SELECT * FROM user_info WHERE 帳號='$id' AND 密碼='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['id'] = $id;
          $_SESSION['success'] = "恭喜成功登入!";
          header('location: main.php');
        }else {
            array_push($errors, "帳號/密碼錯誤");
        }
    }
  }
  
  ?>