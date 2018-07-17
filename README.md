# BASE API v1 ドキュメント (β版)
BASEのAPIの開発者向けのドキュメントです。

## 概要
このAPIを使うと、あなたのアプリケーションとBASEを連携させることができます。

例えば

* BASEのアカウントでログインする
* BASEのショップの商品情報を取得する
* BASEのショップの商品情報を更新する
* BASEのショップの注文情報を取得する

※ APIは順次公開していく予定です。

## 仕様

### エンドポイント

https://api.thebase.in/ 配下に各種APIが用意されています。 (httpsのみ)

### 認証

OAuth2.0に対応

Authorizationヘッダーでアクセストークンを送信して認証します。

```
Authorization: Bearer {Access_Token}
```

リフレッシュトークンも発行しています。

OAuth2.0の仕様については、下記の外部サイトを参照ください。

* http://openid-foundation-japan.github.io/rfc6749.ja.html
* http://openid-foundation-japan.github.io/rfc6750.ja.html

OAuth2.0のclient_idとclient_secretの取得には、BASE Developersへの利用登録と利用許可が必要です。下記URLから申請いただけます。
* https://developers.thebase.in

### scope

* read_users - ユーザー情報を取得 (デフォルトで付与)
* read_users_mail - ユーザーのメールアドレスを取得
* read_items - 商品情報を取得
* read_orders - 注文情報を取得
* read_savings - 振込申請情報を取得
* write_items - 商品情報を更新
* write_orders - 注文情報を更新

### レスポンス

JSON形式でレスポンスを返します。

正常な場合はHTTPステータスコード 200 OKを返します。

エラーの場合はHTTPステータスコード 400 Bad Requestを返します。

エラーレスポンスの例

```
{
  "error":"invalid_request",
  "error_description":"アクセストークンが無効です。"
}
```

## API

### OAuth

* [GET /1/oauth/authorize](base_api_v1_oauth_authorize.md) - 認可コードを取得
* [POST /1/oauth/token](base_api_v1_oauth_access_token.md) - 認可コードからアクセストークンを取得
* [POST /1/oauth/token](base_api_v1_oauth_refresh_token.md) - リフレッシュトークンからアクセストークンを取得

### Users

* [GET /1/users/me](base_api_v1_users_me.md) - ユーザー情報を取得

### Items

* [GET /1/items](base_api_v1_items.md) - 商品情報の一覧を取得
* [GET /1/items/detail/:item_id](base_api_v1_items_detail.md) - 商品情報を取得
* [POST /1/items/add](base_api_v1_items_add.md) - 商品情報を登録
* [POST /1/items/edit](base_api_v1_items_edit.md) - 商品情報を更新
* [POST /1/items/delete](base_api_v1_items_delete.md) - 商品情報を削除
* [POST /1/items/add_image](base_api_v1_items_add_image.md) - 商品情報の画像を登録
* [POST /1/items/delete_image](base_api_v1_items_delete_image.md) - 商品情報の画像を削除
* [POST /1/items/edit_stock](base_api_v1_items_edit_stock.md) - 商品情報の在庫数を更新
* [POST /1/items/delete_variation](base_api_v1_items_delete_variation.md) - 商品情報のバリエーションを削除

### Categories

* [GET /1/categories](base_api_v1_categories.md) - カテゴリー情報の一覧を取得
* [POST /1/categories/add](base_api_v1_categories_add.md) - カテゴリー情報を登録
* [POST /1/categories/edit](base_api_v1_categories_edit.md) - カテゴリー情報を更新
* [POST /1/categories/delete](base_api_v1_categories_delete.md) - カテゴリー情報を削除

### ItemCategories

* [GET /1/item_categories/detail/:item_id](base_api_v1_item_categories_detail.md) - 商品のカテゴリー情報を取得
* [POST /1/item_categories/add](base_api_v1_item_categories_add.md) - 商品のカテゴリー情報を登録
* [POST /1/item_categories/delete](base_api_v1_item_categories_delete.md) - 商品のカテゴリー情報を削除

### Orders

* [GET /1/orders](base_api_v1_orders.md) - 注文情報の一覧を取得
* [GET /1/orders/detail/:unique_key](base_api_v1_orders_detail.md) - 注文情報を取得
* [POST /1/orders/edit_status](base_api_v1_orders_edit_status.md) - 注文情報のステータスを更新

### Savings

* [GET /1/savings](base_api_v1_savings.md) - 振込申請情報の一覧を取得

### DeliveryCompanies

* [GET /1/delivery_companies](base_api_v1_delivery_companies.md) - 配送業者情報の一覧を取得

### Search

* [GET /1/search](base_api_v1_search.md) - BASE全体の商品の検索結果を取得
* [GET /1/search/refresh](base_api_v1_search_refresh.md) - 検索で取得した商品情報を再取得

## APIの利用制限

現在はユーザーの1時間の利用上限を5000回、1日の利用上限を100000回に設定しています。

上限を超えるとエラーレスポンスを返します。00分になると利用回数がリセットされます。

```
{
  "error":"hour_api_limit",
  "error_description":"1時間のAPIの利用上限を超えました。時間が変わってからもう一度アクセスしてください。"
}
```
```
{
  "error":"day_api_limit",
  "error_description":"1日のAPIの利用上限を超えました。日付が変わってからもう一度アクセスしてください。"
}
```

## サンプルプログラム

* [PHP](samples/sample.php)

## 注意点

BASE APIは現在β版のため仕様が変更される場合があります。

## API利用規約
[http://thebase.in/pages/api_term](http://thebase.in/pages/api_term)

## お問い合わせ

developers[at]thebase.in

BASE Developers [https://developers.thebase.in](https://developers.thebase.in)
