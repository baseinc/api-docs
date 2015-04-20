# POST /1/item_categories/add

商品のカテゴリー情報を登録

## scope

write_items

## リクエストパラメーター

| Name        | Description         |
|-------------|---------------------|
| item_id     | 商品ID (必須)       |
| category_id | カテゴリーID (任意) |

## レスポンスの例

```
{
  "item_categories":[
    {
      "item_category_id":123,
      "item_id":1000,
      "category_id":11
    },
    {
      "item_category_id":124,
      "item_id":1000,
      "category_id":12
    },
    {
      "item_category_id":125,
      "item_id":1000,
      "category_id":13
    }
  ]
}
```

## 解説

* item_category_id - 商品のカテゴリーを識別するユニークなID
* item_id - 商品ID
* category_id - カテゴリーID

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
  "error":"bad_item_id",
  "error_description":"不正なitem_idです。"
}
```
```
{
  "error":"bad_category_id",
  "error_description":"不正なcategory_idです。"
}
```
```
{
  "error":"validation_error",
  "error_description":"バリデーションエラーです。"
}
```
