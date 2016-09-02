<?php
//设置报错级别，忽略警告，设置字符
error_reporting(E_ALL || ~E_NOTICE);
header("Content-type:text/html; charset=utf-8");
require_once "JsSdk.php";
require_once "pdo.php";
$jssdk = new JSSDK("wxefd0b584fdfb2c90", "e9994cc9307a8215b6012f1b1c1dd2a0");
$signPackage = $jssdk->GetSignPackage();
$time = $_GET['time'];
$mypdo = new myPdo();
$package = $mypdo->select($time);
$num = 1;
switch ($package[0]['subject']) {
    case "gk": {
        $num = 1;
    }
        break;
    case "wk": {
        $num = 3;
    }
        break;
    case "lk": {
        $num = 2;
    }
        break;
}
//print_r($package[0]);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=0.5, minimum-scale=0.5"/>
    <title>他人点击链接</title>
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
                    <img id="img" src="images/<?php echo $package[0]['sex'] . $num; ?>.png"
                         class="img-responsive img-centered"/>
                </div>
                <div class="dash col-xs-12">
                </div>
                <div class="section-info col-xs-10 col-xs-offset-1">
                    <div class="row padding">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label class="col-xs-5 control-label no-padding" for="name">姓名：</label>
                                <div class="col-xs-7 no-padding overflow-hidden">
                                    <input type="text" id="name" class="border-bottom"
                                           value="<?php echo $package[0]['name']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label class="col-xs-5 control-label no-padding" for="grade">年级：</label>
                                <div class="col-xs-7 no-padding overflow-hidden">
                                    <input type="text" id="grade" class="border-bottom"
                                           value="<?php echo $package[0]['grade']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group form-down">
                            <label class="col-xs-4 control-label no-padding" for="say">入学宣言：</label>
                            <div class="col-xs-8 no-padding overflow-hidden">
                                <input type="text" id="say" placeholder="" class="border-bottom"
                                       style="width: 100%;" readonly>
                            </div>
                            <div class="col-xs-12 no-padding overflow-hidden">
                                <input type="text" id="say" placeholder="" class="border-bottom" readonly>
                            </div>
                            <div class="col-xs-12 no-padding overflow-hidden">
                                <input type="text" id="say" placeholder="" class="border-bottom" readonly>
                            </div>
                            <div class="col-xs-12 no-padding overflow-hidden">
                                <input type="text" id="say" placeholder="" class="border-bottom" readonly>
                            </div>
                        </div>
                        <div class="form-up col-xs-12">
                            <textarea class="form-control no-border" rows="4" readonly><?php echo $package[0]['message']; ?></textarea>
                        </div>
                    </div>
                    <input type="submit" id="input_file" class="hidden">
                </div>
                <div class="dash col-xs-12"></div>
                <div class="col-xs-10 col-xs-offset-1 section-button" style="font-size: 30px;">
                    <div class="button-border" style="margin-right: 7%;">
                        <a href="http://isimou.com/wxtest/" class="button" id="btn_select">领取我的学生证</a>
                    </div>
                    <div class="button-border">
                        <a href="http://weixin.qq.com/r/f0w0LMXEipj1rYFP9xlt" class="button">康宝莱微服务</a>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
    wx.config({
//        debug: true, //调试阶段建议开启
        appId: '<?php echo $signPackage["appId"];?>',
        timestamp: <?php echo $signPackage["timestamp"];?>,
        nonceStr: '<?php echo $signPackage["nonceStr"];?>',
        signature: '<?php echo $signPackage["signature"];?>',
        jsApiList: [
            /*
             * 所有要调用的 API 都要加到这个列表中
             * 这里以图像接口为例
             */
//            "downloadImage"
        ]
    });
    var img = document.getElementById("img");
    //定义images用来保存选择的本地图片ID，和上传后的服务器图片ID
    wx.ready(function () {
        function download() {
            wx.downloadImage({
                serverId: '<?php echo $_GET['serverId']; ?>', // 需要下载的图片的服务器端ID，由uploadImage接口获得
                isShowProgressTips: 1, // 默认为1，显示进度提示
                success: function (res) {
                    img.src = res.localId; // 返回图片下载后的本地ID
                }
            });
        }

        download();
    });
    wx.error(function (res) {
        // config信息验证失败会执行error函数，如签名过期导致验证失败，具体错误信息可以打开config的debug模式查看，也可以在返回的res参数中查看，对于SPA可以在这里更新签名。
    //    alert("配置错误");
    });
</script>
</body>
</html>
