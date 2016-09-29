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
      "name":"メンズ",
      "list_order":1,
      "number":1,
      "parent_number":0,
      "code":"0001"
    },
    {
      "category_id":1235,
      "name":"トップス",
      "list_order":1,
      "number":2,
      "parent_number":1,
      "code":"0001-0002"
    },
    {
      "category_id":1236,
      "name":"Tシャツ",
      "list_order":1,
      "number":3,
      "parent_number":2,
      "code":"0001-0002-0003"
    },
    {
      "category_id":1237,
      "name":"レディーズ",
      "list_order":2,
      "number":4,
      "parent_number":0,
      "code":"0004"
    }
  ]
}
```

## 解説

* category_id - カテゴリーを識別するユニークなID
* name - カテゴリー名
* list_order - カテゴリーの並び順
* number - カテゴリー番号
* parent_number - 親カテゴリー番号
* code - カテゴリーコード。カテゴリー番号をハイフンで繋げたもの。最大3階層まで。

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
