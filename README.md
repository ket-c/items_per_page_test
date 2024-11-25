

# Local environment setup
## Run

    git clone https://github.com/ket-c/items_per_page_test.git
<br>

    cd  items_per_page_test
<br>

    composer install
<br>

    cp .env.example .env

- update .env to use mysql and update your DB credentials as well
  
      DB_CONNECTION=mysql
<br>

    php artisan migrate
<br>

    php artisan db:seed

- Optional

```npm install```

```npm run dev```
