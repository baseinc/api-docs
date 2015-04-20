# GET /1/item_categories/detail/:item_id

商品のカテゴリー情報を取得

## scope

read_items

## リクエストパラメーター

なし

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
  "error":"bad_item_id",
  "error_description":"不正なitem_idです。"
}
```
