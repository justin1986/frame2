<?php
	require_once "../../frame.php";
	$item = new table_class($tb_view_modules);
	if($item->delete($_POST['id'])){
		echo 'ok';
	};
?>