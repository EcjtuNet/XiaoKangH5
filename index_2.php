<?php
//设置报错级别，忽略警告，设置字符
error_reporting(E_ALL || ~E_NOTICE);
header("Content-type:text/html; charset=utf-8");
require_once "JsSdk.php";
$jssdk = new JSSDK("wxefd0b584fdfb2c90", "e9994cc9307a8215b6012f1b1c1dd2a0");
$signPackage = $jssdk->GetSignPackage();
$time=time();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=0.5, minimum-scale=0.5"/>
    <title>照片录入</title>
    <link rel="stylesheet" href="css/base.css"/>
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/index_1.css"/> 
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <meta name="apple-mobile-web-app-capable" content="yes" />
    <!-- 图片裁剪 -->
    <meta name="format-detection" content="telephone=no, email=no" />
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<style>
    .img-padding {
        padding: 15px;
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
        position: relative;
        margin-top: 23%;

    }

    .imgGirl {
        position: relative;
        margin-top: 23%;
    }
</style>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 text-center layout">
            <section class="row">
                <form method="post" id="form_name" action="index_3.php" role="form" class="contactForm" style="width:100%;">
                    <input type="text" name="imgurl" id="imgurl" value="" style="display: none"/>
<!--                    <input type="text" name="filePath" id="filepath" value="" style="display: none"/>-->
                    <input type="text" name="time" id="time" value="<?php echo $time;?>" style="display: none"/>
                    <div class="section-photo col-xs-8 col-xs-offset-2">
                        
                        <!-- <img src="images/face.png" class="img-responsive" width="120" height="65" style="position:absolute;top:28%;left:30%;"> -->
                        <!-- <div class="section-hover">
                            这里调用手机设备的相机API
                            <a href="javascript:void();" class="section-hover-content" id="weixin">
									<span style="font-size: 70px;text-align: center;">
										<i class="icon-camera"></i>
									</span>
                                <h4>上传照片</h4>
                            </a>
                        </div> -->
                        <img src="images/man1.png" class="img-responsive img-centered1" id="img">

                        <a href="javascript:void(0);" class="logoBox" id="logoBox">
                            <!-- <img id="bgl" src="images/userico.jpg" width="100%"> -->
                            
                        </a>

                    </div>


                    <!-- 图片裁剪弹出层区域 -->
                    <div class="htmleaf-container">
                        <div id="clipArea"></div>
                        <div id="view"></div>
                    </div>

                    <!-- 图片选取选项 -->
                    <div id="dpage">
                        <a href="javascript:void(0);">
                            <input type="button" name="file" class="button" value="选取照片">
                            <input id="file" type="file" onchange="javascript:setImagePreview();" accept="image/*" multiple  />
                        </a>
                        <a href="javascript:void(0);" class="qx">
                            <div id="clipBtn">截取图片</div>
                        </a>
                    </div>

                    <div class="dash col-xs-12"></div>
                    <div class="section-info col-xs-10 col-xs-offset-1">
                        <div class="row padding">
                            <div class="col-xs-12 text-center" style="padding-bottom: 25px;">
                                <h2>选择学位</h2>
                                <h3>(学士服的领口颜色)</h3>
                            </div>
                            <div class="col-xs-12">
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
                                <div style="width: 100%;display: flex;">
                                    <div class="section-info-font">
                                        <h1>硕士</h1>
                                    </div>
                                    <div class="section-info-font">
                                        <h1>博士</h1>
                                    </div>
                                    <div class="section-info-font">
                                        <h1>学士</h1>
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
                            <div class="col-xs-10 col-xs-offset-1">
                                <div class="col-xs-6">
                                    <div class="img-box">
                                        <input type="radio" value="man" checked="checked" id="man" name="sex" style="display:none">
                                        <img src="images/circle-man.png" id="boy" class="img-responsive img-sex imgBoy  "
                                             onclick="mySex(this.id)"/>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="img-box">
                                        <input type="radio" value="woman"  id="woman" name="sex" style="display:none">
                                        <img src="images/circle-woman.png" id="girl"
                                             class="img-responsive img-sex imgGirl"
                                             onclick="mySex(this.id)"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dash col-xs-12"></div>
                    <div class="col-xs-10 col-xs-offset-1 section-button" style="background:transparent;">
                        <button type="submit" class="button button-border" style="background: transparent;" >
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

<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js" type="text/javascript"></script>

<!-- 裁剪照片 -->
<script src="js/iscroll-zoom.js"></script>
<script src="js/hammer.js"></script>
<script src="js/jquery.photoClip.js"></script>

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
//        btn.onclick = function () {
//            wx.chooseImage({
//                success: function (res) {
//                    images.localId = res.localIds;  //保存到images
//                    img.src = images.localId;
//                    Path.value = images.localId;
//                    // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
//                    Myupload();
//                }
//
//            });
//            function Myupload() {
//                var i = 0, len = images.localId.length;
//
//                wx.uploadImage({
//                    localId: images.localId[i], // 需要上传的图片的本地ID，由chooseImage接口获得
//                    isShowProgressTips: 1, // 默认为1，显示进度提示
//                    success: function (res) {
//                        i++;
//                        //将上传成功后的serverId保存到serverid
//                        imgId.value = res.serverId;
//                        images.serverId.push(res.serverId);
//
//                        if (i < len) {
//                            wxUpload();
//                        }
//                    }
//                });
//            }
//        }
    });
    wx.error(function (res) {
        // config信息验证失败会执行error函数，如签名过期导致验证失败，具体错误信息可以打开config的debug模式查看，也可以在返回的res参数中查看，对于SPA可以在这里更新签名。
        alert("配置错误");
    });
</script>

<!-- 裁剪照片 -->
<script>
var show1=document.querySelector("#show1");
var img_tu=document.querySelector("#img_tu");
var iMGUrl;
var obUrl = '';
var baseCode='';
var imgurl=document.getElementById("imgurl");
//document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
$("#clipArea").photoClip({
    width: 420,
    height: 420,
    file: "#file",
    view: "#view",
    ok: "#clipBtn",
    loadStart: function() {
        console.log("照片读取中");
    },
    loadComplete: function() {
        console.log("照片读取完成");
    },
    clipFinish: function(dataURL) {
        console.log(dataURL);
        iMGUrl=dataURL;
        // show1.style.display="block";
        // img_tu.src=dataURL;
		baseCode=dataURL;
    }
});
function putData(){
    $.post("./imgupload.php",{code: baseCode,time:<?php echo $time;?>},function(data){
        imgurl.value=data;
        console.log("data:"+data+"");
    },'json');
}
</script>
<script>

$(document).ready(function(){
    // 定义头像区域固定大小
    $(".section-photo").css.height = $(".section-photo").css.width;
    var w = $('.section-photo').width();
    $('.section-photo').css('height', w + "px");
});

    

$(function(){
    $("#logoBox, #s_dpage, .section-photo").click(function(){
        $(".htmleaf-container").fadeIn(300);
        ($("#dpage").hasClass("show")) ? ($("#dpage").removeClass("show")) : ($("#dpage").addClass("show"));
        // $("#dpage").addClass("show");
        $('.photo-clip-view').append('<img src="images/man1.png" style=" width:100%; z-index: 100; position: absolute; left: 0;">');
    });
    $("#clipBtn").click(function(){
        $("#logoBox").empty();
        $('#logoBox').append('<img src="' + imgsource + '" align="absmiddle" style=" width:100%;">');
        $(".htmleaf-container").hide();
        $("#dpage").removeClass("show");
        putData();
    })
});
</script>
<script type="text/javascript">
$(function(){
    
    jQuery.divselect = function(divselectid,inputselectid) {
        var inputselect = $(inputselectid);
        $(divselectid+" small").click(function(){
            $("#divselect ul").toggle();
            $(".mask").show();
        });
        $(divselectid+" ul li a").click(function(){
            var txt = $(this).text();
            $(divselectid+" small").html(txt);
            var value = $(this).attr("selectid");
            inputselect.val(value);
            $(divselectid+" ul").hide();
            $(".mask").hide();
            $("#divselect small").css("color","#333");
        });
    };
    $.divselect("#divselect","#inputselect");
});
</script>
<script type="text/javascript">
$(function(){
    jQuery.divselectx = function(divselectxid,inputselectxid) {
        var inputselectx = $(inputselectxid);
        $(divselectxid+" small").click(function(){
            $("#divselectx ul").toggle();
            $(".mask").show();
        });
        $(divselectxid+" ul li a").click(function(){
            var txt = $(this).text();
            $(divselectxid+" small").html(txt);
            var value = $(this).attr("selectidx");
            inputselectx.val(value);
            $(divselectxid+" ul").hide();
            $(".mask").hide();
            $("#divselectx small").css("color","#333")
        });
    };
    $.divselectx("#divselectx","#inputselectx");
});
</script>
<script type="text/javascript">
$(function(){
    jQuery.divselecty = function(divselectyid,inputselectyid) {
        var inputselecty = $(inputselectyid);
        $(divselectyid+" small").click(function(){
            $("#divselecty ul").toggle();
            $(".mask").show();
        });
        $(divselectyid+" ul li a").click(function(){
            var txt = $(this).text();
            $(divselectyid+" small").html(txt);
            var value = $(this).attr("selectyid");
            inputselecty.val(value);
            $(divselectyid+" ul").hide();
            $(".mask").hide();
            $("#divselecty small").css("color","#333")
        });
    };
    $.divselecty("#divselecty","#inputselecty");
});
</script>
<script type="text/javascript">
$(function(){
   $(".mask").click(function(){
       $(".mask").hide();
       $(".all").hide();
   })
    $(".right input").blur(function () {
        if ($.trim($(this).val()) == '') {
            $(this).addClass("place").html();
        }
        else {
            $(this).removeClass("place");
        }
    })
});
</script>
<script>
$("#file0").change(function(){
    var objUrl = getObjectURL(this.files[0]) ;
     obUrl = objUrl;
    console.log("objUrl = "+objUrl) ;
    if (objUrl) {
        $("#img0").attr("src", objUrl).show();
    }
    else{
        $("#img0").hide();
    }
}) ;
function qd(){
   var objUrl = getObjectURL(this.files[0]) ;
   obUrl = objUrl;
   console.log("objUrl = "+objUrl) ;
   if (objUrl) {
       $("#img0").attr("src", objUrl).show();
   }
   else{
       $("#img0").hide();
   }
}
function getObjectURL(file) {
    var url = null ;
    if (window.createObjectURL!=undefined) { // basic
        url = window.createObjectURL(file) ;
    } else if (window.URL!=undefined) { // mozilla(firefox)
        url = window.URL.createObjectURL(file) ;
    } else if (window.webkitURL!=undefined) { // webkit or chrome
        url = window.webkitURL.createObjectURL(file) ;
    }
    return url ;
}
</script>
<script type="text/javascript">
var subUrl = "";
$(function (){
    $(".file-3").bind('change',function(){
        subUrl = $(this).val()
        $(".yulan").show();
        $(".file-3").val("");
    });

    $(".file-3").each(function(){
        if($(this).val()==""){
            $(this).parents(".uploader").find(".filename").val("营业执照");
        }
    });
$(".btn-3").click(function(){
$("#img-1").attr("src", obUrl);
$(".yulan").hide();
$(".file-3").parents(".uploader").find(".filename").val(subUrl);
})
    $(".btn-2").click(function(){
        $(".yulan").hide();
    })

});
</script>
<script type="text/javascript">
function setImagePreview() {
    var preview, img_txt, localImag, file_head = document.getElementById("file_head"),
            picture = file_head.value;
    if (!picture.match(/.jpg|.gif|.png|.bmp/i)) return alert("您上传的图片格式不正确，请重新选择！"),
            !1;
    if (preview = document.getElementById("preview"), file_head.files && file_head.files[0]) preview.style.display = "block",
            preview.style.width = "100px",
            preview.style.height = "100px",
            preview.src = window.navigator.userAgent.indexOf("Chrome") >= 1 || window.navigator.userAgent.indexOf("Safari") >= 1 ? window.webkitURL.createObjectURL(file_head.files[0]) : window.URL.createObjectURL(file_head.files[0]);
    else {
        file_head.select(),
                file_head.blur(),
                img_txt = document.selection.createRange().text,
                localImag = document.getElementById("localImag"),
                localImag.style.width = "100px",
                localImag.style.height = "100px";
        try {
            localImag.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)",
                    localImag.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = img_txt
        } catch(f) {
            return alert("您上传的图片格式不正确，请重新选择！"),
                    !1
        }
        preview.style.display = "none",
                document.selection.empty()
    }
    return document.getElementById("DivUp").style.display = "block",
            !0
}
</script>
</html>
