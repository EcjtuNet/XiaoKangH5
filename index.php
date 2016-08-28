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
	window.onorientationchange = function(){
    switch(window.orientation){
        case -90:
        case 90:
        alert("asd");
        break;
    }
   
}  
setTimeout(" location.href='index_2.php'",10000)

</script>
</body>
</html>