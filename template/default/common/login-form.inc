<?php if (LOGIN_STATUS != UserLoginUtil::SUCCESS) { ?>
<div id = "loginOrReg">
	<div id="lr_content">
		<div id="lr_title">
			<label><i class="fa fa-server fa-fr"></i>登录OR注册</label>
			<small onclick="colseForm()"><i class="fa fa-close fa-fw"></i></small>
		</div>
		<div id="errorMsg">提示信息</div>
		<div id="lr_left">
			<form class="lr_form" id="login_form" action="" method="post">
				<h5>
					<small onclick="checkLoginOrReg(1)"><i class="fa fa-sign-in fa-fw"></i> 注册</small>登录
				</h5>
				<h6>
					<label for="login_name">邮箱</label><input type="text" id="login_name" name="login_name" placeholder="登录邮箱" />	
				</h6>
				<h6>
					<label for="login_pass">密码</label><input type="password" id="login_pass" name="login_pass" placeholder="登录密码" />
				</h6>
				<div class="lr_form_submit">
					<label>
						<input type="checkbox" checked="checked" id="reuser" name="remember" value="1" />记住我
					</label>	
					<input type="button" value="登录" onclick="checkLoginForm()" />
				</div>
			</form>
			<form class="lr_form" id="reg_form" action="" method="post">
				<h5>
					<small onclick="checkLoginOrReg(0)"><i class="fa fa-sign-in fa-fw"></i> 登录</small>注册
				</h5>
				<h6>
					<label for="username">昵称</label><input type="text" id="username" name="username" placeholder="设置昵称" />	
				</h6>
				<h6>
					<label for="email">邮箱</label><input type="text" id="email" name="email" placeholder="邮箱" />	
				</h6>
				<h6>
					<label for="password">密码</label><input type="password" id="password" name="password" placeholder="设置登录密码" />
				</h6>
				<div class="lr_form_submit">
					<label>
						<input type="checkbox" checked="checked" id="remember" name="remember" value="1" />记住我
					</label>
					<input type="button" value="快速注册" onclick="checkRegForm()" />
				</div>
			</form>
		</div><div id="lr_right">
			<label class="lr_right_title">其它说明</label>
			<ol>
				<li class="shuo_li1"><a href="javascript:void(0)">为什么要注册账号？</a></li>
				<li class="shuo_li2"><a href="javascript:void(0)">怎么找回账号密码？</a></li>
				<li class="shuo_li3"><a href="javascript:void(0)">怎么快速赚取金币？</a></li>
				<li class="shuo_li4"><a href="javascript:void(0)">新手遇到问题留言？</a></li>
			</ol>
		</div>
	</div>
</div>
<?php } ?>