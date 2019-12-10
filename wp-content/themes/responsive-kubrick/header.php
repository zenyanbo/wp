<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'responsive-kubrick'); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<div class="site-branding">
			<?php
			// Display the Custom Logo
			the_custom_logo();

			// No Custom Logo, just display the site's name
			if (!has_custom_logo()) {
				if (is_front_page() && is_home()) : ?>
					<h1 class="site-title">
						<a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
					</h1>
					<?php $description = get_bloginfo('description', 'display');
					if ($description || is_customize_preview()) : ?>
						<p class="site-description"><?php echo esc_html($description); /* WPCS: xss ok. */ ?></p>
						<?php
					endif;
				else : ?>
					<p class="site-title">
						<a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
					</p>
					<?php $description = get_bloginfo('description', 'display');
					if ($description || is_customize_preview()) : ?>
						<p class="site-description"><?php echo esc_html($description); /* WPCS: xss ok. */ ?></p>
						<?php
					endif;
				endif;
			}
			?>

			<div class="clear"></div>
		</div><!-- .site-branding -->

	</header><!-- #masthead -->

	<div id="content" class="site-content">
