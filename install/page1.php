			<?php
			if(file_exists('../data/install.lock')){  ?>
			<div id=title></div>
			<div id=content>
				<span style="color:red">系统检测已经安装过本软件.请删除data目录下install.lock后再安装</span>
			</div>
			<?php	
			}else{ ?>
			<div id=title>安装协议</div>
			<div id=content>欢迎使用百度Hi软件产品（以下简称“百度Hi”）。以下所述条款和条件即构成您与百度就使用许可所达成的协议（以下简称“本协议”）。一旦您下载安装使用了百度Hi，即表示您已接受了本协议。如果您不同意接受全部的条款和条件，那么您将无权使用百度Hi。百度有权随时修改本协议，只需公示于百度Hi网站（http://im.baidu.com）以及相关页面等，而无需征得您的事先同意。修改后的条款于公示之时生效。在百度修改协议条款后，如果您不接受修改后的条款，请您立即停止使用百度Hi，您继续使用百度Hi将被视为您已接受了修改后的条款。<br>
				<br><br><br>
				第一条	定义<br>
				1.百度Hi：是一款	即时通讯软件。<br>
				2.“用户”或“您”：是指通过百度提供的获取软件授权和帐号注册的合法途径获得软件产品及号码授权许可的个人或单一实体。<br>
				<br><br>
				第二条	用户的权利与义务<br>
				1.用户保证从正规渠道获取百度Hi软件，用户需凭帐号、密码登录和使用百度Hi，用户应自行管理好帐号和密码，并对其使用和丢失自行承担责任；<br>
				2.用户保证帐号注册时，所提供的资料真实无误，如因用户提供虚假信息，而致使其自身造成的损失由其承担。
			</div>
			<div id=r_b><input type="checkbox" name="agree" id="agree" value="1"><label for="agree">我同意以上协议</label></div>				
			<?php
			}
			?>
			