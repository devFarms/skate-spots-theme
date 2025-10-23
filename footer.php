<footer class="site-footer">
        <div class="container">
            <div class="footer-content">
                
                <div class="footer-info">
                    <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
                </div>
                
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
                
            </div>
        </div>
    </footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>