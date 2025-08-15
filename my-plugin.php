<?php
/*
Plugin Name: わたしのプラグイン
Description: WordPressプラグイン作成の練習用です。
Version: 1.0
Author: あなたの名前
*/

// 管理画面にメニューを追加
function add_admin_menu() {
    add_menu_page(
        'わたしのプラグイン', // ページのタイトル
        'わたしのプラグイン', // メニューに表示される名前
        'manage_options', // アクセスできるユーザーの権限。manage_optionsは管理者のみ
        'my-plugin', // ページのスラッグ（URLの一部になる）
        'add_plugin_page', //  管理画面の中身の関数。この後書きます。
        'dashicons-edit-page', // メニューアイコン
        20 // メニューの表示順
    );
};
add_action('admin_menu', 'add_admin_menu');


// 管理画面の中身
function add_plugin_page() {
    echo '<h1>わたしのプラグイン</h1>';
?>
    <div class="wrap">
        <p>メッセージを入力してください。</p>
        <form method="post">
            <?php wp_nonce_field('my_plugin_nonce_action', 'my_plugin_nonce_field'); ?>
            <label for="message">メッセージ:</label><br>
            <input type="text" name="message" value="<?php echo esc_attr(get_option('my_plugin_message', '')); ?>"><br><br>
            <input type="submit" name="save_message" value="保存">
        </form>
    </div>

<?php     
}

// メッセージ保存処理
function message_save() {
    if (isset($_POST['save_message']) && check_admin_referer('my_plugin_nonce_action', 'my_plugin_nonce_field')) {
        $message = sanitize_text_field($_POST['message']);
        update_option('my_plugin_message', $message);
    }
}
add_action('admin_init', 'message_save');


// $messeageの表示
function call_message() {
    $message = get_option('my_plugin_message');
    return '<h1 id="view_message">' . esc_html($message) . '</h1>';
}
add_shortcode('my_form', 'call_message');


// 管理画面にjavascript, cssを読み込む
function my_plugin_enqueue_admin_assets() {
    wp_enqueue_script('my-plugin-admin-js', plugins_url('js/admin.js', __FILE__), array('jquery'), null, true);
    wp_enqueue_style('my-plugin-admin-css', plugins_url('css/admin.css', __FILE__));
}
add_action('admin_enqueue_scripts', 'my_plugin_enqueue_admin_assets');


// 固定ページ・投稿用にjavascript, cssを読み込む
function my_plugin_enqueue_assets() {
    wp_enqueue_script('my-plugin-js', plugins_url('js/script.js', __FILE__), array('jquery'), null, true);
    wp_enqueue_style('my-plugin-css', plugins_url('css/style.css', __FILE__));
}
add_action('wp_enqueue_scripts', 'my_plugin_enqueue_assets');
