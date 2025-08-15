console.log('js/admin.jsです。管理画面のJSが読み込まれました。');

document.addEventListener('DOMContentLoaded', () => {
    // タイトルの色を変更
    const title = document.querySelector('h1');
    if (title) {
        title.style.color = '#02405dff';
    }

    // 保存ボタンを押したときにメッセージを表示
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', () => {
            alert('保存しました！');
        });
    }

});
