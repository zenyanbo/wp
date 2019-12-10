<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Responsive Kubrick
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<nav>
			<?php wp_nav_menu(array('theme_location' => 'menu-footer', 'menu_id' => 'primary-menu', 'depth' => 1)); ?>
		</nav><!-- #site-navigation -->
		<div class="site-info">
			&copy; <?php echo esc_attr( date_i18n( __( 'Y', 'responsive-kubrick' ) ) ); ?> <?php esc_html( bloginfo( 'name' ) ); ?> &middot;
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'responsive-kubrick' ) ); ?>"><?php printf( esc_html__( 'Powered by %s', 'responsive-kubrick' ), 'WordPress' ); ?></a> &middot;
			<?php printf( esc_html__( 'Theme: %1$s by %2$s', 'responsive-kubrick' ), 'responsive-kubrick', '<a href="http://freebiescafe.com" rel="nofollow">freebiescafe.com</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
