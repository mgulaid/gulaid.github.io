<?php

// =============================================================================
// VIEWS/ICON/CONTENT-IMAGE.PHP
// -----------------------------------------------------------------------------
// Image post output for Icon.
// =============================================================================

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="entry-wrap">
    <?php x_icon_comment_number(); ?>
    <div class="x-container-fluid max width">
      <?php x_get_view( 'icon', '_content', 'post-header' ); ?>
      <?php if ( has_post_thumbnail() ) : ?>
      <div class="entry-featured">
        <?php x_featured_image(); ?>
      </div>
      <?php endif; ?>
      <?php if ( is_single() ) : ?>
        <?php x_get_view( 'global', '_content', 'the-content' ); ?>
      <?php endif; ?>
    </div>
  </div>
  <?php x_google_authorship_meta(); ?>
</article>