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
$title = get_the_title();
$category = get_the_category();
$cat_page = get_query_var('cat') || get_query_var('s') || get_query_var('tag');
$thumbnail_url;
$article_class;
if($count == 1) {
	$thumbnail_url = get_the_post_thumbnail_url($post->ID, 'full');
	$article_class = "latest";
} else if($count <= 5) {
	$thumbnail_url = get_the_post_thumbnail_url($post->ID, 'medium');
	$article_class = "recent";
} else if($count > 5) {
	$thumbnail_url = get_the_post_thumbnail_url($post->ID, 'thumbnail');
	$article_class = "more";
}
if($paged > 0 || $cat_page) {
	$article_class = "more";
}
?>

<article class="<?=$article_class?>" style="background-image: url(<?=$count <= 5 && $thumbnail_url && !$cat_page ? $thumbnail_url : '';?>)">
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		<div class="wrapper">
			<?php if($count > 5 || $cat_page) : ?>
				<div class="article-thumbnial" style="background-image: url(<?=$thumbnail_url ? $thumbnail_url : '';?>)"></div>
			<?php endif; ?>
			<section class="article-info">
				<div class="category">
					<?=$category[0]->name?>
				</div>
					<div class="single-title">
						<h2>
							<mark><?=$title?></mark>
						</h2>
					</div>
					<?php if(has_excerpt()) : ?>
						<div class="subtitle"><mark><?=get_the_excerpt()?:''?></mark></div>
					<?php endif; ?>
					<?php if(!empty($category)) : ?>
						<div class="date">
							<?=get_the_date("F, Y")?>
						</div>
					<?php endif; ?>
			</section>
		</div>
	</a>
</article>
