<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>添加页面</title>
		<?php
			require_once('../../frame.php');
			use_jquery();
			css_include_tag('admin');
			validate_form('form_add_view');
		?>
	</head>
	<body>
		<table width="795" border="0" id="list">
		<form method="post" name="add_view" id="form_add_view" action="view.post.php">
			<tr class=tr1>
				<td colspan="2">　添加页面 </td>
			</tr>
			<tr class=tr3>
				<td width=150>页面名称：</td>
				<td width=645 align="left"><input type="text" name="view[name]" id="view_name" class="required"></td>
			</tr>
			<tr class=tr3>
				<td width=150>页面标识：</td>
				<td width=645 align="left"><input type="text" name="view[identity]" id="view_identity" class="required"></td>
			</tr>
			<tr class=tr3>
				<td width=150>页面模板：</td>
				<td width=645 align="left">
					<select name="view[templet_name]" id="templet_type"  class="required">
						<option value="templet1" selected="selected">模板1</option>
						<option value="templet2" >模板2</option>
						<option value="templet3" >模板3</option>	
					</select>
				</td>
			</tr>	
			<tr class=tr3>
				<td width=150>描述：</td>
				<td width=645 align="left"><textarea name="view[description]"></textarea></td>
			</tr>
			<tr class=tr3>
				<td colspan="2"><input type="submit" id="submit" value="提交"></td>
			</tr>
		</form>
		</table>
	</body>
</html>
