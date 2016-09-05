<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Hemingway Rewritten
 */
?>

	</div><!-- #content -->
	<footer id="colophon" class="site-footer" role="contentinfo">
        <div class="site-info">
            <center>
                <!-- <img src="http://www.mostlyconcretellc.com/wp-content/uploads/2014/07/suqarePointLogo_Web.png" alt="suqarePointLogo_Web" width="36" height="37" class="alignleft size-full wp-image-152" /> -->
                <b>Mostly Concrete LLC</b>
                &emsp; &bull; &emsp;
                <?php echo (get_option('qs_contact_phone')); ?>
                &emsp; &bull; &emsp;
                <a href="#contact" id="footer-contact">
                    <?php echo (get_option('qs_contact_email')); ?>
                </a>
                &emsp; &bull; &emsp;
                <?php echo (get_option('qs_contact_city')) . ', ' . (get_option('qs_contact_state')); ?>
            </center>
		  <?php get_sidebar( 'footer' ); ?>
			<!-- <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'hemingway-rewritten' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'hemingway-rewritten' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'hemingway-rewritten' ), 'Hemingway Rewritten', '<a href="http://www.andersnoren.se" rel="designer">Anders Norén</a>' ); ?>-->		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
