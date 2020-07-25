<?php
add_action('acf/init', 'my_acf_init');
function my_acf_init() {
	if( function_exists('acf_register_block') ) {

		// register blocks
    acf_register_block(array(
			'name'				=> 'code',
			'title'				=> __('Code'),
			'description'		=> __('Code Block'),
			'render_template'   => 'library/template-parts/blocks/block-code.php',
			'category'			=> 'formatting',
			'icon'				=> 'admin-comments',
			'keywords'			=> array( 'code', 'script' ),
		));

		// register blocks
    acf_register_block(array(
			'name'				=> 'tldr',
			'title'				=> __('TL;DR'),
			'description'		=> __('The "Too long; Didn\'t Read" Section'),
			'render_template'   => 'library/template-parts/blocks/block-tldr.php',
			'category'			=> 'formatting',
			'icon'				=> 'media-text',
			'keywords'			=> array( 'tldr', 'summary' ),
		));

		// register blocks
    acf_register_block(array(
			'name'				=> 'wysiwyg',
			'title'				=> __('WYSIWYG'),
			'description'		=> __('Controlled Content Block'),
			'render_template'   => 'library/template-parts/blocks/block-wysiwyg.php',
			'category'			=> 'formatting',
			'icon'				=> 'editor-alignleft',
			'keywords'			=> array( 'content', 'wysiwyg', 'paragraph', 'list' ),
		));

		// register blocks
    acf_register_block(array(
			'name'				=> 'bio',
			'title'				=> __('Bio'),
			'description'		=> __('Article Ending Bio'),
			'render_template'   => 'library/template-parts/blocks/block-bio.php',
			'category'			=> 'formatting',
			'icon'				=> 'businesswoman',
			'keywords'			=> array( 'content', 'bio' ),
		));
	}
}

// Disallow most default blocks
add_filter( 'allowed_block_types', 'gucci_allowed_block_types' );
function gucci_allowed_block_types( $allowed_blocks ) {
	return array(
		'core/image',
		'core/paragraph',
		'core/heading',
		'acf/code',
    'acf/tldr',
		'acf/wysiwyg',
		'acf/bio',
	);
}


// Add custom Block Categories
// function gucci_block_categories( $categories, $post ) {
//     return array_merge(
//         array(
//             array(
//                 'slug' => 'homepage',
//                 'title' => __( 'HomePage', 'homepage' )
//             ),
//         ),
// 				$categories
//     );
// }
// add_filter( 'block_categories', 'gucci_block_categories', 10, 2 );

/*
Full list of default core blocks (preface with core/):

archives
audio
button
categories
code
column
columns
coverImage
embed
file
freeform
gallery
heading
html
image
latestComments
latestPosts
list
more
nextpage
paragraph
preformatted
pullquote
quote
reusableBlock
separator
shortcode
spacer
subhead
table
textColumns
verse
video
*/
?>
