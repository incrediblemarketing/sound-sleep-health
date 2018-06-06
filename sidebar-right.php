<div id="sidebar" class="col-lg-3 col-12 sidebar-right text-left">
  <div class="pad-v-md">
      <?php if ( is_active_sidebar( 'blog_sidebar' ) ) : ?>
        <?php dynamic_sidebar( 'blog_sidebar' ); ?>
      <?php else : ?>
        <h4><?php _e('In Archive', 'responsive'); ?></h4>
        <ul>
          <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
        </ul>
      <?php endif; //end of right-sidebar ?>
  </div>
</div>
