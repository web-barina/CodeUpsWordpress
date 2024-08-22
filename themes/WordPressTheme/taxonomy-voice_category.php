<?php get_header(); ?>

<section class="voice voice-wrapper">
    <div class="voice__inner inner">
        <div class="voice__tabs tabs">
            <a href="<?php echo get_post_type_archive_link('voice'); ?>"
                class="tabs__item tab <?php echo !is_tax('voice_category') ? 'js-active' : ''; ?>">ALL</a>
            <?php
                $terms = get_terms(array(
                    'taxonomy' => 'voice_category',
                    'hide_empty' => false,
                ));
                foreach ($terms as $term) :
            ?>
            <a href="<?php echo get_term_link($term); ?>"
                class="tabs__item tab <?php echo is_tax('voice_category', $term->slug) ? 'js-active' : ''; ?>">
                <?php echo esc_html($term->name); ?></a>
            <?php endforeach; ?>
        </div>
        <div class="voice__cards-inner">
            <?php if (have_posts()) : ?>
            <ul class="voice__cards voice-cards">
                <?php while (have_posts()) : the_post(); ?>
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
            <p class="voice-card__no-message">ただいま準備中です。もう少しお待ちください。</p>
            <?php endif; ?>
            <div class="voice__pager-wrapper">
                <div class="voice__pager pager">
                    <ul class="pager__number-wrapper">
                        <?php wp_pagenavi(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>