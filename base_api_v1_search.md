# GET /1/search

商品の検索結果を取得

※現在Search APIの1日の利用回数の上限は10000回に設定しています。

## 認証

client_idとclient_secretで認証します。

※Search APIを使用するには専用のclient_idとclient_secretが必要です。

## リクエストパラメーター

| Name          | Description                                                      |
|---------------|------------------------------------------------------------------|
| client_id     | Search API専用のクライアントID (必須)                            |
| client_secret | Search API専用のクライアントシークレット (必須)                  |
| q             | 検索キーワード。スペース区切りで複数指定 (必須)                  |
| sort          | 並び順。item_id、price、stock、order_count、modifiedのascまたはdesc (例: order_count desc,item_id asc) (デフォルト: BASEのおすすめ順) |
| start         | 取得するスタート位置 (デフォルト: 0)                             |
| size          | 取得件数 (デフォルト: 10, MAX: 50)                               |
| fields        | 検索対象のカラム (デフォルト: shop_name,title,detail,categories) |
| shop_id       | ショップID (任意)                                                |

## レスポンスの例

```
{
  "found":2,
  "start":0,
  "items":[
    {
      "item_id":1234,
      "title":"Tシャツ",
      "detail":"とってもオシャレなTシャツです。",
      "price":3900,
      "stock":10,

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

      "modified":1355815892,
      
      "shop_id":"shop",
      "shop_name":"BASEショップ",
      "shop_url":"http://shop.thebase.in",
      
      "categories":[
        "Tシャツ",
        "オシャレ",
      ]
    },
    {
      "item_id":2234,
      "title":"奇抜なTシャツ",
      "detail":"とっても奇抜なTシャツです。",
      "price":4900,
      "stock":20,

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

      "modified":1355815892,
      
      "shop_id":"shop",
      "shop_name":"BASEショップ",
      "shop_url":"http://shop.thebase.in",
      
      "categories":[
        "Tシャツ",
        "奇抜",
      ]
    }
  ]
}
```

## 解説

* item_id - 商品を識別するユニークなID
* price - 商品の値段 (税込み)
* stock - 在庫数
* img1_origin - 商品画像1のオリジナルサイズ。オリジナル以外はバッチで作成されるため、存在しない場合があります。

## エラーレスポンスの例

```
{
  "error":"auth_error",
  "error_description":"不正なクライアントです。"
}
```
```
{
  "error":"search_error",
  "error_description":"不正なパラメーターです。"
}
```
```
{
  "error":"day_api_limit",
  "error_description":"1日のAPIの利用上限を超えました。日付が変わってからもう一度アクセスしてください。"
}
```
