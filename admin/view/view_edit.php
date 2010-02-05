<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>编辑页面</title>
		<?php
			require_once('../../frame.php');
			$view_id = intval($_REQUEST['id']);
			if($view_id <=0){
				die('非法的专题id!');
			}
			css_include_tag("admin/view.css","contextmenu/jquery.contextmenu","thickbox");			
			use_jquery_ui();
			js_include_tag('jquery.contextmenu','admin/view_edit','thickbox','admin/view_module_class');
			
			/*
			 * get data
			 */
			$view = new table_class($tb_view);
			if($view->find($view_id)=== false){
				die('无法找到匹配的页面!');
			};
		?>
	</head>
	<body>
		<form method="post" name="edit_view" action="view.post.php">
			<div id="top_info">
				<p>
					<label for="view_name">专题名称:</label><input type="text" name="view[name]" id="view_name" value="<?php echo $view->name;?>">					
				</p>
				<p>
					<label for="view_identity">专题标识:</label><?php echo $view->identity;?>	<input type="hidden" name="view[identity]" id="view_identity" value="<?php echo $view->identity;?>">				
				</p>
				<p>
					<label>专题模板:</label>
					<select name="view[templet_name]" id="templet_type">
						<option value="templet1" <?php if($view->templet_name == "templet1") echo 'selected="selected"';?>>专题模板1</option>
						<option value="templet2" <?php if($view->templet_name == "templet2") echo 'selected="selected"';?>>专题模板2</option>
						<option value="templet3" <?php if($view->templet_name == "templet3") echo 'selected="selected"';?>>专题模板3</option>	
					</select>					
				</p>
				<p>
					<input type="hidden" name="view[id]" value="<?php echo $view_id;?>">
					<input type="submit" value="提交">			
				</p>
			</div>
			<div id="layout" class="bder">
				<?php
					if($view->templet_name == "templet1"){
				?>
				<div id="temp1_t" class="bder view_pos">menu</div>
				<div id="temp1_l" class="bder view_pos">left</div>
				<div id="temp1_r" class="bder">
					<div id="temp1_rt" class="bder view_pos">top</div>
					<div id="temp1_rtl" class="bder view_pos">left</div>
					<div id="temp1_rtr" class="bder view_pos">right</div>
					<div style="clear:both"></div>
					<div id="temp1_rc" class="bder view_pos">center</div>
					<div id="temp1_rbl" class="bder view_pos">left</div>
					<div id="temp1_rbr" class="bder view_pos">right</div>
					<div style="clear:both"></div>
					<div id="temp1_rb" class="bder view_pos">bottom</div>
				</div>
				<?php
					}elseif($view->templet_name == "templet2"){
				?>
				<div id="temp2_tl" class="bder view_pos">left</div>
				<div id="temp2_tc" class="bder view_pos">center</div>
				<div id="temp2_tr" class="bder view_pos">right</div>
				<div id="temp2_m" class="bder view_pos">middle</div>
				<div id="temp2_bl" class="bder view_pos">left</div>
				<div id="temp2_br" class="bder view_pos">right</div>
				<?php
					}elseif($view->templet_name == "templet3"){
				?>
				<div id="temp3_tl" class="bder view_pos">left</div>
				<div id="temp3_tc" class="bder view_pos">center</div>
				<div id="temp3_tr" class="bder view_pos">right</div>
				<div style="clear:both"></div>
				<div id="middle_left">
				<div id="temp3_mt" class="bder view_pos">top</div>
				<div id="temp3_mbl" class="bder view_pos">b_left</div>
				<div id="temp3_mbr" class="bder view_pos">b_right</div>
				</div>
				<div id="temp3_mr" class="bder view_pos">right</div>
				<div style="clear:both"></div>
				<div id="temp3_bl" class="bder view_pos">left</div>
				<div id="temp3_br" class="bder view_pos">right</div>
				<?php
					}
				?>
			</div>
			<input type="hidden" name="id" id="hidden_id" value="<?php echo $view->id;?>">
		</form>
	</body>
</html>
<?php
	$modules = new table_class($tb_view_modules);
	$modules = $modules->find('all',array('conditions' => 'view_id=' . $view->id,'order' => 'category_type,priority ASC'));
?>
<script>

	$(function(){
		manager = new view_modules_manager_class();
		<?php
			$icount = count($modules);
			if($icount > 0){
				

			foreach($modules as $item){
			?>
				module = new view_module_class();
				module.view_id = '<?php echo $view->id;?>'
				module.id = '<?php echo $item->id;?>';
				module.category_id = '<?php echo $item->category_id;?>';
				module.category_type = '<?php echo $item->category_type;?>';
				module.height = '<?php echo $item->height;?>';
				module.element_height = '<?php echo $item->element_height;?>';
				module.element_width = '<?php echo $item->element_width;?>';
				module.scroll_type = '<?php echo $item->scroll_type;?>';
				module.record_limit = '<?php echo $item->record_limit;?>';
				module.name = '<?php echo $item->name;?>';
				module.pos_name = '<?php echo $item->pos_name;?>';
				manager.items.push(module);
				module.display_info(true);
			<?php
				}
			}
		?>
		
	});
</script>