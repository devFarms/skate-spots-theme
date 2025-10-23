<?php
/**
 * Template Name: Movies
 * Description: Full-width template for displaying skate spot maps
 */

get_header(); ?>

<div class="maps-template-wrapper">
    <?php while ( have_posts() ) : the_post(); ?>
        
        <article id="post-<?php the_ID(); ?>" <?php post_class('maps-content'); ?>>
            
            <?php if ( get_the_title() ) : ?>
                <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header>
            <?php endif; ?>
            
            <div class="entry-content">
                <?php
                // This is the important part - it processes shortcodes!
                the_content();
                ?>
            </div>
            
        </article>
        
    <?php endwhile; ?>
</div>

<?php get_footer(); ?>