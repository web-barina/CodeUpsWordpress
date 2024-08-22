<!--利用規約-->
<?php get_header(); ?>
<!--terms-->
<section class="terms">
    <?php if (have_posts()) : ?>
    <div class="terms__inner inner">
        <?php while (have_posts()) : the_post(); ?>
        <div class="terms__title">
            <h2>
                <?php the_title() ?>
            </h2>
        </div>
        <div class="terms__text">
            <?php the_content() ?>
        </div>
        <?php endwhile; ?>
    </div>
    <?php endif; ?>
</section>
<?php get_footer(); ?>