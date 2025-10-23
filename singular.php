<?php

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('maps-content'); ?>>
         <?php if ( get_the_title() ) : ?>
                <h1 class="entry-title"><?php the_title(); ?></h1>
            <?php endif; ?>
            
            <div class="entry-content">
                <?php
                // This is the important part - it processes shortcodes!
                the_content();
                ?>
            </div>
    </article>
<?php endwhile; ?>

<?php get_footer(); ?>