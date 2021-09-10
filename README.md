#Website sell watch.
#Features
1. Guest :

  View Product.
  Register.
  Add product to cart.
  Customer.
2. Login :

  Add product to cart.
  Checkout (No payment gateway implemented, all checkout status=PAID).
  View purchase history.
  Admin.
  
3. Login to admin panel :
  CRUD product.
  CRUD size.
  Manage order.
  View user.
  Notes.
  
# install application using Sail and Docker-compose.

1. git clone https://github.com/ngohuy0972/final-project.git
2. cd watch_store
3. Update Composer, run: composer update
4. To use Sail, run command: alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
5. Install all environment(images and container), run: sail up -d or docker compose up -d
6. Create file .env
7. Migrate database: php artisan migrate
8. Create Key: php artisan key:generate
9. Run: php artisan serve.


If you have problem about 'The stream or file "/home/huybapp/php/final-project/watch_store/storage/logs/laravel.log" could not be opened in append mode: failed to open stream: Permission denied'. You can try this command: sudo chmod -R 777 ./storage/logs/laravel.log

If you have problem about 'could not find driver (SQL: select * from information_schema.tables where table_schema = lsapp and table_name = migrations and table_type = 'BASE TABLE')'. Run command: sudo apt-get install -y php-pdo-mysql