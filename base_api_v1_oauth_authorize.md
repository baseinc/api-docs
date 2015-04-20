# GET /1/oauth/authorize

認可コードを取得

1. クライアント側でこのURLへユーザーを遷移させるリンクを作成してください。
2. ユーザーがBASE側へ遷移すると認証画面が表示されます。
3. ユーザーがクライアントとの連携を許可した場合、コールバックURLに認可コードを付与してリダイレクトさせます。

## リクエストパラメーター

| Name          | Description                                                  |
|---------------|--------------------------------------------------------------|
| response_type | code (必須)                                                  |
| client_id     | クライアントID (必須)                                        |
| redirect_uri  | 登録したコールバックURL (必須)                               |
| scope         | スコープをスペース区切りで指定 (任意 デフォルト: read_users) |
| state         | リダイレクト先URLにそのまま返すパラメーター (任意)           |

## リンクURLの例
```
https://api.thebase.in/1/oauth/authorize?response_type=code&client_id=abc123&redirect_uri=http%3A%2F%2Fhogehoge.com%2Fcallback.php&scope=read_users%20read_orders&state=hogehoge
```

## コールバックURLの例

ユーザーが連携を許可した場合

```
http://hogehoge.com/callback.php?code=3362cb43d7b3d5f4af219eff80ceba8b&state=hogehoge
```

ユーザーが連携を拒否した場合

```
http://hogehoge.com/callback.php?error=access_denied&state=hogehoge
```
