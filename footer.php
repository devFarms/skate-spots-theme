<footer class="site-footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-columns">
                    <div class="footer-column-1">
                        <img src="/wp-content/themes/skate-spots-theme/assets/images/brnb_white_wheel.png" class="white-wheel">
                    </div>
                    <div class="footer-column-2">
                        <?php if (current_user_can('manage_options') && has_nav_menu('footer')) : ?>
                    <?php if (has_nav_menu('footer')) : ?>
                    <nav class="footer-navigation">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer',
                            'menu_id'        => 'footer-menu',
                            'depth'          => 1,
                        ));
                        ?>
                    </nav>
                <?php endif; ?>
                <?php endif; ?>
                    </div>
                    <div class="footer-column-3">Column 3</div>
                
                
            </div>
        </div>
        <div class="footer-info">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
        </div>
    </footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>