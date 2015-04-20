# POST /1/oauth/token

リフレッシュトークンからアクセストークンを取得

アクセストークンは有効期限が短いのでリフレッシュトークンを頻繁に利用することになります。

リフレッシュトークンの有効期限は30日程度です。

## リクエストパラメーター

| Name          | Description                     |
|---------------|---------------------------------|
| grant_type    | refresh_token (必須)            |
| client_id     | クライアントID (必須)           |
| client_secret | クライアントシークレット (必須) |
| refresh_token | リフレッシュトークン (必須)     |
| redirect_uri  | 登録したコールバックURL (必須)  |

※Basic認証を使った client_id と client_secret の検証もサポートしています。

## レスポンスの例

```
{
  "access_token":"74040c64b51128a492407caba995a285",
  "token_type":"bearer",
  "expires_in":3600,
  "refresh_token":"0327ba74dd6b34c47793c870818779bb"
}
```

## 解説

* access_token - APIにアクセスするために必要なトークン。有効期限は1時間。
* token_type - bearer
* expires_in - アクセストークンの有効期限
* refresh_token - アクセストークンを再発行するために必要なトークン。有効期限は30日。

## エラーレスポンスの例

```
{
  "error":"access_denied",
  "error_description":"POSTで送信してください。"
}
```
```
{
  "error":"invalid_request",
  "error_description":"不正なgrant_typeです。"
}
```
```
{
  "error":"invalid_request",
  "error_description":"不正なパラメーターです。"
}
```
```
{
  "error":"invalid_request",
  "error_description":"client_idもしくはclient_secretがありません。"
}
```
```
{
  "error":"unauthorized_client",
  "error_description":"クライアントが見つかりませんでした。"
}
```
```
{
  "error":"unauthorized_client",
  "error_description":"停止中のクライアントです。"
}
```
```
{
  "error":"invalid_request",
  "error_description":"不正な認可コードです。"
}
```
```
{
  "error":"invalid_request",
  "error_description":"認可コードの有効期限が切れています。"
}
```
```
{
  "error":"invalid_request",
  "error_description":"不正なリフレッシュトークンです。"
}
```
```
{
  "error":"invalid_request",
  "error_description":"リフレッシュトークンの有効期限が切れています。"
}
```
```
{
  "error":"access_denied",
  "error_description":"ユーザーが存在しません。"
}
```
```
{
  "error":"server_error",
  "error_description":"DB error"
}
```
