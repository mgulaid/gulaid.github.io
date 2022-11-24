<?php

// =============================================================================
// VIEWS/ICON/CONTENT-QUOTE.PHP
// -----------------------------------------------------------------------------
// Quote post output for Icon.
// =============================================================================

$quote = get_post_meta( get_the_ID(), '_x_quote_quote', true );
$cite  = get_post_meta( get_the_ID(), '_x_quote_cite',  true );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="entry-wrap">
    <?php x_icon_comment_number(); ?>
    <div class="x-container-fluid max width">
      <?php x_get_view( 'icon', '_content', 'post-header' ); ?>
      <?php if ( is_single() ) : ?>
        <?php if ( has_post_thumbnail() ) : ?>
        <div class="entry-featured">
          <?php x_featured_image(); ?>
        </div>
        <?php endif; ?>
      <?php x_get_view( 'global', '_content', 'the-content' ); ?>
      <?php endif; ?>
    </div>
  </div>
  <?php x_google_authorship_meta(); ?>
</article>