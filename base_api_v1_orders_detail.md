# GET /1/orders/detail/:unique_key 

注文情報を取得

## scope

read_orders

## リクエストパラメーター

* なし

## レスポンスの例

```
{
  "order":{
    "unique_key":"154D88A39E454289",
    "ordered":1396419762,
    "cancelled":null,
    "dispatched":1396509935,
    "payment":"creditcard",
    "shipping_method":"ヤマト運輸",
    "shipping_fee":500,
    "cod_fee":300,
    "total":5800,
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
    "add_comment":"[配送業者]佐川急便 [送り状番号]1234-5678-90",
    "delivery_company_id":3,
    "tracking_number":"1234-1234-1234",
    "delivery_date":"2018-03-19",
    "delivery_time_zone":"0812",
    "terminated":false,
    "dispatch_status":"dispatched",
    "modified":1396509935,
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
    "order_amount_adjustment":{
      "adjusted_amount":-100
    },
    "order_header_coin":{
      "discount":1000,
      "note":"コイン「HOGEコイン」の利用"
    },
    "order_charge":{
      "collected_fee":100
    },
    "c_c_payment_transaction":{
      "collected_fee":200,
      "status":"captured"
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
    "coin_payment_transaction":{
      "collected_fee":null,
      "status":null
    },
    "user_balance_logs":[
      {
        "text":"154D88A39E454289の売上が確定しました",
        "price":7048,
        "created":1396509935
      },
      {
        "text":"154D88A39E454289ののヤマト配送料",
        "price":-500,
        "created":1396509935
      },
      {
        "text":"154D88A39E454289のヤマト配送料の差額",
        "price":-200,
        "created":1396519935
      }
    ],
    "order_items":[
      {
        "order_item_id":123,
        "item_id":1000,
        "variation_id":101,
        "title":"Tシャツ",
        "variation":"サイズM",
        "price":2000,
        "amount":2,
        "total":4000,
        "status":"ordered",
        "shipping_method":null,
        "shipping_fee":0,
        "modified":1398231452
      },
      {
        "order_item_id":124,
        "item_id":1001,
        "variation_id":201,
        "title":"ロングTシャツ",
        "variation":"サイズL",
        "price":3000,
        "amount":1,
        "total":3000,
        "status":"ordered",
        "shipping_method":null,
        "shipping_fee":0,
        "modified":1396419762
      }
    ],
    "subscription": {
      "unique_key": "SABCDEF123456780",
      "repeat_number": 1,
      "repeat_times": 12
    },
  }
}
```

## 解説

* unique_key - 注文情報を識別するユニークなキー
* ordered - 注文日時
* cancelled - キャンセル日時
* dispatched - 発送日時
* payment - 決済方法。creditcard:クレジットカード決済、bt:銀行振込(ショップ口座)、cod:代金引換、cvs:コンビニ決済、base_bt:銀行振込(BASE口座)、atobarai:後払い決済、carrier_01:キャリア決済ドコモ、carrier_02:キャリア決済au、carrier_03:キャリア決済ソフトバンク、coin:コイン決済
* shipping_method - 配送方法 (注文に対して指定している場合と、商品ごとに指定している場合がある)
* shipping_fee - 送料 (注文に対して指定している場合と、商品ごとに指定している場合がある)
* cod_fee 代引き手数料
* total - 合計金額 (消費税、手数料含む)
* remark - 備考欄
* add_comment - 発送メールに添付する一言メッセージ
* delivery_date - 配送日(yyyy-mm-dd)
* delivery_time_zone - 配送時間帯。4ケタの数字(午前中 -> 0812、12時~14時 -> 1214)
* terminated - *[非推奨]* dispatch_statusを使ってください。すべてが発送済みかキャンセルになっていればtrue
* dispatch_status - 注文ステータス。ordered:発送待ち、cancelled:キャンセル、dispatched:発送済み、unpaid:入金待ち、shipping:配送中
* modified - 更新日時
* order_receiver - お届け先情報
* order_discount - 割引情報
  * discount - 割引金額
  * note - 割引名
  * is_allocate_user_balance_log - BASE負担割引フラグ。0:ショップ負担割引、1:BASE負担割引
* order_amount_adjustment - 金額調整情報
  * adjusted_amount - 調整金額
* order_header_coin - コイン割引情報
  * discount - 割引金額
  * note - 割引名
* order_charge - サービス利用料情報
  * collected_fee - サービス利用料(2017年9月20日から徴収開始)
* c_c_payment_transaction - クレジットカード決済情報
  * collected_fee - クレジット決済手数料
  * status - クレジットカード決済ステータス。creditable:与信確保、captured:売上確定、cancelled:キャンセル
* cvs_payment_transaction - コンビニ決済情報
  * collected_fee - コンビニ決済手数料
  * status - コンビニ決済ステータス。unpaid:入金待ち、paid:入金済み、cancelled:キャンセル
* bt_payment_transaction - 銀行振込(BASE口座)決済情報
  * collected_fee - 銀行振込(BASE口座)決済手数料
  * status - 銀行振込(BASE口座)決済ステータス。unpaid:入金待ち、paid:入金済み、cancelled:キャンセル、shortage:不足入金
* atobarai_payment_transaction - 後払い決済情報
  * collected_fee - 後払い決済手数料
  * status - 後払い決済ステータス。ordered:未発送、shipping:配送中、arrived:着荷、cancelled:キャンセル
* carrier_payment_transaction - キャリア決済情報
  * collected_fee - キャリア決済手数料
  * status - キャリア決済ステータス。authorized:与信確保、captured:売上確定、cancelled:キャンセル
* user_balance_logs - お金履歴情報
  * text - 見出しテキスト
  * price - 金額
  * created - 作成日時
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
* subscription - 定期便注文情報
  * unique_key - 定期便ID（定期便注文でないときはnull）
  * repeat_number - 注文回数。今回の注文が定期便で何回目の注文であるか。（定期便注文でないときはnull）
  * repeat_times - 継続回数。この定期便が全部で何回継続されるか。回数無制限のときは0。（定期便注文でないときはnull）

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
  "error":"no_unique_key",
  "error_description":"unique_keyは必須です。"
}
```
```
{
  "error":"no_order",
  "error_description":"注文情報が見つかりませんでした。"
}
```
