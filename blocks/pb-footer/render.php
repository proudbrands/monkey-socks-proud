<?php
/**
 * PB Footer Block
 *
 * Site footer with logo, address, contact, social links, and legal info.
 * Replaces footer.php lines 50-168.
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$logo      = get_field( 'header_site_logo', 'options' );
$address   = get_field( 'footer_address', 'options' );
$email     = get_field( 'footer_email', 'options' );
$phone     = get_field( 'footer_phone_number', 'options' );
$fb        = get_field( 'footer_facebook_link', 'options' );
$twitter   = get_field( 'footer_twitter_link', 'options' );
$linkedin  = get_field( 'footer_linkedin_link', 'options' );
$instagram = get_field( 'footer_instagram_link', 'options' );
$copyright = get_field( 'footer_copyright_text', 'options' );
$company   = get_field( 'company_number', 'options' );
$vat       = get_field( 'vat_number', 'options' );
$privacy   = get_field( 'privacy_policy', 'options' );
$cookie    = get_field( 'cookie_policy', 'options' );
$member1   = get_field( 'footer_members_image_1', 'options' );
$member2   = get_field( 'footer_members_image_2', 'options' );
?>
<footer class="footer">
	<div class="container">
		<div class="footer_top float-start w-100">
			<div class="ftr_logo">
				<?php if ( $logo ) : ?>
					<img width="201" height="61" src="<?php echo esc_url( $logo['url'] ); ?>" alt="<?php echo esc_attr( $logo['alt'] ); ?>">
				<?php else : ?>
					<img width="201" height="61" src="<?php echo esc_url( get_template_directory_uri() . '/images/logo.webp' ); ?>" alt="logo">
				<?php endif; ?>
			</div>

			<?php if ( $address ) : ?>
			<div class="adres_col">
				<h3>Our Address</h3>
				<p><?php echo wp_kses_post( $address ); ?></p>
			</div>
			<?php endif; ?>

			<?php if ( $phone || $email ) : ?>
			<div class="adres_col">
				<h3>Contact</h3>
				<?php if ( $phone ) : ?>
					<p><a href="tel:<?php echo esc_attr( $phone ); ?>"><?php echo esc_html( $phone ); ?></a></p>
				<?php endif; ?>
				<?php if ( $email ) : ?>
					<p><a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></p>
				<?php endif; ?>
			</div>
			<?php endif; ?>

			<?php if ( $fb || $twitter || $linkedin || $instagram ) : ?>
			<div class="socail_col">
				<h3>Get social</h3>
				<ul>
					<?php if ( $fb ) : ?>
					<li>
						<a target="_blank" href="<?php echo esc_url( $fb ); ?>"><img width="34" height="34" src="<?php echo esc_url( get_template_directory_uri() . '/images/facebook.svg' ); ?>" alt="Facebook"></a>
					</li>
					<?php endif; ?>
					<?php if ( $twitter ) : ?>
					<li>
						<a target="_blank" href="<?php echo esc_url( $twitter ); ?>"><img width="34" height="34" src="<?php echo esc_url( get_template_directory_uri() . '/images/twitter_x.svg' ); ?>" alt="Twitter"></a>
					</li>
					<?php endif; ?>
					<?php if ( $linkedin ) : ?>
					<li>
						<a target="_blank" href="<?php echo esc_url( $linkedin ); ?>"><img width="34" height="34" src="<?php echo esc_url( get_template_directory_uri() . '/images/linked_in.svg' ); ?>" alt="LinkedIn"></a>
					</li>
					<?php endif; ?>
					<?php if ( $instagram ) : ?>
					<li>
						<a target="_blank" href="<?php echo esc_url( $instagram ); ?>"><img width="34" height="34" src="<?php echo esc_url( get_template_directory_uri() . '/images/instagram.svg' ); ?>" alt="Instagram"></a>
					</li>
					<?php endif; ?>
				</ul>
			</div>
			<?php endif; ?>
		</div>

		<div class="footer_bottom float-start w-100 d-flex flex-wrap justify-content-between">
			<div class="footerleft">
				<?php if ( $copyright ) : ?>
					<p><?php echo wp_kses_post( $copyright ); ?></p>
				<?php endif; ?>
				<ol class="float-start w-100 d-flex flex-wrap">
					<?php if ( $company ) : ?>
						<li>Company Number: <?php echo esc_html( $company ); ?></li>
					<?php endif; ?>
					<?php if ( $vat ) : ?>
						<li>VAT Number: <?php echo esc_html( $vat ); ?></li>
					<?php endif; ?>
					<?php if ( $privacy ) : ?>
						<li>
							<a href="<?php echo esc_url( $privacy['url'] ); ?>" target="<?php echo esc_attr( $privacy['target'] ?? '_self' ); ?>">
								<?php echo esc_html( $privacy['title'] ); ?>
							</a>
						</li>
					<?php endif; ?>
					<?php if ( $cookie ) : ?>
						<li>
							<a href="<?php echo esc_url( $cookie['url'] ); ?>" target="<?php echo esc_attr( $cookie['target'] ?? '_self' ); ?>">
								<?php echo esc_html( $cookie['title'] ); ?>
							</a>
						</li>
					<?php endif; ?>
				</ol>
			</div>
			<ul>
				<?php if ( $member1 ) : ?>
				<li>
					<img width="149" height="53" src="<?php echo esc_url( $member1['url'] ); ?>" alt="<?php echo esc_attr( $member1['alt'] ?? '' ); ?>">
				</li>
				<?php endif; ?>
				<?php if ( $member2 ) : ?>
				<li>
					<img width="89" height="59" src="<?php echo esc_url( $member2['url'] ); ?>" alt="<?php echo esc_attr( $member2['alt'] ?? '' ); ?>">
				</li>
				<?php endif; ?>
				<li>
					<span id="back-to-top"><img src="<?php echo esc_url( get_template_directory_uri() . '/images/back-to-top.png' ); ?>" width="45" height="45" alt="Back to top"></span>
				</li>
			</ul>
		</div>
	</div>
</footer>
