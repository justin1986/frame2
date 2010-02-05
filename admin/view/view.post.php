<?php
	require_once "../../frame.php";
	$view = new table_class($tb_view);
	$view->update_attributes($_POST['view'],false);
	$view->identity = strtolower($view->identity);
	$view_id = $_POST['view']['id'] ? $_POST['view']['id'] : 0;
	if ($view_id == 0){
		$optype = 'add';
		$redirect_url = 'view_add.php';
		$view->created_at = date("Y-m-d H:i:s");
	}else{
		$optype = 'edit';
		$redirect_url = 'view_edit.php?id=' .$view_id;
	}
		
	if(!$view->name){
		alert('页面名称不能为空!');	
		redirect($redirect_url);
		return;
	}
	if($view_id == 0 && !$view->identity ){
		alert('页面标识不能为空!');
		redirect($redirect_url);
		return;
	}
	if($view_id == 0){
		if(is_file('../../view/' .$view->identity.'.php')){
			alert('页面标识已存在,请重新制定!');
			redirect($redirect_url);
			return;
		}else{
			if(!write_to_file('../../view/'.$view->identity.'.php',implode("",file('../../view_templet/' .$view->templet_name.'/index.php')))){
				alert('创建页面失败!');
				redirect($redirect_url);
				return;
			}
		}
	}
	if(!$view->save()){
		alert('创建页面失败!');
		redirect($redirect_url);
		return;
	};
	
	if($optype == 'add'){
		//copy templet files
		//copy_dir('../../view_templet/' .$view->templet_name,'../../view/' .$view->identity,true);
		
	}
	$redirect_url = 'view_edit.php?id=' .$view->id;
	
	redirect($redirect_url);
	
?>