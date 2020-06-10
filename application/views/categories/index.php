<h2><?= $title; ?></h2>

<div class="col-12 py-3"><a href="<?php echo base_url(); ?>categories/create" class="btn btn-default contact_btn">Thêm danh mục</a></div>

<ul class="list-group">
<?php foreach($categories as $category) : ?>
	<li class="list-group-item"><a href="<?php echo site_url('/categories/posts/'.$category['id']); ?>"><?php echo $category['name']; ?></a>
		<?php if($this->session->userdata('user_id') == $category['user_id']): ?>
			<form class="cat-delete" action="categories/delete/<?php echo $category['id']; ?>" method="POST">
				<input type="submit" class="btn-link text-danger" value="[X]">
			</form>
		<?php endif; ?>
	</li>
<?php endforeach; ?>
</ul>