<?php
/**
 * Block Name: TL;DR
 *
 * This is the template that displays the code block.
 */

// create id attribute for specific styling
$id = 'code-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';
$language = get_field('language');
$content = get_field('content');
$title = get_field('title');
$code = htmlentities(get_field('code_block'));
?>

<section id="<?=$id?>" class="section section--tldr">
  <div class="tldr-container">
    <?php if($title) : ?>
      <div class="title">
        <?=$title?>
      </div>
    <?php endif; ?>
    <?php if($content) : ?>
      <p><?=$content?></p>
    <?php endif; ?>
    <?php if ($code) : ?>
      <pre><code class="language-<?=$language?>"><?=$code?></code></pre>
    <?php endif; ?>
  </div>
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
