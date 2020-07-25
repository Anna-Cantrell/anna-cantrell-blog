<?php
/*
 * Searchform for header search bar
 *
 */
?>
<form id="searchform" action="/" method="get">
  <div class="wrapper">
    <label for="search" class="search" aria-label="Search for shower inspiration">
      <p>Search blog articles</p>
      <input placeholder="" type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
    </label>
    <label class="submit">
      <button type="submit"><?=get_svg('search') ?></button>
    </label>
  </div>
</form>
