<h2><?php echo $post['title']; ?></h2><span>[bởi <strong><?=$this->session->userdata('username') ?></strong>]</span>

<small class="post-date">Đăng vào lúc: <?php echo $post['created_at']; ?></small>
<h4 class="mt-3"><?php echo $post['body']; ?><h4>
<img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>">
<div class="post-body">
	<?php echo form_open('/likes/create/'.$post['id']); ?>
		<input type="hidden" name="slug" value="<?=$post['slug']?>">
	
		<input type="submit" value="Thích" class="btn btn-danger mr-3 mt-3"><label><?php if($likes) echo $likes; else echo 0; ?> người thích bài viết này</label>
	</form>
	
</div>

<?php if($this->session->userdata('user_id') == $post['user_id']): ?>
	<hr>
	<a class="btn btn-primary pull-left" href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>">Sửa</a>
	<?php echo form_open('/posts/delete/'.$post['id']); ?>
		<input type="submit" value="Xóa" class="btn btn-danger ml-3">
	</form>
<?php endif; ?>
<hr>
<h3>Bình luận(<?php if($comments) echo count($comments); else echo 0; ?>)</h3>
<?php if($comments) : ?>
	<?php foreach($comments as $comment) : ?>
		<div class="well">
			<h5><strong><?php echo $comment['name'].': '; ?></strong><?php echo $comment['body']; ?></h5>
		</div>
	<?php endforeach; ?>
<?php else : ?>
	<p>Hiện chưa có bình luận nào.</p>
<?php endif; ?>
<hr>
<h3>Thêm bình luận</h3>
<?php echo validation_errors(); ?>
<?php echo form_open('comments/create/'.$post['id']); ?>
	<div class="form-group">
		<label>Tên</label>
		<input type="text" name="name" class="form-control">
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="text" name="email" class="form-control">
	</div>
	<div class="form-group">
		<label>Nội dung</label>
		<textarea name="body" class="form-control"></textarea>
	</div>
	<input type="hidden" name="slug" value="<?=$post['slug']?>">
	<button class="btn btn-primary" type="submit">Bình luận</button>
</form>
