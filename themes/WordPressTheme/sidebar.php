<div class="blog-layout__sub-wrapper sidebar-layout">
    <div class="sidebar-layout__inner">
        <aside class="sidebar-layout__main sidebar">
            <section class="sidebar__popular">
                <h2 class="sidebar__title">人気記事</h2>
                <?php
                    // 閲覧数を基準にして人気記事を取得する
                    $popular_args = array(
                    'posts_per_page' => 3, // 表示する記事数
                    'meta_key' => 'post_views_count', // 人気記事の基準となるカスタムフィールド
                    'orderby' => 'meta_value_num', // ソート基準
                    );

                    $popular_query = new WP_Query($popular_args);

                    if ($popular_query->have_posts()) : ?>
                <?php while ($popular_query->have_posts()) : $popular_query->the_post(); ?>
                <a href="<?php the_permalink(); ?>" class="sidebar__popular-cards popular-cards">
                    <div class="popular-cards__item popular-card">
                        <figure class="popular-card__img"> <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                            <?php else : ?>
                            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/no-image.png"
                                alt="no-image" />
                            <?php endif; ?>
                        </figure>
                        <div class="popular-card__text">
                            <time class="popular-card__time"
                                datetime="<?php the_time("c") ?>"><?php the_time("Y.m.d") ?></time>
                            <h3 class="popular-card__title"><?php the_title(); ?></h3>
                        </div>
                    </div>
                </a>
                <?php endwhile; ?>
                <?php else : ?>
                <p class="popular-card__no-message">ただいま準備中です。<br>少々お待ちください。</p>
                <?php
                    endif;
                    wp_reset_postdata();
                ?>
            </section>
            <section class="sidebar__review">
                <h2 class="sidebar__title">口コミ</h2>
                <?php
                    // 最新の「お客様の声」を1つだけ取得するWP_Query
                    $args = array(
                    'post_type' => 'voice',
                    'posts_per_page' => 1,
                    );
                    $latest_voice = new WP_Query($args);
                    if ($latest_voice->have_posts()) :
                    while ($latest_voice->have_posts()) : $latest_voice->the_post(); 
                ?>
                <div class="sidebar__review-card review">
                    <figure class="review__img">
                        <?php if (has_post_thumbnail()) : ?>
                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                        <?php else : ?>
                        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/no-image.png"
                            alt="no-image" />
                        <?php endif; ?>
                    </figure>
                    <p class="review__info">
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
                    </p>
                    <h3 class="review__title"><?php the_title() ?></h3>
                </div>
                <?php endwhile;
                    wp_reset_postdata(); 
                    endif;
                ?>
                <div class="sidebar__btn-wrapper">
                    <a href="<?php echo get_post_type_archive_link('voice'); ?>" class="btn">View more
                        <span></span>
                    </a>
                </div>
            </section>
            <section class="sidebar__campaign">
                <h2 class="sidebar__title">キャンペーン</h2>
                <?php
                    // 最新の「キャンペーン」を2つ取得するWP_Query
                    $campaign_args = array(
                    'post_type' => 'campaign',
                    'posts_per_page' => 2,
                    );

                    $latest_campaigns = new WP_Query($campaign_args);
                ?>
                <ul class="sidebar__campaign-cards campaign-cards">
                    <?php
                        if ($latest_campaigns->have_posts()) :
                        while ($latest_campaigns->have_posts()) : $latest_campaigns->the_post();
                    ?>
                    <li class="campaign-cards__item campaign-card">
                        <figure class="campaign-card__img">
                            <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                            <?php else : ?>
                            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/no-image.png"
                                alt="no-image" />
                            <?php endif; ?>
                        </figure>
                        <div class="campaign-card__body campaign-card__body--side">
                            <div class="campaign-card__title-wrapper">
                                <h3 class="campaign-card__title campaign-card__title--side">
                                    <?php the_title() ?>
                                </h3>
                            </div>
                        </div>
                        <div class="campaign-card__contents">
                            <p class="campaign-card__text campaign-card__text--side">
                                <?php the_field('campaign_text'); ?></p>
                            <div class="campaign-card__price-wrapper campaign-card__price-wrapper--side">
                                <?php
                                    $campaign_price = get_field('campaign_price');
                                ?>
                                <?php if (!empty($campaign_price['campaign_pre-price'])) : ?>
                                <p class="campaign-card__pre-price campaign-card__pre-price--side">
                                    &yen;<?php echo esc_html($campaign_price['campaign_pre-price']); ?>
                                </p>
                                <?php endif; ?>
                                <p class="campaign-card__after-price campaign-card__after-price--side">
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
                <div class="sidebar__btn-wrapper">
                    <a href="<?php echo get_post_type_archive_link('campaign'); ?>" class="btn">View more
                        <span></span>
                    </a>
                </div>
            </section>
            <section class="sidebar__archive">
                <h2 class="sidebar__title">アーカイブ</h2>
                <div class="sidebar__archive-content">
                    <?php
                        // 年と月を取得
                        $years = [];
                        $archives = wp_get_archives(array(
                            'type'            => 'monthly',
                            'limit'           => '',
                            'format'          => 'custom',
                            'before'          => '<div class="archive-months__item archive-month"><a href="#">',
                            'after'           => '</a></div>',
                            'show_post_count' => false,
                            'echo'            => 0,
                        ));
                        // 年ごとにアーカイブをグループ化
                        preg_match_all('/<div class="archive-months__item archive-month"><a href="#">(.*?)<\/a><\/div>/', $archives, $matches);
                        foreach ($matches[1] as $archive) :
                            preg_match('/(\d{4})年(\d{1,2})月/', $archive, $date);
                            $years[$date[1]][] = $date[2];
                        endforeach;
                    ?>
                    <?php foreach ($years as $year => $months): ?>
                    <div class="sidebar__archive-year archive-year"><?php echo $year; ?></div>
                    <div class="archive-year__item archive-months" style="display: none;">
                        <?php foreach ($months as $month): ?>
                        <?php
                            $month_padded = str_pad($month, 2, '0', STR_PAD_LEFT);
                            $url = get_month_link($year, $month_padded);
                            ?>
                        <div class="archive-months__item archive-month">
                            <a href="<?php echo esc_url($url); ?>"><?php echo $month; ?>月</a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
            </section>
        </aside>
    </div>
</div>