<?php
/**
 * PB Tabs Section Block
 *
 * Caption/heading/description with tabbed content (vanilla JS).
 * Flex layout: caption_heading_desc_tabs
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$caption  = get_field( 'services_sec5_caption', get_the_ID() );
$heading  = get_field( 'services_sec5_heading', get_the_ID() );
$colorful = get_field( 'services_sec5_colorfull_heading', get_the_ID() );
$desc     = get_field( 'services_sec5_description', get_the_ID() );
?>
<section class="range_sec">
	<div class="container">
		<div class="range_content w-100 float-start">
			<?php if ( $caption ) : ?>
				<span><?php echo esc_html( $caption ); ?></span>
			<?php endif; ?>
			<h2>
				<?php echo wp_kses_post( $heading ); ?>
				<?php if ( $colorful ) : ?>
					<strong><?php echo esc_html( $colorful ); ?></strong>
				<?php endif; ?>
			</h2>
			<?php if ( $desc ) : ?>
				<p><?php echo wp_kses_post( $desc ); ?></p>
			<?php endif; ?>
		</div>

		<?php if ( have_rows( 'services_sec5_tabs', get_the_ID() ) ) : ?>
		<div class="range_tabs w-100 float-start d-grid">
			<div class="tabs_title w-100 float-start">
				<ul class="d-none d-lg-block" id="myTab" role="tablist">
					<?php
					$counter = 1;
					while ( have_rows( 'services_sec5_tabs', get_the_ID() ) ) :
						the_row();
						?>
						<li>
							<a class="<?php echo ( 1 === $counter ) ? 'active' : ''; ?>" data-tab-target="#home_<?php echo esc_attr( $counter ); ?>" href="#home_<?php echo esc_attr( $counter ); ?>" role="tab"><?php echo esc_html( get_sub_field( 'tab' ) ); ?></a>
						</li>
						<?php
						$counter++;
					endwhile;
					?>
				</ul>
				<div class="select-style-Main d-lg-none">
					<div class="select-style">
						<select id="select-box2" class="selectboxlive">
							<?php
							$counter = 1;
							while ( have_rows( 'services_sec5_tabs', get_the_ID() ) ) :
								the_row();
								?>
								<option value="<?php echo esc_attr( $counter ); ?>"><?php echo esc_html( get_sub_field( 'tab' ) ); ?></option>
								<?php
								$counter++;
							endwhile;
							?>
						</select>
					</div>
				</div>
			</div>

			<div class="tab-content tabs_des" id="myTabContent">
				<?php
				$counter = 1;
				while ( have_rows( 'services_sec5_tabs', get_the_ID() ) ) :
					the_row();
					$img = get_sub_field( 'image' );
					?>
					<div class="tab-pane fade <?php echo ( 1 === $counter ) ? 'show active' : ''; ?>" id="home_<?php echo esc_attr( $counter ); ?>" role="tabpanel">
						<h5><?php echo esc_html( get_sub_field( 'heading' ) ); ?></h5>
						<p><?php echo wp_kses_post( get_sub_field( 'description' ) ); ?></p>
						<?php if ( $img ) : ?>
							<img aria-hidden="true" decoding="async" src="<?php echo esc_url( $img['url'] ); ?>" alt="<?php echo esc_attr( $img['alt'] ); ?>" width="880" height="280">
						<?php endif; ?>
					</div>
					<?php
					$counter++;
				endwhile;
				?>
			</div>
		</div>
		<?php endif; ?>
	</div>
</section>
