<?php
	require_once('../frame.php');
	$identity = substr(basename($_SERVER['PHP_SELF']),0,-4);
	$db = get_db();
	$sql = "select id,name from $tb_view where identity='$identity'";
	$view = $db->query($sql);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title><?php echo $view[0]->name;?></title>
	<?php 
		css_include_tag('templet1');
		use_jquery();
	?>
</head>
<body>
	<div id=bodys>
		<div id=temp1_t>
			<?php 
				$modules = new view_module_class();
				$modules = $modules->find('all',array('conditions' => "subject_id = 24 and pos_name='pos2'",'order' => "priority asc,id desc"));
				for($i=0;$i<count($modules);$i++)
				$modules[$i]->display();
			?>
		</div>
		<div id=right>
			<?php 
				$modules = new view_module_class();
				$modules = $modules->find('all',array('conditions' => "subject_id = 24 and pos_name='pos2'",'order' => "priority asc,id desc"));
				for($i=0;$i<count($modules);$i++)
				$modules[$i]->display();
			?>
			<div id="pos3">
				<?php 
					$modules = new view_module_class();
					$modules = $modules->find('all',array('conditions' => "subject_id = 24 and pos_name='pos3'",'order' => "priority asc,id desc"));
					for($i=0;$i<count($modules);$i++)
					$modules[$i]->display();
				?>
			</div>
			<div id="pos4">
				<?php 
					$modules = new view_module_class();
					$modules = $modules->find('all',array('conditions' => "subject_id = 24 and pos_name='pos4'",'order' => "priority asc,id desc"));
					for($i=0;$i<count($modules);$i++)
					$modules[$i]->display();
				?>
			</div>
			<?php 
				$modules = new view_module_class();
				$modules = $modules->find('all',array('conditions' => "subject_id = 24 and pos_name='pos5'",'order' => "priority asc,id desc"));
				for($i=0;$i<count($modules);$i++)
				$modules[$i]->display();
			?>
			<div id="pos6">
				<?php 
					$modules = new view_module_class();
					$modules = $modules->find('all',array('conditions' => "subject_id = 24 and pos_name='pos6'",'order' => "priority asc,id desc"));
					for($i=0;$i<count($modules);$i++)
					$modules[$i]->display();
				?>
			</div>
			<div id="pos7">
				<?php 
					$modules = new view_module_class();
					$modules = $modules->find('all',array('conditions' => "subject_id = 24 and pos_name='pos7'",'order' => "priority asc,id desc"));
					for($i=0;$i<count($modules);$i++)
					$modules[$i]->display();
				?>
			</div>
		</div>
	</div>

</body>
</html>


