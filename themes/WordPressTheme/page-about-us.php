<!-- わたしたちについて -->
<?php get_header(); ?>
<section class="about-us about-us-wrapper">
    <div class="about-us__inner inner">
        <div class="about-us__img-wrapper">
            <div class="about-us__img-left">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/about-us-left.png"
                    alt="沖縄の赤茶色の瓦屋根にシーサーが乗っていてこちらを見ている" />
            </div>
            <div class="about-us__img-right">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/about-us-right.png"
                    alt="海の中で黄色い熱帯魚が２匹向かい合っている" />
            </div>
        </div>
        <div class="about-us__texts">
            <p class="about-us__main-text">Dive into<br />the Ocean</p>
            <div class="about-us__text">
                ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br />ここにテキストが入ります。
                ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
            </div>
        </div>
    </div>
</section>
<?php
// SCFで設定された繰り返しフィールドを取得
$gallery_photos = SCF::get('gallery_photos',get_the_ID());
 if(get_post_meta($post->ID, 'gallery_img', true)): 
?>
<section class="gallery gallery-wrapper">
    <div class="gallery__inner inner">
        <div class="gallery__section-titles section-titles">
            <p class="section-titles__english">Gallery</p>
            <h2 class="section-titles__japanese">フォト</h2>
        </div>
        <div class="gallery__photos-wrapper photos">
            <?php
                foreach ($gallery_photos as $index => $photo) :
                    $image_id = $photo['gallery_img']; // 画像フィールドのスラッグを指定
                    $image_url = wp_get_attachment_image_url($image_id, 'full');
                    $alt_text = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                    
                    // クラスの条件設定
                    $class = ($index + 1 === 1 || $index + 1 === 6) ? 'modal__content--large' : 'modal__content';
            ?>
            <div class="photos__item photo" id="modal<?php echo $index + 1; ?>">
                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($alt_text); ?>">
            </div>
            <?php
                endforeach;
            ?>
        </div>
        <!-- モーダル本体 -->
        <?php foreach ($gallery_photos as $index => $photo) : ?>
        <div class="gallery__modal modal" id="cont-modal<?php echo $index + 1; ?>" style="display: none;">
            <div class="modal__body">
                <div
                    class="<?php echo ($index + 1 === 1 || $index + 1 === 6) ? 'modal__content--large' : 'modal__content'; ?>">
                    <img src="<?php echo esc_url(wp_get_attachment_image_url($photo['gallery_img'], 'full')); ?>"
                        alt="<?php echo esc_attr(get_post_meta($photo['gallery_img'], '_wp_attachment_image_alt', true)); ?>">
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>
<?php endif; ?>
<?php get_footer(); ?>