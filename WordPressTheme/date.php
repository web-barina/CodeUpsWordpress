<?php get_header(); ?>

<main>
    <div class="blog-layout">
        <div class="blog-layout__inner inner">
            <div class="blog-layout__2column">
                <article class="blog-layout__main blog">
                    <?php
    // 現在のクエリパラメータを取得
    $year  = get_query_var('year');
    $month = get_query_var('month');

    if (!empty($year) && !empty($month)) {
        // 月別アーカイブのクエリを実行
        $args = array(
            'year'     => $year,
            'month' => $month,
            'post_type' => 'post', // 追加: 投稿タイプを指定
        );
    } elseif (!empty($year)) {
        // 年別アーカイブのクエリを実行
        $args = array(
            'year'     => $year,
            'post_type' => 'post', // 追加: 投稿タイプを指定
        );
    }

    if (isset($args)) { 
        $archive_query = new WP_Query($args);}

        if ($archive_query->have_posts()) : ?>
                    <ul class="blog__cards blog-cards blog-cards--blog-page">
                        <?php while ($archive_query->have_posts()) : $archive_query->the_post(); ?>
                        <li class="blog-cards__item blog-card">
                            <a href="<?php the_permalink() ?>">
                                <div class="blog-card__img-wrapper">
                                    <figure class="blog-card__img">
                                        <?php if (has_post_thumbnail()) : ?>
                                        <img src="<?php echo get_the_post_thumbnail_url(); ?>"
                                            alt="<?php the_title(); ?>">
                                        <?php else : ?>
                                        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/no-image.png"
                                            alt="no-image" />
                                        <?php endif; ?>
                                    </figure>
                                </div>
                                <div class="blog-card__body">
                                    <time datetime="<?php the_time() ?>"
                                        class="blog-card__time"><?php the_time("Y.m.d") ?></time>
                                    <h2 class="blog-card__title"><?php the_title() ?></h2>
                                    <p class="blog-card__text">
                                        <?php echo wp_trim_words(get_the_content(), 60, ''); ?>
                                    </p>
                                </div>
                            </a>
                        </li>
                        <?php  endwhile; ?>
                    </ul>
                    <?php else : ?>
                    <p>該当する記事がありません。</p>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                    <div class="blog-card__pager-wrapper">
                        <div class="blog-card__pager pager">
                            <div class="pager__ber-wrapper">
                                <?php wp_pagenavi(); ?>
                            </div>
                        </div>
                    </div>
                </article>
                <!--sidebar-->
                <?php get_sidebar(); ?>
            </div>
        </div>

    </div>
</main>

<?php get_footer(); ?>