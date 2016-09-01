<?php
require_once "JsSdk.php";
error_reporting(E_ALL || ~E_NOTICE);
header("Content-type:text/html; charset=utf-8");
$jssdk = new JSSDK("wxefd0b584fdfb2c90", "e9994cc9307a8215b6012f1b1c1dd2a0");
$signPackage = $jssdk->GetSignPackage();
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
  	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
  	<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>

	<form method="post" action="index_4.php" role="form" class="contactForm" style="width:100%;">
		<input type="text" name="imgId" class="form-control" value="<?php echo $_POST['imgId']; ?>"  style="display: none">
		<input type="text" name="filePath" class="form-control" value="<?php echo $_POST['filePath']; ?>"  style="display: none">
		<input type="text" name="lingdai" class="form-control" value="<?php echo $_POST['lingdai']; ?>"  style="display: none">
		<input type="text" name="sex" class="form-control" value="<?php echo $_POST['sex']; ?>"  style="display: none">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-10 col-xs-offset-1">
					
					<div class="form-group mar-top5 mar-bot20">
						<label for="name" class="text-center" style="padding-top:20px;">姓名</label>
						<input type="text" name="name" class="form-control" id="name"  style="background:#444;color:#fff;height:40px;">
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
							<option>硕士</option>
							<option>博士</option>
						</select>
						<div class="validation"></div>
					</div>

					<div class="p_line"></div>

					<div class="form-group mar-top20 mar-bot20">
						<label for="message" class="text-center">我的入学宣言</label>
						<select  class="form-control" style="background:#444;color:#fff;height:40px;border-bottom:none;border-top-left-radius: 5px;
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
	<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script>
		// 注意：所有的JS接口只能在公众号绑定的域名下调用，公众号开发者需要先登录微信公众平台进入“公众号设置”的“功能设置”里填写“JS接口安全域名”。
		// 如果发现在 Android 不能分享自定义内容，请到官网下载最新的包覆盖安装，Android 自定义分享接口需升级至 6.0.2.58 版本及以上。
		// 完整 JS-SDK 文档地址：http://mp.weixin.qq.com/wiki/7/aaa137b55fb2e0456bf8dd9148dd613f.html
		wx.config({
			debug: true, //调试阶段建议开启
			appId: '<?php echo $signPackage["appId"];?>',
			timestamp: <?php echo $signPackage["timestamp"];?>,
			nonceStr: '<?php echo $signPackage["nonceStr"];?>',
			signature: '<?php echo $signPackage["signature"];?>',
			jsApiList: [
				// 所有要调用的 API 都要加到这个列表中
				'onMenuShareTimeline',
				'onMenuShareAppMessage',
				'chooseImage'
			]
		});
		wx.ready(function () {
			// config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready函数中。
			wx.onMenuShareTimeline({
				title: '这是我得小康大学学生证，你也快来制作自己的学生证吧', // 分享标题
				link: 'http://isimou.com/wxtest/show.php?serverId=<?php echo $_POST['filePath'];?>', // 分享链接
				imgUrl: 'http://coderli.top/wxtest/wxShareInterface/cbl.jpg', // 分享图标
				success: function () {
					// 用户确认分享后执行的回调函数
					localtion.href="index_5.php";
				},
				cancel: function () {
					// 用户取消分享后执行的回调函数

				}
			});
			wx.onMenuShareAppMessage({
				title: '小康大学', // 分享标题
				desc: '这是我得小康大学学生证，你也快来制作自己的学生证吧', // 分享描述
				link: 'http://isimou.com/wxtest/show.php?serverId=<?php echo $_POST['filePath'];?>', // 分享链接
				imgUrl: 'http://coderli.top/wxtest/wxShareInterface/cbl.jpg', // 分享图标
				type: 'link', // 分享类型,music、video或link，不填默认为link
				dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
				success: function () {
					// 用户确认分享后执行的回调函数
					location.href = 'index_5.php';
				},
				cancel: function () {
					// 用户取消分享后执行的回调函数
				}
			});
		});
		wx.error(function (res) {
			// config信息验证失败会执行error函数，如签名过期导致验证失败，具体错误信息可以打开config的debug模式查看，也可以在返回的res参数中查看，对于SPA可以在这里更新签名。
			alert("配置错误");
		});
	</script>
</body>
</html>