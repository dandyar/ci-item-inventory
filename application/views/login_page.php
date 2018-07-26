<div class="container-fluid">
	<div id="form-container">
		<div id="login-img">
			<img src="<?php echo base_url('images/login.png'); ?>" width="100%">
		</div>
		<form action="<?php echo site_url('login/auth'); ?>" method="POST">
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				<input class="form-control" type="text" name="username" maxlength="30" placeholder="Masukan Username">
			</div><div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				<input class="form-control" type="password" name="password" maxlength="30" placeholder="Masukan Password">
			</div>
			<input type="submit" class="btn btn-default btn-block" name="submit" value="Masuk">
		</form>
	</div>
</div>