<!DOCTYPE html>
<html lang="zh-TW">
<header>
   <title>猜數字!</title>
   <meta charset="utf-8">
   <link href="css.css" rel="stylesheet"type="text/css"> <!--連接到css.css檔案-->
</header>

<body>
<body style="background-color:black;">


<?php 
ini_set('display_errors','off');//關閉錯誤提示
include "music.php";//將music.php包含進來
$_SESSION['winmusic']= false;
$_SESSION['badmusic']= false; 

session_start();
$cor=false; 
$_SESSION['winmusic']= false;
$_SESSION['badmusic']= false; 
$_SESSION['buttonmusic'] = true;
echo($_SESSION['ans']);


while($cor!=true){

//記錄情況:玩家猜測的數字比正解大或小
if  ($_POST["num"] < $_SESSION['ans'])  $_SESSION['case'] =1;
else if($_POST["num"] > $_SESSION['ans']) $_SESSION['case'] =2;

//當玩家猜測數字超出範圍時，給出提示並出現錯誤音效
if($_POST["num"] >100 || $_POST["num"]<1){
   echo"<div>".('請不要做傻事，請詳閱規則。'.'數字只出現在'.$_SESSION['a'] .'~'.$_SESSION['b'])."</div>";
   $_SESSION['badmusic']=true;
   break;
}
else if ($_SESSION['case'] == 1 && $_POST["num"] < $_SESSION['a']){
   echo"<div>".('請不要做傻事，請詳閱規則。'.'數字只出現在'.$_SESSION['a'] .'~'.$_SESSION['b'])."</div>";
   $_SESSION['badmusic']=true;
   break;
}
else if ($_SESSION['case'] == 2 && $_POST["num"] > $_SESSION['b']){
   echo"<div>".('請不要做傻事，請詳閱規則。'.'數字只出現在'.$_SESSION['a'] .'~'.$_SESSION['b'])."</div>";
   $_SESSION['badmusic']=true; 
   break;
}

//當玩家猜測數字在正常範圍時，縮小猜測範圍
else if  ($_POST["num"] < $_SESSION['ans'])  {
     $_SESSION['badmusic']= false;
     echo"<div>".('錯了' .$_POST["num"]. '~' .$_SESSION['b'] .'<br>')."</div>";
     $_SESSION['a']=$_POST["num"];
     $_SESSION['time'] +=1;
     $_SESSION['case'] = 1; 
     break;
} 
else if($_POST["num"] > $_SESSION['ans']){
   $_SESSION['badmusic']= false; 
     echo"<div>".('錯了' .$_SESSION['a'] .'~'.$_POST["num"] .'<br>')."</div>";
     $_SESSION['b']=$_POST["num"];
     $_SESSION['time'] +=1;
     $_SESSION['case'] = 2;
     break;
}

//當玩家猜測正確數字，跳轉到victory.php且開啟勝利音效
else { 
   $cor=true;
   $_SESSION['winmusic']= true; 
   header("Location: victory.php");
}

}
?>

<!--按下「提交」按鈕後，跳轉到formpage.php (只有在猜測數字不正確時會發生)-->
<form action="formpage.php" method="post" class='center'style="color: white;">
數字! <input type="text" name="num">
<input type="submit" name="submitButton">
<input type="reset" value="清空">
<input type="submit" name="button" value="再玩一次" />

<?php
   include "music.php";
   if(isset($_POST['submitButton'])){ //按下提交按鈕時，出現點擊音效
      $_SESSION['badmusic']= false; 
      $_SESSION['buttonmusic']=true;
   }
   //若按下「再玩一次」按鈕，跳轉到首頁(index.php)
   if(isset($_POST['button'])){
      header("Location: index.php");
   }
?>


</body>
</html>