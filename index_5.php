<?php

?>
<!doctype html>
<html lang="zh-CN">
<head>
	<title>小康大学——二维码</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<link rel="stylesheet" href="css/ewm.css" type="text/css">
  	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>
	<div class="container">
		<div class="row mar-top20" style="padding-top:150px;">
			<div class="col-xs-8 col-xs-offset-2">
				<img src="images/erweima.png" class="img-responsive">
			</div>
		</div>
		<div class="row mar-top10">
			<div class="col-xs-8 col-xs-offset-2">
				<img src="images/jt.png" class="img-responsive" style="margin:0 auto;"width="15" height="25">
			</div>
		</div>
		<div class="row mar-top10">
			<div class="col-xs-12">
				<h2 class="text-center" style="color:#fff;font-size:18px;">长按关注“康宝莱服务”公众号</h2>
			</div>
		</div>
	</div>
	<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script>
		// 注意：所有的JS接口只能在公众号绑定的域名下调用，公众号开发者需要先登录微信公众平台进入“公众号设置”的“功能设置”里填写“JS接口安全域名”。
		// 如果发现在 Android 不能分享自定义内容，请到官网下载最新的包覆盖安装，Android 自定义分享接口需升级至 6.0.2.58 版本及以上。
		// 完整 JS-SDK 文档地址：http://mp.weixin.qq.com/wiki/7/aaa137b55fb2e0456bf8dd9148dd613f.html
		wx.config({
	//		debug: true, //调试阶段建议开启
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
				title: '我的小康大学学生证', // 分享标题
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
				desc: '我的小康大学学生证', // 分享描述
				link: 'http://isimou.com/wxtest/show.php?serverId=<?php echo $_POST['serverid'];?>', // 分享链接
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