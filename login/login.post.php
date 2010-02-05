<?php 
	session_start();
	include("../frame.php"); 
	$last_url = isset($_POST['lasturl']) ? $_POST['lasturl'] : '/admin/admin.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv=Content-Type content="text/html; charset=utf-8">
		<meta http-equiv=Content-Language content=zh-CN>
		<title>迅傲信息</title>
	</head>
	<body>
		<?php		
			$db = get_db();
			//$db->echo_sql = true;
			//var_dump($_POST);
			if($_POST['nickname']=='on'){
				$sql = 'select * from '.$tb_user.' where nick_name="'.$_POST['login_text'].'" and password="'.$_POST['password_text'].'"';
			}else{
				$sql = 'select * from '.$tb_user.' where name="'.$_POST['login_text'].'" and password="'.$_POST['password_text'].'"';				
			}
			$record = $db->query($sql);
			if(count($record)==1){
				$_SESSION["user_name"] = $record[0]->name;
				$_SESSION["id"] = $record[0]->id;
				$_SESSION["nick_name"] = $record[0]->nick_name;
				$_SESSION["role_name"] = $record[0]->role_name;
				redirect($last_url);
			}else{
				alert("用户名或密码不对，请重新输入！");
				redirect('login.php');
			}			
			
		?>
	</body>
</html>