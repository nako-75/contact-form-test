【README】
#　基礎学習ターム　確認テスト_お問い合わせフォームアプリ

##　Dockerビルド
- git clone git@github.com:nako-75/contact-form-test.git
- docker-compose up -d —build

##　環境構築
-  docker-compose exec php bash
-  composer install
-  cp .env.example .env (環境変数を適宜変更)
-  php artisan key:generate
-  php artisan migrate
-  php artisan db:seed

##　使用技術（実行環境）
- PHP: 8.1.x (fpm)
- Framework：Laravel 8.83.29
- Database：mysql:8.0.26
- Web Server：nginx:1.21.1
- OS：macOS

##　ER図（見本と同じ仕様で作成しました）
<img width="551" height="590" alt="Image" src="https://github.com/user-attachments/assets/5d989865-575d-4ad7-8ee3-1808a9e458d1" />

##　URL
- お問い合わせ画面：http://localhost/
- ユーザー登録画面：http://localhost/register
- phpMyAdmin.　：http://localhost:8080/

##　補足
- **Fortifyによる認証について**  
見本の登録UIに合わせるため、パスワードルールを変更し、  
確認用パスワードの入力なしで進められるように作成しています。  

- **メールアドレス形式のバリデーションについて**
表示確認のため「novalidate」を入れております。  

- **バリデーションメッセージについて**  
ルールに沿って全て表示するようにしています。  
（機能要件にはありませんでしたが、名前のstring,maxに対しても指定）

- **ログイン時の入力項目について**  
基本設計書では名前とアドレスになっていましたが、  
画面UI・機能要件よりアドレスとパスワードと判断し  
そちらで設定しています。

- **電話番号のバリデーション挙動について**  
電話番号が3つのフィールドに分かれている仕様上、  
ユーザーへの情報の過多を避けるため、  
エラー発生時は最初の不備項目から順に修正を促す挙動としています。  

- **一覧取得情報について**  
機能要件には「お問い合わせ内容」となっていますが、  
画面UIより「お問い合わせの種類」にて作成しています。

- **見やすさ考慮について**  
詳細ボタンとページネーションにもホバーを実装しています。

- **お問い合わせ削除について**  
削除後「お問い合わせを削除しました」と表示するアクションを追加してみました。