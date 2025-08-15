# わたしのプラグイン

WordPressの管理画面からメッセージを保存し、固定ページに表示します。

**WordPressプラグインの学習用**のためのシンプルなプラグインです。

## 使い方

1. `wp-content/plugins/` に `my-plugin` フォルダを設置
2. プラグインを有効化
3. 管理画面でメッセージを保存
4. 固定ページに `[my_form]` を記述して表示


## ファイル構成
```
wp-content/plugins/my-plugin/
├── my-plugin.php
├── js/
│   ├── admin.js
│   └── script.js
└── css/
    ├── admin.css
    └── style.css
```


## 機能
- 管理画面にメニュー追加
- フォームからメッセージ保存（CSRF対策あり）
- ショートコード `[my_form]` で表示
- JS/CSSの読み込み（管理画面・固定ページ）


## おまけ
- JS/CSSの読み込み確認のために、文字色の変更やフェードインアニメーションなどの簡単な演出を加えています。


