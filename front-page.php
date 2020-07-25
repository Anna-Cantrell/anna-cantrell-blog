<?php
/**
 * Front Page
 *
 * This file is the Front Page template for the WordPress theme.
 *
 * @package WordPress
 * @subpackage Gucci
 * @since Gucci 1.0
 */
get_header(); ?>

<?php if ( have_posts() ) : ?>
		<?php $count = 0; while ( have_posts() ) : the_post(); $count++; ?>
				<?php include( locate_template(  'content.php', false, false ) ); ?>
		<?php endwhile; ?>
		<?php the_posts_pagination(); ?>
<?php endif; ?>

<?php
/*
 * Hompage content area
 */
$title = get_field('home_title', 'options') ?: '';
$content = get_field('home_content', 'options') ?: '';
?>
<?php if($title) : ?>
	<section class="section section--home-content">
		<div class="wrapper">
			<h1><?=$title?></h1>
			<?=$content?>
		</div>
	</section>
<?php endif; ?>

<?php get_footer(); ?>
