<?php
function custom_enqueue_styles() {
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&display=swap', false);
    wp_enqueue_style('google-fonts-gotu', 'https://fonts.googleapis.com/css2?family=Gotu&display=swap', false);
    wp_enqueue_style('google-fonts-noto-sans-jp', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap', false);
}
add_action('wp_enqueue_scripts', 'custom_enqueue_styles');

function enqueue_custom_scripts() {
    // Enqueue Swiper CSS
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');

    // Enqueue custom CSS
    wp_enqueue_style('custom-style', get_theme_file_uri('/assets/css/style.css'));

    // Enqueue jQuery
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.6.0.min.js', array(), null, true);

    // Enqueue Swiper JS
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), null, true);

    // Enqueue jQuery inview plugin
    wp_enqueue_script('jquery-inview', get_theme_file_uri('/assets/js/jquery.inview.min.js'), array('jquery'), null, true);

    // Enqueue GSAP core
    wp_enqueue_script('gsap-core', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js', array(), null, true);

    // Enqueue GSAP ScrollTrigger plugin
    wp_enqueue_script('gsap-scrolltrigger', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js', array('gsap-core'), null, true);

    // Enqueue custom GSAP script
    wp_enqueue_script('custom-gsap', get_theme_file_uri('/assets/js/gsap.js'), array('gsap-core', 'gsap-scrolltrigger'), null, true);

    // Enqueue custom script
    wp_enqueue_script('custom-script', get_theme_file_uri('/assets/js/script.js'), array('jquery', 'swiper-js', 'jquery-inview', 'gsap-core', 'gsap-scrolltrigger'), null, true);

    // jQueryを読み込む（WordPressにバンドルされているもの）
    wp_enqueue_script('jquery');

    // jQuery Cookie Pluginを読み込む
    wp_enqueue_script(
        'jquery-cookie',
        'https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js',
        array('jquery'), // 依存関係を設定
        '1.4.1',
        true // フッターにスクリプトを配置
    );

    // カスタムスクリプトを読み込む
    wp_enqueue_script(
        'custom-js',
        get_template_directory_uri() . '/js/custom-script.js',
        array('jquery', 'jquery-cookie'),
        '1.0',
        true // フッターにスクリプトを配置
    );
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

/*******
 *ブログ*
 *******/ 
function my_setup() {//サムネイル表示
    add_theme_support( 'post-thumbnails' ); //アイキャッチ
    add_theme_support( 'automatic-feed-links' ); 
    add_theme_support( 'title-tag' ); 
    add_theme_support(
        'html5',
        array( /* HTML5のタグで出力 */
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        )
    );
}
add_action( 'after_setup_theme', 'my_setup' );

/**************************
 *サイドバーのブログ人気記事*
 *************************/
function set_post_views($postID) {
    $count_key = 'post_views_count';// 閲覧数をカウントする関数
    $count = get_post_meta($postID, $count_key, true);
    if($count == ''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
         update_post_meta($postID, $count_key, $count); // 修正された行
    }
    }

function track_post_views($post_id) {// 投稿が表示される度に閲覧数をカウント
    if (!is_single()) return;
    if (empty($post_id)) {
        global $post;
        $post_id = $post->ID;
    }
    set_post_views($post_id);
}
add_action('wp_head', 'track_post_views');

function remove_post_views_column($columns) {// 閲覧数を非公開にする（管理画面のカラムに表示しない）
    unset($columns['post_views_count']);
    return $columns;
}
add_filter('manage_posts_columns', 'remove_post_views_column');


/***************************
 *サイドバー、アーカイブリンク*
 ***************************/
function custom_rewrite_rule() {
    add_rewrite_rule('^data/([0-9]{4})/([0-9]{2})/?$', 'index.php?pagename=data&year=$matches[1]&monthnum=$matches[2]', 'top');
}
add_action('init', 'custom_rewrite_rule');

function custom_query_vars($vars) {
    $vars[] = 'year';
    $vars[] = 'monthnum';
    return $vars;
}
add_filter('query_vars', 'custom_query_vars');

/*************
 *キャンペーン*
 *************/
function filter_campaigns_by_custom_field($query) {
    if (!is_admin() && $query->is_main_query() && is_post_type_archive('campaign')) {
        $query->set('posts_per_page', 4);// 投稿4件表示
    }
}
add_action('pre_get_posts', 'filter_campaigns_by_custom_field');

/***********
 *お客様の声*
 ***********/
function filter_voice_posts_by_category($query) {
    if (!is_admin() && $query->is_main_query() && (is_post_type_archive('voice'))) {
        $query->set('posts_per_page', 6); // 投稿6件表示
    }
}
add_action('pre_get_posts', 'filter_voice_posts_by_category');


/**************
 *お問い合わせ*
 **************/
//セレクトボックス
function cf7_campaign_category_select_box() {
    // カスタムタクソノミーの用語を取得
    $terms = get_terms(array(
        'taxonomy' => 'campaign_category',
        'hide_empty' => false,
    ));

    // selectボックスのHTMLを生成
    $output = '<select name="campaign_category">';
    $output .= '<option value="">選択してください</option>'; // 初期選択肢
    foreach ($terms as $term) {
        $output .= sprintf('<option value="%s">%s</option>', esc_attr($term->slug), esc_html($term->name));
    }
    $output .= '</select>';
    return $output;
}

// セレクトボックスにショートコードを登録
add_shortcode('cf7_campaign_category_select', 'cf7_campaign_category_select_box');
function cf7_form_content_shortcode($form) {
    return do_shortcode($form);
}
add_filter('wpcf7_form_elements', 'cf7_form_content_shortcode');

// Contact Form 7の自動pタグ無効
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false() {
    return false;
}

//送信後サンクスページへ飛ばす
add_action( 'wp_footer', 'add_thanks_wcf7' );

function add_thanks_wcf7() {
echo <<< EOD
<script>
document.addEventListener( 'wpcf7mailsent', function( event ) {
location = 'https://barina-blog-str.conohawing.com/codeups/thanks';
}, false );
</script>
EOD;
}


/*****************
 *ログイン画面編集*
 *****************/
function login_logo() {
  echo '<style type="text/css">
    #login h1 a {
      background: url('.get_template_directory_uri().'/assets/images/common/logo.png) no-repeat top center;//ログイン画面のロゴ変更
      background-size:contain;
      width: 300px; //ログインの幅
      height: 70px; //ログインの高さ
    }
    body{
      background: url('.get_template_directory_uri().'/assets/images/common/sitemap-privacy-FV.png) no-repeat center center;//ログイン画面の背景変更
      background-size:contain;
    }
    .login #backtoblog a,
    .login #nav a,
    .dashicons-translation:before
    {
        text-decoration: none;
        color: #fff;
    }
  </style>';
}
add_action('login_head', 'login_logo');


/*************
 *管理画面編集*
 *************/
// ダッシュボードにオリジナルウィジェットを追加する
add_action('wp_dashboard_setup', 'my_dashboard_widgets');
function my_dashboard_widgets() {
        wp_add_dashboard_widget('my_theme_options_widget', 'こちらから編集してください', 'my_dashboard_widget_function');
}
// ダッシュボードのオリジナルウィジェット内に情報を掲載する
function my_dashboard_widget_function() {
        // 管理画面に表示される内容を以下に書く
echo '<ul class="custom_widget">
            <li><a href="post-new.php"><div class="dashicons dashicons-edit"></div><p>新しくブログを書く</p></a></li>
            <li><a href="edit.php"><div class="dashicons dashicons-list-view"></div><p>過去のブログ一覧</p></a></li>
            <li><a href="post.php?post=47&action=edit"><div class="dashicons dashicons-format-image"></div><p>トップ上部の画像編集</p></a></li>
            <li><a href="edit.php?post_type=campaign"><div class="dashicons dashicons-megaphone"></div><p>キャンペーン</p></a></li>
            <li><a href="post.php?post=12&action=edit"><div class="dashicons dashicons-format-image"></div><p>私たちについてのギャラリー</p></a></li>
            <li><a href="edit.php?post_type=voice"><div class="dashicons dashicons-format-chat"></div><p>お客様の声</p></a></li>
            <li><a href="post.php?post=17&action=edit"><div class="dashicons dashicons-money-alt"></div><p>料金一覧</p></a></li>
            <li><a href="post.php?post=19&action=edit"><div class="dashicons dashicons-format-status"></div><p>よくある質問</p></a></li>
            <li><a href="post.php?post=30&action=edit"><div class="dashicons dashicons-edit"></div><p>プライバシーポリシー</p></a></li>
            <li><a href="post.php?post=32&action=edit"><div class="dashicons dashicons-edit"></div><p>利用規約</p></a></li>
            </ul>';
}

// サムネイル列を追加
function add_post_thumbnail_column($columns) {
    $columns['thumbnail'] = __('Thumbnail');
    return $columns;
}
add_filter('manage_posts_columns', 'add_post_thumbnail_column');

// サムネイル列の内容を表示
function display_post_thumbnail_column($column, $post_id) {
    if ('thumbnail' === $column) {
        if (has_post_thumbnail($post_id)) {
            echo get_the_post_thumbnail($post_id, array(150, 150));
        } else {
            echo 'サムネイル画像が指定されていません。';
}
}
}
add_action('manage_posts_custom_column', 'display_post_thumbnail_column', 10, 2);

// サムネイル列のスタイルを調整
function adjust_thumbnail_column_width() {
echo '<style type="text/css">
.column-thumbnail {
    width: 150px;
}
</style>';
}
add_action('admin_head', 'adjust_thumbnail_column_width');

// ダッシュボードにスタイルシートを読み込む
function custom_admin_enqueue(){
     wp_enqueue_style( 'custom_admin_enqueue', get_stylesheet_directory_uri(). '/assets/css/style.css' );
}
add_action( 'admin_enqueue_scripts', 'custom_admin_enqueue' );


?>