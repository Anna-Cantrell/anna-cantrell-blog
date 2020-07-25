<?php
/**
 * Header Template
 *
 * This file is the header template for the WordPress theme. It displays the top
 * part of the HTML document.
 *
 * @package WordPress
 * @subpackage Gucci
 * @since Gucci 1.0
 */
 $logo = !empty(get_field('logo_stacked', 'options')) ? get_field('logo_stacked', 'options') : "";

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?=get_stylesheet_directory_uri()?>/favicon.png" type="image/x-icon" />
  <link rel="shortcut icon" href="<?=get_stylesheet_directory_uri()?>/favicon.png" type="image/x-icon" />
	<?php wp_head(); ?>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-147711025-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-147711025-1');
</script>

</head>
<body <?php body_class(); ?>>

	<header id="header" role="header">

		<div class="header-logo">
			<a href="<?=get_home_url()?>">
				<img
				src="<?=$logo['url'] ? $logo['url'] : get_stylesheet_directory() . "library/media/anna-cantrell-stacked.png"?>"
				alt="<?=$logo['alt'] ? $logo['alt'] : "Anna Cantrell Logo" ?>"
				/>
			</a>
		</div>

		<div class="nav-container">
			<nav id="nav" role="nav">
				<?php wp_nav_menu(
					array( 'theme_location' => 'main-menu' )
				); ?>
			</nav>
			<button class="search-trigger"><?=get_svg('search') ?></button>
		</div>

		<?php get_search_form();?>
	</header>

	<main id="main" role="main">
