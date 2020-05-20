<?php get_header();?>
<nav role="navigation" aria-label="Main">
    <?php   wp_nav_menu( array( 
                'theme_location' => 'my-custom-menu', 
                'container_class' => 'custom-menu-class' ) ); ?>
    <h1><a href="/" title="Home">Caroline Sinders</a></h1>
</nav>
  
<section role="main">

    <?php
    // Start the loop.
    while ( have_posts() ) : the_post();

        the_content();

    // End the loop.
    endwhile;
    ?>

</section>
  
<?php get_footer(); ?>