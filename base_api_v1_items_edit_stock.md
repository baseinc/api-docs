# POST /1/items/edit_stock

商品情報の在庫数を更新

## scope

write_items

## リクエストパラメーター

| Name            | Description                                                                |
|-----------------|----------------------------------------------------------------------------|
| item_id         | 商品ID (必須)                                                              |
| stock           | 在庫数 (必須 バリエーションの在庫数を更新したい場合は任意)                 |
| variation_id    | バリエーションID (任意 バリエーションの在庫数を更新したい場合は必須)       |
| variation_stock | バリエーションの在庫数 (任意 バリエーションの在庫数を更新したい場合は必須) |

※ バリエーションがある場合はバリエーションの在庫数(variation_stock)の合計が自動で在庫数(stock)になります。

## レスポンスの例

```
{
  "item":{
    "item_id":1234,
    "title":"Tシャツ",
    "detail":"とってもオシャレなTシャツです。若者に大人気です！",
    "price":4900,
    "stock":30,
    "visible":1,
    "list_order":1,
    "identifier":"abcd-1234",
    
    "img1_origin":"https://baseec2.s3.amazonaws.com/images/item/origin/45fc036c772c8469fa40396b2ef0fb9b.jpg",
    "img1_76":"https://baseec2.s3.amazonaws.com/images/item/76/45fc036c772c8469fa40396b2ef0fb9b.jpg",
    "img1_146":"https://baseec2.s3.amazonaws.com/images/item/146/45fc036c772c8469fa40396b2ef0fb9b.jpg",
    "img1_300":"https://baseec2.s3.amazonaws.com/images/item/300/45fc036c772c8469fa40396b2ef0fb9b.jpg",
    "img1_500":"https://baseec2.s3.amazonaws.com/images/item/500/45fc036c772c8469fa40396b2ef0fb9b.jpg",
    "img1_640":"https://baseec2.s3.amazonaws.com/images/item/640/45fc036c772c8469fa40396b2ef0fb9b.jpg",
    "img1_sp_480":"https://baseec2.s3.amazonaws.com/images/item/sp/480/45fc036c772c8469fa40396b2ef0fb9b.jpg",
    "img1_sp_640":"https://baseec2.s3.amazonaws.com/images/item/sp/640/45fc036c772c8469fa40396b2ef0fb9b.jpg",

    "img2_origin":null,
    "img2_76":null,
    "img2_146":null,
    "img2_300":null,
    "img2_500":null,
    "img2_640":null,
    "img2_sp_480":null,
    "img2_sp_640":null,

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
        "variation_identifier":"abcd-1234-b"
      },
      {
        "variation_id":12,
        "variation":"白色",
        "variation_stock":14,
        "variation_identifier":"abcd-1234-w"
      },
      {
        "variation_id":13,
        "variation":"赤色",
        "variation_stock":10,
        "variation_identifier":"abcd-1234-r"
      }
    ]
  }
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
  "error":"bad_params",
  "error_description":"不正なパラメーターです。"
}
```
```
{
  "error":"bad_variation_id",
  "error_description":"不正なvariation_idです。"
}
```
```
{
  "error":"validation_error",
  "error_description":"バリデーションエラーです。"
}
```
