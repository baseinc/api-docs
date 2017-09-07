# GET /1/items/detail/:item_id

商品情報を取得

## scope

read_items

## リクエストパラメーター

* なし

## レスポンスの例
```
{
  "item":{
    "item_id":1234,
    "title":"Tシャツ",
    "detail":"とってもオシャレなTシャツです。",
    "price":3900,
    "proper_price":null,
    "stock":10,
    "visible":1,
    "list_order":1,
    "identifier":null,
    
    "img1_origin":"https://baseec2.s3.amazonaws.com/images/item/origin/45fc036c772c8469fa40396b2ef0fb9b.jpg",
    "img1_76":"https://baseec2.s3.amazonaws.com/images/item/76/45fc036c772c8469fa40396b2ef0fb9b.jpg",
    "img1_146":"https://baseec2.s3.amazonaws.com/images/item/146/45fc036c772c8469fa40396b2ef0fb9b.jpg",
    "img1_300":"https://baseec2.s3.amazonaws.com/images/item/300/45fc036c772c8469fa40396b2ef0fb9b.jpg",
    "img1_500":"https://baseec2.s3.amazonaws.com/images/item/500/45fc036c772c8469fa40396b2ef0fb9b.jpg",
    "img1_640":"https://baseec2.s3.amazonaws.com/images/item/640/45fc036c772c8469fa40396b2ef0fb9b.jpg",
    "img1_sp_480":"https://baseec2.s3.amazonaws.com/images/item/sp/480/45fc036c772c8469fa40396b2ef0fb9b.jpg",
    "img1_sp_640":"https://baseec2.s3.amazonaws.com/images/item/sp/640/45fc036c772c8469fa40396b2ef0fb9b.jpg",

    "img2_origin":"https://baseec2.s3.amazonaws.com/images/item/origin/2a4de4965fa23b7b89944199713a827e.jpg",
    "img2_76":"https://baseec2.s3.amazonaws.com/images/item/76/2a4de4965fa23b7b89944199713a827e.jpg",
    "img2_146":"https://baseec2.s3.amazonaws.com/images/item/146/2a4de4965fa23b7b89944199713a827e.jpg",
    "img2_300":"https://baseec2.s3.amazonaws.com/images/item/300/2a4de4965fa23b7b89944199713a827e.jpg",
    "img2_500":"https://baseec2.s3.amazonaws.com/images/item/500/2a4de4965fa23b7b89944199713a827e.jpg",
    "img2_640":"https://baseec2.s3.amazonaws.com/images/item/640/2a4de4965fa23b7b89944199713a827e.jpg",
    "img2_sp_480":"https://baseec2.s3.amazonaws.com/images/item/sp/480/2a4de4965fa23b7b89944199713a827e.jpg",
    "img2_sp_640":"https://baseec2.s3.amazonaws.com/images/item/sp/640/2a4de4965fa23b7b89944199713a827e.jpg",

    "img3_origin":null,
    "img3_76":null,
    "img3_146":null,
    "img3_300":null,
    "img3_500":null,
    "img3_640":null,
    "img3_sp_480":null,
    "img3_sp_640":null,

    "img4_origin":null,
    "img4_76":null,
    "img4_146":null,
    "img4_300":null,
    "img4_500":null,
    "img4_640":null,
    "img4_sp_480":null,
    "img4_sp_640":null,

    "img5_origin":null,
    "img5_76":null,
    "img5_146":null,
    "img5_300":null,
    "img5_500":null,
    "img5_640":null,
    "img5_sp_480":null,
    "img5_sp_640":null,

    "modified":1414731174,
    "variations":[
      {
        "variation_id":11,
        "variation":"黒色",
        "variation_stock":6,
        "variation_identifier":null
      },
      {
        "variation_id":12,
        "variation":"白色",
        "variation_stock":4,
        "variation_identifier":null
      }
    ]
  }
}
```

## 解説

* item_id - 商品を識別するユニークなID
* price - 商品の価格 (税込み)
* proper_price - 商品の通常価格 (税込み)
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
```
{
  "error":"no_item_id",
  "error_description":"item_idは必須です。"
}
```
```
{
  "error":"no_item",
  "error_description":"商品が見つかりませんでした。"
}
```
