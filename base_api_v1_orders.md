# GET /1/orders

注文情報の一覧を取得

## scope

read_orders

## リクエストパラメーター

| Name          | Description                                                 |
|---------------|-------------------------------------------------------------|
| start_ordered | 注文日時はじめ yyyy-mm-dd または yyyy-mm-dd hh:mm:ss (任意) |
| end_ordered   | 注文日時おわり yyyy-mm-dd または yyyy-mm-dd hh:mm:ss (任意) |
| limit         | リミット (任意 デフォルト: 20, MAX: 100)                    |
| offset        | オフセット (任意 デフォルト: 0)                             |

## レスポンスの例
```
{
  "orders":[
    {
      "unique_key":"154D88A39E454289",
      "ordered":1396419762,
      "cancelled":null,
      "dispatched":1396528943,
      "payment":"creditcard",
      "first_name":"太郎",
      "last_name":"山田",
      "total":2000,
      "delivery_date":"2018-03-19",
      "delivery_time_zone":"0812",
      "terminated":true,
      "dispatch_status":"dispatched",
      "modified":1396528943,
      "subscription": {
        "unique_key": "SABCDEF123456780",
        "repeat_number": 1,
        "repeat_times": 12
      },
    },
    {
      "unique_key":"9CD3594222D78673",
      "ordered":1392345522,
      "cancelled":null,
      "dispatched":null,
      "payment":"cvs",
      "first_name":"花子",
      "last_name":"山田",
      "total":3500,
      "delivery_date":null,
      "delivery_time_zone":null,
      "terminated":false,
      "dispatch_status":"unpaid",
      "modified":1392345522,
      "subscription": {
        "unique_key": null,
        "repeat_number": null,
        "repeat_times": null
      },
    }
  ]
}
```

## 解説

* unique_key - 注文情報を識別するユニークなキー
* ordered - 注文日時
* cancelled - キャンセル日時
* dispatched - 発送日時
* payment - 決済方法。creditcard:クレジットカード決済、bt:銀行振込(ショップ口座)、cod:代金引換、cvs:コンビニ決済、base_bt:銀行振込(BASE口座)、atobarai:後払い決済、carrier_01:キャリア決済ドコモ、carrier_02:キャリア決済au、carrier_03:キャリア決済ソフトバンク、coin:コイン決済
* total - 合計金額 (消費税、手数料含む)
* delivery_date - 配送日(yyyy-mm-dd)
* delivery_time_zone - 配送時間帯。4ケタの数字(午前中 -> 0812、12時~14時 -> 1214)
* terminated - *[非推奨]* dispatch_statusを使ってください。すべてが発送済みかキャンセルになっていればtrue。
* dispatch_status - 注文ステータス。ordered:発送待ち、cancelled:キャンセル、dispatched:発送済み、unpaid:入金待ち、shipping:配送中
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
