<?php include_once "base.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title>健康促進網</title>
	<link href="./home_files/css.css" rel="stylesheet" type="text/css">
	<script src="./home_files/jquery-1.9.1.min.js"></script>
	<script src="./home_files/js.js"></script>
</head>

<body>
	<div id="alerr" style="background:rgba(51,51,51,0.8); color:#FFF; min-height:100px; width:300px; position:fixed; display:none; z-index:9999; overflow:auto;">
		<pre id="ssaa"></pre>
	</div>
	
	<div id="all">
		<?php include "./front/header.php"; ?>
		<div id="mm">
			<div class="hal" id="lef">
				<a class="blo" href="?do=admin">帳號管理</a>
				<a class="blo" href="?do=news">最新文章管理</a>
				<a class="blo" href="?do=que">問卷管理</a>
			</div>
			<div class="hal" id="main">
				<div>
				<span style="width:80%; display:inline-block;">
						<marquee>我是跑馬燈Lorem ipsum dolor sit amet.</marquee>
					</span>
					<span style="width:18%; display:inline-block;">
				<?php
				if(!isset($_SESSION['login'])){
					echo "<a href='?do=login'>會員登入</a>";
				}else{
					if($_SESSION['login']=='admin'){
						echo "歡迎,admin";
						?>
						<button onclick="location.href='back.php'">管理</button>|<button onclick="location.href='api/logout.php'">登出</button>
						<?php
					}else{
						echo "歡迎,".$_SESSION['login'];
						?><button onclick="location.href='api/logout.php'">登出</button>
						<?php
					}
				}
				?>
						
					</span>
					<div class="">
						<?php 
							$do=$_GET['do']??'home';
							$file="./back/".$do.".php";
							if(file_exists($file)){
								include $file;
							}else{
								include "./back/home.php";
							}
						?>
					</div>
				</div>
			</div>
		</div>
		<div id="bottom">
			本網站建議使用：IE9.0以上版本，1024 x 768 pixels 以上觀賞瀏覽 ， Copyright © 2022健康促進網社群平台 All Right Reserved
			<br>
			服務信箱：health@test.labor.gov.tw<img src="./home_files/02B02.jpg" width="45">
		</div>
	</div>

</body>

</html>