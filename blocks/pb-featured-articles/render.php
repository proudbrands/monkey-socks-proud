<?php
/**
 * PB Featured Articles Block
 *
 * Featured blog posts grid from Post Object field.
 * Source: template-home.php lines 204-250.
 *
 * @package Proud_Brands
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$heading        = get_field( 'home_sec4_heading', get_the_ID() );
$featured_posts = get_field( 'home_sec4_blog_posts', get_the_ID() );
?>
<?php if ( $heading ) : ?>
	<div class="skill_title skill_title02 w-100 float-start" data-aos="fade-up">
		<h2><?php echo wp_kses_post( $heading ); ?></h2>
	</div>
<?php endif; ?>

<?php if ( $featured_posts ) : ?>
<div class="article_div w-100 d-grid">
	<?php
	foreach ( $featured_posts as $key => $featured_post ) :
		$permalink = get_permalink( $featured_post->ID );
		$title     = get_the_title( $featured_post->ID );
		$excerpt   = get_the_excerpt( $featured_post->ID );
		$date      = get_the_date( '', $featured_post->ID );
		$thumbnail = get_the_post_thumbnail( $featured_post->ID, 'medium' );
		?>
		<div class="article w-100 float-start" data-aos="fade-up" data-aos-delay="<?php echo esc_attr( ( $key + 1 ) * 200 ); ?>">
			<div class="article_pic w-100 float-start">
				<a href="<?php echo esc_url( $permalink ); ?>" title="<?php echo esc_attr( $title ); ?>">
					<?php echo $thumbnail; ?>
				</a>
			</div>
			<div class="article_des w-100 float-start">
				<span><?php echo esc_html( $date ); ?></span>
				<h2>
					<a class="article_title" href="<?php echo esc_url( $permalink ); ?>">
						<?php echo esc_html( $title ); ?>
					</a>
				</h2>
				<p><?php echo esc_html( wp_trim_words( $excerpt, 20, '...' ) ); ?></p>
				<a class="read_article" href="<?php echo esc_url( $permalink ); ?>">Read Article</a>
			</div>
		</div>
	<?php endforeach; ?>
</div>
<?php endif; ?>
