<?php
//设置报错级别，忽略警告，设置字符
error_reporting(E_ALL || ~E_NOTICE);
header("Content-type:text/html; charset=utf-8");
require_once "JsSdk.php";
$jssdk = new JSSDK("wx81dffb5d17695838", "651936e8e2d358460475fc322d003965");
$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=0.5, minimum-scale=0.5"/>
    <title>照片录入</title>
    <link rel="stylesheet" href="css/base.css"/>
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/index_1.css"/>
    <link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<style>
    .img-padding {
        padding: 15px;
    }

    .section-photo .section-hover {
        display: flex;
        padding-bottom: 110%;
        background: rgba(254, 209, 54, 0);
        position: relative;
        opacity: 0;
        transition: all ease 0.5s;
        -webkit-transition: all ease 0.5s;
        -moz-transition: all ease 0.5s;
    }

    .section-photo .section-hover:hover {
        opacity: 1;
    }

    .section-photo .section-hover-content {
        position: absolute;
        margin-top: 33%;
        left: 45%;
        margin-left: -70px;
        height: 130px;
        width: 130px;
        border: 1px #CCC solid;
        border-radius: 50%;
        color: #000;
        background-color: rgba(255, 255, 255, 0.5);
    }

    .section-photo .section-hover-content h4 {
        font-size: 15px;
        line-height: 15px;
        margin-top: -8px;
        font-weight: 200;
        font-family: "WawaTC-Regular";
    }

    .section-info h2 {
        font-size: 40px;
        display: inline;
    }

    .section-info h2 {
        font-size: 35px;
        display: inline;
    }

    .section-info h3 {
        font-size: 25px;
        display: inline;
    }

    .section-info .section-info-font {
        flex: 1;
    }

    .img-sex {
        position: absolute;
    }

    .img-box {
        display: flex;
        padding-bottom: 20%;
        background: rgba(255, 255, 255, 0);
        position: relative;
    }

    .img-box .img-sex1 {
        width: 50px;
        height: 68px;
        position: relative;
        margin-top: 23%;
        left: 30%;
    }

    .imgBoy {
        background: url("images/boy.png") no-repeat center;
    }

    .imgGirl {
        background: url("images/girl.png") no-repeat center;
    }
</style>
<body>
<div class="container-fluid">
    <from action="" method="">
        <div class="row">
            <div class="col-xs-12 text-center layout">
                <section class="row">
                    <div class="section-photo col-xs-8 col-xs-offset-2">
                        <img src="images/man2.png" id="img" class="img-responsive img-centered1">
                        <div class="section-hover">
                            <!--这里调用手机设备的相机API-->
                            <a href="javascript:void();" class="section-hover-content" id="weixin">
									<span style="font-size: 70px;text-align: center;">
										<i class="icon-camera"></i>
									</span>
                                <h4>上传照片</h4>
                            </a>
                        </div>
                    </div>
                    <div class="dash col-xs-12"></div>
                    <div class="section-info col-xs-10 col-xs-offset-1">
                        <div class="row padding">
                            <div class="col-xs-12 text-center" style="padding-bottom: 25px;">
                                <h2>选择学科</h2>
                                <h3>(学士服的领口颜色)</h3>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-4">
                                    <input type="radio" value="gk" id="gk" name="lingdai" style="display:none">
                                    <img id="first" src="images/lingkou3.png" onclick="myFun(this.id)"
                                         class="img-responsive img-padding"/>
                                </div>
                                <div class="col-xs-4">
                                    <input type="radio" value="lk" id="gk" name="lingdai" style="display:none">
                                    <img id="second" src="images/lingkou2.png" onclick="myFun(this.id)"
                                         class="img-responsive img-padding"/>
                                </div>
                                <div class="col-xs-4">
                                    <input type="radio" value="wk" id="gk" name="lingdai" style="display:none">
                                    <img id="third" src="images/lingkou1.png" onclick="myFun(this.id)"
                                         class="img-responsive img-padding"/>
                                </div>
                                <div style="width: 100%;display: flex;">
                                    <div class="section-info-font">
                                        <h1>工科</h1>
                                    </div>
                                    <div class="section-info-font">
                                        <h1>理科</h1>
                                    </div>
                                    <div class="section-info-font">
                                        <h1>文科</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dash col-xs-12" style="margin-top: 0px;"></div>
                    <div class="section-info col-xs-10 col-xs-offset-1">
                        <div class="row padding">
                            <div class="col-xs-12 text-center" style="padding-bottom: 25px;">
                                <h2>选择性别</h2>
                            </div>
                            <div class="col-xs-8 col-xs-offset-2">
                                <div class="col-xs-6">
                                    <div class="img-box">
                                        <input type="radio" value="man" id="wk" name="sex" style="display:none">
                                        <img src="images/circle-bg.png" class="img-responsive img-sex imgBoy"
                                             onclick="myFun(this.id)"/>
                                        <!--                                        <img src="images/boy.png" id="man" class="img-responsive img-sex1"-->
                                        <!--                                        >-->
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="img-box">
                                        <input type="radio" value="man" id="wk" name="sex" style="display:none">
                                        <img src="images/circle-bg.png" class="img-responsive img-sex imgGirl"
                                             onclick="myFun(this.id)"/>
                                        <!--                                        <img src="images/girl.png" id="woman" class="img-responsive img-sex1"-->
                                        <!--                                        >-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dash col-xs-12"></div>
                    <div class="col-xs-10 col-xs-offset-1 section-button">
                        <a href="" class="button button-border">
                            <i class="icon-edit bigger-110"></i>
                            录入学籍
                        </a>
                    </div>
                </section>
            </div>
        </div>
    </from>
</div>
</body>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
    wx.config({
        debug: true, //调试阶段建议开启
        appId: '<?php echo $signPackage["appId"];?>',
        timestamp: <?php echo $signPackage["timestamp"];?>,
        nonceStr: '<?php echo $signPackage["nonceStr"];?>',
        signature: '<?php echo $signPackage["signature"];?>',
        jsApiList: [
            /*
             * 所有要调用的 API 都要加到这个列表中
             * 这里以图像接口为例
             */
            "chooseImage",
            "previewImage",
            "uploadImage",
            "downloadImage"
        ]
    });
    var img = document.getElementById("img");
    var btn = document.getElementById('weixin');
    //定义images用来保存选择的本地图片ID，和上传后的服务器图片ID
    var images = {
        localId: [],
        serverId: []
    };
    function myFun(sId) {
        var oImg = document.getElementsByTagName('img');

        for (var i = 1; i < 4; i++) {
            if (oImg[i].id == sId) {
                oImg[i].previousSibling.previousSibling.checked = true;
                oImg[i].style.border = '1px solid #FF6600';
            } else {
                oImg[i].style.border = '1px solid #008800';

            }
        }
        for (var i = 4; i < oImg.length; i++) {
            if (oImg[i].id == sId) {
                oImg[i].previousSibling.previousSibling.checked = true;
                oImg[i].style.border = '1px solid #FF6600';
            } else {
                oImg[i].style.border = '1px solid #008800';

            }
        }
    }
    //一开始打算利用ajax选存储img的serverId,后经过思考决定暂时废弃
    //    function setAjaxImage(serverId){
    //        $.post("./pdo_image.php",{imgId:serverId},function(data){
    //
    //            alert("插入成功");
    //            //  location.reload(true);
    //        },'json');
    //    }
    wx.ready(function () {
        // 在这里调用 API
        btn.onclick = function () {

            wx.chooseImage({
                success: function (res) {
                    images.localId = res.localIds;  //保存到images
                    img.src = images.localId;

                    // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
                }
            });
//            var i = 0, len = images.localId.length;
//
//            function wxUpload() {
            wx.uploadImage({
                localId: images.localId[0], // 需要上传的图片的本地ID，由chooseImage接口获得
                isShowProgressTips: 1, // 默认为1，显示进度提示
                success: function (res) {
//                    i++;
                    //将上传成功后的serverId保存到serverid
                    images.serverId.push(res.serverId);
                    $_SESSION['serverId'] = res.serverId;
//                        if (i < len) {
//                            wxUpload();
//                        }
                }
            });
        }

//        }
    });

</script>
</html>
