<?php
/**
 * Footer Template
 *
 * This file is the footer template for the WordPress theme. It displays the
 * bottom part of the HTML document.
 *
 * @package WordPress
 * @subpackage Gucci
 * @since Gucci 1.0
 */
 $logo = !empty(get_field('logo_stacked', 'options')) ? get_field('logo_stacked', 'options') : "";

?>

  </main>
<footer>
  <div class="main-footer">
    <div class="wrapper">
      <section class="footer-navigation">
        <?php wp_nav_menu(
          array( 'theme_location' => 'footer-menu' )
        ); ?>
        <img
        src="<?=$logo['url'] ? $logo['url'] : get_stylesheet_directory() . "library/media/anna-cantrell-stacked.png"?>"
        alt="<?=$logo['alt'] ? $logo['alt'] : "Anna Cantrell Logo" ?>"
        />
      </section>
    </div>
  </div>
  <div class="post-footer">
    &copy; <?=Date("Y")?> Anna Cantrell
  </div>
</footer>
<?php wp_footer(); ?>

</body>
</html>
