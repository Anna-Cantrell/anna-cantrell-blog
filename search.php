<?php
/**
 * Search page
 *
 * This file is the search Page template for the WordPress theme.
 *
 * @package WordPress
 * @subpackage Gucci
 * @since Gucci 1.0
 */

get_header(); ?>


<?php if ( have_posts() ) : ?>
  <h1 class="archive-title">Search Results: <?=get_query_var('s');?></h1>
		<?php $count = 0; while ( have_posts() ) : the_post(); $count++; ?>
				<?php include( locate_template(  'content.php', false, false ) ); ?>
		<?php endwhile; ?>
		<?php the_posts_pagination(); ?>
<?php endif; ?>

<?php get_footer(); ?>
