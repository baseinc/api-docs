# POST /1/items/add

商品情報を登録

## scope

write_items

## リクエストパラメーター

| Name                        | Description                                           |
|-----------------------------|-------------------------------------------------------|
| title                       | 商品名 (必須)                                         |
| detail                      | 商品説明 (任意)                                       |
| price                       | 価格 (必須)                                           |
| stock                       | 在庫数 (必須)                                         |
| visible                     | 1:表示、0:非表示 (任意 デフォルト:1)                  |
| identifier                  | 商品コード (任意)                                     |
| list_order                  | 表示順 (任意 デフォルト:一番最後のlist_order)         |
| variation[0] ...            | バリエーションの種類 (任意)                           |
| variation_stock[0] ...      | バリエーションの在庫数 (任意)                         |
| variation_identifier[0] ... | バリエーションの商品コード (任意)                     |
 
※ titleとdetailに、絵文字(4bite文字)を含める事はできません。バリデーションエラーとなります。

※ variationとvariation_stockとvariation_identifierは配列で複数登録が可能です。

※ バリエーションがある場合はバリエーションの在庫数(variation_stock)の合計が在庫数(stock)になります。

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
  　"identifier":"abcd-1234",
    
    "img1_origin":null,
    "img1_76":null,
    "img1_146":null,
    "img1_300":null,
    "img1_500":null,
    "img1_640":null,
    "img1_sp_480":null,
    "img1_sp_640":null,

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
