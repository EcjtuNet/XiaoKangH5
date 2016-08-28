<?php
	require_once("JsSdk.php");
	require_once("checkToken.php");	
	
	$wechatObj = new wechatCallbackapiTest();
	$wechatObj->valid();