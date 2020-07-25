<?php
/**
 * Singular Template
 *
 * This file is the single post template for the WordPress theme. It displays
 * the main content area of individual types (posts, pages, etc).
 *
 * @package WordPress
 * @subpackage Gucci
 * @since Gucci 1.0
 */
$title = get_the_title();
$category = get_the_category();
$thumbnail_id = get_post_thumbnail_id( $post->ID );
$thumbnail_url = get_the_post_thumbnail_url($post->ID, 'full');
$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
$the_date = get_the_date();
get_header(); ?>

<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<article>
				<div class="progress-bar"></div>
					<section class="article-head-section">
						<div class="article-image-container">
							<img src="<?=$thumbnail_url?>" alt="<?=$alt?>"/>
						</div>
						<div class="wrapper">
							<div class="title-content">
								<h1><?=$title?></h1>
								<div class="meta-info">
									<span><?=get_post_meta($post->ID, 'read_estimate')[0];?> min read |</span>
									<?php if($category[0]->name) : ?>
										<span><a href="<?=get_site_url()?>/category/<?=$category[0]->slug?>/"><?=$category[0]->name?></a> |</span>
									<?php endif; ?>
									<span><?=$the_date?></span>
								</div>
							</div>
						</div>
					</section>
					<section class="content">
						<div class="wrapper">
							<?php the_content(); ?>
						</div>
					</section>
			</article>
		<?php endwhile; ?>
<?php endif; ?>

<?php include( locate_template(  'library/template-parts/read-more.php', false, false ) ); ?>

<?php get_footer(); ?>
