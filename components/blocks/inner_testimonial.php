<?php
/**
 * Display Inner Testimonials Block
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

$content = get_sub_field( 'content' );

?>
<?php
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	$args  = array(
		'post_type'     => 'testimonial',
		'post_per_page' => 10,
		'paged'         => $paged,
	);
	$query = new WP_Query( $args );
	$count = $query->found_posts;
	?>
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-12 col-xl-8 content--area">
			<div class="top--testimonial">
				<div class="count">
					<?php get_template_part( 'components/svg/stars' ); ?>
					<p><?php echo $count; ?></p>
					<p class="small">Total Reviews</p>
				</div>
				<div class="text--area">
					<h1><?php echo get_the_title(); ?></h1>
					<?php echo $content; ?>
				</div>
			</div>

			<?php if ( $query->have_posts() ) : ?>
				<?php while ( $query->have_posts() ) : ?>
					<?php $query->the_post(); ?>
					<div class="testimonial--single">
						<h3><?php echo esc_attr(the_title()); ?></h3>
						<p class="post-meta"><?php echo get_the_date(); ?></p>
						<?php the_content(); ?>
						<hr/>
						<?php get_template_part( 'components/svg/stars' ); ?>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
			<nav class="pagination">
        <?php pagination_bar( $query ); ?>
    	</nav>
			<?php wp_reset_postdata(); ?>
			</div>
	</div>
</div>
