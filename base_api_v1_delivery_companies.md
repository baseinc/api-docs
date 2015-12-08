# GET /1/delivery_companies

配送業者情報の一覧を取得

## scope

なし

## リクエストパラメーター

なし

## レスポンスの例
```
{
  "delivery_companies":[
    {
      "delivery_company_id":1,
      "name":"クロネコヤマト"
    },
    {
      "delivery_company_id":2,
      "name":"佐川急便"
    },
    {
      "delivery_company_id":3,
      "name":"日本通運"
    }
  ]
}
```

## 解説

* delivery_company_id - 配送業者ID
* name - 配送業者名

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

