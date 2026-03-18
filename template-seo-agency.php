<?php
/*
Template Name: SEO Agency
*/
get_header();

// Pull hero image/video from existing ACF flexible content (preserves current media)
$sections = get_field('services_page_sections');
$hero_image = null;
$hero_video = null;
$hero_media_type = 'image';
if ($sections && isset($sections[0])) {
    $hero_media_type = $sections[0]['image_video'] ?? 'image';
    if (!empty($sections[0]['services_sec1_image'])) {
        $hero_image = $sections[0]['services_sec1_image'];
    }
    if (!empty($sections[0]['video'])) {
        $hero_video = $sections[0]['video'];
    }
}
?>

    <!-- ========== HERO ========== -->
    <section class="srvcs_bnr d-flex flex-wrap align-items-center">
        <div class="srvcs_bnrDes float-start w-100">
            <div class="srvcs_bnrDesRow float-end w-100 overflow-hidden">
                <h1>Found. Understood. <strong class="typing-effect">Chosen.</strong></h1>
                <p>Most Aylesbury businesses aren't losing customers because their product is wrong. They're losing them because the right people can't find them, don't understand what they do, or don't trust them enough to act.</p>
                <p>That's exactly what we fix &mdash; with a framework built to change all three.</p>
                <div class="seo-hero-btns d-flex flex-wrap gap-3">
                    <a class="secondary_btn book_meeting" href="javascript:void(0)">Book a Free Visibility Audit</a>
                    <a class="primary_btn" href="/seo-agency-aylesbury/#how-we-work">See How We Work
                        <svg width="27" height="12" viewBox="0 0 27 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M26.5303 6.53033C26.8232 6.23744 26.8232 5.76256 26.5303 5.46967L21.7574 0.696699C21.4645 0.403806 20.9896 0.403806 20.6967 0.696699C20.4038 0.989593 20.4038 1.46447 20.6967 1.75736L24.9393 6L20.6967 10.2426C20.4038 10.5355 20.4038 11.0104 20.6967 11.3033C20.9896 11.5962 21.4645 11.5962 21.7574 11.3033L26.5303 6.53033ZM0 6.75H26V5.25H0V6.75Z" fill="white"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="srvcs_bnrImg float-start w-100">
            <div class="srvcs_bnrImgRow float-start w-100">
                <?php if ($hero_media_type === 'video' && $hero_video && isset($hero_video['url'])) : ?>
                    <video autoplay muted loop playsinline preload="auto">
                        <source src="<?php echo esc_url($hero_video['url']); ?>" type="<?php echo esc_attr($hero_video['mime_type']); ?>">
                    </video>
                <?php elseif ($hero_image) : ?>
                    <picture>
                        <source media="(max-width: 767px)" srcset="<?php echo esc_url($hero_image['url']); ?>">
                        <source media="(min-width: 767px)" srcset="<?php echo esc_url($hero_image['url']); ?>">
                        <img aria-hidden="true" decoding="async" src="<?php echo esc_url($hero_image['url']); ?>" alt="<?php echo esc_attr($hero_image['alt']); ?>" width="916" height="484">
                    </picture>
                <?php endif; ?>
            </div>
        </div>
    </section>


    <!-- ========== CREDIBILITY HOOK ========== -->
    <section class="seo-credibility-sec">
        <div class="container">
            <div class="seo-credibility-inner">
                <h2>The SEO agency in Aylesbury that actually has a system.</h2>
                <p>Since 2014, we've been helping businesses across Buckinghamshire grow their online presence. In that time we've learned one thing above everything else: organic search isn't a tactic. It's a system.</p>
                <p class="seo-credibility-highlight">That's why we built <strong>OSOF</strong>.</p>
            </div>
        </div>
    </section>


    <!-- ========== OSOF INTRODUCTION ========== -->
    <section class="seo-osof-intro">
        <div class="container">
            <span class="seo-label">The Framework</span>
            <h2>Introducing OSOF &mdash; the Organic Search Engine Optimisation Framework.</h2>
            <p class="seo-osof-lead">OSOF is how every Proud Brands engagement works. It's not a set of generic SEO tasks. It's a complete, connected framework that aligns research, structure, content, reputation, and communication into one process &mdash; making your business easier to find, easier to understand, and easier to choose.</p>
            <p class="seo-osof-sub">Where most agencies chase rankings, OSOF focuses on three outcomes that actually build a business:</p>

            <div class="seo-pillars d-flex flex-wrap justify-content-center">
                <div class="seo-pillar">
                    <h3>Visibility</h3>
                    <p>Appearing where your customers search, compare, and decide.</p>
                </div>
                <div class="seo-pillar">
                    <h3>Clarity</h3>
                    <p>Communicating your value in language people and search systems can interpret correctly.</p>
                </div>
                <div class="seo-pillar">
                    <h3>Trust</h3>
                    <p>Building lasting credibility through consistent signals, genuine reviews, and responsive engagement.</p>
                </div>
            </div>

            <p class="seo-osof-result">The result is organic visibility that compounds over time. Not rankings that fluctuate when an algorithm changes.</p>
            <a class="primary_btn" href="/osof/">Learn More About OSOF
                <svg width="27" height="12" viewBox="0 0 27 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M26.5303 6.53033C26.8232 6.23744 26.8232 5.76256 26.5303 5.46967L21.7574 0.696699C21.4645 0.403806 20.9896 0.403806 20.6967 0.696699C20.4038 0.989593 20.4038 1.46447 20.6967 1.75736L24.9393 6L20.6967 10.2426C20.4038 10.5355 20.4038 11.0104 20.6967 11.3033C20.9896 11.5962 21.4645 11.5962 21.7574 11.3033L26.5303 6.53033ZM0 6.75H26V5.25H0V6.75Z" fill="black"/>
                </svg>
            </a>
        </div>
    </section>


    <!-- ========== OSOF SUB-FRAMEWORKS ========== -->
    <section class="seo-frameworks-sec">
        <div class="container">
            <span class="seo-label">Inside the System</span>
            <h2>Seven frameworks. One connected process.</h2>
            <p class="seo-frameworks-lead">OSOF isn't a black box. Here's what it covers and why each part matters.</p>

            <div class="seo-frameworks-grid">

                <div class="seo-framework-card">
                    <h3>Visibility Audit Framework</h3>
                    <p>The starting point of every engagement. We identify exactly where you're being missed across organic search, local listings, review platforms, and comparison results. You get a prioritised roadmap, not a vague list of suggestions.</p>
                </div>

                <div class="seo-framework-card">
                    <h3>Competitive Analysis Framework</h3>
                    <p>We benchmark your presence against the businesses dominating your market. Which competitors own the key searches? Why? Where are the gaps? Every strategy decision we make is grounded in real data.</p>
                </div>

                <div class="seo-framework-card">
                    <h3>Keyword Discovery Framework</h3>
                    <p>Beyond keyword lists. We map search intent to real customer situations: people learning about a problem, people comparing solutions, people ready to decide. We focus on commercial intent, local demand, and the searches that actually convert.</p>
                </div>

                <div class="seo-framework-card">
                    <h3>Content Framework</h3>
                    <p>We build a logical hierarchy of topics and pages that mirrors how your customers think and what your business needs to say. Every page is structured for clarity &mdash; short, purposeful paragraphs, strategic internal links, and writing that performs because it delivers value fast.</p>
                </div>

                <div class="seo-framework-card">
                    <h3>Content Format Framework</h3>
                    <p>Not every topic belongs in a blog post. We determine the right format for each subject &mdash; how-to guides, comparisons, service pages, explainers &mdash; so information lands with the right audience in the right way.</p>
                </div>

                <div class="seo-framework-card">
                    <h3>Community Engagement Framework</h3>
                    <p>We extend your visibility beyond your own website through authentic participation in the communities where your audience already seeks advice. This builds off-site signals and earns backlinks that reinforce your authority.</p>
                </div>

                <div class="seo-framework-card">
                    <h3>Review Strategy Framework</h3>
                    <p>We turn customer feedback into a trust asset. Monitoring where reviews appear, encouraging genuine responses, and handling negative feedback constructively &mdash; because how you respond is part of your brand.</p>
                </div>

            </div>
        </div>
    </section>


    <!-- ========== THREE SERVICE AREAS ========== -->
    <section class="seo-services-sec">
        <div class="container">
            <span class="seo-label">What We Do</span>
            <h2>OSOF is the engine. These are the vehicles.</h2>
            <p class="seo-services-lead">Organic search is the core of what we do &mdash; but it works best when brand and technology are aligned with it. That's why Proud Brands operates across three connected disciplines.</p>

            <div class="help_businesGrid seo-three-services w-100">

                <div class="help_businesBox d-flex flex-wrap flex-column">
                    <h3>Search &amp; Web</h3>
                    <p class="seo-service-tagline">Built to be found.</p>
                    <p>Your website shouldn't just exist. It should be working for you around the clock. We build fast, strategically structured websites and run OSOF across your entire online presence &mdash; so the right people find you, understand you, and contact you.</p>
                    <ul>
                        <li>Website design &amp; build</li>
                        <li>Organic SEO via OSOF</li>
                        <li>Local SEO &amp; Google Business Profile</li>
                        <li>E-commerce</li>
                        <li>Email marketing</li>
                        <li>Content strategy &amp; creation</li>
                    </ul>
                    <a class="primary_btn" href="/web-design/">Web &amp; SEO
                        <svg width="27" height="12" viewBox="0 0 27 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M26.5303 6.53033C26.8232 6.23744 26.8232 5.76256 26.5303 5.46967L21.7574 0.696699C21.4645 0.403806 20.9896 0.403806 20.6967 0.696699C20.4038 0.989593 20.4038 1.46447 20.6967 1.75736L24.9393 6L20.6967 10.2426C20.4038 10.5355 20.4038 11.0104 20.6967 11.3033C20.9896 11.5962 21.4645 11.5962 21.7574 11.3033L26.5303 6.53033ZM0 6.75H26V5.25H0V6.75Z" fill="white"/>
                        </svg>
                    </a>
                </div>

                <div class="help_businesBox d-flex flex-wrap flex-column">
                    <h3>Brand</h3>
                    <p class="seo-service-tagline">Built to be remembered.</p>
                    <p>Visibility gets people to your door. Brand is what makes them walk through it. We build identities that communicate quality and confidence &mdash; the kind that make customers choose you before they've spoken to you.</p>
                    <ul>
                        <li>Brand identity &amp; strategy</li>
                        <li>Visual design &amp; artwork</li>
                        <li>Brand guidelines</li>
                        <li>Advertising campaigns</li>
                    </ul>
                    <a class="primary_btn" href="/branding-agency/">Branding
                        <svg width="27" height="12" viewBox="0 0 27 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M26.5303 6.53033C26.8232 6.23744 26.8232 5.76256 26.5303 5.46967L21.7574 0.696699C21.4645 0.403806 20.9896 0.403806 20.6967 0.696699C20.4038 0.989593 20.4038 1.46447 20.6967 1.75736L24.9393 6L20.6967 10.2426C20.4038 10.5355 20.4038 11.0104 20.6967 11.3033C20.9896 11.5962 21.4645 11.5962 21.7574 11.3033L26.5303 6.53033ZM0 6.75H26V5.25H0V6.75Z" fill="white"/>
                        </svg>
                    </a>
                </div>

                <div class="help_businesBox d-flex flex-wrap flex-column">
                    <h3>AI &amp; Automation</h3>
                    <p class="seo-service-tagline">Built to scale.</p>
                    <p>Every hour your team spends on manual tasks is an hour not spent growing. We map your processes, introduce AI automation, and connect your website to the tools you already use &mdash; cutting waste, reducing errors, and freeing up your time.</p>
                    <ul>
                        <li>AI automation &amp; workflow integration</li>
                        <li>CRM &amp; system connectivity</li>
                        <li>Process mapping &amp; optimisation</li>
                        <li>Repetitive task elimination</li>
                    </ul>
                    <a class="primary_btn" href="/ai-automation/">AI &amp; Automation
                        <svg width="27" height="12" viewBox="0 0 27 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M26.5303 6.53033C26.8232 6.23744 26.8232 5.76256 26.5303 5.46967L21.7574 0.696699C21.4645 0.403806 20.9896 0.403806 20.6967 0.696699C20.4038 0.989593 20.4038 1.46447 20.6967 1.75736L24.9393 6L20.6967 10.2426C20.4038 10.5355 20.4038 11.0104 20.6967 11.3033C20.9896 11.5962 21.4645 11.5962 21.7574 11.3033L26.5303 6.53033ZM0 6.75H26V5.25H0V6.75Z" fill="white"/>
                        </svg>
                    </a>
                </div>

            </div>
        </div>
    </section>


    <!-- ========== HOW IT WORKS ========== -->
    <section class="how_build_sec" id="how-we-work">
        <div class="container">
            <div class="build_div w-100 float-start text-center">
                <span>The Process</span>
                <h2>How we start.</h2>

                <ul class="d-grid overflow-hidden">
                    <li>
                        <h3>Visibility Audit</h3>
                        <small>1</small>
                        <p>Before we recommend anything, we look at where you stand. We audit your organic presence across search, local listings, and review platforms, benchmark you against competitors, and hand you a prioritised roadmap. You'll know exactly what's holding you back and what to do about it.</p>
                    </li>
                    <li>
                        <h3>Build the Foundation</h3>
                        <small>2</small>
                        <p>We implement OSOF across your site &mdash; structuring content, resolving technical issues, and building the keyword and topic architecture your business needs to grow. If your brand or website needs work, we address that here too.</p>
                    </li>
                    <li>
                        <h3>Grow and Refine</h3>
                        <small>3</small>
                        <p>OSOF is an ongoing system, not a one-time project. Each month we track what's working, extend your content coverage, manage your review strategy, and build off-site authority. Organic visibility compounds &mdash; the longer the system runs, the harder it works.</p>
                    </li>
                </ul>

                <a class="secondary_btn book_meeting" href="javascript:void(0)">Book a Free Visibility Audit
                    <svg width="27" height="12" viewBox="0 0 27 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M26.5303 6.53033C26.8232 6.23744 26.8232 5.76256 26.5303 5.46967L21.7574 0.696699C21.4645 0.403806 20.9896 0.403806 20.6967 0.696699C20.4038 0.989593 20.4038 1.46447 20.6967 1.75736L24.9393 6L20.6967 10.2426C20.4038 10.5355 20.4038 11.0104 20.6967 11.3033C20.9896 11.5962 21.4645 11.5962 21.7574 11.3033L26.5303 6.53033ZM0 6.75H26V5.25H0V6.75Z" fill="white"/>
                        </svg>
                </a>
            </div>
        </div>

        <picture>
            <img aria-hidden="true" decoding="async" loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/web_bg.webp" alt="" width="1920" height="1070">
        </picture>
    </section>


    <!-- ========== LOCAL CREDIBILITY ========== -->
    <section class="seo-local-sec">
        <div class="container">
            <h2>Based in Aylesbury. Working across Buckinghamshire and beyond.</h2>
            <p>We're based at Market Square in Aylesbury and have been working with local businesses since 2014. We understand the Buckinghamshire market &mdash; the competitive landscape, the local search behaviour, and what it takes to stand out in it.</p>
            <p>Whether you're a specialist firm in the Vale, a service business covering the Home Counties, or an e-commerce brand looking to grow nationally &mdash; OSOF scales to where you want to go.</p>
        </div>
    </section>


    <!-- ========== CASE STUDIES ========== -->
    <section class="seo-cases-sec">
        <div class="container">
            <h2>Results that speak plainly.</h2>

            <div class="seo-cases-grid d-flex flex-wrap justify-content-center">
                <?php
                $case_studies = new WP_Query(array(
                    'post_type'      => 'case_study',
                    'posts_per_page' => 3,
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                ));

                if ($case_studies->have_posts()) :
                    while ($case_studies->have_posts()) : $case_studies->the_post();
                        $headline = get_field('cs_hero_headline');
                        $descriptor = get_field('cs_hero_descriptor');
                        $terms = get_the_terms(get_the_ID(), 'case_study_type');
                        $term_name = ($terms && !is_wp_error($terms)) ? $terms[0]->name : '';
                ?>
                    <a href="<?php the_permalink(); ?>" class="seo-case-card">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="seo-case-img">
                                <?php the_post_thumbnail('medium_large'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="seo-case-content">
                            <?php if ($term_name) : ?>
                                <span class="seo-case-tag"><?php echo esc_html($term_name); ?></span>
                            <?php endif; ?>
                            <h3><?php the_title(); ?></h3>
                            <?php if ($descriptor) : ?>
                                <p><?php echo esc_html($descriptor); ?></p>
                            <?php endif; ?>
                        </div>
                    </a>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    // Fallback static content if no case studies exist yet
                ?>
                    <div class="seo-case-card seo-case-static">
                        <div class="seo-case-content">
                            <h3>Bay Aggregates</h3>
                            <p>&pound;1.5 million in new revenue from organic search.</p>
                        </div>
                    </div>
                    <div class="seo-case-card seo-case-static">
                        <div class="seo-case-content">
                            <h3>Studywell</h3>
                            <p>Stable rankings. Accelerated growth.</p>
                        </div>
                    </div>
                    <div class="seo-case-card seo-case-static">
                        <div class="seo-case-content">
                            <h3>CT Courses</h3>
                            <p>Brand platform and visual identity.</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <div class="text-center" style="margin-top: 40px;">
                <a class="primary_btn" href="<?php echo get_post_type_archive_link('case_study') ?: '/case-studies/'; ?>">View All Case Studies
                    <svg width="27" height="12" viewBox="0 0 27 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M26.5303 6.53033C26.8232 6.23744 26.8232 5.76256 26.5303 5.46967L21.7574 0.696699C21.4645 0.403806 20.9896 0.403806 20.6967 0.696699C20.4038 0.989593 20.4038 1.46447 20.6967 1.75736L24.9393 6L20.6967 10.2426C20.4038 10.5355 20.4038 11.0104 20.6967 11.3033C20.9896 11.5962 21.4645 11.5962 21.7574 11.3033L26.5303 6.53033ZM0 6.75H26V5.25H0V6.75Z" fill="black"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>


    <!-- ========== FAQ ========== -->
    <section class="faq_sec">
        <div class="container">
            <h3>Frequently Asked Questions</h3>

            <div class="accordion faq_div w-100 float-start" id="seoFaqAccordion">

                <div class="accordion-item">
                    <h2 class="accordion-header" id="seoFaq1">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#seoFaqTab1" aria-expanded="true" aria-controls="seoFaqTab1">
                            How long does organic SEO take to show results?
                        </button>
                    </h2>
                    <div id="seoFaqTab1" class="accordion-collapse collapse show" aria-labelledby="seoFaq1" data-bs-parent="#seoFaqAccordion">
                        <div class="accordion-body">
                            <p>Typically 3&ndash;6 months for meaningful improvement, with stronger compounding results from 6&ndash;12 months onward. OSOF is built for long-term performance, not quick wins that fade.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="seoFaq2">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#seoFaqTab2" aria-expanded="false" aria-controls="seoFaqTab2">
                            What makes OSOF different from standard SEO?
                        </button>
                    </h2>
                    <div id="seoFaqTab2" class="accordion-collapse collapse" aria-labelledby="seoFaq2" data-bs-parent="#seoFaqAccordion">
                        <div class="accordion-body">
                            <p>Standard SEO usually means a list of tasks. OSOF is a connected system &mdash; research, content, structure, reputation, and community all working together. The difference shows up in results that hold.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="seoFaq3">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#seoFaqTab3" aria-expanded="false" aria-controls="seoFaqTab3">
                            Do I need all three service areas?
                        </button>
                    </h2>
                    <div id="seoFaqTab3" class="accordion-collapse collapse" aria-labelledby="seoFaq3" data-bs-parent="#seoFaqAccordion">
                        <div class="accordion-body">
                            <p>No. Some clients come to us purely for organic SEO. Others need brand and web alongside it. We'll tell you what your situation actually calls for, not what earns us the most.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="seoFaq4">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#seoFaqTab4" aria-expanded="false" aria-controls="seoFaqTab4">
                            Do you work with businesses outside Aylesbury?
                        </button>
                    </h2>
                    <div id="seoFaqTab4" class="accordion-collapse collapse" aria-labelledby="seoFaq4" data-bs-parent="#seoFaqAccordion">
                        <div class="accordion-body">
                            <p>Yes. While we're based in Aylesbury and work with a lot of Buckinghamshire businesses, OSOF works for any business with a website. We work with clients across the UK.</p>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="seoFaq5">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#seoFaqTab5" aria-expanded="false" aria-controls="seoFaqTab5">
                            What does a Visibility Audit involve?
                        </button>
                    </h2>
                    <div id="seoFaqTab5" class="accordion-collapse collapse" aria-labelledby="seoFaq5" data-bs-parent="#seoFaqAccordion">
                        <div class="accordion-body">
                            <p>We look at your organic search presence, local listings, review ecosystem, competitive landscape, and site structure. You get a clear, prioritised report &mdash; not a sales pitch.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- ========== CLOSING CTA ========== -->
    <section class="chat_book_sec seo-closing-cta">
        <div class="container">
            <div class="chat_book_div w-100 float-start text-center">
                <h2>Ready to be found, understood, and chosen?</h2>
                <p>Start with a free Visibility Audit. We'll show you exactly where you're being missed and what it would take to change that &mdash; no hard sell, just clear answers.</p>
                <ul>
                    <li><a class="secondary_btn book_meeting" href="javascript:void(0)">Book Your Free Visibility Audit</a></li>
                    <li><a class="secondary_btn" href="/contact/">Start Your Project</a></li>
                </ul>
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

    <script>
        jQuery(function($) {
            $(".book_meeting").click(function() {
                $('body').addClass("open_clandely");
            });
            $(".close_clandely").click(function() {
                $('body').removeClass("open_clandely");
            });
        });
    </script>
