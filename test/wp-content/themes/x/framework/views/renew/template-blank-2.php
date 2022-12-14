<?php

// =============================================================================
// VIEWS/RENEW/TEMPLATE-BLANK-2.PHP (Container | Header, No Footer)
// -----------------------------------------------------------------------------
// A blank page for creating unique layouts.
// =============================================================================

?>

<?php get_header(); ?>

    <div class="x-container-fluid max width offset cf">
      <div class="x-main full" role="main">

        <?php while ( have_posts() ) : the_post(); ?>

          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php x_get_view( 'global', '_content', 'the-content' ); ?>
            <?php x_google_authorship_meta(); ?>
          </article>

        <?php endwhile; ?>

      </div>
    </div>
  </div> <!-- end .site -->

  <?php x_get_view( 'global', '_header', 'widget-areas' ); ?>
  <?php x_get_view( 'global', '_footer', 'scroll-top' ); ?>
<?php x_get_view( 'global', '_footer' ); ?>