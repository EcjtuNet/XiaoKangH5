<?php
error_reporting(E_ALL || ~E_NOTICE);
header("Content-type:text/html; charset=utf-8");
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
    <img class="hand" src="images/hand.png">
</div>


<script type="text/javascript">
    function show() {
        window.onorientationchange = function () {
            switch (window.orientation) {
                case -90:
                case 90:
                    alert("asd");
                    break;
            }
        }
        location.href = 'index_2.php';
    }
    setTimeout("show()", 4000);

</script>
</body>
</html>