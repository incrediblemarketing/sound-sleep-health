<?php
/**
 * Display Location Block
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

$location = get_sub_field( 'single_location' );

?>
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-xl-8">
		<?php
		if ( have_rows( 'business_info', 'options' ) ) :
			while ( have_rows( 'business_info', 'options' ) ) :
				the_row();

				if ( get_sub_field( 'name' ) === $location ) :
					echo '<div class="single--business">';
					echo get_sub_field( 'iframe' );
					echo '<div class="content--area">';
					echo '<h1>' . get_the_title() . '</h1>';
					echo '<p class="address"><i class="fas fa-map-marker-alt"></i> ' . get_sub_field( 'business_street_address' ) . '<br/>' . get_sub_field( 'business_city_state_zip' ) . '</p>';
					echo '<p class="directions"><a href="' . get_sub_field( 'business_address_link' ) . '" target="_blank">Directions</a>';
					if ( is_page( 181 ) ) :
						echo '<p class="phone"><i class="fas fa-phone"></i> (425) 636-2420</p>';
					else :
						echo '<p class="phone"><i class="fas fa-phone"></i> ' . get_sub_field( 'business_phone_display' ) . '</p>';
						echo '<p class="fax"><i class="fas fa-fax"></i> ' . get_sub_field( 'business_fax' ) . '</p>';
					endif;
						echo '<p><a href="/contact/" class="btn--primary">Request an appointment</a></p>';
						echo '</div></div>';
					endif;
				endwhile;
			endif;
		?>
		</div>
	</div>
</div>
