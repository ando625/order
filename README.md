
# 　注文アプリ

本アプリは飲食店向けの「一般ユーザー」と「管理者ユーザー」で構成される注文管理会計システムです。

お客様はメニュー画面から商品を選択し、カートに追加して注文を確定できます。　
注文データは管理画面およびキッチンモニターにリアルタイムで表示され、調理・受け渡しまでの業務フローを管理できます。

## 全体業務のフロー

1. お客様が商品を選択し注文を確定
2. 注文が「キッチンモニター」に表示される
3. 調理担当が調理開始、完成を操作
4. 受け渡し担当が商品を渡して完了
5. 当日、月日別注文履歴確認、売上統計確認

## 注文フロー（ユーザー側）

1. メニュー一覧画面（店舗設置のためログイン不要）
2. カテゴリー別に商品を選択
3. 商品をクリックして詳細モーダルを表示
4. オプション（フレーバー等）と数量を選択
5. カートに追加
6. カート画面内で内容を確認
7. 「お会計に進む」ボタンを押下
8. 注文確認モーダルで内容を確認
9. 注文確定

## カート機能

- 商品を複数追加可能
- 同一商品でもオプション違いは別商品として管理
- 数量の増減が可能
- 小計・消費税＿合計金額を自動計算
- セッションストレージ(sessionStorage)で一時保存

## 注文ステータス管理

注文は以下のステータスで管理されます。

- pending : 注文受付
- cooking : 調理中
- ready   : 調理完了
- handed  : 受け渡し完了

ステータス遷移：
pending → cooking → ready → handed





## キッチンモニター画面

キッチンモニターは、調理担当者向けの画面として設計されています。
注文内容を「伝票形式」で横並びに表示し、現在の調理状況を一目で把握できるようにしています。


## キッチンモニター機能

- 注文一覧をリアルタイム表示
- ステータス別に色分け表示
- 「調理開始」「完成」ボタンによるステータス更新
- 5秒ごとの自動リロードによる画面更新


### ステータス別表示ルール（キッチン）

注文ステータスに応じて、カードの見た目を変更しています。

- pending（注文受付）
  - 赤系の枠線・背景
  - 未着手の注文として強く注意喚起
  - 「調理開始」ボタンを表示

- cooking（調理中）
  - ゴールド系の枠線
  - 現在調理中の注文として視認性を重視
  - 「完成」ボタンを表示

- ready（調理完了）
  - グレースケール表示
  - キッチン側では作業完了扱いとして視覚的に弱調



## 管理画面（受け渡し）

管理画面（注文状況）は、受け渡し担当者向けの画面として設計されています。
キッチンで調理完了した注文を中心に、受け渡し作業を効率化します。

### ステータス別表示ルール（管理画面）

管理画面では「受け渡し待ち」の注文が最も目立つように設計しています。

- ready（受け渡し待ち）
  - 枠線と影を強調
  - カードをわずかに拡大
  - 「受け渡し完了」ボタンを強調表示

- cooking（調理中）
  - 落ち着いた配色
  - 状況確認用として表示

- pending（注文受付）
  - 表示を薄く
  - 会計・受け渡し対象外として視覚的に抑制


## 注文履歴（年月日別）

本アプリの注文履歴は、**お客様が注文を確定した時点**で履歴に反映される仕様としています。

これは、以下の理由によるものです。

- キッチン画面や管理画面での操作状況に依存せず、  
  **すべての注文を確実に履歴として残すため**
- 受け渡し完了前・調理中の注文であっても、  
  **後から注文内容を確認できるようにするため**
- 万が一、調理や受け渡し処理が行われなかった場合でも、  
  **注文データ自体が欠損しない設計とするため**


## 会計・支払い仕様について

本アプリでは、実店舗での運用を想定し、  
**お客様がメニュー選択時に自動精算機で会計を行うフロー**を前提としています。

### 現在の実装仕様（開発段階）

- 「注文を確定する」ボタン押下時点で、注文データを `orders` テーブルに保存
- この時点では、外部決済処理（現金・キャッシュレス等）は未実装
- 注文確定＝会計完了を想定した簡易フローとして実装

### 設計上の考え方

実店舗では以下の流れを想定しています。

1. お客様がメニューを選択
2. 自動精算機にて支払いを完了
3. 支払い完了後に注文が確定
4. 注文情報がキッチン・管理画面に連携される

現時点では②の決済処理を省略し、  
**③「注文確定」操作をもって支払い完了とみなす設計**としています。

---

## 使用技術

- PHP 8.1.33
- Laravel 10.49.1
- MySQL 8.0.26
- MailHog
- Laravel Fortify
- PHPUnit
- GitHub


## 認証・権限設計

- 一般ユーザー
  - ログイン不要
  - セッション管理のみ

- 管理者
  - Laravel Fortify を使用
  - users テーブルで管理

認証対象を管理者のみに限定することで、不要なユーザー管理を省き、
実店舗向けテイクアウト注文アプリとして自然な設計を採用しています。



このリポジトリは **Docker + Laravel 10 + MySQL + Fortify** 環境で動作する Web アプリです。
ここでは **環境構築** を含めて順を追って説明します。

---
# 環境構築・操作手順
## 1. リポジトリのクローン

```bash
git clone git@github.com:ando625/order.git
mv order orderapp
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



---

## テーブル

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
## 管理者ユーザー ログイン情報

### 管理者ユーザー
- 管理者ログインURL: http://localhost/login

| メールアドレス        | パスワード |
|-----------------------|------------|
| admin1@example.com  | pass1234   |

**AdminSeeder.phpで作成しているのでログインする前に一度確認してください**

---


## phpMyAdmin

- URL: http://localhost:8080/
- ユーザー名・パスワードは `.env` と同じ
- DB: `laravel_db` を確認可能

---

## 注意事項

- MySQL データは `.gitignore` により Git には含めない


---

## 開発環境 URL

- 開発環境: http://localhost/
- phpMyAdmin: http://localhost:8080/

---