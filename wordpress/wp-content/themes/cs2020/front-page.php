<?php get_header();?>

<?php   wp_nav_menu( array( 
            'theme_location' => 'my-custom-menu', 
            'container_class' => 'custom-menu-class' ) ); ?>

<section id="intro">
    <p>Hi there, I’m Caroline.</p>
    <p>I am a machine learning designer/user researcher, artist, and digital anthropologist obsessed with language, culture and images.</p>
    <p>For the past few years, I have been examining the intersections of <a href="#surveillance" data-topic-link="surveillance">natural language</a> <a href="#abuse" data-topic-link="abuse">processing</a>, <a href="#social-media" data-topic-link="social-media">artificial intelligence</a>, <a href="#loss" data-topic-link="loss">abuse</a>, <a href="#feminism" data-topic-link="feminism">online</a> <a href="#ai" data-topic-link="ai">harassment</a>, and <a href="#politics" data-topic-link="politics">politics</a> in digital, conversational spaces. I’m the founder of Convocation Design + Research, an agency focusing on the intersections of machine learning, user research, designing for public good, and solving difficult communication problems. As a designer and researcher, I’ve worked with Amnesty International, Intel, IBM Watson, the Wikimedia Foundation, and others.</p>
    <p>I’ve held fellowships with the Yerba Buena Center for the Arts, Eyebeam, STUDIO for Creative Inquiry, and the International Center of Photography. My work has been featured in MoMA PS1, the Houston Center for Contemporary Craft, Slate, Quartz, and the Channels Festival. I hold a masters from New York University’s Interactive Telecommunications Program.</p>
</section>

<section id="work">

    <div id="timelines"></div>

    <svg id="bracecords"></svg>
    
    <div id="projects">
    
        <?php   $projects = get_projects();
                foreach($projects as $project) { ?>
                
                <article data-project-start-date="<?php echo($project['start_date']) ?>" data-project-end-date="<?php echo($project['end_date']) ?>" data-project-topics="<?php print_r($project['topics']) ?>">
                    <h2><?php echo $project['title'] ?></h2>
                    <p>lorem ipsum facto bacto fako bako tako rako bleep blorp blap<br />lorem ipsum facto bacto fako bako tako rako bleep blorp blap</p>
                </article>

        <?php   } ?>
    
    </div>
    
</section>

<?php get_footer();?>