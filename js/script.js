console.log('js/script.jsです。固定ページ・投稿用のJSが読み込まれました。');

document.addEventListener('DOMContentLoaded', () => {
    const target = document.querySelector('#view_message');
    target.classList.add('fade-in');
});