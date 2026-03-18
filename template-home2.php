<?php
/*

Template Name: Home2

*/

get_header();

// ACF fields for hero background
$hero_image    = get_field('sv_hero_image');
$hero_video    = get_field('sv_hero_video');
$hero_is_video = get_field('sv_hero_media_type');
?>


    <!-- ========== HERO ========== -->
    <section class="sv-hero sv-hero--home">
        <?php if ($hero_is_video && $hero_video) : ?>
        <video class="sv-hero__bg-video" autoplay muted loop playsinline preload="auto">
            <source src="<?php echo esc_url($hero_video['url']); ?>" type="<?php echo esc_attr($hero_video['mime_type']); ?>">
        </video>
        <?php elseif ($hero_image) : ?>
        <div class="sv-hero__bg-image" style="background-image: url('<?php echo esc_url($hero_image['url']); ?>');"></div>
        <?php endif; ?>
        <div class="sv-hero__overlay"></div>
        <div class="container position-relative">
            <h1 class="sv-hero__title" data-aos="fade-up">
                We grow brands.<br><strong>Four ways.</strong>
            </h1>
            <p class="sv-hero__descriptor" data-aos="fade-up" data-aos-delay="100">
                AI automation. Organic search. Web design. Branding.<br>
                One agency, every angle covered.
            </p>
            <div class="sv-hero__cta" data-aos="fade-up" data-aos-delay="200">
                <a href="#" class="sv-hero__btn sv-hero__btn--primary book_meeting">Book a Free Consultation</a>
                <a href="<?php echo esc_url( get_post_type_archive_link( 'case_study' ) ); ?>" class="sv-hero__btn sv-hero__btn--secondary">See Our Work</a>
            </div>
        </div>
    </section>

    <!-- Gradient divider -->
    <div class="sv-gradient-bar"></div>

    <!-- ========== PILLAR CARDS ========== -->
    <section id="sv-pillars" class="sv-pillars sv-pillars--home">
        <div class="container">
            <div class="sv-pillars__header text-center" data-aos="fade-up">
                <p class="sv-pillars__label">What We Do</p>
                <h2 class="sv-pillars__title">Four services. One growth engine.</h2>
            </div>
            <div class="sv-pillars__grid">

                <!-- AI Automation -->
                <a href="<?php echo esc_url( home_url('/ai-automation/') ); ?>" class="sv-pillar sv-pillar--ai" data-aos="fade-up">
                    <div class="sv-pillar__accent"></div>
                    <span class="sv-pillar__icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="11" width="18" height="10" rx="2"/><circle cx="12" cy="5" r="3"/><line x1="12" y1="8" x2="12" y2="11"/><circle cx="8" cy="16" r="1"/><circle cx="16" cy="16" r="1"/>
                        </svg>
                    </span>
                    <h2 class="sv-pillar__name">AI Automation</h2>
                    <p class="sv-pillar__desc">Eliminate repetitive work. Connect your systems. Let AI handle the tasks your team shouldn't be doing manually.</p>
                    <span class="sv-pillar__link">Learn more
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </span>
                </a>

                <!-- Organic Search -->
                <a href="<?php echo esc_url( home_url('/seo-agency-aylesbury/') ); ?>" class="sv-pillar sv-pillar--search" data-aos="fade-up" data-aos-delay="100">
                    <div class="sv-pillar__accent"></div>
                    <span class="sv-pillar__icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/><circle cx="18" cy="4" r="2"/><line x1="18" y1="6" x2="18" y2="12"/>
                        </svg>
                    </span>
                    <h2 class="sv-pillar__name">Organic Search</h2>
                    <p class="sv-pillar__desc">Get found by the right people. Build compounding visibility that turns search into your best sales channel.</p>
                    <span class="sv-pillar__link">Learn more
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </span>
                </a>

                <!-- Web Design -->
                <a href="<?php echo esc_url( home_url('/web-design/') ); ?>" class="sv-pillar sv-pillar--web" data-aos="fade-up" data-aos-delay="200">
                    <div class="sv-pillar__accent"></div>
                    <span class="sv-pillar__icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/><polyline points="7 8 10 11 7 14"/><line x1="13" y1="14" x2="17" y2="14"/>
                        </svg>
                    </span>
                    <h2 class="sv-pillar__name">Web Design</h2>
                    <p class="sv-pillar__desc">Fast, strategic, built to convert. Websites that look premium and perform like a 24/7 sales team.</p>
                    <span class="sv-pillar__link">Learn more
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </span>
                </a>

                <!-- Branding -->
                <a href="<?php echo esc_url( home_url('/branding-agency/') ); ?>" class="sv-pillar sv-pillar--brand" data-aos="fade-up" data-aos-delay="300">
                    <div class="sv-pillar__accent"></div>
                    <span class="sv-pillar__icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="13.5" cy="6.5" r="2.5"/><circle cx="6.5" cy="13.5" r="2.5"/><circle cx="17.5" cy="17.5" r="2.5"/><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2"/>
                        </svg>
                    </span>
                    <h2 class="sv-pillar__name">Branding</h2>
                    <p class="sv-pillar__desc">Look like the business you've become. Visual identities that communicate quality before a single word is read.</p>
                    <span class="sv-pillar__link">Learn more
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </span>
                </a>

            </div>
        </div>
    </section>


    <?php
    $intro_heading = get_field( 'home_partner_heading' );
    $intro_body    = get_field( 'home_bnr_bottom_text' );
    if ( $intro_heading || $intro_body ) :
    ?>
    <section class="hp_intro_statement" data-aos="fade-up">
        <div class="container">
            <div class="hp_intro_inner text-center">
                <?php if ( $intro_heading ) : ?>
                <h2><?php echo esc_html( $intro_heading ); ?></h2>
                <?php endif; ?>
                <?php if ( $intro_body ) : ?>
                <p><?php echo esc_html( $intro_body ); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <section class="marquee_sec w-100 float-start text-center">
        <h2><?php echo get_field('home_bnr_heading'); ?></h2>
        <?php for ($i=1; $i < 3; $i++) { ?>
        <ul class="marquee__item">
        	<?php
        		if (have_rows('home_bnr_company_logos_is')) {
        			while (have_rows('home_bnr_company_logos_is')) {
        				the_row();

        			$img = get_sub_field('logo');
        	?>
            <li class="marqueeBox">
                <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
            </li>
            <?php
            		}
            	}
            ?>
        </ul>
    	<?php } wp_reset_query(); wp_reset_postdata(); ?>
    </section>

    <?php
    $pull_quote = get_field( 'home_pull_quote' );
    if ( $pull_quote ) :
    ?>
    <section class="hp_pull_quote" data-aos="fade-up">
        <div class="container">
            <blockquote class="hp_pull_quote_inner">
                <p><?php echo esc_html( $pull_quote ); ?></p>
            </blockquote>
        </div>
    </section>
    <?php endif; ?>



    <section class="case_study_sec">
        <div class="container">
            <h2><?php echo get_field('home_sec2_heading'); ?></h2>
            <?php
            $cs_query = new WP_Query( array(
                'post_type'      => 'case_study',
                'posts_per_page' => 6,
                'post_status'    => 'publish',
                'order'          => 'DESC',
            ) );
            if ( $cs_query->have_posts() ) :
            ?>
            <div class="row g-4">
                <?php while ( $cs_query->have_posts() ) : $cs_query->the_post();
                    $image_url = has_post_thumbnail()
                        ? get_the_post_thumbnail_url( get_the_ID(), 'large' )
                        : get_template_directory_uri() . '/images/cs_1.webp';

                    $post_terms = get_the_terms( get_the_ID(), 'case_study_type' );
                    $term_name = '';
                    if ( $post_terms && ! is_wp_error( $post_terms ) ) {
                        $term_name = $post_terms[0]->name;
                    }

                    $result_stat = get_field( 'cs_hero_headline' );
                ?>
                <div class="col-md-6 col-lg-4 cs-card-col" data-aos="fade-up">
                    <a href="<?php the_permalink(); ?>" class="cs-card">
                        <div class="cs-card__image">
                            <img loading="lazy" decoding="async" src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" width="600" height="400">
                            <span class="cs-card__tag"><?php echo esc_html( $term_name ); ?></span>
                        </div>
                        <div class="cs-card__body">
                            <h3 class="cs-card__title"><?php echo esc_html( get_the_title() ); ?></h3>
                            <?php if ( $result_stat ) : ?>
                            <p class="cs-card__stat"><?php echo esc_html( $result_stat ); ?></p>
                            <?php endif; ?>
                        </div>
                    </a>
                </div>
                <?php endwhile; ?>
            </div>
            <div class="text-center mt-5">
                <a href="<?php echo esc_url( get_post_type_archive_link( 'case_study' ) ); ?>" class="cs-cta__btn cs-cta__btn--primary">View All Case Studies</a>
            </div>
            <?php endif; wp_reset_postdata(); ?>
        </div>
    </section>



    <section class="skill_sec">
        <div class="container">
            <div class="skill_title w-100 float-start" data-aos="fade-up">
                <h2><?php echo get_field('home_sec3_heading'); ?></h2>
            </div>
            <div class="skill_div w-100 d-grid">
                <div class="skill_pic w-100 float-start">
                    <img class="skill_img_1" aria-hidden="true" loading="lazy" decoding="async" src="<?php echo get_template_directory_uri() ?>/images/skill_pic.webp" alt="banner image" width="460" height="590">
                </div>
                <div class="skill_des w-100 float-start">
                	<?php
                		$counter = 1;
                		if (have_rows('home_sec3_weve_got_skills')) {
                			while (have_rows('home_sec3_weve_got_skills')) {
                				the_row();
                		        $link = get_sub_field('button_link');
                	?>
                    <?php
                        $services_raw = get_post_meta( get_the_ID(), 'home_sec3_weve_got_skills_' . ( $counter - 1 ) . '_services', true );
                        $services = $services_raw ? explode( '|', $services_raw ) : array();
                    ?>
                    <div id="skill_<?php echo $counter; ?>" class="skill_list w-100 float-start position-relative" data-aos="fade-up">
                        <h3><?php echo get_sub_field('title'); ?></h3>
                        <div class="skill_desc_wrap">
                            <p><?php echo get_sub_field('description'); ?></p>
                            <?php if ( ! empty( $services ) ) : ?>
                            <ul class="skill_services">
                                <?php foreach ( $services as $service ) : ?>
                                <li><?php echo esc_html( trim( $service ) ); ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <?php endif; ?>
                        </div>
                        <a class="learn_more" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><span><img class="smooth" width="21" height="21" src="<?php echo get_template_directory_uri() ?>/images/learn_more.png" alt="arror"></span><?php echo $link['title']; ?></a>
                    </div>
                    <?php
                    		$counter++;
                    		}
                    	}
                    	wp_reset_postdata();
                    	wp_reset_query();
                    ?>
                </div>
            </div>




            <div class="skill_title skill_title02 w-100 float-start" data-aos="fade-up">
                <h2><?php echo get_field('home_sec4_heading'); ?></h2>
            </div>
            <?php
				$featured_posts = get_field('home_sec4_blog_posts');
				if( $featured_posts ):
			?>
            <div class="article_div w-100 d-grid">
				<?php
				foreach( $featured_posts as $key => $featured_post ):
				    // Get post details from the post object
				    $permalink  = get_permalink( $featured_post->ID );
				    $title      = get_the_title( $featured_post->ID );
				    $excerpt    = get_the_excerpt( $featured_post->ID );
				    $date       = get_the_date( '', $featured_post->ID );
				    $thumbnail  = get_the_post_thumbnail( $featured_post->ID, 'medium' );

				    if($key == 1){
				    	$delayIs = 400;
				    } elseif($key == 2){
				    	$delayIs = 600;
				    } elseif($key == 3){
				    	$delayIs = 800;
				    }

				?>
				    <div class="article w-100 float-start" data-aos="fade-up" data-aos-delay="400">
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
				            <p><?php echo wp_trim_words($excerpt, 20, '...'); ?></p>
				            <a class="read_article" href="<?php echo esc_url( $permalink ); ?>">Read Article</a>
				        </div>
				    </div>
				<?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="marquee_sec marquee_sec02 w-100 float-start text-center">
        <h2><?php echo get_field('home_sec4_heading_2'); ?></h2>

        <ul>
            <?php
            if (have_rows('home_sec4_technology_partners')) {
                while (have_rows('home_sec4_technology_partners')) {
                    the_row();
                    $img = get_sub_field('logo');
            ?>
            <li class="marqueeBox">
                <img width="56" height="64" src="<?php echo $img['url'] ?>" alt="<?php echo $img['alt'] ?>">
            </li>
            <?php
                }
            }
            ?>
        </ul>

    </section>


<?php get_footer(); ?>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            const elements = document.querySelectorAll('.typing-effect');

            function typeWriter(element) {
                const fullText = element.textContent;
                element.textContent = "";
                let index = 0;
                const typingSpeed = 10;

                function type() {
                    if (index < fullText.length) {
                        element.textContent += fullText.charAt(index);
                        index++;
                        setTimeout(type, typingSpeed);
                    }
                }

                type();
            }

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        typeWriter(entry.target);
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });

            elements.forEach(element => {
                observer.observe(element);
            });
        });

    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            <?php
                $counter = 1;
                if (have_rows('home_sec3_weve_got_skills')) {
                    while (have_rows('home_sec3_weve_got_skills')) {
                        the_row();
                        $link = get_sub_field('button_link');
                        $imageUrl = get_sub_field('image');
            ?>

            var image<?php echo $counter; ?> = '<?php echo $imageUrl ? $imageUrl['url'] : ''; ?>';

            <?php
                    $counter++;
                    }
                }
                wp_reset_postdata();
                wp_reset_query();
            ?>

            $('.skill_img_1').attr('src', image1);

            $('#skill_2').hover(function() {
                $('.skill_img_1').attr('src', image2);
            }, function() {
                $('.skill_img_1').attr('src', image1);
            });

            $('#skill_3').hover(function() {
                $('.skill_img_1').attr('src', image3);
            }, function() {
                $('.skill_img_1').attr('src', image1);
            });
        });
    </script>

    <!-- Smooth scroll for hero arrow -->
    <script>
    jQuery(function($) {
        $('a[href="#sv-pillars"]').on('click', function(e) {
            e.preventDefault();
            var target = $(this.getAttribute('href'));
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 600);
            }
        });
    });
    </script>
