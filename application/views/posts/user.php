<div class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4"><?= $title ?></div>
                </div>
                <?php foreach($posts as $post): ?>
					<div class="row pb-4">
                        <div class="col-md-5">
                            <div class="fh5co_hover_news_img">
                                <div class="fh5co_news_img">
                                    <img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>" alt=""/>
                                </div>
                                <div></div>
                            </div>
                        </div>
                        <div class="col-md-7 animate-box" >
                            <a href="<?php echo site_url('/posts/'.$post['slug']); ?>" class="py-2"><?php echo $post['title']; ?></a><br>
                            <small class="post-date">Đăng vào: <?php echo $post['created_at']; ?></small><br>
                            <div class="fh5co_consectetur"> <?php echo word_limiter($post['body'], 60); ?></div>
                            <p><a class="btn btn-default contact_btn" href="<?php echo site_url('/posts/'.$post['slug']); ?>">Đọc thêm</a></p>
                        </div>
                    </div>
                    
                    
				<?php endforeach; ?>
            </div>
            <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Danh mục</div>
                </div>
                <div class="clearfix"></div>
				<div class="fh5co_tags_all">
				<?php foreach($categories as $cate) : ?>
					<a href="<?php echo site_url('/categories/posts/'.$cate['id']); ?>" class="fh5co_tagg"><?=$cate['name']?></a>
				<?php endforeach; ?>
                </div> 
            </div>
        </div>
    </div>
</div>
<div class="pagination-links">
		<?php echo $this->pagination->create_links(); ?>
</div>