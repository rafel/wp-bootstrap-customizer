<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <title><?php wp_title(); ?></title>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <?php wp_head(); ?>
   </head>
    <body>
        <!-- Navigation -->
        <nav id="topnav" class="navbar navbar-default" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-right">
                    <?php
                        wp_nav_menu( array('menu' => 'Main', 'menu_class' => 'nav navbar-nav navbar-right', 'depth'=> 3, 'container'=> false, 'walker'=> new BootstrapNavMenuWalker)); 
                    ?>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <!-- Content -->
        <div id="main-container">
            <div class="container">
                <?php if(is_front_page()) : ?>
                    <!-- Frontpage -->
                    <img src="<?php echo get_theme_mod('bc_image'); ?>" />
                    <h1><?php echo get_theme_mod('bc_input'); ?></h1>
                    <p><?php echo get_theme_mod('bc_textarea'); ?></p>


                <?php elseif(have_posts()) : ?>
                    <!-- Pages / Posts -->
                    <?php while(have_posts()) : the_post(); ?>
                        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <?php the_content(); ?>
                        </div>
                   <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </body>
</html>