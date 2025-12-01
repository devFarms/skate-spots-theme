<?php
/**
 * Template Name: Single Skater
 * Description: Template for displaying a single skater's full profile
 */

get_header();

// Get skater ID from URL parameter
$skater_id = isset($_GET['skater_id']) ? intval($_GET['skater_id']) : 0;

if ($skater_id) {
    $skater = Skate_Skaters::get($skater_id);

    if ($skater && $skater->status == 1) {
        ?>
        <div class="single-skater-wrapper">
            <article class="single-skater">
                <header class="skater-header">
                    <?php if (!empty($skater->profile_image)): ?>
                        <div class="skater-featured-image">
                            <img src="<?php echo esc_url($skater->profile_image); ?>"
                                 alt="<?php echo esc_attr($skater->name); ?>"
                                 style="max-width: 300px; height: auto; border-radius: 8px; margin: 0 auto; display: block;">
                        </div>
                    <?php endif; ?>

                    <h1 class="skater-name"><?php echo esc_html($skater->name); ?></h1>

                    <?php if (!empty($skater->first_name) && !empty($skater->last_name)): ?>
                        <p class="skater-full-name">
                            <?php echo esc_html($skater->first_name . ' ' . $skater->last_name); ?>
                        </p>
                    <?php endif; ?>
                </header>

                <div class="skater-content">
                    <?php if ($skater->bio): ?>
                        <section class="skater-bio">
                            <h2>Biography</h2>
                            <div class="bio-content">
                                <?php echo wp_kses_post(wpautop($skater->bio)); ?>
                            </div>
                        </section>
                    <?php endif; ?>

                    <?php if ($skater->social_url): ?>
                        <section class="skater-social">
                            <h2>Connect</h2>
                            <p>
                                <a href="<?php echo esc_url($skater->social_url); ?>"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   class="button social-button">
                                    Follow on Social Media →
                                </a>
                            </p>
                        </section>
                    <?php endif; ?>

                    <?php
                    // Get scenes featuring this skater
                    $scenes = Skate_Skaters::get_scenes($skater->id);
                    if (!empty($scenes)):
                    ?>
                        <section class="skater-scenes">
                            <h2>Featured Scenes</h2>
                            <div class="scenes-list">
                                <?php foreach ($scenes as $scene): ?>
                                    <div class="scene-item">
                                        <?php if ($scene->scene_title): ?>
                                            <h3><?php echo esc_html($scene->scene_title); ?></h3>
                                        <?php endif; ?>

                                        <?php if ($scene->scene_description): ?>
                                            <p><?php echo wp_kses_post($scene->scene_description); ?></p>
                                        <?php endif; ?>

                                        <?php if ($scene->video_url): ?>
                                            <p>
                                                <a href="<?php echo esc_url($scene->video_url); ?>"
                                                   target="_blank"
                                                   class="button video-button">
                                                    ▶️ Watch Scene
                                                </a>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </section>
                    <?php endif; ?>
                </div>

                <footer class="skater-footer">
                    <p>
                        <a href="<?php echo home_url(); ?>" class="button back-button">
                            ← Back to Home
                        </a>
                    </p>
                </footer>
            </article>
        </div>
        <?php
    } else {
        // Skater not found or not approved
        ?>
        <div class="skater-not-found">
            <h1>Skater Not Found</h1>
            <p>Sorry, the skater you're looking for doesn't exist or hasn't been approved yet.</p>
            <p>
                <a href="<?php echo home_url(); ?>" class="button">
                    ← Back to Home
                </a>
            </p>
        </div>
        <?php
    }
} else {
    // No skater ID provided
    ?>
    <div class="no-skater-id">
        <h1>No Skater Selected</h1>
        <p>Please select a skater to view their profile.</p>
        <p>
            <a href="<?php echo home_url(); ?>" class="button">
                ← Back to Home
            </a>
        </p>
    </div>
    <?php
}

get_footer();
?>