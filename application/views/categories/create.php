
<div class="col-12 col-md-6">
	<h2><?= $title ;?></h2>

	<?php echo validation_errors(); ?>

	<?php echo form_open_multipart('categories/create'); ?>
	<div class="col-12 py-3">
		<input type="text" name="name" class="form-control fh5co_contact_text_box" placeholder="Nhập tên danh mục mới" />
	</div>
	
	<div class="col-12 py-3 text-center"><button type="submit" class="btn btn-default contact_btn">Tạo</button></div>
	<?php echo form_close(); ?>
</div>
