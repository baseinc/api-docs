# POST /1/items/delete_image

商品情報の画像を削除

## scope

write_items

## リクエストパラメーター

| Name     | Description          |
|----------|----------------------|
| item_id  | 商品ID (必須)        |
| image_no | 画像番号 1~20 (必須) |

## レスポンスの例

```
{
  "item":{
    "item_id":1234,
    "title":"Tシャツ",
    "detail":"とってもオシャレなTシャツです。",
    "price":3900,
    "stock":10,
    "visible":1,
    "list_order":1,
    "identifier":"abcd-1234",
    
    "img1_origin":null,
    "img1_76":null,
    "img1_146":null,
    "img1_300":null,
    "img1_500":null,
    "img1_640":null,
    "img1_sp_480":null,
    "img1_sp_640":null,

    "img2_origin":"https://baseec2.s3.amazonaws.com/images/item/origin/45fc036c772c8469fa40396b2ef0fb9b.jpg",
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
        "variation":"黒",
        "variation_stock":6,
        "variation_identifier":"abcd-1234-b"
      },
      {
        "variation_id":12,
        "variation":"白",
        "variation_stock":4,
        "variation_identifier":"abcd-1234-w"
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
  "error":"bad_params",
  "error_description":"不正なパラメーターです。"
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
  "error":"no_image",
  "error_description":"画像が存在しません。"
}
```
```
{
  "error":"db_error",
  "error_description":"DBエラーです。"
}
```
```
{
  "error":"invalid_request",
  "error_description":"デジタルコンテンツの商品は編集できません。"
}
```
```
{
  "error":"invalid_request",
  "error_description":"ClubTの商品は編集できません。"
}
```
