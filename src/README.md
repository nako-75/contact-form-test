【README】
#　基礎学習ターム　確認テスト_お問い合わせフォームアプリ

##　Dockerビルド
- git clone git@github.com:nako-75/contact-form-test.git
- docker-compose up -d —build

##　環境構築
- 1. docker-compose exec php bash
- 2. composer install
- 3. cp .env.example .env (環境変数を適宜変更)
- 4. php artisan key:generate
- 5. php artisan migrate
- 6. php artisan db:seed

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
- Fortifyによる認証を使用していますが、  
見本の登録UIに合わせるため、パスワードルールを変更し、  
確認用パスワードなしで作成しています。  

- メールアドレス形式のバリデーション表示確認のため、  
「novalidate」を入れております。