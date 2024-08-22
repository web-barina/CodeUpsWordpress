<!--料金一覧-->
<?php get_header(); ?>
<section class="price price-wrapper">
    <div class="price__inner inner">
        <div class="price__menu-wrapper menus">
            <?php
                $license_prices = SCF::get('license_price');
                $trial_prices = SCF::get('trial_price');
                $fun_prices = SCF::get('fun_price');
                $special_prices = SCF::get('special_price');

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
            ?>

            <?php if (has_valid_price($license_prices, 'license_menu', 'license_yen')) : ?>
            <div class="menus__item menu" id="license-price">
                <div class="menu__title-wrapper">
                    <h2 class="menu__title">ライセンス取得</h2>
                    <img class="menu__title-img"
                        src="<?php echo get_theme_file_uri(); ?>/assets/images/common/price-deco.png"
                        alt="クジラのアイコンイラスト" />
                </div>
                <table class="menu__lists" aria-label="ライセンス講習">
                    <tbody>
                        <?php foreach ($license_prices as $license_price) : ?>
                        <tr>
                            <td class="menu__name">
                                <?php echo esc_html($license_price['license_menu']); ?>
                            </td>
                            <td class="menu__yen">
                                &yen;<?php echo esc_html($license_price['license_yen']); ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php endif; ?>

            <?php if (has_valid_price($trial_prices, 'trial_menu', 'trial_yen')) : ?>
            <div class="menus__item menu" id="trial-price">
                <div class="menu__title-wrapper">
                    <h2 class="menu__title">体験ダイビング</h2>
                    <img class="menu__title-img"
                        src="<?php echo get_theme_file_uri(); ?>/assets/images/common/price-deco.png"
                        alt="クジラのアイコンイラスト" />
                </div>
                <table class="menu__lists" aria-label="体験ダイビング">
                    <tbody>
                        <?php foreach ($trial_prices as $trial_price) : ?>
                        <tr>
                            <td class="menu__name">
                                <?php echo esc_html($trial_price['trial_menu']); ?>
                            </td>
                            <td class="menu__yen">
                                &yen;<?php echo esc_html($trial_price['trial_yen']); ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php endif; ?>

            <?php if (has_valid_price($fun_prices, 'fun_menu', 'fun_yen')) : ?>
            <div class="menus__item menu" id="fun-price">
                <div class="menu__title-wrapper">
                    <h2 class="menu__title">ファンダイビング</h2>
                    <img class="menu__title-img"
                        src="<?php echo get_theme_file_uri(); ?>/assets/images/common/price-deco.png"
                        alt="クジラのアイコンイラスト" />
                </div>
                <table class="menu__lists" aria-label="ファンダイビング">
                    <tbody>
                        <?php foreach ($fun_prices as $fun_price) : ?>
                        <tr>
                            <td class="menu__name">
                                <?php echo esc_html($fun_price['fun_menu']); ?>
                            </td>
                            <td class="menu__yen">
                                &yen;<?php echo esc_html($fun_price['fun_yen']); ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php endif; ?>

            <?php if (has_valid_price($special_prices, 'special_menu', 'special_yen')) : ?>
            <div class="menus__item menu" id="special-price">
                <div class="menu__title-wrapper">
                    <h2 class="menu__title">スペシャルダイビング</h2>
                    <img class="menu__title-img"
                        src="<?php echo get_theme_file_uri(); ?>/assets/images/common/price-deco.png"
                        alt="クジラのアイコンイラスト" />
                </div>
                <table class="menu__lists" aria-label="スペシャルダイビング">
                    <tbody>
                        <?php foreach ($special_prices as $special_price) : ?>
                        <tr>
                            <td class="menu__name">
                                <?php echo esc_html($special_price['special_menu']); ?>
                            </td>
                            <td class="menu__yen">
                                &yen;<?php echo esc_html($special_price['special_yen']); ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php endif; ?>

        </div>
    </div>
</section>
<?php get_footer(); ?>