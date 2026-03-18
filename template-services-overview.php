<?php
/*
Template Name: Services Overview
*/
get_header();

// ACF fields (images only)
$hero_image   = get_field('sv_hero_image');
$hero_video   = get_field('sv_hero_video');
$hero_is_video = get_field('sv_hero_media_type');
$ai_image     = get_field('sv_ai_image');
$search_image = get_field('sv_search_image');
$web_image    = get_field('sv_web_image');
$brand_image  = get_field('sv_brand_image');
?>


    <!-- ========== HERO ========== -->
    <section class="sv-hero">
        <?php if ($hero_is_video && $hero_video) : ?>
        <video class="sv-hero__bg-video" autoplay muted loop playsinline preload="auto">
            <source src="<?php echo esc_url($hero_video['url']); ?>" type="<?php echo esc_attr($hero_video['mime_type']); ?>">
        </video>
        <?php elseif ($hero_image) : ?>
        <div class="sv-hero__bg-image" style="background-image: url('<?php echo esc_url($hero_image['url']); ?>');"></div>
        <?php endif; ?>
        <div class="sv-hero__overlay"></div>
        <div class="container position-relative">
            <span class="sv-hero__label" data-aos="fade-up">What We Do</span>
            <h1 class="sv-hero__title" data-aos="fade-up" data-aos-delay="100">
                We grow brands.<br><strong>Four ways.</strong>
            </h1>
            <p class="sv-hero__descriptor" data-aos="fade-up" data-aos-delay="200">
                AI automation. Organic search. Web design. Branding.<br>
                One agency, every angle covered.
            </p>
            <a href="#sv-pillars" class="sv-hero__scroll" data-aos="fade-up" data-aos-delay="300">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="6 9 12 15 18 9"/>
                </svg>
            </a>
        </div>
    </section>


    <!-- ========== PILLAR CARDS ========== -->
    <section id="sv-pillars" class="sv-pillars">
        <div class="container">
            <div class="sv-pillars__grid">

                <!-- AI Automation -->
                <a href="#sv-ai" class="sv-pillar sv-pillar--ai" data-aos="fade-up">
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
                <a href="#sv-search" class="sv-pillar sv-pillar--search" data-aos="fade-up" data-aos-delay="100">
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
                <a href="#sv-web" class="sv-pillar sv-pillar--web" data-aos="fade-up" data-aos-delay="200">
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
                <a href="#sv-brand" class="sv-pillar sv-pillar--brand" data-aos="fade-up" data-aos-delay="300">
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


    <!-- ========== AI AUTOMATION DETAIL ========== -->
    <section id="sv-ai" class="sv-detail sv-detail--dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <span class="sv-detail__label sv-detail__label--ai">AI Automation</span>
                    <h2 class="sv-detail__title">Stop doing manually what machines can do instantly.</h2>
                    <div class="sv-detail__text">
                        <p>Every hour your team spends on manual processes is an hour not spent growing. We map your workflows, identify the friction, and build AI-powered automations that connect your tools, eliminate repetitive tasks, and free your team to focus on what actually moves the needle.</p>
                        <p>From CRM integrations to intelligent customer interactions, we build systems that scale without adding headcount.</p>
                    </div>
                    <ul class="sv-detail__features sv-detail__features--ai">
                        <li>Workflow mapping &amp; process automation</li>
                        <li>CRM &amp; system integration</li>
                        <li>AI-powered customer interactions</li>
                        <li>Repetitive task elimination</li>
                        <li>Data pipeline automation</li>
                    </ul>
                    <div class="sv-detail__stat">
                        <span class="sv-detail__stat-number counter" style="color:#2AB473;">73</span>
                        <span class="sv-detail__stat-suffix" style="color:#2AB473;">%</span>
                        <span class="sv-detail__stat-label">average time saved on automated processes</span>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <?php if ($ai_image) : ?>
                    <div class="sv-detail__image">
                        <img src="<?php echo esc_url($ai_image['url']); ?>" alt="<?php echo esc_attr($ai_image['alt']); ?>" width="600" height="500" loading="lazy" decoding="async">
                    </div>
                    <?php else : ?>
                    <div class="sv-detail__placeholder">Upload image in page editor</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>


    <!-- ========== ORGANIC SEARCH DETAIL ========== -->
    <section id="sv-search" class="sv-detail sv-detail--light">
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <div class="col-lg-6" data-aos="fade-left">
                    <span class="sv-detail__label sv-detail__label--search">Organic Search</span>
                    <h2 class="sv-detail__title">Visibility that compounds. Revenue that follows.</h2>
                    <div class="sv-detail__text">
                        <p>Most agencies chase rankings. We chase revenue. Our organic search strategy is built on a simple principle: if the content doesn't lead to a commercial outcome, it's not worth creating. We focus on the keywords that matter — the ones your ideal customers are typing in right before they buy.</p>
                        <p>SEO is the highest-ROI channel in digital marketing. We help you capture compounding returns that keep growing long after the initial investment.</p>
                    </div>
                    <ul class="sv-detail__features sv-detail__features--search">
                        <li>Commercial-intent SEO strategy</li>
                        <li>Local SEO &amp; Google Business Profile</li>
                        <li>Content strategy &amp; creation</li>
                        <li>Keyword &amp; topic architecture</li>
                        <li>E-commerce SEO</li>
                        <li>Link building &amp; off-site authority</li>
                    </ul>
                    <div class="sv-detail__stat">
                        <span class="sv-detail__stat-number counter" style="color:#8CC63F;">312</span>
                        <span class="sv-detail__stat-suffix" style="color:#8CC63F;">%</span>
                        <span class="sv-detail__stat-label">average organic traffic increase</span>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-right">
                    <?php if ($search_image) : ?>
                    <div class="sv-detail__image">
                        <img src="<?php echo esc_url($search_image['url']); ?>" alt="<?php echo esc_attr($search_image['alt']); ?>" width="600" height="500" loading="lazy" decoding="async">
                    </div>
                    <?php else : ?>
                    <div class="sv-detail__placeholder">Upload image in page editor</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>


    <!-- ========== WEB DESIGN DETAIL ========== -->
    <section id="sv-web" class="sv-detail sv-detail--dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <span class="sv-detail__label sv-detail__label--web">Web Design</span>
                    <h2 class="sv-detail__title">Your website should be your hardest-working employee.</h2>
                    <div class="sv-detail__text">
                        <p>A beautiful website that doesn't convert is just an expensive brochure. We design and build sites that are strategically structured to guide visitors toward action — whether that's filling out a form, making a purchase, or picking up the phone.</p>
                        <p>Every page, every section, every button placement is intentional. We combine brand-led design with performance engineering so your site looks premium and loads fast.</p>
                    </div>
                    <ul class="sv-detail__features sv-detail__features--web">
                        <li>Strategic website design &amp; build</li>
                        <li>Conversion rate optimisation</li>
                        <li>Mobile-first responsive development</li>
                        <li>WordPress CMS integration</li>
                        <li>Speed &amp; performance engineering</li>
                        <li>Ongoing support &amp; iteration</li>
                    </ul>
                    <div class="sv-detail__stat">
                        <span class="sv-detail__stat-number counter" style="color:#FBAF42;">2.4</span>
                        <span class="sv-detail__stat-suffix" style="color:#FBAF42;">&times;</span>
                        <span class="sv-detail__stat-label">average conversion rate improvement</span>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <?php if ($web_image) : ?>
                    <div class="sv-detail__image">
                        <img src="<?php echo esc_url($web_image['url']); ?>" alt="<?php echo esc_attr($web_image['alt']); ?>" width="600" height="500" loading="lazy" decoding="async">
                    </div>
                    <?php else : ?>
                    <div class="sv-detail__placeholder">Upload image in page editor</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>


    <!-- ========== BRANDING DETAIL ========== -->
    <section id="sv-brand" class="sv-detail sv-detail--light">
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <div class="col-lg-6" data-aos="fade-left">
                    <span class="sv-detail__label sv-detail__label--brand">Branding</span>
                    <h2 class="sv-detail__title">First impressions close deals before you open your mouth.</h2>
                    <div class="sv-detail__text">
                        <p>Your brand is the first thing people judge and the last thing they remember. A strong visual identity builds instant trust, commands higher prices, and makes every pound of marketing spend work harder.</p>
                        <p>We create complete brand systems — logo, typography, colour, tone of voice — that position you as the obvious choice in your market. Not just a logo. A visual language for growth.</p>
                    </div>
                    <ul class="sv-detail__features sv-detail__features--brand">
                        <li>Brand identity &amp; strategy</li>
                        <li>Logo design &amp; visual systems</li>
                        <li>Brand guidelines &amp; governance</li>
                        <li>Marketing collateral &amp; campaigns</li>
                        <li>Brand messaging &amp; tone of voice</li>
                        <li>Packaging &amp; environmental design</li>
                    </ul>
                    <div class="sv-detail__stat">
                        <span class="sv-detail__stat-number counter" style="color:#44C6EF;">89</span>
                        <span class="sv-detail__stat-suffix" style="color:#44C6EF;">%</span>
                        <span class="sv-detail__stat-label">of clients say their brand now attracts premium clients</span>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-right">
                    <?php if ($brand_image) : ?>
                    <div class="sv-detail__image">
                        <img src="<?php echo esc_url($brand_image['url']); ?>" alt="<?php echo esc_attr($brand_image['alt']); ?>" width="600" height="500" loading="lazy" decoding="async">
                    </div>
                    <?php else : ?>
                    <div class="sv-detail__placeholder">Upload image in page editor</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>


    <!-- ========== STATS BAR ========== -->
    <section class="sv-stats">
        <div class="sv-stats__accent"></div>
        <div class="container">
            <div class="sv-stats__grid">
                <div class="sv-stats__item" data-aos="fade-up">
                    <h3 class="sv-stats__number"><span class="counter">200</span>+</h3>
                    <p class="sv-stats__label">Projects Delivered</p>
                </div>
                <div class="sv-stats__item" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="sv-stats__number">&pound;<span class="counter">12</span>M+</h3>
                    <p class="sv-stats__label">Revenue Generated</p>
                </div>
                <div class="sv-stats__item" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="sv-stats__number"><span class="counter">10</span>+</h3>
                    <p class="sv-stats__label">Years in Business</p>
                </div>
                <div class="sv-stats__item" data-aos="fade-up" data-aos-delay="300">
                    <h3 class="sv-stats__number"><span class="counter">97</span>%</h3>
                    <p class="sv-stats__label">Client Retention</p>
                </div>
            </div>
        </div>
    </section>


    <!-- ========== CALENDLY POPUP ========== -->
    <section class="calendly_sec">
        <h6 class="close_clandely">X Close</h6>
        <div class="meetings-iframe-container" data-src="https://meetings-eu1.hubspot.com/sbrannon?embed=true"></div>
        <script type="text/javascript" src="https://static.hsappstatic.net/MeetingsEmbed/ex/MeetingsEmbedCode.js"></script>
    </section>


<?php get_footer(); ?>

    <!-- CounterUp Init -->
    <script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery(function() {
            "use strict";
            var counterUp = window.counterUp["default"];
            var $counters = jQuery(".counter");
            $counters.each(function(ignore, counter) {
                var waypoint = new Waypoint({
                    element: jQuery(this),
                    handler: function() {
                        counterUp(counter, { duration: 2000, delay: 16 });
                        this.destroy();
                    },
                    offset: 'bottom-in-view',
                });
            });
        });
    });
    </script>

    <!-- Book Meeting + Smooth Scroll -->
    <script>
    jQuery(function($) {
        $(".book_meeting").click(function() {
            $('body').addClass("open_clandely");
        });
        $(".close_clandely").click(function() {
            $('body').removeClass("open_clandely");
        });

        // Smooth scroll for anchor links
        $('a[href^="#sv-"]').on('click', function(e) {
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
