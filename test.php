<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv=Content-Type content="text/html; charset=utf-8">
		<meta http-equiv=Content-Language content=zh-CN>
		<title>test</title>
		<?php
		include "frame.php";
		//redirect_login();
		//alert("aaaa'a'");
		$test = new table_class('test');
		$test->a = 'c"';
		$test->b = "'d'";
		$test->save();
		?>
	</head>
	<body>
		<div id="test"></div>
	</body>
	<script>
		
		//alert(document.getElementById('test').type);
	</script>
</html>