<?php
/**
 * Block Name: Code
 *
 * This is the template that displays the code block.
 */

// create id attribute for specific styling
$id = 'code-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';
$language = get_field('language');
$code = htmlentities(get_field('code_block'));
?>

<section id="<?=$id?>" class="section section--code">
	<pre><code class="language-<?=$language?>"><?=$code?></code></pre>
</section>

<?php if(is_admin()):?>
<style type="text/css">
	#<?php echo $id; ?> pre {
		padding: 20px;
		background: #222222;
		color: #fff;
	}
</style>
<?php endif; ?>
