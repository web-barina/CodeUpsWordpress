<?php get_header(); ?>
<main>
    <!--first-view-->
    <div class="topFVswiper swiper" id="js-topFVswiper">
        <div class="topFVswiper__wrapper swiper-wrapper">
            <picture class="topFVswiper__slide swiper-slide">
                <?php
            $top_img = get_field('top_image'); 
            if ($top_img && !empty($top_img['top_image1'])) {
                $top_image1_url = esc_url($top_img['top_image1']); 
                echo '<img src="' . $top_image1_url . '" alt="">'; 
            }
        ?>
            </picture>
            <picture class="topFVswiper__slide swiper-slide">
                <?php
            if ($top_img && !empty($top_img['top_image2'])) {
                $top_image2_url = esc_url($top_img['top_image2']); 
                echo '<img src="' . $top_image2_url . '" alt="">'; 
            }
        ?>
            </picture>
            <picture class="topFVswiper__slide swiper-slide">
                <?php
            if ($top_img && !empty($top_img['top_image3'])) {
                $top_image3_url = esc_url($top_img['top_image3']); 
                echo '<img src="' . $top_image3_url . '" alt="">'; 
            }
        ?>
            </picture>
            <picture class="topFVswiper__slide swiper-slide">
                <?php
            if ($top_img && !empty($top_img['top_image4'])) {
                $top_image4_url = esc_url($top_img['top_image4']); 
                echo '<img src="' . $top_image4_url . '" alt="">'; 
            }
        ?>
            </picture>
        </div>
    </div>
    <div class="topFVswiper__texts">
        <h2 class="topFVswiper__main-text">DIVING</h2>
        <p class="topFVswiper__sub-text">into the ocean</p>
    </div>
    <!--Campaign-->
    <section class="topCampaign topCampaign-wrapper">
        <div class="topCampaign__inner inner">
            <div class="topCampaign__titles section-titles">
                <p class="section-titles__english">Campaign</p>
                <h2 class="section-titles__japanese">キャンペーン</h2>
            </div>
            <div class="topCampaign__swiper-button-wrapper">
                <div class="topCampaign__prev"></div>
                <div class="topCampaign__next"></div>
            </div>
            <div class="topCampaign__swiper swiper" id="js-topCampaign">
                <?php
                    // 最新の「キャンペーン」を取得するWP_Query
                    $campaign_args = array(
                    'post_type' => 'campaign',
                    'orderby' => 'date',
                    'order' => 'DESC'
                    );
                    $latest_campaigns = new WP_Query($campaign_args);
                ?>
                <ul class="topCampaign__slider-wrapper swiper-wrapper">
                    <?php
                        if ($latest_campaigns->have_posts()) :
                        while ($latest_campaigns->have_posts()) : $latest_campaigns->the_post();
                    ?>
                    <li class="topCampaign__card campaign-card swiper-slide">
                        <figure class="campaign-card__img">
                            <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                            <?php else : ?>
                            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/no-image.png"
                                alt="no-image" />
                            <?php endif; ?>
                        </figure>
                        <div class="campaign-card__body">
                            <div class="campaign-card__category">
                                <?php 
                                    $terms = get_the_terms($post->ID, 'campaign_category'); 
                                    if ($terms && !is_wp_error($terms)) : 
                                        $term_list = array(); 
                                        foreach ($terms as $term) : 
                                            $term_list[] = $term->name; 
                                        endforeach; 
                                        echo implode(', ', $term_list); 
                                    endif; 
                                ?>
                            </div>
                            <div class="campaign-card__title-wrapper">
                                <h3 class="campaign-card__title">
                                    <?php the_title(); ?>
                                </h3>
                            </div>
                        </div>
                        <div class="campaign-card__contents">
                            <p class="campaign-card__text">
                                <?php the_field('campaign_text'); ?></p>
                            <div class="campaign-card__price-wrapper">
                                <?php
                                    $campaign_price = get_field('campaign_price');
                                ?>
                                <?php if (!empty($campaign_price['campaign_pre-price'])) : ?>
                                <p class="campaign-card__pre-price">
                                    &yen;<?php echo esc_html($campaign_price['campaign_pre-price']); ?>
                                </p>
                                <?php endif; ?>
                                <p class="campaign-card__after-price">
                                    &yen;<?php echo esc_html($campaign_price['campaign_after-price']); ?>
                                </p>
                            </div>
                        </div>
                    </li>
                    <?php endwhile;?>
                </ul>
                <?php else : ?>
                <p class="campaign-card__no-message">ただいま準備中です。もう少しお待ちください。</p>
                <?php wp_reset_postdata();?>
                <?php endif;?>
            </div>
            <div class="topCampaign__btn-wrapper">
                <a href="<?php echo esc_url(home_url("campaign")); ?>" class="btn">View more
                    <span></span>
                </a>
            </div>
        </div>
        <!--inner閉じタグ-->
    </section>
    <!--About us-->
    <section class="top-about-us top-about-us-wrapper">
        <div class="top-about-us__inner inner">
            <div class="top-about-us__titles section-titles">
                <p class="section-titles__english">About us</p>
                <h2 class="section-titles__japanese">私たちについて</h2>
            </div>
            <div class="top-about-us__img-wrapper">
                <div class="top-about-us__img-left">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/about-us-left.png"
                        alt="沖縄の赤茶色の瓦屋根にシーサーが乗っていてこちらを見ている" />
                </div>
                <div class="top-about-us__img-right">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/about-us-right.png"
                        alt="海の中で黄色い熱帯魚が２匹向かい合っている" />
                </div>
            </div>
            <div class="top-about-us__texts">
                <p class="top-about-us__main-text">Dive into<br />the Ocean</p>
                <div class="top-about-us__text">
                    ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />ここにテキストが入ります。
                    ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
                    <div class="top-about-us__btn-wrapper">
                        <a href="<?php echo esc_url(home_url("about-us")); ?>" class="btn">View more
                            <span></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--inner閉じタグ-->
    </section>
    <!--Information-->
    <section class="top-info top-info-wrapper">
        <div class="top-info__inner inner">
            <div class="top-info__section-titles section-titles">
                <p class="section-titles__english">Information</p>
                <h2 class="section-titles__japanese">ダイビング情報</h2>
            </div>
            <div class="top-info__content">
                <div class="top-info__img js-color-box"><img
                        src="<?php echo get_theme_file_uri(); ?>/assets/images/common/information.png"
                        alt="海の中、黄色い魚が２匹サンゴ礁の中を泳いでいる" /></div>
                <div class="top-info__texts">
                    <h3 class="top-info__title">ライセンス講習</h3>
                    <p class="top-info__text">
                        当店はダイビングライセンス（Cカード）世界最大の教育機関PADIの「正規店」として店舗登録されています。<br />
                        正規登録店として、安心安全に初めての方でも安心安全にライセンス取得をサポート致します。
                    </p>
                    <div class="top-info__btn-wrapper">
                        <a href="<?php echo esc_url(home_url("information")); ?>" class="btn">View more
                            <span></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Blog-->
    <section class="top-blog top-blog-wrapper">
        <div class="top-blog__inner inner">
            <div class="top-blog__section-titles section-titles">
                <p class="section-titles__english section-titles__english--white">Blog</p>
                <h2 class="section-titles__japanese section-titles__japanese--white">ブログ</h2>
            </div>
            <?php
                $args = array(
                    'posts_per_page' => 3, 
                );
                $query = new WP_Query($args);
            ?>
            <?php if ($query->have_posts()) : ?>
            <ul class="blog__cards blog-cards">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                <li class="blog-cards__item blog-card">
                    <a href="<?php the_permalink() ?>">
                        <div class="blog-card__img-wrapper">
                            <figure class="blog-card__img">
                                <?php if (has_post_thumbnail()) : ?>
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                                <?php else : ?>
                                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/no-image.png"
                                    alt="no-image" />
                                <?php endif; ?>
                            </figure>
                        </div>
                        <div class="blog-card__body">
                            <time datetime="<?php the_time('Y-m-d') ?>"
                                class="blog-card__time"><?php the_time('Y.m.d') ?></time>
                            <h2 class="blog-card__title"><?php the_title() ?></h2>
                            <p class="blog-card__text">
                                <?php echo wp_trim_words(get_the_content(), 60, '…'); ?>
                            </p>
                        </div>
                    </a>
                </li>
                <?php endwhile; ?>
            </ul>
            <?php else : ?>
            <p class="blog-card__no-message">ただいま準備中です。少々お待ちください。</p>
            <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
        <div class="top-blog__btn-wrapper">
            <a href="<?php echo esc_url(home_url("blog")); ?>" class="btn">View more
                <span></span>
            </a>
        </div>
    </section>
    <!--Voice-->
    <section class="top-voice top-voice-wrapper">
        <div class="top-voice__inner inner">
            <div class="top-voice__section-titles section-titles">
                <p class="section-titles__english">Voice</p>
                <h2 class="section-titles__japanese">お客様の声</h2>
            </div>
            <ul class="voice__cards voice-cards">
                <?php
                    // 最新の「お客様の声」を2つだけ取得するWP_Query
                    $args = array(
                    'post_type' => 'voice',
                    'posts_per_page' => 2
                    );
                    $latest_voice = new WP_Query($args);
                    if ($latest_voice->have_posts()) :
                    while ($latest_voice->have_posts()) : $latest_voice->the_post(); 
                ?>
                <li class="voice-cards__item voice-card">
                    <div class="voice-card__info">
                        <div class="voice-card__customer-data-wrapper">
                            <div class="voice-card__customer-data">
                                <div class="voice-card__customer-age">
                                    <?php $customer_info = get_field('customer_info');
                                        if ($customer_info) {
                                            $customer_age = $customer_info['customer_age'];
                                            if ($customer_age) {
                                                echo esc_html($customer_age);
                                            }
                                        } 
                                    ?>
                                    <?php $customer_info = get_field('customer_info');
                                        if ($customer_info) {
                                            $customer_kinds = $customer_info['customer_kinds'];
                                            if ($customer_kinds) {
                                                echo esc_html($customer_kinds);
                                            }
                                        } 
                                    ?>
                                </div>
                                <div class="voice-card__category">
                                    <?php
                                        $terms = get_the_terms(get_the_ID(), 'voice_category');
                                        if ($terms && !is_wp_error($terms)):
                                            $term_list = array();
                                            foreach ($terms as $term):
                                                $term_list[] = esc_html($term->name);
                                            endforeach;
                                            echo implode(', ', $term_list);
                                        endif;
                                    ?>
                                </div>
                            </div>
                            <div class="voice-card__title-wrapper">
                                <h3 class="voice-card__title"><?php the_title() ?></h3>
                            </div>
                        </div>
                        <figure class="voice-card__img js-color-box">
                            <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                            <?php else : ?>
                            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/no-image.png"
                                alt="no-image" />
                            <?php endif; ?>
                        </figure>
                    </div>
                    <p class="voice-card__text"> <?php the_content( ) ?></p>
                </li>
                <?php endwhile; ?>
            </ul>
            <?php else : ?>
            <p class="voice-card__no-message">ただいま準備中です。少々お待ちください。</p>
            <?php wp_reset_postdata(); ?>
            <?php endif; ?>
            <div class="top-voice__btn-wrapper">
                <a href="<?php echo esc_url(home_url("voice")); ?>" class="btn">View more
                    <span></span>
                </a>
            </div>
        </div>
    </section>
    <!--price-->
    <section class="top-price top-price-wrapper">
        <div class="top-price__inner inner">
            <div class="top-price__section-titles section-titles">
                <p class="section-titles__english">Price</p>
                <h2 class="section-titles__japanese">料金一覧</h2>
            </div>
            <div class="top-price__contents-wrapper">
                <picture class="top-price__img js-color-box">
                    <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/price-pc.png"
                        media="(min-width: 768px)" type="image/jpg" />
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/price-sp.png" alt="ウミガメ" />
                </picture>
                <div class="top-price__contents">
                    <?php 
                        // データが有効かどうかを確認する関数
                        function has_valid_price($prices, $menu_key, $yen_key) {
                            if (!empty($prices)) {
                                foreach ($prices as $price) {
                                    if (!empty($price[$menu_key]) || !empty($price[$yen_key])) {
                                        return true;
                                    }
                                }
                            }
                            return false;
                        }

                        // ライセンス講習
                        $page_id = 17;
                        $license_prices = SCF::get('license_price', $page_id);
                    ?>
                    <?php if (has_valid_price($license_prices, 'license_menu', 'license_yen')) : ?>
                    <dl class="top-price__content">
                        <dt class="top-price__title">ライセンス講習</dt>
                        <?php foreach ($license_prices as $field) : ?>
                        <?php
                            $license_menu = isset($field['license_menu']) ? esc_html($field['license_menu']) : ''; 
                            $license_yen = isset($field['license_yen']) ? esc_html($field['license_yen']) : ''; 
                        ?>
                        <dd class="top-price__menu">
                            <div class="top-price__name"><?php echo $license_menu; ?></div>
                            <div class="top-price__yen"><?php echo $license_yen; ?></div>
                        </dd>
                        <?php endforeach; ?>
                    </dl>
                    <?php endif; ?>

                    <?php 
                        // 体験ダイビング
                        $trial_prices = SCF::get('trial_price', $page_id);
                    ?>
                    <?php if (has_valid_price($trial_prices, 'trial_menu', 'trial_yen')) : ?>
                    <dl class="top-price__content">
                        <dt class="top-price__title">体験ダイビング</dt>
                        <?php foreach ($trial_prices as $field) : ?>
                        <?php
                            $trial_menu = isset($field['trial_menu']) ? esc_html($field['trial_menu']) : ''; 
                            $trial_yen = isset($field['trial_yen']) ? esc_html($field['trial_yen']) : ''; 
                        ?>
                        <dd class="top-price__menu">
                            <div class="top-price__name"><?php echo $trial_menu; ?></div>
                            <div class="top-price__yen"><?php echo $trial_yen; ?></div>
                        </dd>
                        <?php endforeach; ?>
                    </dl>
                    <?php endif; ?>

                    <?php 
                        // ファンダイビング
                        $fun_prices = SCF::get('fun_price', $page_id);
                    ?>
                    <?php if (has_valid_price($fun_prices, 'fun_menu', 'fun_yen')) : ?>
                    <dl class="top-price__content">
                        <dt class="top-price__title">ファンダイビング</dt>
                        <?php foreach ($fun_prices as $field) : ?>
                        <?php
                            $fun_menu = isset($field['fun_menu']) ? esc_html($field['fun_menu']) : ''; 
                            $fun_yen = isset($field['fun_yen']) ? esc_html($field['fun_yen']) : ''; 
                        ?>
                        <dd class="top-price__menu">
                            <div class="top-price__name"><?php echo $fun_menu; ?></div>
                            <div class="top-price__yen"><?php echo $fun_yen; ?></div>
                        </dd>
                        <?php endforeach; ?>
                    </dl>
                    <?php endif; ?>

                    <?php 
                        // スペシャルダイビング
                        $special_prices = SCF::get('special_price', $page_id);
                    ?>
                    <?php if (has_valid_price($special_prices, 'special_menu', 'special_yen')) : ?>
                    <dl class="top-price__content">
                        <dt class="top-price__title">スペシャルダイビング</dt>
                        <?php foreach ($special_prices as $field) : ?>
                        <?php
                            $special_menu = isset($field['special_menu']) ? esc_html($field['special_menu']) : ''; 
                            $special_yen = isset($field['special_yen']) ? esc_html($field['special_yen']) : ''; 
                        ?>
                        <dd class="top-price__menu">
                            <div class="top-price__name"><?php echo $special_menu; ?></div>
                            <div class="top-price__yen"><?php echo $special_yen; ?></div>
                        </dd>
                        <?php endforeach; ?>
                    </dl>
                    <?php endif; ?>

                </div>
            </div>
        </div>
        <div class="top-price__btn-wrapper">
            <a href="<?php echo esc_url(home_url("price")); ?>" class="btn">View more
                <span></span>
            </a>
        </div>
        </div>
    </section>
    <?php get_footer(); ?>