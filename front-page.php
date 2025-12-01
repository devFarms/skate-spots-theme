<?php
/**
 * Template Name: Front Page
 * Description: Full-width template for displaying skate spot maps
 */

get_header(); ?>

<div class="maps-template-wrapper">
    <?php while ( have_posts() ) : the_post(); ?>
        <?php if ( get_the_title() ) : ?>
            <header class="entry-header">
                <h1 class="entry-title front-page-title"><?php the_title(); ?></h1>
            </header>
        <?php endif; ?>
    <?php endwhile; ?>

    <div <?php post_class('maps-content'); ?>>

        <div class="entry-content">
            <?php echo do_shortcode('[skate_spots_map]'); ?>
        </div>
        
    </div>
<section id="front-page_skate-movies">
    <div <?php post_class('maps-content'); ?>>
        
        <div class="entry-content">
            <?php echo do_shortcode('[skate_movies_list]'); ?>
        </div>
        
    </div>
</section> 
    <div <?php post_class('maps-content'); ?>>
        
        <div class="entry-content front-page-title">
    <?php echo do_shortcode('[skate_scenes_list]'); ?>
        </div>
        
    </div> 
    
<section id="front-page_skate-movies">
    <div <?php post_class('maps-content'); ?>>
        
        <div class="entry-content">
            <?php echo do_shortcode('[skate_skaters_list]'); ?>
        </div>
        
    </div>
</section> 
    
</div>

<?php get_footer(); ?>