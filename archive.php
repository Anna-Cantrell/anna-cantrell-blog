<?php
/**
 * Archive page
 *
 * This file is the archive Page template for the WordPress theme.
 *
 * @package WordPress
 * @subpackage Gucci
 * @since Gucci 1.0
 */
$cat = get_the_category();
get_header(); ?>


<?php if ( have_posts() ) : ?>
		<?php if($cat) : ?>
			<h1 class="archive-title"><?=$cat[0]->name;?></h1>
		<?php endif; ?>
		<?php $count = 0; while ( have_posts() ) : the_post(); $count++; ?>
				<?php include( locate_template(  'content.php', false, false ) ); ?>
		<?php endwhile; ?>
		<?php the_posts_pagination(); ?>
<?php endif; ?>

<?php get_footer(); ?>
