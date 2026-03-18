<?php
/**
 * PB Map & Contact Info Block
 *
 * Google Maps + business info + hours.
 * Source: template-contact.php lines 273-427.
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$phone   = get_field( 'footer_phone_number', 'options' );
$email   = get_field( 'footer_email', 'options' );
$address = get_field( 'footer_address', 'options' );

$day_names = array( 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday' );
?>
<section class="map_sec d-flex justify-content-between align-items-center">
	<div class="timing_div w-100 float-start">
		<h2>ProudBrands</h2>
		<ul>
			<?php if ( $phone ) : ?>
			<li>
				<span><img aria-hidden="true" decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/call.png' ); ?>" alt="call" width="25" height="31"></span>
				<h3>Call us</h3>
				<a href="tel:<?php echo esc_attr( $phone ); ?>"><?php echo esc_html( $phone ); ?></a>
			</li>
			<?php endif; ?>
			<?php if ( $email ) : ?>
			<li>
				<span><img aria-hidden="true" decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/mail.png' ); ?>" alt="email" width="25" height="31"></span>
				<h3>Our email</h3>
				<a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a>
			</li>
			<?php endif; ?>
			<?php if ( $address ) : ?>
			<li>
				<span><img aria-hidden="true" decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/address.png' ); ?>" alt="address" width="25" height="31"></span>
				<h3>Visit us</h3>
				<a href="#"><?php echo wp_kses_post( $address ); ?></a>
			</li>
			<?php endif; ?>
		</ul>

		<?php if ( have_rows( 'footer_our_business_hours', 'options' ) ) : ?>
		<h4>Our business hours</h4>
		<ol>
			<?php
			$counter = 0;
			while ( have_rows( 'footer_our_business_hours', 'options' ) ) :
				the_row();
				$day = isset( $day_names[ $counter ] ) ? $day_names[ $counter ] : '';
				?>
				<li><?php echo esc_html( $day ); ?> <small><?php echo esc_html( get_sub_field( 'timingopen_and_close' ) ); ?></small></li>
				<?php
				$counter++;
			endwhile;
			?>
		</ol>
		<?php endif; ?>
	</div>

	<div class="map_div w-100 float-start">
		<div id="map" style="width:100%; height:100vh;"></div>
	</div>
</section>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqY3_BqClD8F2ISiEz_EYmrWUtCvqGDlM&callback=initMap" async defer></script>
