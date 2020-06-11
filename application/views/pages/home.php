<div class="container-fluid paddding mb-5">

    <div class="row mx-0">
        <div class="col-md-6 col-12 paddding animate-box" data-animate-effect="fadeIn">
            <div class="fh5co_suceefh5co_height"><img src="<?php echo base_url(); ?>assets/images/posts/<?php echo $posts[0]['post_image'] ?>" alt="img"/>
                <div class="fh5co_suceefh5co_height_position_absolute"></div>
                <div class="fh5co_suceefh5co_height_position_absolute_font">
                    <div class=""><a href="<?php echo base_url(); ?>/posts/<?php echo $posts[0]['slug']?>" class="color_fff"> <i class="fa fa-clock-o"></i>&nbsp;&nbsp;<?php echo $posts[0]['created_at'] ?>
                    </a></div>
                    <div class=""><a href="<?php echo base_url(); ?>/posts/<?php echo $posts[0]['slug']?>" class="fh5co_good_font"> <?php echo $posts[0]['title'] ?> </a></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <?php for ($i = 1; $i <= 4; $i++):?>
                <div class="col-md-6 col-6 paddding animate-box" data-animate-effect="fadeIn">
                    <div class="fh5co_suceefh5co_height_2"><img src="<?php echo base_url(); ?>assets/images/posts/<?php echo $posts[$i]['post_image']?>" alt="img"/>
                        <div class="fh5co_suceefh5co_height_position_absolute"></div>
                        <div class="fh5co_suceefh5co_height_position_absolute_font_2">
                            <div class=""><a href="<?php echo base_url(); ?>/posts/<?php echo $posts[$i]['slug']?>" class="color_fff"> <i class="fa fa-clock-o"></i>&nbsp;&nbsp;<?php echo $posts[$i]['created_at']?> </a></div>
                            <div class=""><a href="<?php echo base_url(); ?>/posts/<?php echo $posts[$i]['slug']?>" class="fh5co_good_font_2"> <?php echo $posts[$i]['title']?> </a></div>
                        </div>
                    </div>
                </div>
                <?php endfor ?>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid pt-3">
    <div class="container animate-box" data-animate-effect="fadeIn">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Trending</div>
        </div>
        <div class="owl-carousel owl-theme js" id="slider1">
            <?php foreach($category_posts as $cate_post) :?>
            <div class="item px-2">
                <div class="fh5co_latest_trading_img_position_relative">
                    <div class="fh5co_latest_trading_img"><img src="<?php echo base_url(); ?>assets/images/<?php echo $cate_post['post_image']?>" alt=""
                                                           class="fh5co_img_special_relative"/></div>
                    <div class="fh5co_latest_trading_img_position_absolute"></div>
                    <div class="fh5co_latest_trading_img_position_absolute_1">
                        <a href="<?php echo base_url(); ?>/posts/<?php echo $cate_post['slug']?>" class="text-white"> <?php echo $cate_post['title']?> </a>
                        <div class="fh5co_latest_trading_date_and_name_color"><?php echo $cate_post['name']?> - <?php echo $cate_post['created_at']?></div>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
