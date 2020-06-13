<link href="<?php echo base_url();?>assets/css/signin.css" rel="stylesheet" type="text/css"/>
	<?php echo form_open('users/login'); ?>
		<div class="row" >
			<div  class="col-md-4 col-md-offset-4" >
				<h1 class="text-center"><?php echo $title; ?></h1>
				<div class="form-group" >
					<input type="text" name="username" class="form-control" placeholder="Tên đăng nhập" required autofocus>
				</div>
				<div class="form-group">
					<input type="password" name="password" class="form-control" placeholder="Mật khẩu" required autofocus>
				</div>
				<button type="submit" class="btn btn-block contact_btn">Đăng nhập</button>
			</div>
		</div>
	<?php echo form_close(); ?>
