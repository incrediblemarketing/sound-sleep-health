<?php
/**
 * Archive Template
 *
 *
 * @file           archive.php
 * @package        StrapPress 
 * @author         Brad Williams 
 * @copyright      2011 - 2014 Brag Interactive
 * @license        license.txt
 * @version        Release: 3.2.0.1
 * @link           http://codex.wordpress.org/Theme_Development#Archive_.28archive.php.29
 * @since          available since Release 1.0
 */
?>
<?php get_header(); ?>
<?php if(!is_front_page()) : ?>
	<?php
		$headerImage = get_field('header_image', 'options');
	?>
	<div id="page-header" class="row" data-bg="<?php echo $headerImage; ?>"></div>
<?php endif; ?>

<div class="row justify-content-center sh-row">
	<div class="col-lg-7 col-12 sh-col">
		<div class="pad-v-md">
			<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" class="blog-article">
						<h3 class="page-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'responsive'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h3>
						
						<div class="img alignleft">
							<?php if ( has_post_thumbnail()) : ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
									<?php the_post_thumbnail('postslider_thumb'); ?>
								</a>
							<?php endif; ?>
						</div>
                        <section class="post-meta">
							<?php 
								$output = '';
								$category = get_the_category();
								
								$output .= '<span><i class="fa fa-calendar blue"></i> ' . get_the_date() . '</span>';
								
								$output .= '<span><i class="fa fa-user blue"></i> ' . get_the_author() . '</span>';
								
								$output .= '<span><i class="fa fa-folder-open"></i> ';
								foreach($category as $categories){ 
									$category_link = get_category_link($categories->ID);
   									$output .= '<a href="' . esc_url( get_category_link( $categories->term_id ) ) . '">' . esc_html( $categories->name ) . '</a>';
								}
								$output .= '</span>';
								
								echo $output;
							?>
						</section><!-- end of .post-meta -->
                
                        <?php the_excerpt(); ?>
                        
                        

                    <footer class="article-footer">
                        <div class="post-edit"><?php edit_post_link(__('Edit', 'responsive')); ?></div> 
                    </footer> <!-- end article footer -->
            
                </article><!-- end of #post-<?php the_ID(); ?> -->

            <?php endwhile; ?> 

            <?php if (  $wp_query->max_num_pages > 1 ) : ?>
                <nav class="navigation">
                   <div class="previous"><?php next_posts_link( __( '&#8249; Older posts', 'responsive' ) ); ?></div>
                   <div class="next"><?php previous_posts_link( __( 'Newer posts &#8250;', 'responsive' ) ); ?></div>
               </nav><!-- end of .navigation -->
           <?php endif; ?>

       <?php else : ?>

       <article id="post-not-found" class="hentry clearfix">
        <header>
           <h1 class="title-404"><?php _e('404 &#8212; Fancy meeting you here!', 'responsive'); ?></h1>
       </header>
       <section>
           <p><?php _e('Don&#39;t panic, we&#39;ll get through this together. Let&#39;s explore our options here.', 'responsive'); ?></p>
       </section>
       <footer>
           <h6><?php _e( 'You can return', 'responsive' ); ?> <a href="<?php echo home_url(); ?>/" title="<?php esc_attr_e( 'Home', 'responsive' ); ?>"><?php _e( '&#9166; Home', 'responsive' ); ?></a> <?php _e( 'or search for the page you were looking for', 'responsive' ); ?></h6>
           <?php get_search_form(); ?>
       </footer>

   </article>

<?php endif; ?>  
		</div>
        </div><!-- end of #content -->
        <?php get_sidebar('right'); ?>
    </div>
<?php get_footer(); ?>