<?php
require_once "JsSdk.php";
require_once "pdo.php";
error_reporting(E_ALL || ~E_NOTICE);
header("Content-type:text/html; charset=utf-8");
$jssdk = new JSSDK("wxefd0b584fdfb2c90", "e9994cc9307a8215b6012f1b1c1dd2a0");
$signPackage = $jssdk->GetSignPackage();

$imgurl = $_POST['imgurl'];
$lingdai = $_POST['lingdai'];
$sex = $_POST['sex'];
//$filePath = $_POST['filePath'];
$time=$_POST['time'];
$name = $_POST['name'];
$grade = $_POST['grade'];
$message = $_POST['message'];
//$pdo = new myPdo();
//$pdo->add($time,$name, $lingdai, $sex, $grade, $message, $imgurl);
$num=1;
switch ($lingdai){
    case "gk":{
         $num=1;
    }break;
    case "wk":{
        $num=3;
    }break;
    case "lk":{
        $num=2;
    }break;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=0.5, minimum-scale=0.5"/>
    <title>学生证生成成功</title>
    <link rel="stylesheet" href="css/base.css"/>
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/index_1.css"/>
    <link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 text-center layout">
            <section class="row">
                <h2>小康大学学生证</h2>
                <div class="section-photo col-xs-8 col-xs-offset-2">
                    <!--							<img src="images/man2.png" class="img-responsive img-centered">-->
                    <?php if ($_POST['$imgurl'] != "") { ?>
                        <img src="<?php echo $_POST['$imgurl']; ?>" class="img-responsive img-centered">
                    <?php } else { ?>
                        <img src="images/<?php echo $sex.$num?>.png" class="img-responsive img-centered">
                    <?php } ?>
                </div>
                <div class="dash col-xs-12"></div>
                <div class="section-info col-xs-10 col-xs-offset-1">
                    <form action="">
                        <div class="row padding">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label class="col-xs-5 control-label no-padding" for="name">姓名：</label>
                                    <div class="col-xs-7 no-padding overflow-hidden">
                                        <input type="text" id="name" placeholder=""
                                               value="<?php echo $_POST['name']; ?>" maxlength="4" class="border-bottom"
                                               required="required" oninvalid="setCustomValidity('请输入姓名')"
                                               oninput="setCustomValidity('')">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label class="col-xs-5 control-label no-padding" for="grade">年级：</label>
                                    <div class="col-xs-7 no-padding overflow-hidden">
                                        <input type="text" id="grade" placeholder=""
                                               value="<?php echo $_POST['grade']; ?>" maxlength="4"
                                               class="border-bottom" required="required"
                                               oninvalid="setCustomValidity('请输入年级')" oninput="setCustomValidity('')">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group form-down">
                                <label class="col-xs-4 control-label no-padding" for="say">入学宣言：</label>
                                <div class="col-xs-8 no-padding overflow-hidden">
                                    <input type="text" id="say" placeholder="" class="border-bottom"
                                           style="width: 100%;">
                                </div>
                                <div class="col-xs-12 no-padding overflow-hidden">
                                    <input type="text" id="say" placeholder="" class="border-bottom">
                                </div>
                                <div class="col-xs-12 no-padding overflow-hidden">
                                    <input type="text" id="say" placeholder="" class="border-bottom">
                                </div>
                                <div class="col-xs-12 no-padding overflow-hidden">
                                    <input type="text" id="say" placeholder="" class="border-bottom">
                                </div>
                            </div>
                            <div class="form-up col-xs-12">
                                <textarea class="form-control no-border" rows="4" maxlength="48" required="required"
                                          oninvalid="setCustomValidity('请输入入学宣言(48字内)')"
                                          oninput="setCustomValidity('')"><?php echo $_POST['message']; ?></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="dash col-xs-12"></div>
                <div class="col-xs-10 col-xs-offset-1 section-button">
                    <a href="index_2.php" class="button button-border">
                        <i class="icon-undo bigger-110"></i>
                        重新生成
                    </a>
                </div>
            </section>
        </div>
    </div>
</div>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
    // 注意：所有的JS接口只能在公众号绑定的域名下调用，公众号开发者需要先登录微信公众平台进入“公众号设置”的“功能设置”里填写“JS接口安全域名”。
    // 如果发现在 Android 不能分享自定义内容，请到官网下载最新的包覆盖安装，Android 自定义分享接口需升级至 6.0.2.58 版本及以上。
    // 完整 JS-SDK 文档地址：http://mp.weixin.qq.com/wiki/7/aaa137b55fb2e0456bf8dd9148dd613f.html
    wx.config({
  //      debug: true, //调试阶段建议开启
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
//            link: 'http://isimou.com/wxtest/show.php?serverId=<?php //echo $_POST['imgId'];?>//', // 分享链接
            link: 'http://isimou.com/wxtest/show.php?time=<?php echo $time;?>', // 分享链接
            imgUrl: 'http://coderli.top/wxtest/wxShareInterface/cbl.jpg', // 分享图标
            success: function () {
                // 用户确认分享后执行的回调函数
                location.href = "index_5.php";
            },
            cancel: function () {
                // 用户取消分享后执行的回调函数

            }
        });
        wx.onMenuShareAppMessage({
            title: '小康大学', // 分享标题
            desc: '这是我得小康大学学生证，你也快来制作自己的学生证吧', // 分享描述
//            link: 'http://isimou.com/wxtest/show.php?serverId=<?php //echo $_POST['filePath'];?>//', // 分享链接
            link: 'http://isimou.com/wxtest/show.php?time=<?php echo $time;?>', // 分享链接
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
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js" type="text/javascript"></script>
<script>
    $('.section-photo').append('<img src="<?php echo $imgurl;?>" style=" width:100%; position: absolute; left: 0;">');
</script>
</body>
</html>
