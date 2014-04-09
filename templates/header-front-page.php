<header class="container banner jumbotron" role="banner">
    <div class="navbar navbar-static-top">
    <div class="navbar-inner">
    <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <nav class="nav-main nav-collapse collapse" role="navigation">
            <?php
            if (has_nav_menu('primary_navigation')) :
              wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav'));
            endif;
            ?>
      </nav>
    </div>
    </div>
    </div>
	<div class="jumbotron-inner">
		<?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'full'); ?>
		<div class="brand">
			<a href="<?php echo home_url(); ?>/"><img src="<?php bloginfo('template_directory'); ?>/assets/img/logo-600.png " class="logo" alt="<?php bloginfo('name'); ?>" /></a>
			<div class="description"><?php bloginfo('description'); ?></div>
			<?php 
			if (dynamic_sidebar('sidebar-homepage-header')): 
			else:  
			?>
			<?php endif; ?>
		</div>
	</div>
</header>
