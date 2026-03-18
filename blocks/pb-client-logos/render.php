<?php
/**
 * PB Client Logos Block
 *
 * Client logos grid.
 * Source: template-about.php lines 161-207.
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$title       = get_field( 'about_sec3_title', get_the_ID() );
$description = get_field( 'about_sec3_description', get_the_ID() );
?>
<section class="our_client_sect">
	<div class="container">
		<?php if ( $title ) : ?>
			<h2><?php echo wp_kses_post( $title ); ?></h2>
		<?php endif; ?>
		<?php if ( $description ) : ?>
			<p><?php echo wp_kses_post( $description ); ?></p>
		<?php endif; ?>
		<ul>
			<?php
			if ( have_rows( 'about_sec3_our_clients', get_the_ID() ) ) :
				while ( have_rows( 'about_sec3_our_clients', get_the_ID() ) ) :
					the_row();
					$img = get_sub_field( 'logo' );
					if ( $img ) :
						?>
						<li>
							<div class="our_client_box d-flex flex-wrap align-items-center justify-content-center w-100">
								<img src="<?php echo esc_url( $img['url'] ); ?>" width="174" height="53" alt="<?php echo esc_attr( $img['alt'] ); ?>">
							</div>
						</li>
						<?php
					endif;
				endwhile;
			endif;
			?>
		</ul>
	</div>
</section>
