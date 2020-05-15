<?php get_header();?>
<nav role="navigation" aria-label="Main">
    <?php   wp_nav_menu( array( 
                'theme_location' => 'my-custom-menu', 
                'container_class' => 'custom-menu-class' ) ); ?>
    <h1><a href="/" title="Home">Caroline Sinders</a></h1>
</nav>
  
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
  
        <?php
        // Start the loop.
        while ( have_posts() ) : the_post();
  
            // the_title('<h2>', '</h2>');
            
            the_content();
  
        // End the loop.
        endwhile;
        ?>
  
        </main><!-- .site-main -->
    </div><!-- .content-area -->
  
<?php get_footer(); ?>