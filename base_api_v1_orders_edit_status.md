# POST /1/orders/edit_status

注文情報のステータスを更新

ステータスは3種類あります。

* ordered (未発送)
* dispatched (発送完了)
* cancelled (キャンセル済み)

ordered から、dispatched か cancelled にのみ更新できます。

クレジットカード決済の注文のキャンセルはお問い合わせからお願いします。

コンビニ決済の注文はコンビニ決済ステータスがpaid(入金済み)の時だけdispatchedに更新できます。

銀行振込(BASE口座)決済の注文は銀行振込(BASE口座)決済ステータスがpaid(入金済み)の時だけdispatchedに更新できます。

## scope

write_orders

## リクエストパラメーター

| Name          | Description                               |
|---------------|-------------------------------------------|
| order_item_id | 購入商品ID (必須)                         |
| status        | dispatched か cancelled のいずれか (必須) |
| add_comment   | 発送メールに添付する一言メッセージ        |

## レスポンスの例

```
{
  "order":{
    "unique_key":"154D88A39E454289",
    "ordered":1396419762,
    "payment":"代金引換",
    "shipping_fee":500,
    "cod_fee":300,
    "total":6800
    "first_name":"山田",
    "last_name":"太郎",
    "zip_code":"106-0032",
    "prefecture":"東京都",
    "address":"港区六本木",
    "address2":"4-11-4 六本木ビル 301",
    "mail_address":"mail@hogehoge.com",
    "tel":"03-1234-5678",
    "remark":"午前中の配送を希望します。",
    "add_comment":"[配送業者]佐川急便 [送り状番号]1234-5678-90",
    "terminated":false,
    "order_receiver":{
      "first_name":"山田",
      "last_name":"花子",
      "zip_code":"150-0043",
      "prefecture":"東京都",
      "address":"渋谷区道玄坂",
      "address2":"2-10-12 新大宗ビル3号館 531号",
      "tel":"03-1234-5678"
    },
    "order_discount":{
      "discount":1000,
      "note":"初売りクーポン"
    },
    "c_c_payment_transaction":{
      "collected_fee":200
    },
    "cvs_payment_transaction":{
      "collected_fee":null,
      "status":null
    },
    "bt_payment_transaction":{
      "collected_fee":null,
      "status":null
    },
    "order_items":[
      {
        "order_item_id":123,
        "item_id":1001,
        "title":"Tシャツ",
        "variation":"サイズM",
        "price":2000,
        "amount":2,
        "total":4000,
        "status":"dispatched"
      },
      {
        "order_item_id":124,
        "item_id":1002,
        "title":"ロングTシャツ",
        "variation":"サイズL",
        "price":3000,
        "amount":1,
        "total":3000,
        "status":"orderd"
      }
    ]
  }
}
```

## 解説

* unique_key - 注文情報を識別するユニークなキー
* ordered - 注文日時
* payment - 決済方法。creditcard:クレジットカード決済、bt:銀行振込(ショップ口座)、cod:代金引換、cvs:コンビニ決済、base_bt:銀行振込(BASE口座)
* shipping_fee - 送料
* cod_fee 代引き手数料
* total - 合計金額 (消費税、手数料含む)
* remark - 備考欄
* add_comment - 発送メールに添付する一言メッセージ
* terminated - すべてが発送済みかキャンセルになっていればtrue
* order_receiver - お届け先情報
* order_discount - クーポン情報
  * discount - 割引金額
  * note - クーポン名
* c_c_payment_transaction - クレジットカード決済情報
  * collected_fee - クレジット決済手数料
* cvs_payment_transaction - コンビニ決済情報
  * collected_fee - コンビニ決済手数料
  * status - コンビニ決済ステータス。unpaid:入金待ち、paid:入金済み、cancelled:キャンセル
* bt_payment_transaction - 銀行振込(BASE口座)決済情報
  * collected_fee - 銀行振込(BASE口座)決済手数料
  * status - 銀行振込(BASE口座)決済ステータス。unpaid:入金待ち、paid:入金済み、cancelled:キャンセル、shortage:不足入金
* order_items - 購入商品情報
  * order_item_id - 購入商品ID
  * item_id - 商品ID
  * variation - バリエーションの種類 (variation_idは持っていません)
  * price - 単価
  * amount - 数量
  * total - 合計金額 (単価 * 数量)
  * status - ステータス。ordered:未発送、cancelled:キャンセル、dispatched:発送完了
  * modified - 最終更新日時

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
  "error":"no_params",
  "error_description":"order_item_idとstatusは必須です。"
}
```
```
{
  "error":"no_order",
  "error_description":"注文情報が見つかりませんでした。"
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
  "error":"not_change_status",
  "error_description":"この注文のステータスは変更できません。"
}
```
```
{
  "error":"not_cancel_credit_card",
  "error_description":"クレジットカード決済のキャンセルはできません。"
}
```
```
{
  "error":"not_cancel_cvs",
  "error_description":"コンビニ決済のキャンセルはできません。"
}
```
```
{
  "error":"not_cancel_base_bt",
  "error_description":"銀行振込(BASE口座)決済のキャンセルはできません。"
}
```
```
{
  "error":"not_change_status_ClubT",
  "error_description":"ClubTの商品は発注することにより、ステータスの変更が可能です。"
}
```
```
{
  "error":"not_change_status_SpCase",
  "error_description":"SpCaseの商品は発注することにより、ステータスの変更が可能です。"
}
```
```
{
  "error":"not_change_status_cvs",
  "error_description":"コンビニ決済の入金が完了していないのでステータスを変更できません。"
}
```
```
{
  "error":"not_change_status_base_bt",
  "error_description":"銀行振込(BASE口座)決済の入金が完了していないのでステータスを変更できません。"
}
```
```
{
  "error":"db_error",
  "error_description":"ステータスの変更ができませんでした。"
}
```
