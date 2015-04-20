# POST /1/items/delete

商品情報を削除

## scope

write_items

## リクエストパラメーター

| Name    | Description   |
|---------|---------------|
| item_id | 商品ID (必須) |

## レスポンスの例
```
{
  "result":true
}
```

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
```
{
  "error":"invalid_scope",
  "error_description":"スコープが無効です。"
}
```
```
{
  "error":"not_post_method",
  "error_description":"POSTで送信してください。"
}
```
```
{
  "error":"no_item_id",
  "error_description":"item_idは必須です。"
}
```
```
{
  "error":"bad_item_id",
  "error_description":"不正なitem_idです。"
}
```
```
{
  "error":"db_error",
  "error_description":"DBエラーです。"
}
```
```
{
  "error":"invalid_request",
  "error_description":"デジタルコンテンツの商品は編集できません。"
}
```
```
{
  "error":"invalid_request",
  "error_description":"ClubTの商品は編集できません。"
}
```
