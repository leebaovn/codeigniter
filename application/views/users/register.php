<link href="<?php echo base_url();?>assets/css/signin.css" rel="stylesheet" type="text/css"/>
<?php echo validation_errors(); ?>

<?php echo form_open('users/register'); ?>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<h1 class="text-center"><?= $title; ?></h1>
			<div class="form-group">
				<label>Họ tên</label>
				<input type="text" class="form-control" name="name" placeholder="Họ và tên">
			</div>
			<div class="form-group">
				<label>Zipcode</label>
				<input type="text" class="form-control" name="zipcode" placeholder="Zipcode">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control" name="email" placeholder="Email">
			</div>
			<div class="form-group">
				<label>Tài khoản</label>
				<input type="text" class="form-control" name="username" placeholder="Tên đăng ký">
			</div>
			<div class="form-group">
				<label>Mật khẩu</label>
				<input type="password" class="form-control" name="password" placeholder="Mật khẩu">
			</div>
			<div class="form-group">
				<label>Nhập lại mật khẩu</label>
				<input type="password" class="form-control" name="password2" placeholder="Nhập lại mật khẩu">
			</div>
			<button type="submit" class="btn btn-primary btn-block">Đăng ký</button>
		</div>
	</div>
<?php echo form_close(); ?>
