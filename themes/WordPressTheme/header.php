<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="robots" content="noindex" />
    <?php wp_head(  ); ?>
</head>
<meta name="google-site-verification" content="v0UHgqf8g-tm9mRoYNFcIwV_WdTZLM2TkKXzaN31TGU" />
<?php wp_body_open(  ); ?>

<body <?php
        $classes = array();
        // 404ページの場合
        if (is_404()):
            $classes[] = 'no-page';
        endif;
        if (is_home()):
            $classes[] = 'blog-page'; // 'blog' クラスの代わりに 'blog-page' を追加
        endif;
        echo 'class="' . esc_attr(implode(' ', $classes)) . '"';
        body_class($classes);
    ?>>
    <!--loading-->
    <?php
        if (is_front_page()) :
            ?>
    <div class="js-loading">
        <div class="js-loading__start">
            <div class="js-loading__texts js-loading__texts--green">
                <h2 class="js-loading__main-text">DIVING</h2>
                <p class="js-loading__sub-text">into the ocean</p>
            </div>
        </div>
        <div class="js-loading__middle">
            <div class="js-loading__left"></div>
            <div class="js-loading__right"></div>
        </div>
        <div class="js-loading__last">
            <div class="js-loading__texts">
                <h2 class="js-loading__main-text">DIVING</h2>
                <p class="js-loading__sub-text">into the ocean</p>
            </div>
        </div>
    </div>
    <?php endif;?>
    <!--header-->
    <header class="header">
        <!--SP-hamburger-header-->
        <div class="header__inner">
            <h1 class="header__logo"><a href="<?php echo esc_url(home_url()); ?>"><img
                        src="<?php echo get_theme_file_uri(); ?>/assets/images/common/logo.png" alt="コードアップスのロゴ" /></a>
            </h1>
            <div class="header__content">
                <div class="header__hamburger" id="js-hamburger"><span></span><span></span><span></span></div>
                <!--PC-header-->
                <nav class="header__pc-nav">
                    <ul class="header__items">
                        <li class="header__item">
                            <a href="<?php echo esc_url(home_url('campaign')); ?>">
                                <div class="header__titles">
                                    <p class="header__titles-english">Campaign</p>
                                    <p class="header__titles-japanese">キャンペーン</p>
                                </div>
                            </a>
                        </li>
                        <li class="header__item">
                            <a href="<?php echo esc_url(home_url('about-us')); ?>">
                                <div class="header__titles">
                                    <p class="header__titles-english">About us</p>
                                    <p class="header__titles-japanese">私たちについて</p>
                                </div>
                            </a>
                        </li>
                        <li class="header__item">
                            <a href="<?php echo esc_url(home_url('information')); ?>">
                                <div class="header__titles">
                                    <p class="header__titles-english">Information</p>
                                    <p class="header__titles-japanese">ダイビング情報</p>
                                </div>
                            </a>
                        </li>
                        <li class="header__item">
                            <a href="<?php echo esc_url(home_url('blog')); ?>">
                                <div class="header__titles">
                                    <p class="header__titles-english">Blog</p>
                                    <p class="header__titles-japanese">ブログ</p>
                                </div>
                            </a>
                        </li>
                        <li class="header__item">
                            <a href="<?php echo esc_url(home_url('voice')); ?>">
                                <div class="header__titles">
                                    <p class="header__titles-english">Voice</p>
                                    <p class="header__titles-japanese">お客様の声</p>
                                </div>
                            </a>
                        </li>
                        <li class="header__item">
                            <a href="<?php echo esc_url(home_url('price')); ?>">
                                <div class="header__titles">
                                    <p class="header__titles-english">Price</p>
                                    <p class="header__titles-japanese">料金一覧</p>
                                </div>
                            </a>
                        </li>
                        <li class="header__item">
                            <a href="<?php echo esc_url(home_url('faq')); ?>">
                                <div class="header__titles">
                                    <p class="header__titles-english">FAQ</p>
                                    <p class="header__titles-japanese">よくある質問</p>
                                </div>
                            </a>
                        </li>
                        <li class="header__item">
                            <a href="<?php echo esc_url(home_url('contact')); ?>">
                                <div class="header__titles">
                                    <p class="header__titles-english">Contact</p>
                                    <p class="header__titles-japanese">お問い合わせ</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!--SP-header-->
        <div class="header__sp-nav">
            <div class="header__site-map-wrapper">
                <div class="header__site-map-inner">
                    <nav class="header__site-map site-map">

                        <div class="site-map__sp-layout">
                            <div class="site-map__content">
                                <div class="site-map__main-title site-map__main-title--layout">
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
                                <div class="site-map__main-title">
                                    <a href="<?php echo esc_url(home_url('about-us')); ?>">私たちについて</a>
                                </div>
                            </div>
                            <div class="site-map__main">
                                <div class="site-map__main-title">
                                    <a href="<?php echo esc_url(home_url('information')); ?>">ダイビング情報</a>
                                </div>
                                <div class="site-map__sub-group">
                                    <ul class="site-map__sub-titles">
                                        <li class="site-map__sub-title">
                                            <a
                                                href="<?php echo esc_url(home_url('information#license-info')); ?>">ライセンス講習</a>
                                        </li>
                                        <li class="site-map__sub-title">
                                            <a
                                                href="<?php echo esc_url(home_url('information#fun-info')); ?>">ファンダイビング</a>
                                        </li>
                                        <li class="site-map__sub-title">
                                            <a
                                                href="<?php echo esc_url(home_url('information#trial-info')); ?>">体験ダイビング</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="site-map__main-title">
                                    <a href="<?php echo esc_url(home_url('blog')); ?>">ブログ</a>
                                </div>
                            </div>
                        </div>
                        <div class="site-map__sp-layout">
                            <div class="site-map__main">
                                <div class="site-map__main-title site-map__main-title--layout">
                                    <a href="<?php echo esc_url(home_url('voice')); ?>">お客様の声</a>
                                </div>
                                <div class="site-map__main-title">
                                    <a href="<?php echo esc_url(home_url('price')); ?>">料金一覧</a>
                                </div>
                                <div class="site-map__sub">
                                    <ul class="site-map__sub-titles">
                                        <?php 
                                            // データが有効かどうかを確認する関数
                                            function has_valid_price_header($prices, $menu_key, $yen_key) {
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
                                            $page_id_header = 17;
                                            $license_prices_header = SCF::get('license_price', $page_id_header);
                                        ?>
                                        <?php if (has_valid_price_header($license_prices_header, 'license_menu', 'license_yen')) : ?>
                                        <li class="site-map__sub-title">
                                            <a
                                                href="<?php echo esc_url(home_url('price#license-price')); ?>">ライセンス講習</a>
                                        </li>
                                        <?php endif; ?>
                                        <?php 
                                            // 体験ダイビング
                                            $trial_prices_header = SCF::get('trial_price', $page_id_header);
                                        ?>
                                        <?php if (has_valid_price_header($trial_prices_header, 'trial_menu', 'trial_yen')) : ?>
                                        <li class="site-map__sub-title">
                                            <a href="<?php echo esc_url(home_url('price#trial-price')); ?>">体験ダイビング</a>
                                        </li>
                                        <?php endif; ?>
                                        <?php 
                                            // ファンダイビング
                                            $fun_prices_header = SCF::get('fun_price', $page_id_header);
                                        ?>
                                        <?php if (has_valid_price_header($fun_prices_header, 'fun_menu', 'fun_yen')) : ?>
                                        <li class="site-map__sub-title">
                                            <a href="<?php echo esc_url(home_url('price#fun-price')); ?>">ファンダイビング</a>
                                        </li>
                                        <?php endif; ?>
                                        <?php 
                                            // スペシャルダイビング
                                            $special_prices_header = SCF::get('special_price', $page_id_header);
                                        ?>
                                        <?php if (has_valid_price_header($special_prices_header, 'special_menu', 'special_yen')) : ?>
                                        <li class="site-map__sub-title">
                                            <a
                                                href="<?php echo esc_url(home_url('price#special-price')); ?>">スペシャル<wbr />ダイビング</a>
                                        </li>
                                        <?php endif; ?>

                                    </ul>
                                </div>
                            </div>
                            <ul class="site-map__main">
                                <li class="site-map__main-title">
                                    <a href="<?php echo esc_url(home_url('faq')); ?>">よくある質問</a>
                                </li>
                                <li class="site-map__main-title">
                                    <a href="<?php echo esc_url(home_url('privacypolicy')); ?>">プライバシー<wbr />ポリシー</a>
                                </li>
                                <li class="site-map__main-title">
                                    <a href="<?php echo esc_url(home_url('terms-of-service')); ?>">利用規約</a>
                                </li>
                                <li class="site-map__main-title">
                                    <a href="<?php echo esc_url(home_url('contact')); ?>">お問い合わせ</a>
                                </li>
                                <li class="site-map__main-title">
                                    <a href="<?php echo esc_url(home_url('sitemap')); ?>">サイトマップ</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <?php if (!is_front_page()) : ?>
    <?php if (is_page('price')) : ?>
    <section class="lower-FV">
        <div class="lower-FV__img lower-FV__img--price">
            <h1>Price</h1>
        </div>
    </section>
    <?php elseif (is_page('about-us')) : ?>
    <section class="lower-FV">
        <div class="lower-FV__img lower-FV__img--about">
            <h1>About us</h1>
        </div>
    </section>
    <?php elseif (is_page('faq')) : ?>
    <section class="lower-FV">
        <div class="lower-FV__img lower-FV__img--FAQ">
            <h1>FAQ</h1>
        </div>
    </section>
    <?php elseif (is_post_type_archive('campaign') || is_tax('campaign_category')) : ?>
    <section class="lower-FV">
        <div class="lower-FV__img lower-FV__img--campaign">
            <h1>Campaign</h1>
        </div>
    </section>
    <?php elseif (is_post_type_archive('voice') || is_tax('voice_category')) : ?>
    <section class="lower-FV">
        <div class="lower-FV__img lower-FV__img--voice">
            <h1>Voice</h1>
        </div>
    </section>
    <?php elseif (is_page('information')) : ?>
    <section class="lower-FV">
        <div class="lower-FV__img lower-FV__img--info">
            <h1>Information</h1>
        </div>
    </section>
    <?php elseif (is_home('blog') || is_single() || is_date()) : ?>
    <section class="lower-FV">
        <div class="lower-FV__img lower-FV__img--blog">
            <h1>Blog</h1>
        </div>
    </section>
    <?php elseif (is_page('contact') || is_page('thanks')) : ?>
    <section class="lower-FV">
        <div class="lower-FV__img lower-FV__img--contact">
            <h1>Contact</h1>
        </div>
    </section>
    <?php elseif (is_page('privacypolicy')) : ?>
    <section class="lower-FV">
        <div class="lower-FV__img lower-FV__img--fish">
            <h1>Privacy Policy</h1>
        </div>
    </section>
    <?php elseif (is_page('terms-of-service')) : ?>
    <section class="lower-FV">
        <div class="lower-FV__img lower-FV__img--fish">
            <h1>Term of Service</h1>
        </div>
    </section>
    <?php elseif (is_page('sitemap')) : ?>
    <section class="lower-FV">
        <div class="lower-FV__img lower-FV__img--fish">
            <h1>Site MAP</h1>
        </div>
    </section>
    <?php else : ?>
    <!-- Other Pages FV -->
    <?php endif; ?>
    <?php endif; ?>
    <main>
        <!-- パンくず -->
        <?php if (!is_front_page()) : ?>
        <div class="bread">
            <div class="bread__inner inner">
                <?php if (function_exists('bcn_display')): 
                    // 404ページの場合のクラスを設定
                    $breadcrumb_class = is_404() ? 'no-page__bread' : ''; 
                ?>
                <div id="<?php echo is_404() ? 'no-page__bread' : 'breadcrumb'; ?>" vocab="http://schema.org/"
                    typeof="BreadcrumbList">
                    <?php bcn_display(); ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>
    </main>