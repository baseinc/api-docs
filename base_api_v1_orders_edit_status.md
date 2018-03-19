# POST /1/orders/edit_status

注文情報のステータスを更新 or 後払い決済ステータスを更新

注文情報のステータスは3種類あります。

* ordered (未発送)
* dispatched (発送完了)
* cancelled (キャンセル)

ordered から、dispatched か cancelled にのみ更新できます。cancelled に更新できるのは銀行振込(ショップ口座)決済と代金引換決済の注文だけです。その他の注文のキャンセルはBASE管理画面からお願いします。コンビニ決済の注文はコンビニ決済ステータスがpaid(入金済み)の時だけdispatchedに更新できます。銀行振込(BASE口座)決済の注文は銀行振込(BASE口座)決済ステータスがpaid(入金済み)の時だけdispatchedに更新できます。

後払い決済ステータスは4種類あります。

* ordered (未発送)
* shipping (配送中)
* arrived (着荷)
* cancelled (キャンセル)

ordered から、shipping にのみ更新できます。後払い決済の場合、後払い決済ステータスの更新しかできません。商品が到着すると後払い決済ステータスが arrived に更新され、ステータスが dispatched に更新されます。order_item_idは注文の中のどれかひとつを指定すれば、全体の後払い決済ステータスが更新されます。

## scope

write_orders

## リクエストパラメーター

| Name                | Description                                                                 |
|---------------------|-----------------------------------------------------------------------------|
| order_item_id       | 購入商品ID (必須)                                                           |
| status              | ステータス。dispatched か cancelled のいずれか (statusを変更する場合は必須) |
| add_comment         | 発送メールに添付する一言メッセージ (改行も含めて250文字以内)                |
| atobarai_status     | 後払い決済ステータス。shippingのみ (atobarai_statusを変更する場合は必須)    |
| delivery_company_id | 配送業者ID (atobarai_statusを変更する場合は必須)                            |
| tracking_number     | 送り状番号。半角英数のみ (atobarai_statusを変更する場合は必須)              |

## レスポンスの例

```
{
  "order":{
    "unique_key":"154D88A39E454289",
    "ordered":1396419762,
    "cancelled":null,
    "dispatched":null,
    "payment":"代金引換",
    "shipping_method":"ヤマト運輸",
    "shipping_fee":500,
    "cod_fee":300,
    "total":6800
    "first_name":"太郎",
    "last_name":"山田",
    "country":"Japan",
    "zip_code":"106-0032",
    "prefecture":"東京都",
    "address":"港区六本木",
    "address2":"4-11-4 六本木ビル 301",
    "mail_address":"mail@hogehoge.com",
    "tel":"03-1234-5678",
    "remark":"午前中の配送を希望します。",
    "add_comment":"[配送業者]佐川急便 [送り状番号]123412341234",
    "delivery_company_id":3,
    "tracking_number":"123412341234",
    "delivery_date":"2018-03-19",
    "delivery_time_zone":"0812",
    "terminated":false,
    "dispatch_status":"ordered",
    "modified":1398231452,
    "order_receiver":{
      "first_name":"花子",
      "last_name":"山田",
      "zip_code":"150-0043",
      "prefecture":"東京都",
      "address":"渋谷区道玄坂",
      "address2":"2-10-12 新大宗ビル3号館 531号",
      "tel":"03-1234-5678"
    },
    "order_discount":{
      "discount":1000,
      "note":"初売りクーポン",
      "is_allocate_user_balance_log":0
    },
    "order_charge":{
      "collected_fee":100
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
    "atobarai_payment_transaction":{
      "collected_fee":null,
      "status":null
    },
    "carrier_payment_transaction":{
      "collected_fee":null,
      "status":null
    },
    "order_items":[
      {
        "order_item_id":123,
        "item_id":1001,
        "variation_id":101,
        "title":"Tシャツ",
        "variation":"サイズM",
        "price":2000,
        "amount":2,
        "total":4000,
        "shipping_method":null,
        "shipping_fee":0,
        "status":"dispatched",
        "modified":1398231452
      },
      {
        "order_item_id":124,
        "item_id":1002,
        "variation_id":201,
        "title":"ロングTシャツ",
        "variation":"サイズL",
        "price":3000,
        "amount":1,
        "total":3000,
        "shipping_method":null,
        "shipping_fee":0,
        "status":"ordered",
        "modified":1396419762
      }
    ]
  }
}
```

## 解説

* unique_key - 注文情報を識別するユニークなキー
* ordered - 注文日時
* cancelled - キャンセル日時
* dispatched - 発送日時
* payment - 決済方法。creditcard:クレジットカード決済、bt:銀行振込(ショップ口座)、cod:代金引換、cvs:コンビニ決済、base_bt:銀行振込(BASE口座)、atobarai:後払い決済、carrier_01:キャリア決済ドコモ、carrier_02:キャリア決済au、carrier_03:キャリア決済ソフトバンク
* shipping_method - 配送方法 (注文に対して指定している場合と、商品ごとに指定している場合がある)
* shipping_fee - 送料 (注文に対して指定している場合と、商品ごとに指定している場合がある)
* cod_fee 代引き手数料
* total - 合計金額 (消費税、手数料含む)
* remark - 備考欄
* add_comment - 発送メールに添付する一言メッセージ
* delivery_date - 配送日
* delivery_time_zone - 配送時間帯
* terminated - *[非推奨]* dispatch_statusを使ってください。すべてが発送済みかキャンセルになっていればtrue
* dispatch_status - 注文ステータス。ordered:発送待ち、cancelled:キャンセル、dispatched:発送済み、unpaid:入金待ち、shipping:配送中
* modified - 更新日時
* order_receiver - お届け先情報
* order_discount - 割引情報
  * discount - 割引金額
  * note - 割引名
  * is_allocate_user_balance_log - BASE負担割引フラグ。0:ショップ負担割引、1:BASE負担割引
* order_charge - サービス利用料情報
  * collected_fee - サービス利用料(2017年9月20日から徴収開始)
* c_c_payment_transaction - クレジットカード決済情報
  * collected_fee - クレジット決済手数料
* cvs_payment_transaction - コンビニ決済情報
  * collected_fee - コンビニ決済手数料
  * status - コンビニ決済ステータス。unpaid:入金待ち、paid:入金済み、cancelled:キャンセル
* bt_payment_transaction - 銀行振込(BASE口座)決済情報
  * collected_fee - 銀行振込(BASE口座)決済手数料
  * status - 銀行振込(BASE口座)決済ステータス。unpaid:入金待ち、paid:入金済み、cancelled:キャンセル、shortage:不足入金
* atobarai_payment_transaction - 後払い決済情報
  * collected_fee - 後払い決済手数料
  * status - 後払い決済ステータス。ordered:未発送、shipping:配送中、arrived:着荷、cancelled:キャンセル
* order_items - 購入商品情報
  * order_item_id - 購入商品ID
  * item_id - 商品ID
  * variation_id - バリエーションID
  * variation - バリエーションの種類
  * price - 単価
  * amount - 数量
  * total - 合計金額 (単価 * 数量)
  * status - ステータス。ordered:未発送、cancelled:キャンセル、dispatched:発送完了
  * modified - 更新日時

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
  "error":"no_params",
  "error_description":"order_item_idとatobarai_statusとdelivery_company_idとtracking_numberは必須です。"
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
  "error":"not_cancel_atobarai",
  "error_description":"後払い決済のキャンセルはできません。"
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
  "error":"not_change_status_atobarai",
  "error_description":"後払い決済のステータスは変更できません。"
}
```

```
{
  "error":"not_cancel_carrier",
  "error_description":"キャリア決済のステータスは変更できません。"
}
```

```
{
  "error":"db_error",
  "error_description":"ステータスの変更ができませんでした。"
}
```
