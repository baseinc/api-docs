# POST /1/categories/add

カテゴリー情報を登録

## scope

write_items

## リクエストパラメーター

| Name       | Description               |
|------------|---------------------------|
| name       | カテゴリー名 (必須)       |
| list_order | カテゴリーの並び順 (任意) |

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
      "category_id":1235,
      "name":"UネックTシャツ",
      "list_order":2
    },
    {
      "category_id":1236,
      "name":"クールネックTシャツ",
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
  "error":"validation_error",
  "error_description":"バリデーションエラーです。"
}
```
