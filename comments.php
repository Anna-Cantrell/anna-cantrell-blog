<?php
/*
 * Comments template
 *
*/
?>
<h2>What are your thoughts?</h2>
<?php if(have_comments()) : ?>
  <ul class="post-comments">
    <?php wp_list_comments(array(
        'style'       => 'ul',
        'short_ping'  => true,
      )); ?>
  </ul>
<?php endif; ?>

<?php comment_form(array(
  'title_reply' => '',
  'comment_notes_before' => '',
  'class_form' => 'comment-form general-form'
)); ?>