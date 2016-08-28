<?php
error_reporting(E_ALL || ~E_NOTICE);
header("Content-type:text/html; charset=utf-8");
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
                    <img src="images/man2.png" class="img-responsive img-centered">
                </div>
                <div class="dash col-xs-12"></div>
                <div class="section-info col-xs-10 col-xs-offset-1">
                    <form action="">
                        <div class="row padding">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label class="col-xs-5 control-label no-padding" for="name">姓名：</label>
                                    <div class="col-xs-7 no-padding overflow-hidden">
                                        <input type="text" id="name" placeholder="" maxlength="4" class="border-bottom"
                                               required="required" oninvalid="setCustomValidity('请输入姓名')"
                                               oninput="setCustomValidity('')">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label class="col-xs-5 control-label no-padding" for="grade">年级：</label>
                                    <div class="col-xs-7 no-padding overflow-hidden">
                                        <input type="text" id="grade" placeholder="" maxlength="4" class="border-bottom"
                                               required="required" oninvalid="setCustomValidity('请输入年级')"
                                               oninput="setCustomValidity('')">
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
                                          oninput="setCustomValidity('')"></textarea>
                            </div>
                        </div>
                        <input type="submit" id="input_file" class="hidden">
                    </form>
                </div>
                <div class="dash col-xs-12"></div>
                <div class="col-xs-10 col-xs-offset-1 section-button" style="font-size: 30px;">
                    <div class="button-border" style="margin-right: 7%;">
                        <a href="" class="button" id="btn_select">领取我的学生证</a>
                    </div>
                    <div class="button-border">
                        <a href="" class="button">康宝莱微服务</a>
                    </div>
                </div>
            </section>
            <script type="text/javascript">
                (function () {
                    var inputFile = document.querySelector("#input_file");
                    var btnSelect = document.querySelector("#btn_select");
                    btnSelect.addEventListener("click", function (e) {
                        //在按钮点击时，调用input的点击事件
                        inputFile.click();
                        e.preventDefault();
                    });
                })();
            </script>
        </div>
    </div>
</div>
</body>
</html>
