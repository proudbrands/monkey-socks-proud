<?php
/*
Template Name: Services
*/
get_header();

if ( have_rows('services_page_sections') ) :
    while ( have_rows('services_page_sections') ) : the_row();
        $layout = get_row_layout();


        /* ═══════════════════════════════════════════
           1. HERO BANNER — description_button_link_image
           ═══════════════════════════════════════════ */
        if ( $layout === 'description_button_link_image' ) :
            $caption     = get_sub_field('services_sec1_caption');
            $heading     = get_sub_field('services_sec1_heading');
            $color_head  = get_sub_field('colorfull_heading');
            $description = get_sub_field('services_sec1_description');
            $btn_text    = get_sub_field('services_sec1_button_link');
            $media_type  = get_sub_field('image_video');
            $image       = get_sub_field('services_sec1_image');
            $video       = get_sub_field('services_sec1_video');
        ?>
        <section class="srvcs_bnr d-flex flex-wrap align-items-center">
            <div class="srvcs_bnrDes float-start w-100">
                <div class="srvcs_bnrDesRow float-end w-100 overflow-hidden">
                    <?php if ( $caption ) : ?><span><?php echo wp_kses_post( $caption ); ?></span><?php endif; ?>
                    <h1>
                        <?php echo wp_kses_post( $heading ); ?>
                        <?php if ( $color_head ) : ?>
                        <strong class="typing-effect"><?php echo wp_kses_post( $color_head ); ?></strong>
                        <?php endif; ?>
                    </h1>
                    <?php if ( $description ) : ?><p><?php echo wp_kses_post( $description ); ?></p><?php endif; ?>
                    <?php if ( $btn_text ) : ?>
                    <a class="secondary_btn book_meeting" href="javascript:void(0)"><?php echo wp_kses_post( $btn_text ); ?></a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="srvcs_bnrImg float-start w-100">
                <div class="srvcs_bnrImgRow float-start w-100">
                    <?php if ( $media_type === 'video' && $video ) : ?>
                        <video autoplay muted loop playsinline preload="auto">
                            <source src="<?php echo esc_url( $video['url'] ); ?>" type="<?php echo esc_attr( $video['mime_type'] ); ?>">
                        </video>
                    <?php elseif ( $image ) : ?>
                        <picture>
                            <source media="(max-width: 767px)" srcset="<?php echo esc_url( $image['url'] ); ?>">
                            <source media="(min-width: 767px)" srcset="<?php echo esc_url( $image['url'] ); ?>">
                            <img fetchpriority="high" aria-hidden="true" decoding="async" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ?? '' ); ?>" width="916" height="484">
                        </picture>
                    <?php endif; ?>
                </div>
            </div>
        </section>


        <?php /* ═══════════════════════════════════════════
           2. THREE-POINT GRID — heading_repeater_button_link
           ═══════════════════════════════════════════ */
        elseif ( $layout === 'heading_repeater_button_link' ) :
            $heading  = get_sub_field('services_sec2_heading');
            $points   = get_sub_field('services_sec2_business_thrive');
            $btn_text = get_sub_field('services_sec2_button_link');
            $subtext  = get_sub_field('services_sec2_text');
        ?>
        <section class="help_busines_sec">
            <div class="container">
                <?php if ( $heading ) : ?><h2><?php echo wp_kses_post( $heading ); ?></h2><?php endif; ?>
                <?php if ( $points ) : ?>
                <div class="help_businesGrid left_cntnt w-100">
                    <?php foreach ( $points as $point ) : ?>
                    <div class="help_businesBox d-flex flex-wrap flex-column">
                        <?php if ( ! empty( $point['image__icon'] ) ) : ?>
                        <img src="<?php echo esc_url( $point['image__icon']['url'] ); ?>" width="30" height="30" alt="">
                        <?php endif; ?>
                        <h3><?php echo wp_kses_post( $point['title'] ); ?></h3>
                        <p><?php echo wp_kses_post( $point['description'] ); ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <?php if ( $btn_text ) : ?>
                <div class="get_free_chat float-start w-100 text-center d-inline-flex gap-3 justify-content-center align-items-center">
                    <a class="primary_btn book_meeting" href="javascript:void(0)"><?php echo wp_kses_post( $btn_text ); ?>
                        <svg width="27" height="12" viewBox="0 0 27 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M26.5303 6.53033C26.8232 6.23744 26.8232 5.76256 26.5303 5.46967L21.7574 0.696699C21.4645 0.403806 20.9896 0.403806 20.6967 0.696699C20.4038 0.989593 20.4038 1.46447 20.6967 1.75736L24.9393 6L20.6967 10.2426C20.4038 10.5355 20.4038 11.0104 20.6967 11.3033C20.9896 11.5962 21.4645 11.5962 21.7574 11.3033L26.5303 6.53033ZM0 6.75H26V5.25H0V6.75Z" fill="black"/>
                        </svg>
                    </a>
                    <?php if ( $subtext ) : ?><p><?php echo wp_kses_post( $subtext ); ?></p><?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
        </section>


        <?php /* ═══════════════════════════════════════════
           3. EXPERT / INTRO — heading_left_decription_right_description
           ═══════════════════════════════════════════ */
        elseif ( $layout === 'heading_left_decription_right_description' ) :
            $caption    = get_sub_field('services_sec3_caption');
            $heading    = get_sub_field('services_sec3_heading');
            $color_head = get_sub_field('services_sec3_colorfull_heading');
            $left_desc  = get_sub_field('services_sec3_left_description');
            $right_desc = get_sub_field('services_sec3_right_description');
        ?>
        <section class="s_desgn_exprt_sec">
            <div class="container">
                <h2>
                    <?php if ( $caption ) : ?><span><?php echo wp_kses_post( $caption ); ?></span><?php endif; ?>
                    <?php echo wp_kses_post( $heading ); ?>
                    <?php if ( $color_head ) : ?>
                    <br/> <strong><?php echo wp_kses_post( $color_head ); ?></strong>
                    <?php endif; ?>
                </h2>
                <div class="s_desgn_exprtGrid d-grid align-items-start w-100">
                    <div class="s_desgn_exprt_left d-grid gap-3 w-100">
                        <?php echo wp_kses_post( $left_desc ); ?>
                    </div>
                    <div class="s_desgn_exprt_des d-grid w-100">
                        <?php echo wp_kses_post( $right_desc ); ?>
                    </div>
                </div>
            </div>
        </section>


        <?php /* ═══════════════════════════════════════════
           4. TWO-COLUMN ALTERNATING — repeater_video_text_button_link
           ═══════════════════════════════════════════ */
        elseif ( $layout === 'repeater_video_text_button_link' ) :
            $vid_first   = get_sub_field('services_sec4_video_image_first');
            $yt_or_webm  = get_sub_field('youtube_or_webm_video');
            $heading     = get_sub_field('services_sec4_heading');
            $description = get_sub_field('services_sec4_description');
            $btn_text    = get_sub_field('services_sec4_button_link');
        ?>
        <section class="website_dif_sec<?php if ( ! $vid_first ) { echo ' website_dif_sec_pb'; } ?>">
            <div class="container">
                <div class="website_dif_grid d-grid">
                    <?php
                        $counter = 1;
                        if ( have_rows('services_sec4_points') ) :
                            while ( have_rows('services_sec4_points') ) : the_row();
                                $img = get_sub_field('image');
                    ?>
                    <div class="website_dif_left <?php if ( $counter == 2 ) { echo 'website_dif_rgt'; } ?> w-100">
                        <?php if ( $counter == 2 ) : ?>
                            <?php if ( $img ) : ?>
                            <picture>
                                <source media="(max-width: 767px)" srcset="<?php echo esc_url( $img['url'] ); ?>">
                                <source media="(min-width: 767px)" srcset="<?php echo esc_url( $img['url'] ); ?>">
                                <img aria-hidden="true" decoding="async" src="<?php echo esc_url( $img['url'] ); ?>" alt="<?php echo esc_attr( $img['alt'] ?? '' ); ?>" width="592" height="537">
                            </picture>
                            <?php endif; ?>
                            <?php echo wp_kses_post( get_sub_field('description') ); ?>
                        <?php else : ?>
                            <?php echo wp_kses_post( get_sub_field('description') ); ?>
                            <?php if ( $img ) : ?>
                            <picture>
                                <source media="(max-width: 767px)" srcset="<?php echo esc_url( $img['url'] ); ?>">
                                <source media="(min-width: 767px)" srcset="<?php echo esc_url( $img['url'] ); ?>">
                                <img aria-hidden="true" decoding="async" src="<?php echo esc_url( $img['url'] ); ?>" alt="<?php echo esc_attr( $img['alt'] ?? '' ); ?>" width="592" height="537">
                            </picture>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <?php
                                $counter++;
                            endwhile;
                        endif;
                    ?>
                </div>
            </div>
        </section>

        <?php if ( $vid_first ) : ?>
        <section class="s_video_frame">
            <div class="container">
                <a id="videoText" class="position-relative" href="#">
                    <picture>
                        <source media="(max-width: 767px)" srcset="<?php echo esc_url( $vid_first['url'] ); ?>">
                        <source media="(min-width: 767px)" srcset="<?php echo esc_url( $vid_first['url'] ); ?>">
                        <img aria-hidden="true" decoding="async" src="<?php echo esc_url( $vid_first['url'] ); ?>" alt="<?php echo esc_attr( $vid_first['alt'] ?? '' ); ?>" width="1439" height="673">
                    </picture>
                    <span id="playButton" class="circle_btn position-absolute top-50 start-50 translate-middle">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/circled_play.webp" alt="circled play" width="124" height="124">
                    </span>
                </a>

                <?php
                if ( $yt_or_webm === 'youtube' ) :
                    $vid = get_sub_field('services_sec4_video');
                    if ( $vid ) :
                ?>
                <div class="video_player w-100 float-start" id="videoPlayer" style="display: none;">
                    <iframe id="youtubeIframe" width="560" height="315" src="<?php echo esc_url( $vid ); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <?php
                    endif;
                elseif ( $yt_or_webm === 'webm' ) :
                    $webm_video = get_sub_field('webm_video');
                    if ( $webm_video && isset( $webm_video['url'] ) ) :
                ?>
                <div class="video_player w-100 float-start" id="videoPlayer02" style="display: none;">
                    <video autoplay muted loop playsinline preload="auto">
                        <source src="<?php echo esc_url( $webm_video['url'] ); ?>" type="<?php echo esc_attr( $webm_video['mime_type'] ); ?>">
                    </video>
                </div>
                <?php
                    endif;
                endif;
                ?>
            </div>
        </section>
        <?php endif; ?>

        <section class="butfl_wbste_sec text-center">
            <div class="container">
                <?php if ( $heading ) : ?><h2><?php echo wp_kses_post( $heading ); ?></h2><?php endif; ?>
                <?php if ( $description ) : ?><p><?php echo wp_kses_post( $description ); ?></p><?php endif; ?>
                <?php if ( $btn_text ) : ?>
                <a class="primary_btn book_meeting" href="javascript:void(0)"><?php echo wp_kses_post( $btn_text ); ?>
                    <svg width="27" height="12" viewBox="0 0 27 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M26.5303 6.53033C26.8232 6.23744 26.8232 5.76256 26.5303 5.46967L21.7574 0.696699C21.4645 0.403806 20.9896 0.403806 20.6967 0.696699C20.4038 0.989593 20.4038 1.46447 20.6967 1.75736L24.9393 6L20.6967 10.2426C20.4038 10.5355 20.4038 11.0104 20.6967 11.3033C20.9896 11.5962 21.4645 11.5962 21.7574 11.3033L26.5303 6.53033ZM0 6.75H26V5.25H0V6.75Z" fill="white"/>
                    </svg>
                </a>
                <?php endif; ?>
            </div>
        </section>


        <?php /* ═══════════════════════════════════════════
           4b. VARIANT — description_image_repeater_video_text_button_link
           ═══════════════════════════════════════════ */
        elseif ( $layout === 'description_image_repeater_video_text_button_link' ) :
            $vid_first   = get_sub_field('services_sec4_video_image_first');
            $desc1       = get_sub_field('services_sec4_description1');
            $image1      = get_sub_field('services_sec4_image1');
            $text        = get_sub_field('services_sec4_text');
            $video1      = get_sub_field('services_sec4_video1');
            $heading1    = get_sub_field('services_sec4_heading1');
            $short_desc  = get_sub_field('services_sec4_short_description');
            $btn_link    = get_sub_field('services_sec4_button_link1');
        ?>
        <section class="website_dif_sec website_dif_sec2<?php if ( ! $vid_first ) { echo ' website_dif_sec_pb'; } ?>">
            <div class="container">
                <div class="website_dif_grid d-grid">
                    <div class="website_dif_left w-100">
                        <?php if ( $desc1 ) echo wp_kses_post( $desc1 ); ?>
                    </div>
                    <?php if ( $image1 ) : ?>
                    <div class="website_dif_rgt w-100">
                        <picture>
                            <source media="(max-width: 767px)" srcset="<?php echo esc_url( $image1['url'] ); ?>">
                            <source media="(min-width: 767px)" srcset="<?php echo esc_url( $image1['url'] ); ?>">
                            <img aria-hidden="true" decoding="async" src="<?php echo esc_url( $image1['url'] ); ?>" alt="<?php echo esc_attr( $image1['alt'] ?? '' ); ?>" width="781" height="569">
                        </picture>
                    </div>
                    <?php endif; ?>
                </div>

                <?php if ( $text ) : ?>
                <div class="top_des w-100 float-start text-center">
                    <p><?php echo wp_kses_post( $text ); ?></p>
                </div>
                <?php endif; ?>

                <?php if ( have_rows('services_sec4_points1') ) : ?>
                <div class="help_businesGrid digital_box w-100">
                    <?php while ( have_rows('services_sec4_points1') ) : the_row();
                        $img = get_sub_field('image');
                    ?>
                    <div class="help_businesBox d-flex flex-wrap text-center align-items-center flex-column">
                        <?php if ( $img ) : ?>
                        <img src="<?php echo esc_url( $img['url'] ); ?>" width="30" height="30" alt="<?php echo esc_attr( $img['alt'] ?? '' ); ?>">
                        <?php endif; ?>
                        <h3><?php echo wp_kses_post( get_sub_field('heading') ); ?></h3>
                        <p><?php echo wp_kses_post( get_sub_field('description') ); ?></p>
                    </div>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>

            </div>
        </section>

        <?php if ( $vid_first ) : ?>
        <section class="s_video_frame">
            <div class="container">
                <a id="videoText" class="position-relative" href="#">
                    <?php
                        $vid_second_img = get_sub_field('services_sec4_video_image_second');
                        if ( $vid_second_img ) :
                    ?>
                    <picture>
                        <source media="(max-width: 767px)" srcset="<?php echo esc_url( $vid_second_img['url'] ); ?>">
                        <source media="(min-width: 767px)" srcset="<?php echo esc_url( $vid_second_img['url'] ); ?>">
                        <img aria-hidden="true" decoding="async" src="<?php echo esc_url( $vid_second_img['url'] ); ?>" alt="<?php echo esc_attr( $vid_second_img['alt'] ?? '' ); ?>" width="1439" height="673">
                    </picture>
                    <?php endif; ?>
                    <span id="playButton" class="circle_btn position-absolute top-50 start-50 translate-middle">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/circled_play.webp" alt="circled play" width="124" height="124">
                    </span>
                </a>

                <?php if ( $video1 ) : ?>
                <div class="video_player w-100 float-start" id="videoPlayer" style="display: none;">
                    <iframe id="youtubeIframe" width="560" height="315" src="<?php echo esc_url( $video1 ); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <?php endif; ?>
            </div>
        </section>
        <?php endif; ?>

        <section class="butfl_wbste_sec text-center">
            <div class="container">
                <?php if ( $heading1 ) : ?><h2><?php echo wp_kses_post( $heading1 ); ?></h2><?php endif; ?>
                <?php if ( $short_desc ) : ?><p><?php echo wp_kses_post( $short_desc ); ?></p><?php endif; ?>
                <?php if ( $btn_link ) : ?>
                <a class="primary_btn book_meeting" href="javascript:void(0)"><?php echo wp_kses_post( $btn_link ); ?>
                    <svg width="27" height="12" viewBox="0 0 27 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M26.5303 6.53033C26.8232 6.23744 26.8232 5.76256 26.5303 5.46967L21.7574 0.696699C21.4645 0.403806 20.9896 0.403806 20.6967 0.696699C20.4038 0.989593 20.4038 1.46447 20.6967 1.75736L24.9393 6L20.6967 10.2426C20.4038 10.5355 20.4038 11.0104 20.6967 11.3033C20.9896 11.5962 21.4645 11.5962 21.7574 11.3033L26.5303 6.53033ZM0 6.75H26V5.25H0V6.75Z" fill="white"/>
                    </svg>
                </a>
                <?php endif; ?>
            </div>
        </section>


        <?php /* ═══════════════════════════════════════════
           5. TABS — caption_heading_desc_tabs
           ═══════════════════════════════════════════ */
        elseif ( $layout === 'caption_heading_desc_tabs' ) :
            $caption     = get_sub_field('services_sec5_caption');
            $heading     = get_sub_field('services_sec5_heading');
            $color_head  = get_sub_field('services_sec5_colorfull_heading');
            $description = get_sub_field('services_sec5_description');
            $tabs        = get_sub_field('services_sec5_tabs');
        ?>
        <section class="range_sec">
            <div class="container">
                <div class="range_content w-100 float-start">
                    <?php if ( $caption ) : ?><span><?php echo wp_kses_post( $caption ); ?></span><?php endif; ?>
                    <h2><?php echo wp_kses_post( $heading ); ?>
                        <?php if ( $color_head ) : ?><strong><?php echo wp_kses_post( $color_head ); ?></strong><?php endif; ?>
                    </h2>
                    <?php if ( $description ) : ?><p><?php echo wp_kses_post( $description ); ?></p><?php endif; ?>
                </div>

                <?php if ( $tabs ) : ?>
                <div class="range_tabs w-100 float-start d-grid">
                    <div class="tabs_title w-100 float-start">
                        <ul class="d-none d-lg-block" id="myTab" role="tablist">
                            <?php foreach ( $tabs as $t => $tab ) : ?>
                            <li>
                                <a class="<?php echo $t === 0 ? 'active' : ''; ?>" id="home-tab<?php echo $t + 1; ?>" data-bs-toggle="tab" href="#home_<?php echo $t + 1; ?>" role="tab" aria-controls="home" aria-selected="true"><?php echo wp_kses_post( $tab['tab'] ); ?></a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="select-style-Main d-lg-none">
                            <div class="select-style">
                                <select id="select-box2" class="selectboxlive">
                                    <?php foreach ( $tabs as $t => $tab ) : ?>
                                    <option value="<?php echo $t + 1; ?>"><?php echo wp_kses_post( $tab['tab'] ); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content tabs_des" id="myTabContent">
                        <?php foreach ( $tabs as $t => $tab ) :
                            $tab_slug = sanitize_title( $tab['tab'] );
                        ?>
                        <div class="tab-pane fade <?php echo $t === 0 ? 'show active' : ''; ?>" id="home_<?php echo $t + 1; ?>" data-tab-slug="<?php echo esc_attr( $tab_slug ); ?>" role="tabpanel" aria-labelledby="home-tab<?php echo $t + 1; ?>">
                            <span id="<?php echo esc_attr( $tab_slug ); ?>" class="tab-anchor"></span>
                            <h5><?php echo wp_kses_post( $tab['heading'] ?? $tab['tab'] ); ?></h5>
                            <p><?php echo wp_kses_post( $tab['description'] ); ?></p>
                            <?php if ( ! empty( $tab['image'] ) ) : ?>
                            <img aria-hidden="true" decoding="async" loading="lazy" src="<?php echo esc_url( $tab['image']['url'] ); ?>" alt="<?php echo esc_attr( $tab['image']['alt'] ?? '' ); ?>" width="880" height="280">
                            <?php endif; ?>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </section>


        <?php /* ═══════════════════════════════════════════
           6. STATS / PORTFOLIO SLIDER — caption_heading_slider_points_description
           ═══════════════════════════════════════════ */
        elseif ( $layout === 'caption_heading_slider_points_description' ) :
            $caption      = get_sub_field('services_sec6_caption');
            $heading      = get_sub_field('services_sec6_heading');
            $color_head   = get_sub_field('services_sec6_colorfull_heading');
            $images       = get_sub_field('services_sec6_project_images');
            $client_name  = get_sub_field('services_sec6_client_name');
            $specs        = get_sub_field('services_sec6_specification');
            $bot_heading  = get_sub_field('services_sec6_bottom_heading');
            $bot_desc     = get_sub_field('services_sec6_description');
            $bot_btn      = get_sub_field('services_sec6_button_link');
        ?>
        <section class="year_bldng_sec">
            <div class="container">
                <h2>
                    <?php if ( $caption ) : ?><span><?php echo wp_kses_post( $caption ); ?></span><?php endif; ?>
                    <?php echo wp_kses_post( $heading ); ?>
                    <?php if ( $color_head ) : ?><strong><?php echo wp_kses_post( $color_head ); ?></strong><?php endif; ?>
                </h2>

                <?php if ( $images ) : ?>
                <div class="year_bldngSlder float-start w-100 text-center overflow-hidden">
                    <div class="swiper year_bldngSlderDiv float-start w-100 position-relative">
                        <div class="swiper-wrapper">
                            <?php foreach ( $images as $img ) :
                                $img_url = is_array($img) ? $img['url'] : $img;
                            ?>
                            <div class="swiper-slide">
                                <div class="year_bldngSlide mx-auto w-100 text-center">
                                    <picture>
                                        <source media="(max-width: 767px)" srcset="<?php echo esc_url( $img_url ); ?>">
                                        <source media="(min-width: 767px)" srcset="<?php echo esc_url( $img_url ); ?>">
                                        <img aria-hidden="true" decoding="async" loading="lazy" src="<?php echo esc_url( $img_url ); ?>" alt="" width="1010" height="673">
                                    </picture>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="swiper-button-next">
                            <svg width="27" height="12" viewBox="0 0 27 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M26.5303 6.53033C26.8232 6.23744 26.8232 5.76256 26.5303 5.46967L21.7574 0.696699C21.4645 0.403806 20.9896 0.403806 20.6967 0.696699C20.4038 0.989593 20.4038 1.46447 20.6967 1.75736L24.9393 6L20.6967 10.2426C20.4038 10.5355 20.4038 11.0104 20.6967 11.3033C20.9896 11.5962 21.4645 11.5962 21.7574 11.3033L26.5303 6.53033ZM0 6.75H26V5.25H0V6.75Z" fill="white"/></svg>
                        </div>
                        <div class="swiper-button-prev">
                            <svg width="27" height="12" viewBox="0 0 27 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M26.5303 6.53033C26.8232 6.23744 26.8232 5.76256 26.5303 5.46967L21.7574 0.696699C21.4645 0.403806 20.9896 0.403806 20.6967 0.696699C20.4038 0.989593 20.4038 1.46447 20.6967 1.75736L24.9393 6L20.6967 10.2426C20.4038 10.5355 20.4038 11.0104 20.6967 11.3033C20.9896 11.5962 21.4645 11.5962 21.7574 11.3033L26.5303 6.53033ZM0 6.75H26V5.25H0V6.75Z" fill="white"/></svg>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <?php if ( $client_name || $specs ) : ?>
                <div class="clnt_suces float-start w-100 text-center">
                    <?php if ( $client_name ) : ?>
                    <h3><span>Client Success:</span> <?php echo wp_kses_post( $client_name ); ?></h3>
                    <?php endif; ?>
                    <?php if ( $specs ) : ?>
                    <div class="clnt_suces_grid d-flex w-100">
                        <?php foreach ( $specs as $spec ) : ?>
                        <div class="clnt_sucesBx d-flex flex-wrap flex-column w-100">
                            <span><?php echo wp_kses_post( $spec['title'] ); ?></span>
                            <h4 class="counter"><?php echo wp_kses_post( $spec['percentage'] ); ?></h4>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>

                <?php if ( $bot_heading || $bot_desc ) : ?>
                <div class="year_bldngDes float-start w-100 text-center">
                    <?php if ( $bot_heading ) : ?><h3><?php echo wp_kses_post( $bot_heading ); ?></h3><?php endif; ?>
                    <?php if ( $bot_desc ) : ?><p><?php echo wp_kses_post( $bot_desc ); ?></p><?php endif; ?>
                    <?php if ( $bot_btn ) : ?>
                    <a class="secondary_btn book_meeting" href="javascript:void(0)"><?php echo wp_kses_post( $bot_btn ); ?>
                        <svg width="27" height="12" viewBox="0 0 27 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M26.5303 6.53033C26.8232 6.23744 26.8232 5.76256 26.5303 5.46967L21.7574 0.696699C21.4645 0.403806 20.9896 0.403806 20.6967 0.696699C20.4038 0.989593 20.4038 1.46447 20.6967 1.75736L24.9393 6L20.6967 10.2426C20.4038 10.5355 20.4038 11.0104 20.6967 11.3033C20.9896 11.5962 21.4645 11.5962 21.7574 11.3033L26.5303 6.53033ZM0 6.75H26V5.25H0V6.75Z" fill="white"/></svg>
                    </a>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
        </section>


        <?php /* ═══════════════════════════════════════════
           7. FEATURES GRID WITH BG IMAGE — caption_heading_desc_repeater
           ═══════════════════════════════════════════ */
        elseif ( $layout === 'caption_heading_desc_repeater' ) :
            $caption     = get_sub_field('services_sec7_caption');
            $heading1    = get_sub_field('services_sec7_heading_1');
            $heading2    = get_sub_field('services_sec7_heading_2');
            $description = get_sub_field('services_sec7_description');
            $points      = get_sub_field('services_sec7_points');
        ?>
        <section class="web_work_sec position-relative">
            <div class="container">
                <div class="web_div w-100 float-start text-center">
                    <?php if ( $caption ) : ?><span><?php echo wp_kses_post( $caption ); ?></span><?php endif; ?>
                    <?php if ( $heading1 ) : ?><h2><?php echo wp_kses_post( $heading1 ); ?></h2><?php endif; ?>
                    <?php if ( $heading2 ) : ?><h3><?php echo wp_kses_post( $heading2 ); ?></h3><?php endif; ?>
                    <?php if ( $description ) : ?><p><?php echo wp_kses_post( $description ); ?></p><?php endif; ?>
                    <?php if ( $points ) : ?>
                    <ul>
                        <?php foreach ( $points as $point ) : ?>
                        <li>
                            <h4><?php echo wp_kses_post( $point['title'] ); ?></h4>
                            <p><?php echo wp_kses_post( $point['description'] ); ?></p>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
            <picture>
                <img aria-hidden="true" decoding="async" loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/web_bg.webp" alt="web image" width="1920" height="1070">
            </picture>
        </section>


        <?php /* ═══════════════════════════════════════════
           8a. PROCESS STEPS (DARK) — caption_heading_repeater_link_black
           ═══════════════════════════════════════════ */
        elseif ( $layout === 'caption_heading_repeater_link_black' ) :
            $caption    = get_sub_field('services_sec8_caption');
            $heading    = get_sub_field('services_sec8_heading');
            $color_head = get_sub_field('services_sec8_colorfull_heading');
            $points     = get_sub_field('services_sec8_points');
            $btn_link   = get_sub_field('services_sec8_button_link');
        ?>
        <section class="build_sec pb-0" style="background-color: #151515 ;">
            <div class="container">
                <div class="build_div w-100 float-start text-center pb-0">
                    <?php if ( $caption ) : ?><span><?php echo wp_kses_post( $caption ); ?></span><?php endif; ?>
                    <h2><?php echo wp_kses_post( $heading ); ?>
                        <?php if ( $color_head ) : ?><strong><?php echo wp_kses_post( $color_head ); ?></strong><?php endif; ?>
                    </h2>
                    <?php if ( $points ) : ?>
                    <ul class="d-grid overflow-hidden">
                        <?php foreach ( $points as $i => $point ) : ?>
                        <li id="<?php echo esc_attr( sanitize_title( $point['title'] ) ); ?>">
                            <h3><?php echo wp_kses_post( $point['title'] ); ?></h3>
                            <small><?php echo $i + 1; ?></small>
                            <p><?php echo wp_kses_post( $point['description'] ); ?></p>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                    <?php if ( $btn_link ) : ?>
                    <a class="secondary_btn" href="<?php echo esc_url( is_array($btn_link) ? $btn_link['url'] : '#' ); ?>" <?php echo ( is_array($btn_link) && ! empty($btn_link['target']) ) ? 'target="' . esc_attr($btn_link['target']) . '"' : ''; ?>>
                        <?php echo wp_kses_post( is_array($btn_link) ? $btn_link['title'] : $btn_link ); ?>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </section>


        <?php /* ═══════════════════════════════════════════
           8b. PROCESS STEPS (STANDARD) — caption_heading_repeater_link_white
           ═══════════════════════════════════════════ */
        elseif ( $layout === 'caption_heading_repeater_link_white' ) :
            $caption    = get_sub_field('services_sec8_caption');
            $heading    = get_sub_field('services_sec8_heading');
            $color_head = get_sub_field('services_sec8_colorfull_heading');
            $points     = get_sub_field('services_sec8_points');
            $btn_link   = get_sub_field('services_sec8_button_link');
        ?>
        <section class="how_build_sec">
            <div class="container">
                <div class="build_div w-100 float-start text-center">
                    <?php if ( $caption ) : ?><span><?php echo wp_kses_post( $caption ); ?></span><?php endif; ?>
                    <h2><?php echo wp_kses_post( $heading ); ?>
                        <?php if ( $color_head ) : ?><strong><?php echo wp_kses_post( $color_head ); ?></strong><?php endif; ?>
                    </h2>
                    <?php if ( $points ) : ?>
                    <ul class="d-grid overflow-hidden">
                        <?php foreach ( $points as $i => $point ) : ?>
                        <li id="<?php echo esc_attr( sanitize_title( $point['title'] ) ); ?>">
                            <h3><?php echo wp_kses_post( $point['title'] ); ?></h3>
                            <small><?php echo $i + 1; ?></small>
                            <p><?php echo wp_kses_post( $point['description'] ); ?></p>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                    <?php if ( $btn_link ) : ?>
                    <a class="secondary_btn" href="<?php echo esc_url( is_array($btn_link) ? $btn_link['url'] : '#' ); ?>" <?php echo ( is_array($btn_link) && ! empty($btn_link['target']) ) ? 'target="' . esc_attr($btn_link['target']) . '"' : ''; ?>>
                        <?php echo wp_kses_post( is_array($btn_link) ? $btn_link['title'] : $btn_link ); ?>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
            <picture>
                <img aria-hidden="true" decoding="async" loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/web_bg.webp" alt="web image" width="1920" height="1070">
            </picture>
        </section>


        <?php /* ═══════════════════════════════════════════
           9. DIGITAL PARTNER / 6-BOX GRID — caption_heading_repeater
           ═══════════════════════════════════════════ */
        elseif ( $layout === 'caption_heading_repeater' ) :
            $caption    = get_sub_field('services_sec9_caption');
            $heading    = get_sub_field('services_sec9_heading');
            $color_head = get_sub_field('services_sec9_colorfull_heading');
            $points     = get_sub_field('services_sec9_points');
        ?>
        <section class="build_sec">
            <div class="container">
                <div class="digital_partner w-100 float-start text-center">
                    <?php if ( $caption ) : ?><span><?php echo wp_kses_post( $caption ); ?></span><?php endif; ?>
                    <h2><?php echo wp_kses_post( $heading ); ?>
                        <?php if ( $color_head ) : ?><strong><?php echo wp_kses_post( $color_head ); ?></strong><?php endif; ?>
                    </h2>
                    <?php if ( $points ) : ?>
                    <div class="help_businesGrid digital_box w-100">
                        <?php foreach ( $points as $point ) :
                            $card_slug = sanitize_title( $point['title'] );
                        ?>
                        <div id="<?php echo esc_attr( $card_slug ); ?>" class="help_businesBox d-flex flex-wrap text-center align-items-center flex-column">
                            <?php if ( ! empty( $point['image__icon'] ) ) : ?>
                            <img src="<?php echo esc_url( $point['image__icon']['url'] ); ?>" width="30" height="30" alt="">
                            <?php endif; ?>
                            <h3><?php echo wp_kses_post( $point['title'] ); ?></h3>
                            <p><?php echo wp_kses_post( $point['description'] ); ?></p>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>


        <?php /* ═══════════════════════════════════════════
           PROJECT SHOWCASE SLIDER — project_showcase_slider
           ═══════════════════════════════════════════ */
        elseif ( $layout === 'project_showcase_slider' ) :
            $s_caption    = get_sub_field('showcase_caption');
            $s_heading    = get_sub_field('showcase_heading');
            $s_color_head = get_sub_field('showcase_colorfull_heading');
            $s_count      = get_sub_field('showcase_count') ?: 6;
            $s_btn_text   = get_sub_field('showcase_button_text');
            $s_btn_url    = get_sub_field('showcase_button_url');

            // Pull random case studies
            $showcase_posts = get_posts( array(
                'post_type'      => 'case_study',
                'posts_per_page' => intval( $s_count ),
                'orderby'        => 'rand',
                'post_status'    => 'publish',
            ) );
        ?>
        <?php if ( $showcase_posts ) : ?>
        <section class="project_showcase_sec">
            <div class="container">
                <?php if ( $s_caption || $s_heading ) : ?>
                <div class="project_showcase_header w-100 float-start text-center">
                    <?php if ( $s_caption ) : ?><span><?php echo wp_kses_post( $s_caption ); ?></span><?php endif; ?>
                    <?php if ( $s_heading ) : ?>
                    <h2><?php echo wp_kses_post( $s_heading ); ?>
                        <?php if ( $s_color_head ) : ?><strong><?php echo wp_kses_post( $s_color_head ); ?></strong><?php endif; ?>
                    </h2>
                    <?php endif; ?>
                </div>
                <?php endif; ?>

                <div class="swiper project_showcase_swiper float-start w-100 position-relative">
                    <div class="swiper-wrapper">
                        <?php foreach ( $showcase_posts as $cs_post ) :
                            $cs_id = $cs_post->ID;

                            // Hero image — ACF field or featured image fallback
                            $hero_img = get_field( 'cs_hero_image', $cs_id );
                            if ( ! $hero_img ) {
                                $thumb_id = get_post_thumbnail_id( $cs_id );
                                if ( $thumb_id ) {
                                    $hero_img = array(
                                        'url' => wp_get_attachment_image_url( $thumb_id, 'large' ),
                                        'alt' => get_post_meta( $thumb_id, '_wp_attachment_image_alt', true ),
                                    );
                                }
                            }

                            // Client name
                            $client_name = get_field( 'cs_hero_headline', $cs_id ) ?: get_the_title( $cs_id );

                            // Descriptor
                            $descriptor = get_field( 'cs_hero_descriptor', $cs_id );

                            // Category
                            $cs_terms = get_the_terms( $cs_id, 'case_study_type' );
                            $cs_cat   = ( $cs_terms && ! is_wp_error( $cs_terms ) ) ? $cs_terms[0]->name : '';
                            $cs_slug  = ( $cs_terms && ! is_wp_error( $cs_terms ) ) ? $cs_terms[0]->slug : '';

                            // Stats — try VI snapshot stats first, then SEO metrics
                            $stats = array();
                            $vi_stats = get_field( 'cs_vi_snapshot_stats', $cs_id );
                            $seo_stats = get_field( 'cs_seo_metrics', $cs_id );

                            if ( $vi_stats && is_array( $vi_stats ) ) {
                                foreach ( array_slice( $vi_stats, 0, 3 ) as $s ) {
                                    $stats[] = array(
                                        'value' => $s['headline'] ?? '',
                                        'label' => $s['subtext'] ?? '',
                                    );
                                }
                            } elseif ( $seo_stats && is_array( $seo_stats ) ) {
                                foreach ( array_slice( $seo_stats, 0, 3 ) as $s ) {
                                    $stats[] = array(
                                        'value' => $s['value'] ?? '',
                                        'label' => $s['label'] ?? '',
                                    );
                                }
                            }

                            // Results stats fallback
                            if ( empty( $stats ) ) {
                                $vi_results = get_field( 'cs_vi_results', $cs_id );
                                if ( $vi_results && is_array( $vi_results ) ) {
                                    foreach ( array_slice( $vi_results, 0, 3 ) as $r ) {
                                        $stats[] = array(
                                            'value' => $r['stat_number'] ?? '',
                                            'label' => $r['stat_label'] ?? '',
                                        );
                                    }
                                }
                            }

                            $permalink = get_permalink( $cs_id );
                        ?>
                        <div class="swiper-slide cs-card-col">
                            <a href="<?php echo esc_url( $permalink ); ?>" class="cs-card">
                                <div class="cs-card__image">
                                    <?php if ( $hero_img ) : ?>
                                    <img decoding="async" loading="lazy" src="<?php echo esc_url( $hero_img['url'] ); ?>" alt="<?php echo esc_attr( $hero_img['alt'] ?? $client_name ); ?>" width="600" height="400">
                                    <?php endif; ?>
                                    <?php if ( $cs_cat ) : ?>
                                    <span class="cs-card__tag"><?php echo esc_html( $cs_cat ); ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="cs-card__body">
                                    <h3 class="cs-card__title"><?php echo esc_html( $client_name ); ?></h3>
                                    <?php if ( $descriptor ) : ?>
                                    <p class="cs-card__desc"><?php echo esc_html( $descriptor ); ?></p>
                                    <?php endif; ?>
                                    <?php if ( $stats ) : ?>
                                    <div class="cs-card__stats">
                                        <?php foreach ( $stats as $stat ) : ?>
                                        <div class="cs-card__stat-item">
                                            <strong><?php echo esc_html( $stat['value'] ); ?></strong>
                                            <span><?php echo esc_html( $stat['label'] ); ?></span>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="swiper-button-next showcase_nav">
                        <svg width="27" height="12" viewBox="0 0 27 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M26.5303 6.53033C26.8232 6.23744 26.8232 5.76256 26.5303 5.46967L21.7574 0.696699C21.4645 0.403806 20.9896 0.403806 20.6967 0.696699C20.4038 0.989593 20.4038 1.46447 20.6967 1.75736L24.9393 6L20.6967 10.2426C20.4038 10.5355 20.4038 11.0104 20.6967 11.3033C20.9896 11.5962 21.4645 11.5962 21.7574 11.3033L26.5303 6.53033ZM0 6.75H26V5.25H0V6.75Z" fill="white"/></svg>
                    </div>
                    <div class="swiper-button-prev showcase_nav">
                        <svg width="27" height="12" viewBox="0 0 27 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M26.5303 6.53033C26.8232 6.23744 26.8232 5.76256 26.5303 5.46967L21.7574 0.696699C21.4645 0.403806 20.9896 0.403806 20.6967 0.696699C20.4038 0.989593 20.4038 1.46447 20.6967 1.75736L24.9393 6L20.6967 10.2426C20.4038 10.5355 20.4038 11.0104 20.6967 11.3033C20.9896 11.5962 21.4645 11.5962 21.7574 11.3033L26.5303 6.53033ZM0 6.75H26V5.25H0V6.75Z" fill="white"/></svg>
                    </div>
                </div>

                <?php if ( $s_btn_text && $s_btn_url ) : ?>
                <div class="project_showcase_cta w-100 float-start text-center">
                    <a class="secondary_btn" href="<?php echo esc_url( $s_btn_url ); ?>">
                        <?php echo esc_html( $s_btn_text ); ?>
                        <svg width="27" height="12" viewBox="0 0 27 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M26.5303 6.53033C26.8232 6.23744 26.8232 5.76256 26.5303 5.46967L21.7574 0.696699C21.4645 0.403806 20.9896 0.403806 20.6967 0.696699C20.4038 0.989593 20.4038 1.46447 20.6967 1.75736L24.9393 6L20.6967 10.2426C20.4038 10.5355 20.4038 11.0104 20.6967 11.3033C20.9896 11.5962 21.4645 11.5962 21.7574 11.3033L26.5303 6.53033ZM0 6.75H26V5.25H0V6.75Z" fill="white"/></svg>
                    </a>
                </div>
                <?php endif; ?>
            </div>
        </section>
        <?php endif; // end showcase_posts ?>


        <?php /* ═══════════════════════════════════════════
           10. FAQ + CTA — heading_faq_text_2_button_link
           ═══════════════════════════════════════════ */
        elseif ( $layout === 'heading_faq_text_2_button_link' ) :
            $heading  = get_sub_field('services_sec10_heading');
            $faqs     = get_sub_field('services_sec10_frequently_asked_questions');
            $title    = get_sub_field('services_sec10_title');
            $btn1     = get_sub_field('services_sec10_button_link_1');
            $btn2     = get_sub_field('services_sec10_button_link_2');
        ?>
        <section class="faq_sec">
            <div class="container">
                <?php if ( $heading ) : ?><h3><?php echo wp_kses_post( $heading ); ?></h3><?php endif; ?>
                <?php if ( $faqs ) : ?>
                <div class="accordion faq_div w-100 float-start" id="accordionExample">
                    <?php foreach ( $faqs as $f => $faq ) : ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading<?php echo $f + 1; ?>">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#tab-<?php echo $f + 1; ?>" aria-expanded="<?php echo $f === 0 ? 'true' : 'false'; ?>" aria-controls="tab-<?php echo $f + 1; ?>">
                                <?php echo wp_kses_post( $faq['question'] ); ?>
                            </button>
                        </h2>
                        <div id="tab-<?php echo $f + 1; ?>" class="accordion-collapse collapse <?php echo $f === 0 ? 'show' : ''; ?>" aria-labelledby="heading<?php echo $f + 1; ?>" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p><?php echo wp_kses_post( $faq['answer'] ); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </section>

        <section class="chat_book_sec">
            <div class="container">
                <div class="chat_book_div w-100 float-start text-center">
                    <?php if ( $title ) : ?><h2><?php echo wp_kses_post( $title ); ?></h2><?php endif; ?>
                    <ul>
                        <?php if ( $btn1 ) : ?>
                        <li><a class="secondary_btn book_meeting" href="javascript:void(0)"><?php echo wp_kses_post( $btn1 ); ?></a></li>
                        <?php endif; ?>
                        <?php if ( $btn2 ) : ?>
                        <li><a class="secondary_btn" href="<?php echo esc_url( is_array($btn2) ? $btn2['url'] : '#' ); ?>" <?php echo ( is_array($btn2) && ! empty($btn2['target']) ) ? 'target="' . esc_attr($btn2['target']) . '"' : ''; ?>><?php echo wp_kses_post( is_array($btn2) ? $btn2['title'] : $btn2 ); ?></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </section>


        <?php /* ═══════════════════════════════════════════
           11. OPPOSITE SECTIONS — two_row_opposite_sections
           ═══════════════════════════════════════════ */
        elseif ( $layout === 'two_row_opposite_sections' ) :
        ?>
        <section class="peace_mind_sec">
            <div class="container">
                <?php while ( have_rows('opposite_section') ) : the_row(); ?>
                <div class="peace_mind_div w-100 d-flex">
                    <div class="peace_mind_pic w-100 float-start">
                        <?php $img = get_sub_field('image'); ?>
                        <?php if ( $img ) : ?>
                        <img aria-hidden="true" decoding="async" src="<?php echo esc_url( $img['url'] ); ?>" alt="<?php echo esc_attr( $img['alt'] ?? '' ); ?>" width="300" height="300">
                        <?php endif; ?>
                    </div>
                    <div class="peace_mind_text w-100 float-start">
                        <?php if ( get_sub_field('heading') ) : ?><h2><?php echo wp_kses_post( get_sub_field('heading') ); ?></h2><?php endif; ?>
                        <?php echo wp_kses_post( get_sub_field('description') ); ?>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </section>


        <?php /* ═══════════════════════════════════════════
           12. FULL WIDTH IMAGE + DESCRIPTION — full_width_image__description
           ═══════════════════════════════════════════ */
        elseif ( $layout === 'full_width_image__description' ) :
            $main_heading = get_sub_field('main_heading');
            $image        = get_sub_field('image');
            $description  = get_sub_field('description');
        ?>
        <section class="online_success_sec position-relative">
            <div class="container">
                <div class="online_success_div w-100 float-start">
                    <?php if ( $main_heading ) : ?><h2><?php echo wp_kses_post( $main_heading ); ?></h2><?php endif; ?>
                    <?php if ( $image ) : ?>
                    <img aria-hidden="true" decoding="async" loading="lazy" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ?? '' ); ?>" width="300" height="300">
                    <?php endif; ?>
                    <div class="online_success_text w-100 float-end">
                        <?php echo wp_kses_post( $description ); ?>
                    </div>
                </div>
            </div>
        </section>


        <?php /* ═══════════════════════════════════════════
           13. SOFTWARE COMPATIBILITY — software_compatibility_is_criticle
           ═══════════════════════════════════════════ */
        elseif ( $layout === 'software_compatibility_is_criticle' ) :
            $image       = get_sub_field('image');
            $heading     = get_sub_field('heading');
            $description = get_sub_field('description');
        ?>
        <section class="software_text_sec">
            <div class="container">
                <div class="software_text_div w-100 d-flex align-items-center">
                    <div class="software_text_pic w-100 float-start">
                        <?php if ( $image ) : ?>
                        <img aria-hidden="true" decoding="async" loading="lazy" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ?? '' ); ?>" width="300" height="300">
                        <?php endif; ?>
                    </div>
                    <div class="software_text w-100 float-start">
                        <?php if ( $heading ) : ?><h2><?php echo wp_kses_post( $heading ); ?></h2><?php endif; ?>
                        <?php echo wp_kses_post( $description ); ?>
                    </div>
                </div>
            </div>
        </section>


        <?php endif; // end layout check ?>

    <?php endwhile; // end flexible content loop ?>
<?php endif; // end have_rows ?>


    <!-- Calendly / Meeting Popup -->
    <section class="calendly_sec">
        <h6 class="close_clandely">X Close</h6>
        <div class="meetings-iframe-container" data-src="https://meetings-eu1.hubspot.com/sbrannon?embed=true"></div>
        <script type="text/javascript" src="https://static.hsappstatic.net/MeetingsEmbed/ex/MeetingsEmbedCode.js"></script>
    </section>

<?php get_footer(); ?>

    <!-- Typing Effect -->
    <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        var elements = document.querySelectorAll('.typing-effect');
        function typeWriter(element) {
            var fullText = element.textContent;
            element.textContent = "";
            var index = 0;
            var typingSpeed = 10;
            function type() {
                if (index < fullText.length) {
                    element.textContent += fullText.charAt(index);
                    index++;
                    setTimeout(type, typingSpeed);
                }
            }
            type();
        }
        var observer = new IntersectionObserver(function(entries, observer) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    typeWriter(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });
        elements.forEach(function(element) {
            observer.observe(element);
        });
    });
    </script>

    <!-- CounterUp Init -->
    <script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery(function() {
            "use strict";
            if (typeof window.counterUp !== 'undefined') {
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
            }
        });
    });
    </script>

    <!-- Video Player (YouTube) -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var playButton = document.getElementById('playButton');
        if (playButton) {
            playButton.addEventListener('click', function(event) {
                event.preventDefault();
                var videoText = document.getElementById('videoText');
                var videoPlayer = document.getElementById('videoPlayer');
                var videoPlayer02 = document.getElementById('videoPlayer02');
                if (videoText) videoText.style.display = 'none';
                if (videoPlayer) {
                    videoPlayer.style.display = 'block';
                    var iframe = document.getElementById('youtubeIframe');
                    if (iframe) iframe.src = iframe.src.replace('autoplay=0', 'autoplay=1');
                }
                if (videoPlayer02) {
                    videoPlayer02.style.display = 'block';
                    var video = videoPlayer02.querySelector('video');
                    if (video) video.play();
                }
            });
        }
    });
    </script>

    <!-- Select box tab switcher for mobile -->
    <script type="text/javascript">
    jQuery(function($) {
        if ($(window).width() < 992) {
            $('.tab-pane').hide();
            $('#home_1').show();
            $('#select-box2').change(function() {
                var dropdown = $('#select-box2').val();
                $('.tab-pane').hide();
                $('#home_' + dropdown).show();
            });
        }
    });
    </script>

    <!-- Activate tab from URL hash (e.g. /ai-automation/#workflow-automation) -->
    <script type="text/javascript">
    jQuery(function($) {
        var hash = window.location.hash.replace('#', '');
        if (!hash) return;
        var $pane = $('.tab-pane[data-tab-slug="' + hash + '"]');
        if ($pane.length) {
            var idx = $pane.index() + 1;
            // Desktop: activate Bootstrap tab
            $('#myTab a').removeClass('active');
            $('#home-tab' + idx).addClass('active');
            $('.tab-pane').removeClass('show active');
            $pane.addClass('show active');
            // Mobile: show correct pane + update select
            if ($(window).width() < 992) {
                $('.tab-pane').hide();
                $pane.show();
                $('#select-box2').val(idx);
            }
            // Scroll into view
            setTimeout(function() {
                $('html, body').animate({ scrollTop: $pane.closest('.range_sec').offset().top - 80 }, 400);
            }, 300);
        }
    });
    </script>

    <!-- Swiper init for portfolio slider -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof Swiper !== 'undefined' && document.querySelector('.year_bldngSlderDiv')) {
            new Swiper('.year_bldngSlderDiv', {
                slidesPerView: 1,
                spaceBetween: 30,
                loop: true,
                navigation: {
                    nextEl: '.year_bldngSlderDiv .swiper-button-next',
                    prevEl: '.year_bldngSlderDiv .swiper-button-prev',
                },
            });
        }
        // Project Showcase Slider
        if (typeof Swiper !== 'undefined' && document.querySelector('.project_showcase_swiper')) {
            new Swiper('.project_showcase_swiper', {
                slidesPerView: 1,
                spaceBetween: 24,
                loop: true,
                navigation: {
                    nextEl: '.project_showcase_swiper .swiper-button-next',
                    prevEl: '.project_showcase_swiper .swiper-button-prev',
                },
                breakpoints: {
                    768: { slidesPerView: 2 },
                    1200: { slidesPerView: 3 },
                },
            });
        }
    });
    </script>

    <!-- Book Meeting -->
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
