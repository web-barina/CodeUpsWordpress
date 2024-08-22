<!--よくある質問-->
<?php get_header(); ?>
<section class="contact-faq">
    <div class="contact-faq__inner inner">
        <div class="contact-faq__wrapper faq-wrapper">
            <?php
                $faqs = SCF::get('faq'); 
                $has_content = false; // コンテンツがあるかどうかのフラグを初期化
                if (!empty($faqs)) :
                    foreach ($faqs as $faq) :
                        $question = $faq['faq_question'];
                        $answer = $faq['faq_answer'];
                        if (!empty($question) && !empty($answer)) :
                            $has_content = true; // コンテンツがある場合にフラグを設定
            ?>
            <div class="faq-wrapper__item faq">
                <div class="faq__question">
                    <h2><?php echo esc_html($question); ?></h2>
                </div>
                <div class="faq__answer">
                    <p><?php echo nl2br(esc_html($answer)); ?></p>
                </div>
            </div>
            <?php
                        endif;
                    endforeach;
                endif;

                // コンテンツがない場合のメッセージ表示
                if (!$has_content) :
            ?>
            <p class="faq__no-content">ただいま準備中です。少々お待ちください。</p>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>