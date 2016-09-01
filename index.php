<?php
require_once "JsSdk.php";
error_reporting(E_ALL || ~E_NOTICE);
header("Content-type:text/html; charset=utf-8");
$jssdk = new JSSDK("wxefd0b584fdfb2c90", "e9994cc9307a8215b6012f1b1c1dd2a0");
$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <title></title>
</head>
<body>
<div class="container">
    <img class="background" src="images/background.png">
    <div class="detail"><img src="images/detail.png"></div>
    <img class="indexAnimation" src="images/indexAnimation.gif">
</div>


<script type="text/javascript">
    window.onload = function () {
        hand = document.getElementsByClassName("hand")[0];
        window.setTimeout(goto, 9000);
    }

    function goto() {
        window.location.href = "index_2.php?version="+Math.random()*1000;
    }
</script>
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
            link: 'http://isimou.com/wxtest/', // 分享链接
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
            link: 'http://isimou.com/wxtest/', // 分享链接
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