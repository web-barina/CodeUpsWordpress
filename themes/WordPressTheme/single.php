<!--ブログ詳細ページ-->
<?php get_header(); ?>
<div class="blog-layout">
    <div class="blog-layout__inner inner">
        <?php if (have_posts()) : ?>
        <div class="blog-layout__2column">
            <?php while (have_posts()) : the_post(); ?>
            <article class="blog-layout__main blog-article">
                <time datetime="<?php the_time("c") ?>" class="blog-article__time"><?php the_time("Y.m.d") ?></time>
                <h1 class="blog-article__title"><?php the_title() ?></h1>
                <figure class="blog-card__img">
                    <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                    <?php else : ?>
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/no-image.png" alt="no-image" />
                    <?php endif; ?>
                </figure>
                <div class="blog-article__content">
                    <?php the_content( ) ?>
                    <div class="blog-article__pager-wrapper">
                        <div class="blog-article__pager pager pager--blog-article">
                            <?php
                                previous_post_link(
                                    '<div class="pager__before">%link</div>',
                                    '<svg class="pager__svg" width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path class="pager__path" d="M9 1L1 9L9 17" stroke="#408F95" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg> '
                                );
                                ?> <?php
                                next_post_link(
                                    '<div class="pager__after">%link</div>',
                                    '<svg class="pager__svg" width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path class="pager__path" d="M1 1L9 9L1 17" stroke="#408F95" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>'
                                );
                            ?>
                        </div>
                    </div>
                </div>
            </article>
            <?php endwhile; ?>
            <?php endif; ?>
            <!--sidebar-->
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>