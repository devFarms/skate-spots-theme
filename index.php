<?php
/**
 * Main Template File
 * This is the fallback template that displays posts
 */

get_header(); ?>

<main id="main" class="site-content">
    <div class="container">
        
        <?php if (have_posts()) : ?>
            
            <div class="posts-grid">
                
                <?php while (have_posts()) : the_post(); ?>
                    
                    <article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
                        
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium'); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <div class="post-content">
                            <h2 class="post-title">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h2>
                            
                            <div class="entry-meta">
                                <span class="posted-on">
                                    <?php echo get_the_date(); ?>
                                </span>
                                <span class="byline">
                                    by <?php the_author(); ?>
                                </span>
                            </div>
                            
                            <div class="post-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                            
                            <a href="<?php the_permalink(); ?>" class="btn">
                                Read More
                            </a>
                        </div>
                        
                    </article>
                    
                <?php endwhile; ?>
                
            </div>
            
            <!-- Pagination -->
            <div class="pagination mt-20">
                <?php 
                the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => __('« Previous', 'skate-spots'),
                    'next_text' => __('Next »', 'skate-spots'),
                ));
                ?>
            </div>
            
        <?php else : ?>
            
            <div class="no-posts">
                <h2>Nothing Found</h2>
                <p>Sorry, no posts were found. Try searching for something else.</p>
                <?php get_search_form(); ?>
            </div>
            
        <?php endif; ?>
        
    </div>
</main>

<?php get_footer(); ?>