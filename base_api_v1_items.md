# GET /1/items

商品情報の一覧を取得

## scope

read_items

## リクエストパラメーター

| Name   | Description                                                                  |
|--------|------------------------------------------------------------------------------|
| order  | 並び替え項目。list_order か created のいずれか (任意 デフォルト: list_order) |
| sort   | 並び順。asc か desc のいずれか (任意 デフォルト: asc)                        |
| limit  | リミット (任意 デフォルト: 20, MAX: 100)                                     |
| offset | オフセット (任意 デフォルト: 0)                                              |

## レスポンスの例

```
{
  "items":[
    {
      "item_id":1234,
      "title":"Tシャツ",
      "detail":"とってもオシャレなTシャツです。",
      "price":3900,
      "stock":10,
      "visible":1,
      "list_order":1,
      "identifier":"abcd-1234",
      "img1_origin":"https://baseec2.s3.amazonaws.com/images/item/origin/45fc036c772c8469fa40396b2ef0fb9b.jpg",
      "img2_origin":"https://baseec2.s3.amazonaws.com/images/item/origin/2a4de4965fa23b7b89944199713a827e.jpg",
      "img3_origin":null,
      "img4_origin":null,
      "img5_origin":null,
      "modified":1414731171,
      "variations":[
        {
          "variation_id":11,
          "variation":"黒色",
          "variation_stock":6,
          "variation_identifier":"abcd-1234-b"
        },
        {
          "variation_id":12,
          "variation":"白色",
          "variation_stock":4,
          "variation_identifier":"abcd-1234-w"
        }
      ]
    },
    {
      "item_id":12345,
      "title":"ロングTシャツ",
      "price":4900,
      "stock":20,
      "visible":1,
      "list_order":2,
      "identifier":null,
      "img1_origin":"https://baseec2.s3.amazonaws.com/images/item/origin/45fc036c772c8469fa40396b2ef0fb9b.jpg",
      "img2_origin":"https://baseec2.s3.amazonaws.com/images/item/origin/2a4de4965fa23b7b89944199713a827e.jpg",
      "img3_origin":null,
      "img4_origin":null,
      "img5_origin":null,
      "modified":1414731172,
      "variations":[
        {
          "variation_id":21,
          "variation":"Mサイズ",
          "variation_stock":12,
          "variation_identifier":null
        },
        {
          "variation_id":22,
          "variation":"Lサイズ",
          "variation_stock":8,
          "variation_identifier":null
        }
      ]
    }
  ]
}
```

## 解説

* item_id - 商品を識別するユニークなID
* price - 商品の値段 (税込み)
* stock - 在庫数
* visible - 表示フラグ。1:表示、0:非表示
* list_order - 表示順
* identifier - 商品コード
* img1_origin - 商品画像1のオリジナルサイズ
* variations - バリエーション情報
  * variation_id - バリエーションを識別するユニークなID
  * variation - バリエーションの種類
  * variation_stock - バリエーションの在庫数
  * variation_identifier - バリエーションの商品コード

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
