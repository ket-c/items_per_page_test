

# Local environment setup
## Run

    git clone https://github.com/ket-c/items_per_page_test.git
<br>

    cd  items_per_page_test && composer install
  
<br>

    cp .env.example .env && php artisan key:generate

- update .env to use mysql and update your DB credentials as well
  
      DB_CONNECTION=mysql
<br>

    php artisan migrate && php artisan db:seed

<br>

    npm i && npm run build
<br>

    php artisan serve

