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
      "first_name":"山田",
      "last_name":"太郎",
      "total":2000,
      "terminated":true,
      "dispatch_status":"dispatched",
      "modified":1396528943
    },
    {
      "unique_key":"9CD3594222D78673",
      "ordered":1392345522,
      "cancelled":null,
      "dispatched":null,
      "payment":"cvs",
      "first_name":"山田",
      "last_name":"花子",
      "total":3500,
      "terminated":false,
      "dispatch_status":"unpaid",
      "modified":1392345522
    }
  ]
}
```

## 解説

* unique_key - 注文情報を識別するユニークなキー
* ordered - 注文日時
* cancelled - キャンセル日時
* dispatched - 発送日時
* payment - 決済方法。creditcard:クレジットカード決済、bt:銀行振込(ショップ口座)、cod:代金引換、cvs:コンビニ決済、base_bt:銀行振込(BASE口座)、atobarai:後払い決済
* total - 合計金額 (消費税、手数料含む)
* terminated - *[非推奨]* dispatch_statusを使ってください。すべてが発送済みかキャンセルになっていればtrue。
* dispatch_status - 注文ステータス。ordered:発送待ち、cancelled:キャンセル、dispatched:発送済み、unpaid:入金待ち、shipping:配送中
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
