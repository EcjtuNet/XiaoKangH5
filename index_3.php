<?php
$arr=$_POST;
foreach ($arr as $value){
	echo  $value;
}
?>
<!doctype html>
<html lang="zh-CN">
<head>
	<title>小康大学——信息录入</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  	<link rel="stylesheet" href="css/info.css" type="text/css">
  	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
  	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
  	<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>
	<form method="post" role="form" class="contactForm" style="width:100%;">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-10 col-xs-offset-1">
					
					<div class="form-group mar-top5 mar-bot20">
						<label for="name" class="text-center" style="padding-top:20px;">姓名</label>
						<input type="text" name="name" class="form-control" id="name" data-rule="maxlen:4" style="background:#444;color:#fff;height:40px;"> 
						<div class="validation"></div>
					</div>

					<div class="p_line"></div>

					<div class="form-group mar-top20 mar-bot20">
						<label for="grade" class="text-center">我想去的年级</label>
						<select name="grade" class="form-control" style="background:#444;color:#fff;height:40px;" id="select">
							<option>大学一年级</option>
							<option>大学二年级</option>
							<option>大学三年级</option>
							<option>大学四年级</option>
						</select>
						<div class="validation"></div>
					</div>

					<div class="p_line"></div>

					<div class="form-group mar-top20 mar-bot20">
						<label for="message" class="text-center">我的入学宣言</label>
						<select name="xuanyan" class="form-control" style="background:#444;color:#fff;height:40px;border-bottom:none;border-top-left-radius: 5px;
  border-top-right-radius: 5px;"id="select2">
							<option>我立志在小康大学开启洪荒之力，走上人生颠覆！</option>
							<option>生活不只眼前的苟且，还有小康大学和远方！</option>
							<option>作为小康大学的学生，谦虚的说，天生骄傲！</option>
							<option>我要在小康大学逆袭成为高富帅和白富美！</option>
						</select>
						<textarea class="form-control" name="message" rows="8" data-rule="required" style="background:#444;color:#fff;border-bottom-left-radius: 5px;
  border-bottom-right-radius: 5px;" id="texttext"></textarea>
						<div class="validation"></div>
						<script type="text/javascript">
						document.getElementById("select2").onchange=function(){
							document.getElementById("texttext").value=this.options[this.options.selectedIndex].text;
						}
						</script>
					</div>

					<div class="p_line"></div>

					<button type="submit"id="pbtn" class="mar-top15">
						<img src="images/biantiao.20.png" class="img-responsive" style="display:inline-block;" >
						<span style="font-size:18px;">生成学生证</span>
					</button>
				</div>
			</div>
		</div>
	</form>


</body>
</html>