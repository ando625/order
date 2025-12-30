
# 　注文アプリ

本アプリは「一般ユーザー」と「管理者ユーザー」で構成される注文会計システムです。
このリポジトリは **Docker + Laravel 10 + MySQL + Fortify** 環境で動作する Web アプリです。
ここでは **環境構築・テスト** を含めて順を追って説明します。

---
# 環境構築・操作手順
## 1. リポジトリのクローン

```bash
git clone git@github.com:ando625/kintai.git
cd kintai
```

---

## 2. Docker 環境起動

Docker Desktop を起動後、以下を実行：

```bash
docker compose up -d --build
```

コンテナの確認：

```bash
docker compose ps
```

---

## 3. Laravel 環境構築
この章では、Laravelを起動するために必要な初期セットアップ（依存関係のインストール、APP_KEY 生成など）を行います。

### 3-1. PHP コンテナに入る

```bash
docker compose exec php bash
```

### 3-2. Composer で依存関係をインストール

phpコンテナの中で実行

```bash
composer install
```

- Fortify もこのときに自動でインストールされます。手動で入れる必要はありません。


### 3-3. `.env` ファイル作成

```bash
cp .env.example .env
```

.env に以下を設定：

```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass
```



---

### 3-4. アプリケーションキー生成

```bash
php artisan key:generate
```

### 3-5. データベース準備（データベースの初期化・開発用）

開発環境で事前にダミーデータを入れるので以下を実行してください：

```bash
php artisan migrate:fresh --seed
```

### 勤怠ダミーデータについて



---

## 4. テスト用データベースの準備

### ⚠️ 注意
本番データベースをテストで使うのは非常に危険です。
安全にテストを実行するために、**テスト専用データベース（`demo_test`）** を作成します。

---

### 4-1. MySQLコンテナに入る

まず MySQL コンテナに接続します。
mysqlにcdで移動して↓

```bash
docker compose exec mysql bash
```

---

### 4-2. MySQL に root ユーザーでログイン

```bash
mysql -u root -p
```

パスワードは `docker-compose.yml` の中にある

```yaml
MYSQL_ROOT_PASSWORD: root
```

で設定した `root` を入力します。

---

### 4-3. テスト用データベースを作成

MySQL にログインできたら、以下を実行：

```sql
CREATE DATABASE demo_test;
SHOW DATABASES;
```

`demo_test` が一覧に表示されればOKです

---

### database.php の設定確認

`config/database.php` に以下のような **「mysql_test」設定** が追加されていることを確認してください。

（このプロジェクトではすでに設定済みです。追記する必要はありません）

```php
'mysql_test' => [
    'driver' => 'mysql',
    'url' => env('DATABASE_URL'),
    'host' => env('DB_HOST', '127.0.0.1'),
    'port' => env('DB_PORT', '3306'),
    'database' => 'demo_test',
    'username' => 'root',
    'password' => 'root',
    'unix_socket' => env('DB_SOCKET', ''),
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'prefix' => '',
    'prefix_indexes' => true,
    'strict' => true,
    'engine' => null,
],
```


その後退出
```
exit   #MySQLを終了
```
---


### 4-4 `.env.testing` について（注意事項）

本リポジトリには **最初から `.env.testing` が含まれています。**

そのため、 `cp .env .env.testing` のコマンドは実行しないでください。

このコマンドを実行すると、
既存の `.env.testing` が `.env` の内容で上書きされてしまい、
**テスト環境の設定が正しく動作しなくなる可能性があります。**

もし存在していなかった場合のみコピーしてください。

#### ✔️ 結論
- `.env.testing` が **すでに存在する場合 → そのまま使う（コピー不要）**
- `.env.testing` が **存在しない場合 → 初めて作るときだけコピーする**

#### 補足 `.env.testing` の作成

phpコンテナに入り、
PHP コンテナに入って、`.env` をコピーして `.env.testing` を作成します。

```bash
docker compose exec php bash

cp .env .env.testing
```

---

.env.testingを開いて、上部とDB接続部分を以下のように編集します。

```
APP_NAME=Laravel
APP_ENV=test
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql_test
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=demo_test
DB_USERNAME=root
DB_PASSWORD=root
```

✅ `APP_ENV` は `test` に変更


✅ `APP_KEY` は一旦空欄にしておきます


✅ `DB` も`demo_test`と`root`に設定します

---

### 4-5. テスト用アプリキーを生成
そして、先ほど「空」にしたAPP_KEYに新たなテスト用のアプリケーションキーを加えるために以下のコマンドを実行します

```bash
php artisan key:generate --env=testing
```

その後、キャッシュをクリアして反映：

```bash
php artisan config:clear
```

---

### 4-6. テスト用マイグレーション実行

```bash
php artisan migrate --env=testing
```

これで `demo_test` にテーブルが作成されます

---

### 4-7. PHPUnit の設定確認

このプロジェクトには、すでに **テスト環境用の設定済み `phpunit.xml`** が用意されています。
特に編集は不要です。内容を確認して、下記のように設定されていることを確認してください。

```xml
<php>
    <server name="APP_ENV" value="testing"/>
    <server name="BCRYPT_ROUNDS" value="4"/>
    <server name="CACHE_DRIVER" value="array"/>
    <server name="DB_CONNECTION" value="mysql_test"/>
    <server name="DB_DATABASE" value="demo_test"/>
    <server name="MAIL_MAILER" value="array"/>
    <server name="QUEUE_CONNECTION" value="sync"/>
    <server name="SESSION_DRIVER" value="array"/>
    <server name="TELESCOPE_ENABLED" value="false"/>
</php>
```

✅ `DB_CONNECTION="mysql_test"`
✅ `DB_DATABASE="demo_test"`


 この設定により、テスト実行時は
- 環境：`testing`
- 接続先DB：`mysql_test`
- 使用DB名：`demo_test`
が自動的に選ばれます。

---

### 4-8. 設定確認コマンド

もし設定が正しく反映されているか不安な場合は、
以下のコマンドで `.env.testing` と `phpunit.xml` の内容を確認できます。

```bash
docker compose exec php bash
cat .env.testing | grep DB_
grep DB_ phpunit.xml
```

結果が以下のようになっていればOKです

```
DB_CONNECTION=mysql_test
DB_DATABASE=demo_test
```
---

### これでテスト用DB環境の準備完了！

今後は以下のコマンドでテストを実行できます。

```bash
php artisan test
```



### テスト環境のセッションについて
- PHPUnit ではセッションドライバが `array` に設定されます。
- `array` ドライバは **メモリ上だけでセッションを管理し、テスト終了と同時に消える仕組み** です。
- そのため、ログイン状態や CSRF トークンなどは永続化されず、テストごとに完全にリセットされます。
- テストの独立性を保つために必要な設定です。

---
## 5. 勤怠 CSV 出力について

管理画面の「CSV出力」ボタンを押すと、選択したユーザーの指定した月の勤怠一覧情報が CSV 形式でダウンロードできます。
ダウンロードした CSV は Excel などで開け、日ごとの勤怠を一覧で確認可能です。


### CSVの構成

| 番号 | 内容 | 例 |
|------|------|----|
| 1行目 | ユーザー名：どのユーザーの勤怠かを示すタイトル行 | ユーザー名,西 伶奈 |
| 2行目 | 列のヘッダー：各列が何を表すか | 日付,出勤,退勤,休憩,合計 |
| 3行目以降 | 日ごとの勤怠情報：1日ごとの勤務データが1行ずつ並ぶ | 2025/11/01,09:14,18:40,1:10,8:16 |


| 日付       | 出勤   | 退勤   | 休憩  | 合計  |
|------------|--------|--------|-------|-------|
| 2025/11/01 | 09:14  | 18:40  | 1:10  | 8:16  |
| 2025/11/02 | 09:30  | 18:30  | 0:50  | 8:10  |
| 2025/11/03 | 09:16  | 18:30  | 1:10  | 8:04  |


### 列の意味

| 列名       | 内容                                      |
|------------|-----------------------------------------|
| 日付       | 勤務日                                    |
| 出勤       | 出勤時刻（HH:MM形式）                     |
| 退勤       | 退勤時刻（HH:MM形式）                     |
| 休憩   | その日の休憩時間の合計（HH:MM形式）       |
| 合計   | 実働時間（出勤〜退勤 − 休憩）            |

---

## 6. テーブル

### users テーブル

| カラム名   | 型              | PRIMARY KEY | UNIQUE KEY | NOT NULL | FOREIGN KEY |
|------------|-----------------|-------------|------------|----------|--------------|
| id         | unsigned bigint | ○           |            | ○        |              |
| name       | varchar(255)    |             |            | ○        |              |
| email      | varchar(255)    |             | ○          | ○        |              |
| password   | varchar(255)    |             |            | ○        |              |
| created_at | timestamp       |             |            |          |              |
| updated_at | timestamp       |             |            |          |              |



「orders.id を注文番号として利用しています」


---
## 7. ER図

![ER図](./docs/)

---

## 8. phpMyAdmin

- URL: http://localhost:8080/
- ユーザー名・パスワードは `.env` と同じ
- DB: `laravel_db` を確認可能

---

## 9. 注意事項

- MySQL データは `.gitignore` により Git には含めない




---
## 10. 認証・権限設計


- 一般ユーザー（注文者）
  - ログイン不要で注文可能
  - セッション管理のみを使用

- 管理者
  - Laravel Fortify を利用したログイン機能
  - `users` テーブルおよび `User` モデルを管理者として使用

認証対象を管理者のみに限定することで、不要なユーザー管理を省き、
実店舗向けテイクアウト注文アプリとして自然な設計を採用しています。

### 主なテーブル構成

- users  
  管理者情報を管理するテーブル

- orders  
  注文情報を管理するテーブル（ログイン不要）

- order_items  
  注文に紐づく商品情報を管理


### 管理者（User）ログイン
- コントローラ: 
- バリデーション: 
- ガード: `admin` ガードを使用（`config/auth.php` に設定）
- `Auth::guard('admin')->attempt($credentials)` により管理者認証を実施


#### 参考

- 管理者ログイン：
- Fortify設定：`App\Providers\FortifyServiceProvider`

### 管理者ログインURL   


---










---
## 12. 管理者ユーザー ログイン情報

### 管理者ユーザー
- 管理者ログインURL: 

| メールアドレス        | パスワード |
|-----------------------|------------|
| testadmin@gmail.com  | testpass   |

**AdminSeeder.phpで作成しているのでログインする前に一度確認してください**





---

## 13. 使用技術

- PHP 8.1.33
- Laravel 10.49.1
- MySQL 8.0.26
- MailHog
- Laravel Fortify
- PHPUnit
- GitHub
---
## 14. 開発環境 URL

- 開発環境: http://localhost/
- phpMyAdmin: http://localhost:8080/

---