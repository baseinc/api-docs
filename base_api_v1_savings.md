# GET /1/savings

振込申請情報の一覧を取得

## scope

read_savings

## リクエストパラメーター

| Name          | Description                              |
|---------------|------------------------------------------|
| start_created | 振込申請日時はじめ yyyy-mm-dd (任意)     |
| end_created   | 振込申請日時おわり yyyy-mm-dd (任意)     |
| limit         | リミット (任意 デフォルト: 20, MAX: 100) |
| offset        | オフセット (任意 デフォルト: 0)          |

## レスポンスの例
```
{
  "savings":[
    {
      "saving_id":123,
      "bank_name":"りそな銀行",
      "branch_name":"赤坂支店",
      "account_type":"普通",
      "account_name":"ヤマダタロウ",
      "account_number":1234567,
      "drawings":100000,
      "due_date":"2014-09-01",
      "status":"done",
      "created":1397549706
    },
    {
      "saving_id":223,
      "bank_name":"みずほ銀行",
      "branch_name":"渋谷支店",
      "account_type":"普通",
      "account_name":"ヤマダタロウ",
      "account_number":1234567,
      "drawings":200000,
      "due_date":"2014-10-01",
      "status":"requested",
      "created":1398848221
    }
  ]
}
```

## 解説

* saving_id - 振込申請を識別するユニークなID
* account_type - 口座種別。普通、当座、貯蓄
* drawings - 振込申請額。
  * 実際の振込金額は、「振込申請額 - 事務手数料 - 振込手数料」です。
  * 事務手数料は2万円未満の場合、事務手数料は500円です。2万円以上の場合、事務手数料は0円です。
  * 振込手数料は一律250円です。
* due_date - 入金期日
* status - requested:申請中、processing:処理中、done:完了、rejected:拒否、cancelled:キャンセル
* created - 申請日時

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