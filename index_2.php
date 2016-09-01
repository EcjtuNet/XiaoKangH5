<?php
//设置报错级别，忽略警告，设置字符
error_reporting(E_ALL || ~E_NOTICE);
header("Content-type:text/html; charset=utf-8");
require_once "JsSdk.php";
$jssdk = new JSSDK("wxefd0b584fdfb2c90", "e9994cc9307a8215b6012f1b1c1dd2a0");
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
        padding: 10px;
    }

    .section-photo .section-hover {
        display: flex;
        padding-bottom: 100%;
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
        font-size: 25px;
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
        height: 40px;
        position: relative;
        margin-top: 23%;
        left: 30%;
    }

    .imgBoy {
        position: relative;
        margin-top: 0%;
		padding-top: 10px;
    }

    .imgGirl {
        position: relative;
        margin-top: 0%;
        padding-top: 10px;
    }
    .button-border{
		flex: 1;
		border: 1px solid #FFF;
	}
</style>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 text-center layout">
            <section class="row" style="padding-bottom: 0px;padding-top: 70px;">
                <form method="post" id="form_name" action="index_3.php" role="form" class="contactForm"
                      style="width:100%;">
                    <input type="text" name="imgId" id="serverId" value="" style="display: none"/>
                    <input type="text" name="filePath" id="filepath" value="" style="display: none"/>
                    <div class="section-photo col-xs-7 col-xs-offset-2" style="position: relative;left: 30px;">
                        <img src="images/man1.png" class="img-responsive img-centered1" id="img">
                        <!--                        <img src="images/face.png" class="img-responsive" width="120" height="65" style="position:absolute;top:28%;left:30%;">-->
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
                    <div class="dash col-xs-12" style="margin-top: 30px;margin-bottom: 10px;"></div>
                    <div class="section-info col-xs-8 col-xs-offset-2">
                        <div class="row padding">
                            <div class="col-xs-12 text-center" style="padding-bottom: 25px;">
                                <h2>选择学位</h2>
                                <h3>(学士服的领口颜色)</h3>
                            </div>
                            <div class="col-xs-12" style="position: relative;top: -25px;">
                                <div class="col-xs-4">
                                    <input type="radio" value="gk" id="gk" checked="checked" name="lingdai" style="display:none">
                                    <img id="first" src="images/lingkou3.png" onclick="myLd(this.id)"
                                         class="img-responsive img-padding " style="width: 100%"/>
                                </div>
                                <div class="col-xs-4">
                                    <input type="radio" value="lk" id="gk" name="lingdai" style="display:none">
                                    <img id="second" src="images/lingkou2.png" onclick="myLd(this.id)"
                                         class="img-responsive img-padding" style="width: 100%"/>
                                </div>
                                <div class="col-xs-4">
                                    <input type="radio" value="wk" id="gk" name="lingdai" style="display:none">
                                    <img id="third" src="images/lingkou1.png" onclick="myLd(this.id)"
                                         class="img-responsive img-padding" style="width: 100%"/>
                                </div>
                                <div style="width: 100%;display: flex;position: relative;top: -25px;">
                                    <div class="section-info-font">
                                        <h1 style="font-size: 30px;">硕士</h1>
                                    </div>
                                    <div class="section-info-font">
                                        <h1 style="font-size: 30px;">博士</h1>
                                    </div>
                                    <div class="section-info-font">
                                        <h1 style="font-size: 30px;">学士</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dash col-xs-12" style="margin-top: -40px;"></div>
                    <div class="section-info col-xs-8 col-xs-offset-2">
                        <div class="row padding">
                            <div class="col-xs-12 text-center" style="padding-bottom: 0px;position: relative;top: -20px;">
                                <h2>选择性别</h2>
                            </div>
                            <div class="col-xs-8 col-xs-offset-2">
                                <div class="col-xs-6">
                                    <div class="img-box">
                                        <input type="radio" value="man" checked="checked" id="man" name="sex" style="display:none">
                                        <img src="images/man.png" id="boy" class="img-responsive " 
                                             onclick="mySex(this.id)"/>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="img-box">
                                        <input type="radio" value="woman"  id="woman" name="sex" style="display:none">
                                        <img src="images/woman.png" id="girl"
                                             class="img-responsive "
                                             onclick="mySex(this.id)"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dash col-xs-12" style="padding-top: 0px;position: relative;top: -60px;"></div>
                    <div class="col-xs-10 col-xs-offset-1 section-button" style="background:transparent;padding-top: 0px;position: relative;top: -60px;">
                        <button type="submit" class="button button-border" style="background: transparent;">
                            <i class="icon-edit bigger-110"></i>
                            录入学籍
                        </button>
                    </div>
            </section>
        </div>
    </div>
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
            'onMenuShareTimeline',
            'onMenuShareAppMessage',
//            "chooseImage",
//            "previewImage",
//            "uploadImage",
//            "downloadImage"
        ]
    });
    var img = document.getElementById("img");
    var btn = document.getElementById('weixin');
    var oImg = document.getElementsByTagName('img');
    var imgId = document.getElementById("serverId");
    var Path = document.getElementById("filepath");
    //定义images用来保存选择的本地图片ID，和上传后的服务器图片ID
    var images = {
        localId: [],
        serverId: []
    };
    var LDnum=1;
    var Sex="man";
    function myLd(sId) {
        for (var i = 1; i <4; i++) {
            if (oImg[i].id == sId) {
                oImg[i].previousSibling.previousSibling.checked = true;
                //  oImg[i].style.border = '1px solid #FF6600';
                LDnum=i;
                  img.src="images/"+Sex+LDnum+".png";
            } else {
                oImg[i].style.border = '0px';

            }
        }
    }
    function mySex(sId) {
        for (var i = 4; i < oImg.length; i++) {
            if (oImg[i].id == sId) {
                oImg[i].previousSibling.previousSibling.checked = true;
                //  oImg[i].style.border = '1px solid #FF6600';
                if(i==5){
                    Sex="woman";
                }else{
                    Sex="man";
                }
                   img.src="images/"+Sex+LDnum+".png";
            } else {
                oImg[i].style.border = '0px';

            }
        }
    }
    wx.ready(function () {
        // 在这里调用 API
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
        btn.onclick = function () {
            wx.chooseImage({
                success: function (res) {
                    images.localId = res.localIds;  //保存到images
                    img.src = images.localId;
                    Path.value = images.localId;
                    // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
                    Myupload();
                }

            });
            function Myupload() {
                var i = 0, len = images.localId.length;

                wx.uploadImage({
                    localId: images.localId[i], // 需要上传的图片的本地ID，由chooseImage接口获得
                    isShowProgressTips: 1, // 默认为1，显示进度提示
                    success: function (res) {
                        i++;
                        //将上传成功后的serverId保存到serverid
                        imgId.value = res.serverId;
                        images.serverId.push(res.serverId);

                        if (i < len) {
                            wxUpload();
                        }
                    }
                });
            }
        }
    });
    wx.error(function (res) {
        // config信息验证失败会执行error函数，如签名过期导致验证失败，具体错误信息可以打开config的debug模式查看，也可以在返回的res参数中查看，对于SPA可以在这里更新签名。
        alert("配置错误");
    });
</script>
</html>
