# アプリケーション名
coachtech pigly

# 環境構築
Dockerビルド
git clone git@github.com:itou-nanase/test3.git
cd test3
docker-compose up -d --build

# Laravel環境構築
docker-compose exec php bash
composer install
cp .env.example .env
.envファイルの下記項目を変更 DB_CONNECTION=mysql DB_HOST=mysql DB_PORT=3306 DB_DATABASE=laravel_db DB_USERNAME=laravel_user DB_PASSWORD=laravel_pass
php artisan key:generate
php artisan migrate
php artisan db:seed

# 使用技術
PHP 8.x
Laravel 8.x
MySQL
Docker
nginx

# URL
開発環境：http://localhost/
phpMyAdmin：http://localhost:8080/
トップページ（管理画面）：http://localhost/weight_logs
体重登録：http://localhost/weight_logs/create
体重検索：http://localhost/weight_logs/search
体重詳細：http://localhost/weight_logs/{:weightLogId}
体重更新：http://localhost/weight_logs/{:weightLogId}/update
体重削除：http://localhost/products/weight_logs/{:weightLogId}/delete
目標設定：http://localhost/wight_logs/goal_setting
会員登録：http://localhost/register/step1
初期目標体重登録：http://localhost/register/step2
ログイン：http://localhost/login
ログアウト：http://localhost/logout

# ER図

```mermaid
erDiagram

    users {
        bigint id PK
        varchar name
        varchar email
        varchar password
        timestamp created_at
        timestamp updated_at
    }

    weight_target {
        bigint id PK
        bigint user_id FK
        decimal target_weight
        timestamp created_at
        timestamp updated_at
    }

    weight_logs {
        bigint id PK
        bigint user_id FK
        date date
        decimal weight
        int calories
        time exercise_time
        text exercise_content
        timestamp created_at
        timestamp updated_at
    }

    users ||--|| weight_target : "1 to 1"
    users ||--o{ weight_logs : "1 to many"

```
