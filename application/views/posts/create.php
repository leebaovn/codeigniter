<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('posts/create'); ?>
  <div class="form-group">
    <label>Tiêu đề</label>
    <input type="text" class="form-control" name="title" placeholder="Tiêu đề bài viết">
  </div>
  <div class="form-group">
    <label>Nội dung</label>
    <textarea id="editor1" class="form-control" name="body" placeholder="Nội dung bài viết"></textarea>
  </div>
  <div class="form-group">
	  <label>Danh mục</label>
	  <select name="category_id" class="form-control">
		  <?php foreach($categories as $category): ?>
		  	<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
		  <?php endforeach; ?>
	  </select>
  </div>
  <div class="form-group">
	  <label>Hình ảnh</label>
	  <input type="file" name="userfile" size="20">
  </div>
  <button type="submit" class="btn btn-primary contact_btn">Tạo</button>
</form>