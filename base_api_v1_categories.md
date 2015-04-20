# GET /1/categories

カテゴリー情報の一覧を取得

## scope

read_items

## リクエストパラメーター

なし

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
