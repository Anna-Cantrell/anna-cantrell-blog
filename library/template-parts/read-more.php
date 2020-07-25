<?php
/**
 * Content Template
 *
 * This file is the content template for the WordPress theme. It displays a
 * regular post content area.
 *
 * @package WordPress
 * @subpackage Gucci
 * @since Gucci 1.0
 */

$args = array(
  'post_type' => 'post',
  'orderby'   => 'rand',
  'posts_per_page' => 4,
);

$the_query = new WP_Query( $args );
?>

<?php if( $the_query->have_posts() ) : ?>
    <section class="section section--read-more">
      <div class="read-more-articles">
        <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
          <?php include( locate_template( 'content.php', false, false ) );?>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>
    </section>
<?php endif; ?>