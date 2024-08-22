<!--サイトマップ-->
<?php get_header(); ?>
<section class="site-map-page site-map-page-wrapper">
    <div class="site-map-page__inner inner">
        <nav class="site-map-page__nav site-map site-map--page">
            <div class="site-map__sp-layout">
                <div class="site-map__content">
                    <div class="site-map__main-title site-map__main-title--black">
                        <a href="<?php echo esc_url(home_url('campaign')); ?>">キャンペーン</a>
                    </div>
                    <ul class="site-map__sub-titles">
                        <?php
                                $terms = get_terms(array(
                                    'taxonomy' => 'campaign_category',
                                    'hide_empty' => false,
                                ));
                                foreach ($terms as $term) :
                                    $term_slug = $term->slug;
                                    $term_name = $term->name;
                            ?>
                        <li class="site-map__sub-title">
                            <a href="<?php echo get_term_link($term); ?>">
                                <?php echo esc_html($term_name); ?>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="site-map__main-title site-map__main-title--black">
                        <a href="<?php echo esc_url(home_url('about-us')); ?>">私たちについて</a>
                    </div>
                </div>
                <div class="site-map__main">
                    <div class="site-map__main-title site-map__main-title--black">
                        <a href="<?php echo esc_url(home_url('information')); ?>">ダイビング情報</a>
                    </div>
                    <div class="site-map__sub-group">
                        <ul class="site-map__sub-titles">
                            <li class="site-map__sub-title">
                                <a href="<?php echo esc_url(home_url('information#license-info')); ?>">ライセンス講習</a>
                            </li>
                            <li class="site-map__sub-title">
                                <a href="<?php echo esc_url(home_url('information#fun-info')); ?>">ファンダイビング</a>
                            </li>
                            <li class="site-map__sub-title">
                                <a href="<?php echo esc_url(home_url('information#trial-info')); ?>">体験ダイビング</a>
                            </li>
                        </ul>
                    </div>
                    <div class="site-map__main-title site-map__main-title--black">
                        <a href="<?php echo esc_url(home_url('blog')); ?>">ブログ</a>
                    </div>
                </div>
            </div>
            <div class="site-map__sp-layout">
                <div class="site-map__main">
                    <div class="site-map__main-title site-map__main-title--black">
                        <a href="<?php echo esc_url(home_url('voice')); ?>">お客様の声</a>
                    </div>
                    <div class="site-map__main-title site-map__main-title--black">
                        <a href="<?php echo esc_url(home_url('price')); ?>">料金一覧</a>
                    </div>
                    <div class="site-map__sub">
                        <ul class="site-map__sub-titles">
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
                            <li class="site-map__sub-title">
                                <a href="<?php echo esc_url(home_url('price#license-price')); ?>">ライセンス講習</a>
                            </li>
                            <?php endif; ?>
                            <?php 
                                // 体験ダイビング
                                $trial_prices = SCF::get('trial_price', $page_id);
                            ?>
                            <?php if (has_valid_price($trial_prices, 'trial_menu', 'trial_yen')) : ?>
                            <li class="site-map__sub-title">
                                <a href="<?php echo esc_url(home_url('price#trial-price')); ?>">体験ダイビング</a>
                            </li>
                            <?php endif; ?>
                            <?php 
                                // ファンダイビング
                                $fun_prices = SCF::get('fun_price', $page_id);
                            ?>
                            <?php if (has_valid_price($fun_prices, 'fun_menu', 'fun_yen')) : ?>
                            <li class="site-map__sub-title">
                                <a href="<?php echo esc_url(home_url('price#fun-price')); ?>">ファンダイビング</a>
                            </li>
                            <?php endif; ?>
                            <?php 
                                // スペシャルダイビング
                                $special_prices = SCF::get('special_price', $page_id);
                            ?>
                            <?php if (has_valid_price($special_prices, 'special_menu', 'special_yen')) : ?>
                            <li class="site-map__sub-title">
                                <a href="<?php echo esc_url(home_url('price#special-price')); ?>">スペシャル<wbr />ダイビング</a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <ul class="site-map__main">
                    <li class="site-map__main-title site-map__main-title--black">
                        <a href="<?php echo esc_url(home_url('faq')); ?>">よくある質問</a>
                    </li>
                    <li class="site-map__main-title site-map__main-title--black">
                        <a href="<?php echo esc_url(home_url('privacypolicy')); ?>">プライバシー<wbr />ポリシー</a>
                    </li>
                    <li class="site-map__main-title site-map__main-title--black">
                        <a href="<?php echo esc_url(home_url('terms-of-service')); ?>">利用規約</a>
                    </li>
                    <li class="site-map__main-title site-map__main-title--black">
                        <a href="<?php echo esc_url(home_url('contact')); ?>">お問い合わせ</a>
                    </li>
                    <li class="site-map__main-title site-map__main-title--black">
                        <a href="<?php echo esc_url(home_url('sitemap')); ?>">サイトマップ</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</section>
<?php get_footer(); ?>