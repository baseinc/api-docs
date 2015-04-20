# POST /1/categories/delete

カテゴリー情報を削除

## scope

write_items

## リクエストパラメーター

| Name        | Description         |
|-------------|---------------------|
| category_id | カテゴリーID (必須) |

## レスポンスの例

```
{
  "categories":[
    {
      "category_id":1234,
      "name":"VネックTシャツ",
      "list_order":1
    },
    {
      "category_id":1236,
      "name":"Tシャツ",
      "list_order":2
    }
  ]
}
```

## 解説

* category_id - カテゴリーを識別するユニークなID
* name - カテゴリー名
* list_order - カテゴリーの並び順

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
  "error":"bad_category_id",
  "error_description":"不正なcategory_idです。"
}
```
```
{
  "error":"db_error",
  "error_description":"DBエラーです。"
}
```
