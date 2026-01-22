
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


### 3-6. ストレージリンク作成

```bash
php artisan storage:link
```


---
## 4.


---

## 6. テーブル

### users（管理者用） テーブル

| カラム名 | 型 | 制約 / 説明 |
|---|---|---|
| id | bigint | 主キー |
| name | string | ユーザー名 |
| email | string | ユニーク |
| email_verified_at | timestamp | メール確認日時（nullable） |
| password | string | パスワード |
| remember_token | string | ログイン保持用 |
| created_at | timestamp | 作成日時 |
| updated_at | timestamp | 更新日時 |



### categories テーブル

| カラム名 | 型 | 制約 / 説明 |
|---|---|---|
| id | bigint | 主キー |
| name | string | カテゴリ名 |
| sort_order | integer | 表示順（default: 0） |
| is_active | boolean | 有効フラグ |
| created_at | timestamp | 作成日時 |
| updated_at | timestamp | 更新日時 |



### menus テーブル

| カラム名 | 型 | 制約 / 説明 |
|---|---|---|
| id | bigint | 主キー |
| category_id | bigint | categories.id（外部キー） |
| name | string | 商品名 |
| price | integer | 価格 |
| description | text | 商品説明 |
| image_path | string | 画像パス |
| is_active | boolean | 有効フラグ |
| created_at | timestamp | 作成日時 |
| updated_at | timestamp | 更新日時 |



### orders テーブル

| カラム名 | 型 | 制約 / 説明 |
|---|---|---|
| id | bigint | 主キー |
| order_number | integer | 注文番号 |
| total_price | integer | 合計金額 |
| status | enum | pending / cooking / ready / handed |
| payment_status | enum | unpaid / paid |
| created_at | timestamp | 作成日時 |
| updated_at | timestamp | 更新日時 |



### order_items テーブル

| カラム名 | 型 | 制約 / 説明 |
|---|---|---|
| id | bigint | 主キー |
| order_id | bigint | orders.id（外部キー） |
| menu_id | bigint | menus.id（外部キー） |
| quantity | integer | 数量 |
| price | integer | 単価 |
| option | string | フレーバー等（nullable） |
| created_at | timestamp | 作成日時 |
| updated_at | timestamp | 更新日時 |

---

## 補足

- 注文のまとまりは `orders`
- 注文内の商品詳細は `order_items`
- フレーバー（メロン・グレープ等）は `order_items.option` に保存
- キッチン画面・管理画面・注文履歴すべてで同一構造を使用


---
## 7. 認証・権限設計


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



---
## 12. 管理者ユーザー ログイン情報

### 管理者ユーザー
- 管理者ログインURL: http://localhost/login

| メールアドレス        | パスワード |
|-----------------------|------------|
| admin1@example.com  | pass1234   |

**AdminSeeder.phpで作成しているのでログインする前に一度確認してください**

---


## 8. phpMyAdmin

- URL: http://localhost:8080/
- ユーザー名・パスワードは `.env` と同じ
- DB: `laravel_db` を確認可能

---

## 9. 注意事項

- MySQL データは `.gitignore` により Git には含めない




---











---






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