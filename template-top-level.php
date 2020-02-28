<?php
/**
 * Template Name: Top Level Procedure Page
 * Template Post Type: procedure
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

$current_id = get_the_ID();
get_header();  ?>

<div class="container page__top-level">
  <div class="row justify-content-center section__padding">
	  <div class="col-12">
		<?php
		$args  = array(
			'post_type'   => 'procedure',
			'order'       => 'ASC',
			'orderby'     => 'menu_order',
			'post_parent' => $current_id,
		);
		$query = new WP_Query( $args );
		?>
	  <?php if ( $query->have_posts() ) : ?>
	  <div class="grid__procedures">
			<?php while ( $query->have_posts() ) : ?>
				<?php $query->the_post(); ?>
			<div class="procedure--preview">
				<?php if ( has_post_thumbnail() ) : ?>
					<?php echo get_the_post_thumbnail( 'featured_thumb' ); ?>
			  <?php else : ?>
				  <?php im_the_placeholder_image( 'featured_thumb' ); ?>
			  <?php endif; ?>
			  <div class="card--bottom">
				<h2><?php echo esc_attr( get_the_title() ); ?></h2>
				<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="btn btn-primary">Learn More</a>
			  </div>
			</div>
		<?php endwhile; ?> 
	  </div>
	  <?php endif; ?>  
	  </div>
  </div>
</div>
<?php get_footer(); ?>
