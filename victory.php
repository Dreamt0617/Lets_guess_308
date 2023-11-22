<!DOCTYPE html>
<html lang="zh-TW">
<header>
   <title>win!</title>
   <meta charset="utf-8">
   <link href="css.css" rel="stylesheet"type="text/css">
</header>
<body>
<body style="background-color:black;">


<?php
session_start();
include "music.php";
$_SESSION['winmusic']= true; 
echo"<div>".'正確!!!'.'&#129392'."</div>";
echo"<div>".('你試了'.$_SESSION['time'].'次')."</div>";
?>


<form action="victory.php" method="post" class='center'style="color: white;">
<input type="submit" name="submitButton" value="再玩一次" />
<?php
   //按下「再玩一次」按鈕，跳轉到首頁(index.php)
   if(isset($_POST['submitButton'])){
      $_SESSION['winmusic']= false;
      $_SESSION['badmusic']= false; 
      header("Location: index.php");
   }
?>


</body>
</html>