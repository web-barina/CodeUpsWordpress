<!--ブログ一覧-->
<?php get_header(); ?>
<main>
    <div class="blog-layout">
        <div class="blog-layout__inner inner">
            <div class="blog-layout__2column">
                <article class="blog-layout__main blog">
                    <?php if (have_posts()) : ?>
                    <ul class="blog__cards blog-cards blog-cards--blog-page">
                        <?php while (have_posts()) : the_post(); ?>
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
                                    <time datetime="<?php the_time("c") ?>"
                                        class="blog-card__time"><?php the_time("Y.m.d") ?></time>
                                    <h2 class="blog-card__title"><?php the_title() ?></h2>
                                    <p class="blog-card__text">
                                        <?php echo wp_trim_words( get_the_content(), 60, '' ); ?>
                                    </p>
                                    </p>
                                </div>
                            </a>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                    <?php else : ?>
                    <p class="blog-card__no-message">ただいま準備中です。少々お待ちください。</p>
                    <?php endif; ?>
                    <div class="blog-card__pager-wrapper">
                        <div class="blog-card__pager pager">
                            <ul class="pager__number-wrapper">
                                <?php wp_pagenavi(); ?>
                            </ul>
                        </div>
                    </div>
                </article>
                <!--sidebar-->
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</main><?php get_footer(); ?>