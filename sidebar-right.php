<?php
/**
 * Main Widget Template
 *
 *
 * @file           sidebar.php
 * @package        StrapPress 
 * @author         Brad Williams 
 * @copyright      2010 - 2015 Brag Interactive
 * @license        license.txt
 * @version        Release: 3.3.6
 * @link           http://codex.wordpress.org/Theme_Development#Widgets_.28sidebar.php.29
 * @since          available since Release 1.0
 */
?>
      
<div id="sidebar" class="col-lg-3 col-12 sidebar-right text-left sh-col">
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
