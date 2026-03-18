<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Proud_Brands
 */

?>
<?php
$showhide = get_field('contact_section_show_hide');
// Service pages have their own CTA + contact form — skip the footer CTA
if ( is_page_template('template-services.php') ) {
    $showhide = true;
}
// Quiz page is a focused single-task experience — no footer CTA
if ( is_page_template('template-branding-quiz.php') ) {
    $showhide = true;
}
if($showhide == false) {

    // ─── Contextual CTA: adapt heading/subtext/button per page ───
    $cta_heading  = '';
    $cta_subtext  = '';
    $cta_btn_text = '';
    $cta_btn_url  = '';
    $cta_secondary_text = 'See Our Work';
    $cta_secondary_url  = '/case-studies/';

    if ( is_singular('case_study') ) {
        $cta_heading  = get_field('cs_cta_heading');
        $cta_subtext  = get_field('cs_cta_subtext');
        $cta_btn_text = get_field('cs_cta_button_text');
        $cta_btn_url  = get_field('cs_cta_button_url');
        $cta_secondary_text = 'See more results';
        $cta_secondary_url  = get_post_type_archive_link('case_study');
    } elseif ( is_page_template('template-services.php') ) {
        $cta_heading  = 'Ready to grow?';
        $cta_subtext  = "Tell us where you are. We'll show you what's possible.";
        $cta_btn_text = 'Book a Free Consultation';
        $cta_btn_url  = '/contact/';
    } elseif ( is_page_template('template-seo-agency.php') ) {
        $cta_heading  = 'Ready to be found?';
        $cta_subtext  = "We'll audit your organic performance for free.";
        $cta_btn_text = 'Book Your Free Audit';
        $cta_btn_url  = '/contact/';
    }

    // Defaults for all other pages
    if ( empty($cta_heading) ) {
        $cta_heading  = "Let's build something that grows.";
        $cta_subtext  = 'AI automation. Organic search. Web design. Branding. Tell us where you need the most impact.';
        $cta_btn_text = 'Start a Project';
        $cta_btn_url  = '/contact/';
    }
?>
    <section class="pb-footer-cta">
        <div class="container">
            <div class="pb-footer-cta__inner text-center" data-aos="fade-up">
                <h2 class="pb-footer-cta__heading"><?php echo esc_html($cta_heading); ?></h2>
                <?php if ($cta_subtext) : ?>
                <p class="pb-footer-cta__subtext"><?php echo esc_html($cta_subtext); ?></p>
                <?php endif; ?>
                <div class="pb-footer-cta__actions">
                    <a href="<?php echo esc_url($cta_btn_url); ?>" class="pb-footer-cta__btn pb-footer-cta__btn--primary"><?php echo esc_html($cta_btn_text); ?></a>
                    <a href="<?php echo esc_url($cta_secondary_url); ?>" class="pb-footer-cta__btn pb-footer-cta__btn--secondary"><?php echo esc_html($cta_secondary_text); ?></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form Modal -->
    <div class="modal fade pb-contact-modal" id="pbContactModal" tabindex="-1" aria-labelledby="pbContactModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="pbContactModalLabel">Let's get started</h3>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php echo do_shortcode('[gravityform id="2" title="false" ajax="true"]'); ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
	<footer class="footer">
        <div class="container">
            <div class="footer_top">
                <!-- Col 1: Brand -->
                <div class="footer__brand">
                    <div class="ftr_logo">
                        <?php
                            $img = get_field('header_site_logo', 'options');
                            if ($img) {
                        ?>
                            <img class="logo-dark" width="201" height="61" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
                        <?php } else { ?>
                            <img class="logo-dark" width="201" height="61" src="<?php echo get_template_directory_uri() ?>/images/logo.webp" alt="logo">
                        <?php } ?>
                        <img class="logo-light" width="201" height="61" src="<?php echo get_template_directory_uri() ?>/light-theme-logo.png" alt="logo">
                    </div>
                    <p class="footer__tagline">One agency. Every angle covered.</p>
                </div>

                <!-- Col 2: Services -->
                <div class="footer__col">
                    <h3 class="footer__heading">Services</h3>
                    <ul class="footer__nav">
                        <li><a href="/ai-automation/">AI Automation</a></li>
                        <li><a href="/seo-agency-aylesbury/">Organic Search</a></li>
                        <li><a href="/web-design/">Web Design</a></li>
                        <li><a href="/branding-agency/">Branding</a></li>
                    </ul>
                </div>

                <!-- Col 3: Company -->
                <div class="footer__col">
                    <h3 class="footer__heading">Company</h3>
                    <ul class="footer__nav">
                        <li><a href="/about-us/">About Us</a></li>
                        <li><a href="/case-studies/">Case Studies</a></li>
                        <li><a href="/resources/">Resources</a></li>
                        <li><a href="/blog/">Blog</a></li>
                        <li><a href="/contact/">Contact</a></li>
                    </ul>
                </div>

                <!-- Col 4: Connect -->
                <div class="footer__col footer__connect">
                    <h3 class="footer__heading">Connect</h3>
                    <?php
                        $address = get_field('footer_address', 'options');
                        if ($address) {
                    ?>
                    <p class="footer__address"><?php echo $address; ?></p>
                    <?php }
                        $phonNo = get_field('footer_phone_number', 'options');
                        $emailadd = get_field('footer_email', 'options');
                    ?>
                    <?php if ($phonNo) { ?>
                    <p class="footer__contact-link"><a href="tel:<?php echo $phonNo; ?>"><?php echo $phonNo; ?></a></p>
                    <?php } ?>
                    <?php if ($emailadd) { ?>
                    <p class="footer__contact-link"><a href="mailto:<?php echo $emailadd; ?>"><?php echo $emailadd; ?></a></p>
                    <?php } ?>
                    <?php
                        $fblink = get_field('footer_facebook_link', 'options');
                        $twitlink = get_field('footer_twitter_link', 'options');
                        $linkdinlink = get_field('footer_linkedin_link', 'options');
                        $instagramlink = get_field('footer_instagram_link', 'options');
                        if ($fblink || $twitlink || $linkdinlink || $instagramlink) {
                    ?>
                    <ul class="footer__socials">
                        <?php if ($fblink) { ?>
                        <li><a target="_blank" href="<?php echo $fblink; ?>"><img width="28" height="28" src="<?php echo get_template_directory_uri() ?>/images/facebook.svg" alt="Facebook"></a></li>
                        <?php } if ($twitlink) { ?>
                        <li><a target="_blank" href="<?php echo $twitlink; ?>"><img width="28" height="28" src="<?php echo get_template_directory_uri() ?>/images/twitter_x.svg" alt="X (Twitter)"></a></li>
                        <?php } if ($linkdinlink) { ?>
                        <li><a target="_blank" href="<?php echo $linkdinlink; ?>"><img width="28" height="28" src="<?php echo get_template_directory_uri() ?>/images/linked_in.svg" alt="LinkedIn"></a></li>
                        <?php } if ($instagramlink) { ?>
                        <li><a target="_blank" href="<?php echo $instagramlink; ?>"><img width="28" height="28" src="<?php echo get_template_directory_uri() ?>/images/instagram.svg" alt="Instagram"></a></li>
                        <?php } ?>
                    </ul>
                    <?php } ?>
                </div>
            </div>

            <div class="footer_bottom">
                <div class="footer_bottom__left">
                    <p><?php echo get_field('footer_copyright_text', 'options'); ?></p>
                    <ol class="footer_bottom__legal">
                        <?php if ($company_number = get_field('company_number', 'options')) : ?>
                            <li>Company Number: <?php echo esc_html($company_number); ?></li>
                        <?php endif; ?>
                        <?php if ($vat_number = get_field('vat_number', 'options')) : ?>
                            <li>VAT Number: <?php echo esc_html($vat_number); ?></li>
                        <?php endif; ?>
                        <?php if ($privacyLink = get_field('privacy_policy', 'options')) :
                            $privacy_url = $privacyLink['url'];
                            $privacy_title = $privacyLink['title'];
                            $privacy_target = $privacyLink['target'] ?? '_self';
                        ?>
                            <li><a href="<?php echo esc_url($privacy_url); ?>" target="<?php echo esc_attr($privacy_target); ?>"><?php echo esc_html($privacy_title); ?></a></li>
                        <?php endif; ?>
                        <?php if ($cookieLink = get_field('cookie_policy', 'options')) :
                            $cookie_url = $cookieLink['url'];
                            $cookie_title = $cookieLink['title'];
                            $cookie_target = $cookieLink['target'] ?? '_self';
                        ?>
                            <li><a href="<?php echo esc_url($cookie_url); ?>" target="<?php echo esc_attr($cookie_target); ?>"><?php echo esc_html($cookie_title); ?></a></li>
                        <?php endif; ?>
                    </ol>
                </div>
                <div class="footer_bottom__right">
                    <?php $img1 = get_field('footer_members_image_1', 'options'); ?>
                    <?php if ($img1) { ?>
                        <img width="120" height="43" src="<?php echo $img1['url']; ?>" alt="Member badge">
                    <?php } ?>
                    <img class="logo-dark" width="144" height="48" src="<?php echo get_template_directory_uri(); ?>/images/fsb-logo-white.png" alt="FSB Member" style="object-fit:contain;">
                    <img class="logo-light" width="144" height="48" src="<?php echo get_template_directory_uri(); ?>/images/fsb-logo-dark.png" alt="FSB Member" style="object-fit:contain;">
                    <span id="back-to-top" title="Back to top">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="20" cy="20" r="19" stroke="#373737" stroke-width="2"/>
                            <path d="M14 22L20 16L26 22" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                </div>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>


    <script>
        jQuery(document).ready(function($) {
            // Initially hide the spinner
            $('#spinninggLoader').hide();

            $(document).on('click', '#loadMore', function(event){
                event.preventDefault();

                // Show the spinner when load more is clicked
                var $spinninggLoader = $('#spinninggLoader');
                $spinninggLoader.show();

                var totalPages = parseInt($(this).attr('total_Pages'));
                var currentPage = parseInt($(this).attr('current_Page'));
                var nextPage = parseInt($(this).attr('next_Page'));
                var $loadMoreBtn = $(this);

                $.ajax({
                    url: "<?php echo admin_url('admin-ajax.php'); ?>",
                    type: 'post',
                    data: {
                        action: 'ajax_pagination',
                        TotalPages: totalPages,
                        CurrentPage: currentPage,
                        NexxtPage: nextPage
                    },
                    success: function(data) {
                        // Simulate a delay if needed; remove setTimeout if not required
                        setTimeout(function(){
                            $('#loadMoreContent').append(data);
                            // Hide the spinner once data is loaded
                            $spinninggLoader.hide();

                            // If the next page equals or exceeds total pages, hide the load more container
                            if (nextPage >= totalPages) {
                                $('#viewMoreDriveDiv').hide();
                            }
                        }, 3000);

                        // Increase nextPage attribute for subsequent calls
                        nextPage++;
                        $loadMoreBtn.attr("next_Page", nextPage);
                    },
                    error: function() {
                        $spinninggLoader.hide();
                    }
                });
            });
        });

    </script>



 
    <script>
        jQuery(document).ready(function($) {
            // Initially hide the spinner
            $('#spinninggLoaderWork').hide();

            $(document).on('click', '#loadMoreWork', function(event){
                event.preventDefault();

                // Show the spinner when load more is clicked
                var $spinninggLoader = $('#spinninggLoaderWork');
                $spinninggLoader.show();

                var totalPages = parseInt($(this).attr('total_Pages'));
                var currentPage = parseInt($(this).attr('current_Page'));
                var nextPage = parseInt($(this).attr('next_Page'));
                // var existedPostsRaw = $(this).attr('existed_Posts');
                // var existedPosts = JSON.parse(existedPostsRaw.trim());
                var $loadMoreBtn = $(this);
                console.log('total page: '+totalPages);
                console.log('next page: '+nextPage);
                nextPage = nextPage+1;

                $.ajax({
                    url: "<?php echo admin_url('admin-ajax.php'); ?>",
                    type: 'post',
                    data: {
                        action: 'ajax_pagination_work',
                        TotalPages: totalPages,
                        CurrentPage: currentPage,
                        NexxtPage: nextPage,
                        //ExistedPosts: existedPosts
                    },
                    success: function(data) {
                        // Simulate a delay if needed; remove setTimeout if not required
                        setTimeout(function(){
                            $('#loadMoreContentWork').append(data);
                            // Hide the spinner once data is loaded
                            $spinninggLoader.hide();

                            // If the next page equals or exceeds total pages, hide the load more container
                            if (nextPage >= totalPages) {
                                $('#viewMoreDriveDivWork').hide();
                            }
                        }, 3000);

                        // Increase nextPage attribute for subsequent calls
                        nextPage++;
                        $loadMoreBtn.attr("next_Page", nextPage);
                    },
                    error: function() {
                        $spinninggLoader.hide();
                    }
                });
            });
        });

    </script>




    <script>
        jQuery(document).ready(function($) {
            // Initially hide the spinner
            $('#spinninggLoaderResource').hide();

            $(document).on('click', '#loadMoreResource', function(event){
                event.preventDefault();

                // Show the spinner when load more is clicked
                var $spinninggLoader = $('#spinninggLoaderResource');
                $spinninggLoader.show();

                var totalPages = parseInt($(this).attr('total_Pages'));
                var currentPage = parseInt($(this).attr('current_Page'));
                var nextPage = parseInt($(this).attr('next_Page'));
                var $loadMoreBtn = $(this);

                $.ajax({
                    url: "<?php echo admin_url('admin-ajax.php'); ?>",
                    type: 'post',
                    data: {
                        action: 'ajax_pagination_resc',
                        TotalPages: totalPages,
                        CurrentPage: currentPage,
                        NexxtPage: nextPage
                    },
                    success: function(data) {
                        // Simulate a delay if needed; remove setTimeout if not required
                        setTimeout(function(){
                            $('#loadmoreDivResource').append(data);
                            // Hide the spinner once data is loaded
                            $spinninggLoader.hide();

                            // If the next page equals or exceeds total pages, hide the load more container
                            if (nextPage >= totalPages) {
                                $('#viewMoreDriveDivResource').hide();
                            }
                        }, 3000);

                        // Increase nextPage attribute for subsequent calls
                        nextPage++;
                        $loadMoreBtn.attr("next_Page", nextPage);
                    },
                    error: function() {
                        $spinninggLoader.hide();
                    }
                });
            });
        });

    </script>

    <script>
            // Function to detect when the CSS file has been loaded
            function checkCSSLoad() {
                const cssLink = document.getElementById("banner-css");

                // Ensure the CSS file has been loaded by checking the link status
                if (cssLink.sheet) {
                    // Once the CSS file is loaded, hide the loader and show the content
                    document.querySelector('.site_loader').style.display = 'none';
                    document.querySelector('.site-content').style.display = 'block';
                } else {
                    // If the CSS is not loaded yet, keep checking after 100ms
                    setTimeout(checkCSSLoad, 100);
                }
            }

            // Start checking the CSS load when the page starts
            window.addEventListener('load', checkCSSLoad);
    </script>

    <?php if ( is_singular( 'case_study' ) ) :
        $cs_terms = get_the_terms( get_the_ID(), 'case_study_type' );
        $is_seo = ( $cs_terms && ! is_wp_error( $cs_terms ) && $cs_terms[0]->slug === 'organic-revenue' );
    ?>
        <?php if ( $is_seo ) : ?>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.7/dist/chart.umd.min.js"></script>
        <?php endif; ?>
        <?php
        // PDF Flipbook — only for Visual Identity with a brand book uploaded.
        $is_visual = ( $cs_terms && ! is_wp_error( $cs_terms ) && $cs_terms[0]->slug === 'visual-identity' );
        if ( $is_visual && get_field( 'cs_vi_brand_book' ) ) : ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
        <script src="https://unpkg.com/page-flip@2.0.7/dist/js/page-flip.browser.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/pdf-flipbook.js"></script>
        <?php endif; ?>
        <script src="<?php echo get_template_directory_uri(); ?>/js/case-studies.js"></script>
    <?php endif; ?>

    <?php if ( is_page_template( 'template-osof.php' ) ) : ?>
        <script src="<?php echo get_template_directory_uri(); ?>/js/osof.js"></script>
    <?php endif; ?>

    <script>
      // Jab back-to-top element par click ho
      document.getElementById("back-to-top").addEventListener("click", function () {
        window.scrollTo({
          top: 0,
          behavior: "smooth" // Smooth scroll karega
        });
      });
    </script>


</body>
</html>