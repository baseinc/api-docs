# GET /1/users/me

ユーザー情報を取得

## scope

read_users (メールアドレスも取得したい場合はread_users_mail)

## リクエストパラメーター

* なし

## レスポンスの例
```
{
  "user":{
    "shop_id":"shop",
    "shop_name":"BASEショップ",
    "shop_introduction":"BASEのノベルティショップです。",
    "shop_url":"http://shop.thebase.in",
    "twitter_id":"baseec",
    "facebook_id":"baseec",
    "ameba_id":"baseec",
    "instagram_id":"baseec",
    "background":null,
    "logo":"https://baseec.s3.amazonaws.com/images/user/logo/c11fbd023b998035d0b813962ca77062.png",
    "mail_address":"hoge@hogehoge.com"
  }
}
```

## 解説

* shop_id - ユーザーを識別するユニークなID。文字列型。
* background - ショップの背景画像
* logo - ショップのロゴ画像
* mail_address - read_users_mailのscopeがある時のみ取得できます。

## エラーレスポンスの例

```
{
  "error":"access_denied",
  "error_description":"httpsでアクセスしてください。"
}
```
```
{
  "error":"invalid_request",
  "error_description":"アクセストークンが無効です。"
}
```
