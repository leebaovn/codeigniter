<html>
<head>
		<title>Blog UIT</title>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">

    <script src="http://cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>

    <link href="<?php echo base_url();?>assets/css/media_query.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet" type="text/css"/>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link href="<?php echo base_url();?>assets/css/animate.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/css/owl.carousel.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/css/owl.theme.default.css" rel="stylesheet" type="text/css"/>
    
    <link href="<?php echo base_url();?>assets/css/style_1.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" type="text/css"/>
</head>


<body>
<div class="container-fluid bg-faded fh5co_padd_mediya padding_786">
    <div class="container padding_786">
        <nav class="navbar navbar-toggleable-md navbar-light ">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?php echo $uri==''?'active':'' ?>" href="<?php echo base_url(); ?>">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $uri=='posts'?'active':'' ?>" href="<?php echo base_url(); ?>posts">Bài viết</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $uri=='categories'?'active':'' ?>" href="<?php echo base_url(); ?>categories">Danh mục</a>
                    </li>
                    <?php if(!$this->session->userdata('logged_in')) : ?>
                    <li class="nav-item <?php echo $uri=='users/login'?'active':'' ?>">
                      <a class="nav-link" href="<?php echo base_url(); ?>users/login">Đăng nhập</a>
                    </li>
                    <li class="nav-item <?php echo $uri=='users/register'?'active':'' ?>">
                      <a class="nav-link" href="<?php echo base_url(); ?>users/register">Đăng ký</a>
                    </li>
                    <?php endif; ?>
                    <?php if($this->session->userdata('logged_in')) : ?>
                    <li class="nav-item <?php echo $uri=='posts/create'?'active':'' ?>">
                      <a class="nav-link" href="<?php echo base_url(); ?>posts/create">Tạo post mới</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Xin chào <?=$this->session->userdata("username") ?></a>
                    </li>

                    <li class="nav-item <?php echo $uri=='users/logout'?'active':'' ?>">
                      <a class="nav-link" href="<?php echo base_url(); ?>users/logout">Đăng xuất</a>
                    </li>
                    <?php endif; ?>
                    
                </ul>
            </div>
        </nav>
    </div>
</div>
      <div class="container">
      <?php if($this->session->flashdata('user_registered')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('post_created')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('post_updated')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('category_created')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_created').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('post_deleted')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_deleted').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('login_failed')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('user_loggedin')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
      <?php endif; ?>

       <?php if($this->session->flashdata('user_loggedout')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('category_deleted')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_deleted').'</p>'; ?>
      <?php endif; ?>
      <?php if($this->session->flashdata('liked')): ?>
        <?php echo '<p class="alert alert-warning">'.$this->session->flashdata('liked').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('liked_login')): ?>
        <?php echo '<p class="alert alert-warning">'.$this->session->flashdata('liked_login').'</p>'; ?>
      <?php endif; ?>
        <div class="row">
          <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
     
          </div>
          <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
            <?php echo form_open('search'); ?>
            <input type="text" name="search" class="" placeholder="Tìm kiếm...">
            <input type="submit" name="search-btn" value="Tìm">
             </form>
           </div>
      </div>
    
      
      