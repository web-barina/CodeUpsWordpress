<!--利用規約-->
<?php get_header(); ?>
<!--terms-->
<section class="privacy">
    <?php if (have_posts()) : ?>
    <div class="privacy__inner inner">
        <?php while (have_posts()) : the_post(); ?>
        <div class="privacy__title">
            <h2>
                <?php the_title() ?>
            </h2>
        </div>
        <div class="privacy__text">
            <?php the_content() ?>
        </div>
        <?php endwhile; ?>
    </div>
    <?php endif; ?>
</section>
<?php get_footer(); ?>