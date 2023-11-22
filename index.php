<!DOCTYPE html>
<html lang="zh-TW">

<header>
	<title>首頁</title>
	<meta charset="utf-8">
	<link href="css.css" rel="stylesheet"type="text/css"> <!--連接到css.css檔案-->
</header>

<body style="background-color:black;">
<div><marquee scrollamount=47 ; behavior=alternate ><i>猜數字 1~100!!  </marquee></i> </div>


<?php   //初始設定
session_start();
$_SESSION['ans'] = random_int(1, 100); //給定一個隨機數字
$_SESSION['time'] = 1;  //記錄猜測次數
$_SESSION['a'] =1;    //猜數字最小值
$_SESSION['b'] =100;	//猜數字最大值
$_SESSION['case'] ;	
?>


<!--按下「提交」按鈕後跳轉到formpage.php-->
<form action="formpage.php" method="post" class='center'style="color: white;">  
數字! <input type="text" name="num"><br>
<input type="submit">
<input type="reset" value="清空">
</form>

<!--放雷射眼貓貓的gif-->
<div><img src="fat-cat-laser-eyes.gif" alt="Computer man" style="width:350px;height:500px;"></div>

</body>
</html>