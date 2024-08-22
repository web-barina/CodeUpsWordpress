<?php if (!is_404() && !is_page_template('page-contact.php') && !is_page('contact/thanks')) : ?>

<!--contact-->
<section class="contact contact-wrapper contact-wrapper--layout">
    <div class="contact__inner inner">
        <div class="contact__content-inner">
            <div class="contact__address-wrapper">
                <div class="contact__info-wrapper">
                    <div class="contact__logo logo"><img
                            src="<?php echo get_theme_file_uri(); ?>/assets/images/common/contact-logo.png"
                            alt="コードアップスのロゴ" />
                    </div>
                </div>
                <div class="contact__info">
                    <div class="contact__address">
                        <p>沖縄県那覇市1-1</p>
                        <a href="tel:0120-000-0000" class="contact__tel">TEL:0120-000-0000</a>
                        <p>営業時間:8:30-19:00</p>
                        <p>定休日:毎週火曜日</p>
                    </div>
                    <div class="contact__map"><iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6888.6383644040225!2d127.68185319225111!3d26.211610509147523!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34e5697141a6b58b%3A0x2cd8aff616585e98!2z5rKW57iE55yM6YKj6Kah3biC!5e0!3m2!1sja!2sjp!4v1713793644657!5m2!1sja!2sjp"
                            width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe></div>
                </div>
            </div>
            <div class="contact__content">
                <div class="contact__titles">
                    <p class="contact__titles-english">Contact</p>
                    <h2 class="contact__titles-japanese">お問い合わせ</h2>
                </div>
                <p class="contact__text">ご予約・お問い合わせはコチラ</p>
                <div class="contact__btn-wrapper">
                    <a href="<?php echo esc_url(home_url('contact')); ?>" class="btn">Contact us
                        <span></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!--footer-->
<footer class="footer footer-wrapper" id="footer">
    <div class="footer__js-scroll-top" id="js-scroll-top">
        <a href="#"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/scroll-top.png"
                alt="上へ戻る矢印" /></a>
    </div>
    <div class="footer__inner inner">
        <div class="footer__icons">
            <div class="footer__logo">
                <a href="<?php echo home_url(); ?>"><img
                        src="<?php echo get_theme_file_uri(); ?>/assets/images/common/logo.png" alt="コードアップスのロゴ" /></a>
            </div>
            <div class="footer__sns-logos">
                <div class="footer__sns-logo">
                    <a href="https://www.facebook.com/" target=”_blank”><img
                            src="<?php echo get_theme_file_uri(); ?>/assets/images/common/FacebookLogo.png"
                            alt="facebook" /></a>
                </div>
                <div class="footer__sns-logo">
                    <a href="https://www.instagram.com/" target=”_blank”><img
                            src="<?php echo get_theme_file_uri(); ?>/assets/images/common/Instagram.png"
                            alt="instagram" /></a>
                </div>
            </div>
        </div>
        <div class="footer__site-map-wrapper">
            <nav class="footer__site-map site-map">
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
                                    function has_valid_price_footer($prices, $menu_key, $yen_key) {
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
                                    $page_id_footer = 17;
                                    $license_prices_footer = SCF::get('license_price', $page_id_footer);
                                ?>
                                <?php if (has_valid_price_footer($license_prices_footer, 'license_menu', 'license_yen')) : ?>
                                <li class="site-map__sub-title">
                                    <a href="<?php echo esc_url(home_url('price#license-price')); ?>">ライセンス講習</a>
                                </li>
                                <?php endif; ?>
                                <?php 
                                    // 体験ダイビング
                                    $trial_prices_footer = SCF::get('trial_price', $page_id_footer);
                                ?>
                                <?php if (has_valid_price_footer($trial_prices_footer, 'trial_menu', 'trial_yen')) : ?>
                                <li class="site-map__sub-title">
                                    <a href="<?php echo esc_url(home_url('price#trial-price')); ?>">体験ダイビング</a>
                                </li>
                                <?php endif; ?>
                                <?php 
                                    // ファンダイビング
                                    $fun_prices_footer = SCF::get('fun_price', $page_id_footer);
                                ?>
                                <?php if (has_valid_price_footer($fun_prices_footer, 'fun_menu', 'fun_yen')) : ?>
                                <li class="site-map__sub-title">
                                    <a href="<?php echo esc_url(home_url('price#fun-price')); ?>">ファンダイビング</a>
                                </li>
                                <?php endif; ?>
                                <?php 
                                    // スペシャルダイビング
                                    $special_prices_footer = SCF::get('special_price', $page_id_footer);
                                ?>
                                <?php if (has_valid_price_footer($special_prices_footer, 'special_menu', 'special_yen')) : ?>
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
    <div class="footer__copy">Copyright © 2021 - 2023 CodeUps LLC. All Rights Reserved.</div>
    <?php wp_footer(); ?>
</footer>
</body>

</html>