# flea-market

【概要】ある企業が開発した独自のフリマアプリ

【イメージ】


## 作成した目的

【背景と目的】coachtechブランドのアイテムを出品する


## アプリケーションURL


## 機能一覧

| 項目 (利用者) | 項目 (管理者) |
| ---- | ---- |
| 会員登録 | ログイン |
| ログイン | ログアウト |
| ログアウト | 商品一覧取得 |
| 商品一覧取得 | 商品詳細取得 |
| 商品詳細取得 | 利用者一覧取得 |
| ユーザ商品お気に入り一覧取得 | 利用者へのメール送信 |
| ユーザ情報取得 | ユーザーごとの全コメント一覧取得 |
| ユーザ購入商品一覧取得 | ユーザー削除機能 |
| ユーザ出品商品一覧取得 | コメント削除機能 |
| プロフィール新規作成 |  |
| プロフィール変更 |  |
| 商品お気に入り追加 |  |
| 商品お気に入り削除 |  |
| 商品コメント追加 |  |
| 商品コメント削除 |  |
| 出品 |  |
| 購入 |  |
| ユーザー自身が投稿したコメント削除機能 |  |


## 使用技術

* PHP v7.4.9-fpm
* Laravel v8.83.27
* Docker Desktop v4.22.1
* docker-compose v3.8
* nginx 1.21.1
* mySQL 8.0.26


## テーブル設計


## ER図



# 環境構築

## git clone

先にコピーを保存したいディレクトリに移動してから以下のコマンドを実行します。

`$ git clone git@github.com:magmag6240/flea-market.git`

これでLaravelプロジェクトがローカル環境にクローンされます。


## 開発環境の構築

以下のコマンドで開発環境を構築します。

`$ docker-compose up -d --build`

実行終了後、Docker Desktopを確認し、`coachtech-flea-market`コンテナが作成されているかを確認してください。


## vendorディレクトリを作る
以下のコマンドを実行してください。

`$ composer install`

`composer.lock`, `composer.json`に書かれた情報を基にパッケージやライブラリがまとめてインストールされ、`vendor`ディレクトリに配置されます。


## .envファイルを作る
git cloneしてきたプロジェクトに入っている`.env.example`ファイルを基に以下のコマンド実行で`.env`ファイルを作成します。

`$ cp .env.example .env`
`$ exit`

作成後、`.env`ファイルの内容を以下のように修正します。

// 前略

DB_CONNECTION=mysql  
DB_HOST=mysql  
DB_PORT=3306  
DB_DATABASE=laravel_db  
DB_USERNAME=laravel_user  
DB_PASSWORD=laravel_pass  

// 後略

## アプリケーションキーを初期化する
以下のコマンドで初期化を行います。

`$ php artisan key:generate`

## 動作確認
ブラウザに表示する準備は整いました。
以下のコマンド実行で、動作確認を行ってください。

`$ php artisan serve`


## ユーザー

* 利用者（ランダム）：998人
* 利用者（使用可能）：1人
* 管理者：1人


### 利用者

| id | name | email | password |
| ---- | ---- | ---- | ---- |
| 1 | 利用者 | user@example.com | password |

### 管理者

| id | name | email | password |
| ---- | ---- | ---- | ---- |
| 1 | 管理者 | admin@example.com | password |

