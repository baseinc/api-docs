# POST /1/categories/edit

カテゴリー情報を更新

## scope

write_items

## リクエストパラメーター

| Name        | Description               |
|-------------|---------------------------|
| category_id | カテゴリーID (必須)       |
| name        | カテゴリー名 (任意)       |
| list_order  | カテゴリーの並び順 (任意) |

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
    },
    {
      "category_id":1235,
      "name":"UネックTシャツ",
      "list_order":3
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
  "error":"validation_error",
  "error_description":"バリデーションエラーです。"
}
```
